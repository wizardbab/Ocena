<?php
include_once("_db-config.php");

      try {
         $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
      } catch (\PDOException $e) {
         echo "Connection failed: ". $e->getMessage();
         exit;
      }

$keyword = '%'.$_POST['keyword'].'%';
$query = "SELECT * FROM teacher WHERE (teacher_fname LIKE (:keyword)) OR (teacher_lname LIKE (:keyword)) ORDER BY teacher_fname ASC LIMIT 0, 10";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$stmt->execute();

$list = $stmt->fetchAll();

foreach ($list as $result) {
	$teacher_name = $result['teacher_fname']. " " .$result['teacher_lname'];
	$teacher_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $teacher_name);
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $result['teacher_fname']).'\')"><a href="teacher-profile.php?id='.$result['teacher_id'].'">'.$teacher_name.'<span class="glyphicon glyphicon-circle-arrow-right pull-right dropdown-glyph"></span><br /><span>'.$result['teacher_office'].'</span></a></li>';
    
    $pdo = null;
}
?>