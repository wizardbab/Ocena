<?php 
   include_once($_SERVER['DOCUMENT_ROOT'].'/MasterPages/required.php'); 
   $teacher_info = getRatingInfo(GET('id'), "teacher");
   $teacher_rating = getTeacherRating(GET('id'));
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Project Ocena</title>
      <?php ev_include('/MasterPages/head.php') ?>
   </head>
   <body>
      
      <header>
         <?php ev_include('/MasterPages/header.php') ?>
      </header>
      
      <div class="container wrapper">
         <h1>
            <?php 
               echo $teacher_info['teacher_fname'] .' '. $teacher_info['teacher_lname'];?>
         </h1>
         <h3><?php echo $teacher_rating; ?></h3>
         <br />

      </div>
      
      <footer>
         <?php ev_include('/MasterPages/footer.php') ?>
      </footer>
   </body>
</html>