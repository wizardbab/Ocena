<?php
   // Function to log the user in
   function userLogin($type) {
      
      // Open a connection to the database
      try {
         $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
      } catch (\PDOException $e) {
         echo "Connection failed: ". $e->getMessage();
         exit;
      }
      
      // Create a new instance of UserService
      $login_service = new UserService($pdo, $type);
      
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
   ?>