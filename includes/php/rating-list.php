<?php
   if (isset($_SESSION['user_id'])) {
      echo '<li><a href="#" data-toggle="modal" data-target="#settings"><strong>'.$_SESSION['f_name'].' '.$_SESSION['l_name'].'</strong></a></li>
               <li class="dropdown">
               <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
               <span class="glyphicon glyphicon-check dropdown-toggle"></span></a>
               <ul class="dropdown-menu">';
         
      try {
         $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
      } catch (\PDOException $e) {
         echo "Connection failed: ". $e->getMessage();
         exit;
      }

      $query = "SELECT * FROM enroll WHERE enroll_student_id = :student_id ";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':student_id', $_SESSION['user_id']);
      $stmt->execute();
      
      $enroll_list = $stmt->fetchAll();
      foreach ($enroll_list as $enroll_result) {
      
         $query = "SELECT * FROM class WHERE class_id = :enroll_class_id";
         $stmt = $pdo->prepare($query);
         $stmt->bindParam(':enroll_class_id', $enroll_result['enroll_class_id']);
         $stmt->execute();
         
         $class_list = $stmt->fetchAll();
         
         foreach ($class_list as $class_result) {
            $query = "SELECT * FROM course WHERE course_id = :class_course_id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':class_course_id', $class_result['class_course_id']);
            $stmt->execute();
            
            $course_list = $stmt->fetchAll();
            
            foreach ($course_list as $course_result) {
               echo '<li>
                  <a href="rating.php?id='.$class_result['class_id'].'">
                  <h3>'.$course_result['course_name'].'</h3>';
                        
               $query = "SELECT * FROM teacher WHERE teacher_id = :class_teacher_id";
               $stmt = $pdo->prepare($query);
               $stmt->bindParam(':class_teacher_id', $class_result['class_teacher_id']);
               $stmt->execute();
               
               $teacher_list = $stmt->fetchAll();
            
               foreach ($teacher_list as $teacher_result) {
                     echo '<h4>'.$teacher_result['teacher_fname'].' '.$teacher_result['teacher_lname'].'</h4>';
               }
               
               echo '</a>
                     </li>';
            }
         }
      }
      echo '</ul></li>';
      $pdo = null;
   } else {
      echo '<li><a href="#" data-toggle="modal" data-target="#signIn"><strong>Log in</strong></a></li>';
   }

?>