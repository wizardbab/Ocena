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

foreach ($list as $rs) {
	// put in bold the written text
	$teacher_name = $rs['teacher_fname']. " " .$rs['teacher_lname'];
	$teacher_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $teacher_name);
	// add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['teacher_fname']).'\')"><a href="#">'.$teacher_name.'<span class="glyphicon glyphicon-circle-arrow-right pull-right dropdown-glyph"></span><br /><span>'.$rs['teacher_office'].'</span></a></li>';
}
?>