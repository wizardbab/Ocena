<?php 
   include_once($_SERVER['DOCUMENT_ROOT'].'/MasterPages/required.php'); 
   $info = getTeacherInfo(GET('id'));
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
            <?php echo $info['teacher_fname']." ". $info['teacher_lname']; ?>
         </h1>
         <br />
         <div class="form-style-6">
         <form method="post" action="/">
            <input type="hidden" name="teacher_id" value="<?php echo GET('id') ?>" />
            <h2>Do you like this teacher?</h2>
            <input type="radio" name="like" value="1">Yes<br>
            <input type="radio" name="like" value="0">No
            <br />
            <textarea name="rating_comment" placeholder="Say something about this teacher"></textarea>
            <br />
            <input type="submit" class="" name="rate_teacher" value="Submit Rating" />
         </form></div>
      </div>
      
      <footer>
         <?php ev_include('/MasterPages/footer.php') ?>
      </footer>
   </body>
</html>