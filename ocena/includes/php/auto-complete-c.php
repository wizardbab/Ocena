<?php
include_once("_db-config.php");

   try {
      $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
   } catch (\PDOException $e) {
      echo "Connection failed: ". $e->getMessage();
      exit;
   }

   $keyword = '%'.$_POST['keyword'].'%';
   $query = "SELECT * FROM course WHERE (course_name LIKE (:keyword)) OR (course_label LIKE (:keyword)) ORDER BY course_name ASC LIMIT 0, 10";
   $stmt = $pdo->prepare($query);
   $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
   $stmt->execute();
   
   $list = $stmt->fetchAll();
   
   foreach ($list as $result) {
   	$course_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $result['course_name']);
       echo '<li onclick="set_item(\''.str_replace("'", "\'", $result['course_name']).'\')"><a href="course-profile.php?id='.$result['course_id'].'">'.$course_name.'<span class="glyphicon glyphicon-circle-arrow-right pull-right dropdown-glyph"></span><br /><span>'.$result['course_label'].'</span></a></li>';
   }
   
   $pdo = null;
?>