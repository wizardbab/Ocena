<?php
include_once("_db-config.php");

/*	
try { 
   	$connect = new PDO($dsn, $username, $password);
   	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
}   */

   function ev_include($include, $root=true, $includeTimes='') {
      if ($root) {$include = $_SERVER['DOCUMENT_ROOT'].$include; }
      if (file_exists($include)) {
         if ($includeTimes == 'once') {
            include_once($include); 
            } else {
               include($include);
            } else {
               print 'path [ '.$include.' ] not found';
            }
         }
      }
   }
?>