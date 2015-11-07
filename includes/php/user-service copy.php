<?php
class UserService {
      
   // Create some protected variables to use in this class
   protected $_pdo;
   protected $_user_id;
   protected $_password;
   
   // Construct the class
   public function __construct(PDO $pdo, $_user_id, $_password) {
      $this->_pdo = $pdo;
      $this->_user_id = $_user_id;
      $this->_password = $_password;
   }
   
   // Log a user in
   public function login() {
      
      // First check the user's credentials in the database
      $user = $this->_checkCredentials();
      
      // If the uesr is in the DB set the necessary sessions
      if ($user) {
         $this->_user = $user;
         $_SESSION['user_id'] = $user['user_id'];
         $_SESSION['f_name'] = $user['first_name'];
         $_SESSION['l_name'] = $user['last_name'];
         return $user['user_id'];
      }
      
      // If the user info is not in the database
      return false;
   }
   
   // Checks to see if the user information is in the database
   protected function _checkCredentials() {
      
      // Database query to check if the account info is correct
      $query = "SELECT user_id FROM users WHERE user_id = :user_id";
      $stmt = $pdo->prepare();
      $params = array("user_id" => $user_id);
      $stmt->execute($params);
      
      // If a row was returned from the DB query, hash the password and return the user array
      if ($stmt->rowCount() > 0) {
         $user = $stmt->fetch(PDO::FETCH_ASSOC);
         $submitted_pass = sha1($user['salt'] . $this->_password);
         if ($submitted_pass == $user['password'])
            return $user;
      }
      
      // If nothing is found in the DB return false
      return false;
   }
   
   // Gets the user information
   public function getUser() {
      return $this->_user_id;
   }
}
?>