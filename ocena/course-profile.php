<?php 
   include_once($_SERVER['DOCUMENT_ROOT'].'/MasterPages/required.php'); 
   $course_info = getCourse($pdo, GET('id'));
   if (empty($course_info))
         header('Location: index.php');
   $course_rating = getCourseRating($pdo, GET('id'));
   //updateRatings($pdo, GET('id'), "course");
   $rating_comments = getComments($pdo, GET('id'), "course");
   $course_teachers = getCourseTeachers($pdo, GET('id'));
   //print_r($course_teachers);
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Project Ocena</title>
      <?php ev_include('/MasterPages/head.php') ?>
      <link rel="stylesheet" href="/includes/css/progress.css" type="text/css" >
   </head>
   <body>
      
      <header>
         <div class="h-container" id="top">
         <?php ev_include('/MasterPages/header.php') ?>
         
          <div class="h-content container-fluid">
                       <div class="toggles">
            <div class="toggle-border">
               <input type="checkbox" id="search-toggle" />
               <label for="search-toggle">
                  <div class="handle"></div>
               </label>
               
            </div>
            
         </div>
            <?php ev_include("/includes/content/forms/search.php"); ?>
         </div>
         </div>
      </header>
      
      <div class="container wrapper" id="start">
         <div class="row">
            <div class="col-md-8">
               <h1 class="profile-title"><?php echo $course_info['course_name']; ?></h1>
               <?php foreach ($course_teachers as $teacher) { ?>
                  <a href="teacher-profile.php?id=<?php echo $teacher['id']; ?>" class="sub-rating">
                     <h4>
                        <strong><?php echo $teacher['name']."'s" ?></strong> course rating:  <?php echo round(($teacher['rating'] + $course_rating['general']) / 2, 1) ?>%
                     </h4>
                  </a>
               <?php } ?>
            </div>
            <div class="col-md-4">
               <div class="col-md-2 progress-circle progress-circle-general">
                  <div class="progress-radial progress-<?php echo roundProgress($course_rating['general']); ?> progress-general">
                     <div class="overlay"><?php echo round($course_rating['general'], 1) ."%"; ?></div>
                  </div>
                  <h5>General</h5>
               </div>
            </div>   
         </div>
         
         <h3 class="rating-section-title">RATINGS</h3>
         
         <div class="row progress-wrap">
            <div class="col-md-2 progress-circle">
               <div class="progress-radial progress-<?php echo roundProgress($course_rating['q1']); ?>">
                  <div class="overlay"><?php echo round($course_rating['q1'], 1) ."%"; ?></div>
               </div>
               <h5>Question 1</h5>
            </div>
            
            <div class="col-md-2 progress-circle">
               <div class="progress-radial progress-<?php echo roundProgress($course_rating['q2']); ?>">
                  <div class="overlay"><?php echo round($course_rating['q2'], 1) ."%"; ?></div>
               </div>
               <h5>Question 2</h5>
            </div>
            
            <div class="col-md-2 progress-circle">
               <div class="progress-radial progress-<?php echo roundProgress($course_rating['q3']); ?>">
                  <div class="overlay"><?php echo round($course_rating['q3'], 1) ."%"; ?></div>
               </div>
               <h5>Question 3</h5>
            </div>
            
            <div class="col-md-2 progress-circle">
               <div class="progress-radial progress-<?php echo roundProgress($course_rating['q4']); ?>">
                  <div class="overlay"><?php echo round($course_rating['q4'], 1) ."%"; ?></div>
               </div>
               <h5>Question 4</h5>
            </div>
            
            <div class="col-md-2 progress-circle">
               <div class="progress-radial progress-<?php echo roundProgress($course_rating['q5']); ?>">
                  <div class="overlay"><?php echo round($course_rating['q5'], 1) ."%"; ?></div>
               </div>
               <h5>Question 5</h5>
            </div>
         </div>
         
         <h3 class="rating-section-title">COMMENTS</h3>
         
         <?php foreach ($rating_comments as $comment) { ?>
         <div class="row">
            <input type="hidden" value="<?php echo $comment['rating_id'] ?>" name="rating_id"/>
            <input type="hidden" value="1" name="t_or_c"/>
            
            <div class="col-md-2 comment-vote">
               <?php //if ($comment['student_id'] == ) ?>
               <?php 
                  //$upvote_class = ($comment['student_id'] == $_SESSION['user_id'] && $comment['vote'] == 1) ? " upvote-active" : "" ; 
                  //$downvote_class = ($comment['student_id'] == $_SESSION['user_id'] && $comment['vote'] == -1) ? " downvote-active" : "" ; 
                  $upvote_class = getUserVote($pdo, $_SESSION['user_id'], $comment['rating_id'], 'c', 'u');
                  $downvote_class = getUserVote($pdo, $_SESSION['user_id'], $comment['rating_id'], 'c', 'd');
               ?> 
               <?php if ($_SESSION['rank'] == 1) { ?>
                  <button id="course-up-<?php echo $comment['rating_id'] ?>" class="glyphicon glyphicon-chevron-up<?php echo $upvote_class; ?>" onclick="upvote(<?php echo $comment['rating_id'] ?>, 'c', <?php echo $_SESSION['user_id']; ?>)"></button>
                  <button id="course-down-<?php echo $comment['rating_id'] ?>" class="glyphicon glyphicon-chevron-down<?php echo $downvote_class; ?>" onclick="downvote(<?php echo $comment['rating_id'] ?>, 'c', <?php echo $_SESSION['user_id']; ?>)"></button>
               <?php } ?>
            </div>
            <div class="col-md-3">
               <p><?php echo $comment['rating_date']; ?></p>
               <p><?php echo round($comment['rating'], 1) ."%"; ?></p>
            </div>
            <div class="col-md-5"><?php echo $comment['comment']; ?></div>
            <div class="col-md-2 comment-list">
               <ul>
                  <li>Q1: <?php echo $comment['course_question_one'] ."%"; ?></li>
                  <li>Q2: <?php echo $comment['course_question_two'] ."%"; ?></li>
                  <li>Q3: <?php echo $comment['course_question_three'] ."%"; ?></li>
                  <li>Q4: <?php echo $comment['course_question_four'] ."%"; ?></li>
                  <li>Q5: <?php echo $comment['course_question_five'] ."%"; ?></li>
               </ul>
            </div>
         </div>
         <?php } ?>

      </div>
      
      <footer>
         <?php ev_include('/MasterPages/footer.php') ?>
      </footer>
   </body>
</html>