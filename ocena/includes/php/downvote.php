<?php
   include("functions.php");
   
   $rating_id = $_POST['id'];
   $t_or_c = $_POST['t_or_c'];
   $s_id = $_POST['s_id'];
   //echo $rating_id;

   // $query = "INSERT INTO votes (student_id, t_or_c, rating_id, vote)
   //                      VALUES(:s_id, :t_or_c, :r_id, 1)";
   // $stmt = $pdo->prepare($query);
   // $stmt->bindParam(':s_id', $s_id);
   // $stmt->bindParam(':t_or_c', $t_or_c);
   // $stmt->bindParam(':r_id', $rating_id);
   // $stmt->execute();
      
   //echo "test";
   $query = "SELECT * FROM votes WHERE student_id = :student_id AND rating_id = :rating_id AND t_or_c = :t_or_c";
   $stmt = $pdo->prepare($query);
   $stmt->bindParam(':student_id', $s_id);
   $stmt->bindParam(':rating_id', $rating_id);
   $stmt->bindParam(':t_or_c', $t_or_c);
   $stmt->execute();
   
   $current_ratings = $stmt->fetchAll();
   
   if ($current_ratings) {
      foreach ($current_ratings as $rating) {
         //print_r($rating);
         //echo "down";
         if ($rating['vote'] == 1) {
            echo "test";
            $query = "UPDATE votes SET vote=-1 WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $rating['id']);
            $stmt->execute();
            
            if ($t_or_c == 'c') {
               $query = "UPDATE course_rating SET vote_count = vote_count - 2 WHERE rating_id = :rating_id";
               $stmt = $pdo->prepare($query);
               $stmt->bindParam(':rating_id', $rating_id);
               $stmt->execute();
            } else if ($t_or_c == 't') {
               
            }
         }
      }
   } else {
      $query = "INSERT INTO votes (student_id, t_or_c, rating_id, vote)
                           VALUES(:s_id, :t_or_c, :r_id, -1)";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':s_id', $s_id);
      $stmt->bindParam(':t_or_c', $t_or_c);
      $stmt->bindParam(':r_id', $rating_id);
      $stmt->execute();
      
      $query = "UPDATE course_rating SET vote_count = vote_count 1 1 WHERE rating_id = :rating_id";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':rating_id', $rating_id);
      $stmt->execute();
   }

?>