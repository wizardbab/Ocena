<?php 
   include_once($_SERVER['DOCUMENT_ROOT'].'/MasterPages/required.php'); 
   $course_info = getRatingInfo(GET('id'), "course");
   $teacher_info = getRatingInfo(GET('id'), "teacher");
   $teacher_rating_info = getRatingInfo(GET('id'), "teacher_rating");
   $course_rating_info = getRatingInfo(GET('id'), "course_rating");
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
            <?php echo $course_info['course_name']; 
            ?>
         </h1>
         <br />
         <div class="form-style-6">
         <form method="post" action="/">
            <input type="hidden" name="course_id" value="<?php echo $course_info['course_id'] ?>" />
            <input type="hidden" name="course_teacher_id" value="<?php echo $teacher_info['teacher_id'] ?>" />
            <h2>Do you like this course?</h2>
            0&nbsp;<input type="range" name="like" value="<?php
                                                            if ($course_rating_info['rating'])
                                                               echo $course_rating_info['rating'];
                                                            else
                                                               echo "50";
                                                          ?>">&nbsp;100
            <br />
            <textarea name="rating_comment" placeholder="Say something about your teacher"><?php
                                                            if ($course_rating_info['comment'])
                                                               echo $course_rating_info['comment'];
                                                            else
                                                               echo "";
                                                         ?></textarea>
            <br />
            <input type="submit" class="" name="rate_course" value="Submit Rating" />
         </form></div>
         
         <h1>
            <?php echo $teacher_info['teacher_fname'].' '. $teacher_info['teacher_lname']; ?>
         </h1>
         <br />
         <div class="form-style-6">
         <form method="post" action="/">
            <input type="hidden" name="teacher_id" value="<?php echo $teacher_info['teacher_id'] ?>" />
            <input type="hidden" name="teacher_course_id" value="<?php echo $course_info['course_id'] ?>" />
            <h2>Do you like this teacher?</h2>
            0&nbsp;<input type="range" name="like" value="<?php
                                                            if ($teacher_rating_info['rating'])
                                                               echo $teacher_rating_info['rating'];
                                                            else
                                                               echo "50";
                                                          ?>">&nbsp;100
            <br />
            <textarea name="rating_comment" placeholder="Say something about your teacher"><?php
                                                            if ($teacher_rating_info['comment'])
                                                               echo $teacher_rating_info['comment'];
                                                            else
                                                               echo "";
                                                          ?></textarea>
            <br />
            <input type="submit" class="" name="rate_teacher" value="Submit Rating" />
         </form></div>
      </div>
      
      <footer>
         <?php ev_include('/MasterPages/footer.php') ?>
      </footer>
   </body>
</html>