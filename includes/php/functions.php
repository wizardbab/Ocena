<?php
// Include the database constants
include_once("_db-config.php");

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
   
   // Function to log the user in
   function userLogin($username, $user_password) {
      
      // Open a connection to the database
      try {
         $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
      } catch (\PDOException $e) {
         echo "Connection failed: ". $e->getMessage();
         exit;
      }
      
      // Create a new instance of UserService
      $login_service = new UserService($pdo, $username, $password);
      
      // Set user_id equal to login()
      if ($user_id = $login_service->login()) {
         $user_data = $login_service->getUser();
         $pdo = null;
         header('Location: ../index.php');
      } else {
         $pdo = null;
         header('Location: ../error.php?error=login');
      }
   }
   
   //Unsets all sessions and logs the user out
   function logout() {
      if (isset($_SESSION['user_id'])) {
         unset($_SESSION['user_id']);
         unset($_SESSION['f_name']);
         unset($_SESSION['l_name']);
         header('Location: ../index.php');
      }
   }

   ?>