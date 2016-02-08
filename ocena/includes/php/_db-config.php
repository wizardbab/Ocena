<?php
   define("DB_PDODRIVER", "mysql");
   define("DB_HOST", "localhost");
   define("DB_NAME", "ocena");
   define("DB_USER", "root");
   define("DB_PASS", "");
   
   try {
      $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
   } catch (\PDOException $e) {
      echo "Connection failed: ". $e->getMessage();
      exit;
   }
?>