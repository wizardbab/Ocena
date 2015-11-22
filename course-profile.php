<?php 
   include_once($_SERVER['DOCUMENT_ROOT'].'/MasterPages/required.php'); 
   $course_info = getRatingInfo(GET('id'), "course");
   $course_rating = getCourseRating(GET('id'));
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
               echo $course_info['course_name']; ?>
         </h1>
         <h3><?php echo $course_rating; ?></h3>
         <br />

      </div>
      
      <footer>
         <?php ev_include('/MasterPages/footer.php') ?>
      </footer>
   </body>
</html>