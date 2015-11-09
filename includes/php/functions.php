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
   ev_include("/includes/php/student-info.php");
   
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
      $student_info = new StudentInfo();
      
      //$student_id = $student_info->generateId();
      $fname = $student_info->firstName();
      $lname = $student_info->lastName();
      
      session_unset();
      
      $query = "SELECT * FROM student WHERE student_fname = :fname AND student_lname = :lname";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':fname', $fname);
      $stmt->bindParam(':lname', $lname);
      $stmt->execute();
      if($stmt->fetch(PDO::FETCH_ASSOC)) {
         while ($teacher = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['user_id'] = $teacher['student_id'];
            $_SESSION['f_name'] = $teacher['student_fname'];
            $_SESSION['l_name'] = $teacher['student_lname'];
            $_SESSION['rank'] = 1;
         }
      } else {
         $student_id = $student_info->generateId();
         $_SESSION['user_id'] = $student_id;
         $_SESSION['f_name'] = $fname;
         $_SESSION['l_name'] = $lname;
         $_SESSION['theme'] = "red";
         $_SERVER['rank'] = 1;
      }
      
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
   
      function teacherSignin() {
      try {
         $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
      } catch (\PDOException $e) {
         echo "Connection failed: ". $e->getMessage();
         exit;
      }
      
      $query = "SELECT COUNT(*) FROM teacher";
      $result = $pdo->query($query);
      $max_id = $result->fetchColumn();   
         
      $teacher_id = rand(1, $max_id);
      echo $teacher_id;
      //session_unset();
      
      $query = "SELECT * FROM teacher WHERE teacher_id = :teacher_id";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':teacher_id', $teacher_id, PDO::PARAM_INT);
      $stmt->execute();
      while ($teacher = $stmt->fetch(PDO::FETCH_ASSOC)) {
         $_SESSION['user_id'] = $teacher['teacher_id'];
         $_SESSION['f_name'] = $teacher['teacher_fname'];
         $_SESSION['l_name'] = $teacher['teacher_lname'];
         $_SESSION['rank'] = 2;
      }
      //$result = $result->fetchAll(PDO::FETCH_ASSOC);
      /*
      $query = "SELECT user_id FROM users WHERE user_id = :user_id";
      $stmt = $pdo->prepare();
      $params = array("user_id" => $user_id);
      $stmt->execute($params);
      */
      
      //if ($stmt->rowCount() > 0) {
         //$teacher = $result;
         //header('Location: ../error.php?'.$teacher['teacher_id'].'test');
      //}
      
      
      /*if ($teacher) {
         $_SESSION['user_id'] = $teacher['teacher_id'];
         $_SESSION['f_name'] = $teacher['teacher_fname'];
         $_SESSION['l_name'] = $teacher['teacher_lname'];
         $_SESSION['rank'] = 2;
      //}*/
      
      $pdo = null;
   }
   
   //Unsets all sessions and logs the user out
   function logout() {
      if (isset($_SESSION['user_id'])) {
         session_unset();
         header('Location: ../index.php');
      }
   }
   
   function searchForTeacher($keyword) {
      try {
         $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
      } catch (\PDOException $e) {
         echo "Connection failed: ". $e->getMessage();
         exit;
      }
   
      $query = "SELECT teacher_fname as teacher FROM teachers WHERE teacher_fname LIKE :keyword ORDER BY teacher_fname";
      $stmt = $pdo->prepare($query);
      $keyword = $keyword . '%';
      $stmt->bindParam(1, $keyword, PDO::PARAM_STR, 100);
      $success = $stmt->execute();
      
      $results = array();
      
      if ($success) {
         $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
      } else {
         trigger_error('Error executing statement.', E_USER_ERROR);
      }
      
      $pdo = null;
      
      return $results;
   }

?>