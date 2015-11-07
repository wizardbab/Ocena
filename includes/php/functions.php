<?php
// Include the database constants
include_once("_db-config.php");

   if(!empty($_GET['sessionSet'])){ $_SESSION[$_GET['sessionSet']] = $_GET['value']; }

   // Custom include function to make things easy
	function ev_include($include, $root=true, $includeTimes='', $Global=''){	
		if($root){ $include = $_SERVER['DOCUMENT_ROOT'].$include; }
		if(file_exists($include)){
			if($includeTimes == 'once'){
				include_once($include); }else{
				include($include); }
		}else{
			print 'path [ '.$include.' ] not found';	
		}
	}
   
   // Include all necessary classes
   ev_include("/includes/php/user-service.php");
   
   function generateId($length) {
      return rand(pow(10, $length-1), pow(10, $length)-1);
   }
   
   function changeTheme($theme) {
      unset($_SESSION['theme']);
      $_SESSION['theme'] = $theme;
      header('Location: ../index.php');
   }
   
   // Student sign in
   function studentSignin() {
      try {
         $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
      } catch (\PDOException $e) {
         echo "Connection failed: ". $e->getMessage();
         exit;
      }
      
      $student_id = generateId(8);
      $fname = "John";
      $lname = "Doe";
      
      session_unset();
      
      $_SESSION['user_id'] = $student_id;
      $_SESSION['f_name'] = $fname;
      $_SESSION['l_name'] = $lname;
      $_SESSION['theme'] = "red";
      
      $query = "INSERT INTO student (student_id, student_fname, student_lname) VALUES (:student_id, :fname, :lname)";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
      $stmt->bindParam(':fname', $fname);
      $stmt->bindParam(':lname', $lname);
         /*foreach ($params as $key => &$val) {
             $stmt->bindParam($key, $val);
         }
      /*$params = array("user_id" => $user_id,
                      "fname" => $fname,
                      "lname" => $lname);*/
      $stmt->execute();

      
      $pdo = null;
   }
   
   //Unsets all sessions and logs the user out
   function logout() {
      if (isset($_SESSION['user_id'])) {
         session_unset();
         header('Location: ../index.php');
      }
   }

?>