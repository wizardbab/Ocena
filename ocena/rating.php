<?php 
   include_once($_SERVER['DOCUMENT_ROOT'].'/MasterPages/required.php'); 

   $course_info = getRatingInfo($pdo, GET('id'), "course");
   $teacher_info = getRatingInfo($pdo, GET('id'), "teacher");
   $teacher_rating_info = getRatingInfo($pdo, GET('id'), "teacher_rating");
   $course_rating_info = getRatingInfo($pdo, GET('id'), "course_rating");
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Project Ocena</title>
      <?php ev_include('/MasterPages/head.php') ?>
   </head>
   <body>
      
      <header>
         <div class="h-container" id="top">
            <?php ev_include('/MasterPages/header.php') ?>
            <form id="msform" method="post" action="/">
               <!-- progressbar -->
               <ul id="progressbar">
                  <li class="active">General Ratings</li>
                  <li>Teacher Rating</li>
                  <li>Course Rating</li>
               </ul>
               <!-- fieldsets -->
               <fieldset>
                  <h2 class="fs-title">General Ratings</h2>
                  <h3 class="fs-subtitle">Give <?php echo $teacher_info['teacher_fname'].' '. $teacher_info['teacher_lname']; ?> an overall rating</h3>
                  <input type="hidden" name="course_id" value="<?php echo $course_info['course_id'] ?>" />
                  <input type="hidden" name="course_teacher_id" value="<?php echo $teacher_info['teacher_id'] ?>" />
                  <input id="t1" class="rating-slider" name="t_general" data-slider-id='t1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php
                                                            if ($teacher_rating_info['rating'])
                                                               echo $teacher_rating_info['rating'];
                                                            else
                                                               echo "50";
                                                          ?>">
                  <h3 class="fs-subtitle">Give <?php echo $course_info['course_name']; ?> an overall rating</h3>
                  <input type="hidden" name="teacher_id" value="<?php echo $teacher_info['teacher_id'] ?>" />
                  <input type="hidden" name="teacher_course_id" value="<?php echo $course_info['course_id'] ?>" />
                  <input id="c1" class="rating-slider" name="c_general" data-slider-id='c1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php
                                                            if ($course_rating_info['rating'])
                                                               echo $course_rating_info['rating'];
                                                            else
                                                               echo "50";
                                                          ?>">
                  <input type="button" name="next" class="next action-button" value="Next" />
               </fieldset>
               <fieldset>
                  <h2 class="fs-title">Teacher Rating</h2>
                  <h3 class="fs-subtitle">Question 1</h3>
                     <input id="t2" class="rating-slider" name="t_q1" data-slider-id='t2Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php
                                                            if ($teacher_rating_info['teacher_question_one'])
                                                               echo $teacher_rating_info['teacher_question_one'];
                                                            else
                                                               echo "50";
                                                          ?>">
                  <h3 class="fs-subtitle">Question 2</h3>
                     <input id="t3" class="rating-slider" name="t_q2" data-slider-id='t3Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php
                                                            if ($teacher_rating_info['teacher_question_two'])
                                                               echo $teacher_rating_info['teacher_question_two'];
                                                            else
                                                               echo "50";
                                                          ?>">
                  <h3 class="fs-subtitle">Question 3</h3>
                     <input id="t4" class="rating-slider" name="t_q3" data-slider-id='t4Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php
                                                            if ($teacher_rating_info['teacher_question_three'])
                                                               echo $teacher_rating_info['teacher_question_three'];
                                                            else
                                                               echo "50";
                                                          ?>">
                  <h3 class="fs-subtitle">Question 4</h3>
                     <input id="t5" class="rating-slider" name="t_q4" data-slider-id='t5Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php
                                                            if ($teacher_rating_info['teacher_question_four'])
                                                               echo $teacher_rating_info['teacher_question_four'];
                                                            else
                                                               echo "50";
                                                          ?>">
                  <h3 class="fs-subtitle">Question 5</h3>
                     <input id="t6" class="rating-slider" name="t_q5" data-slider-id='t6Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php
                                                            if ($teacher_rating_info['teacher_question_five'])
                                                               echo $teacher_rating_info['teacher_question_five'];
                                                            else
                                                               echo "50";
                                                          ?>">
                  <h3 class="fs-subtitle">Comment</h3>
                  <textarea name="teacher_comment" placeholder="Say something about your teacher"><?php
                                                            if ($teacher_rating_info['comment'])
                                                               echo $teacher_rating_info['comment'];
                                                            else
                                                               echo "";
                                                         ?></textarea>
                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                  <input type="button" name="next" class="next action-button" value="Next" />
               </fieldset>
               <fieldset>
               <h2 class="fs-title">Course Rating</h2>
                  <h3 class="fs-subtitle">Question 1</h3>
                     <input id="c2" class="rating-slider" name="c_q1" data-slider-id='t2Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php
                                                            if ($course_rating_info['course_question_one'])
                                                               echo $course_rating_info['course_question_one'];
                                                            else
                                                               echo "50";
                                                          ?>">
                  <h3 class="fs-subtitle">Question 2</h3>
                     <input id="c3" class="rating-slider" name="c_q2" data-slider-id='t3Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php
                                                            if ($course_rating_info['course_question_two'])
                                                               echo $course_rating_info['course_question_two'];
                                                            else
                                                               echo "50";
                                                          ?>">
                  <h3 class="fs-subtitle">Question 3</h3>
                     <input id="c4" class="rating-slider" name="c_q3" data-slider-id='t4Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php
                                                            if ($course_rating_info['course_question_three'])
                                                               echo $course_rating_info['course_question_three'];
                                                            else
                                                               echo "50";
                                                          ?>">
                  <h3 class="fs-subtitle">Question 4</h3>
                     <input id="c5" class="rating-slider" name="c_q4" data-slider-id='t5Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php
                                                            if ($course_rating_info['course_question_four'])
                                                               echo $course_rating_info['course_question_four'];
                                                            else
                                                               echo "50";
                                                          ?>">
                  <h3 class="fs-subtitle">Question 5</h3>
                     <input id="c6" class="rating-slider" name="c_q5" data-slider-id='t6Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php
                                                            if ($course_rating_info['course_question_five'])
                                                               echo $course_rating_info['course_question_five'];
                                                            else
                                                               echo "50";
                                                          ?>">
                  <h3 class="fs-subtitle">Comment</h3>
                  <textarea name="course_comment" placeholder="Say something about your teacher"><?php
                                                            if ($course_rating_info['comment'])
                                                               echo $course_rating_info['comment'];
                                                            else
                                                               echo "";
                                                         ?></textarea>
                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                  <input type="submit" id="submit-button" name="submit_ratings" value="Submit" />
               </fieldset>
            </form>
         </div>
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