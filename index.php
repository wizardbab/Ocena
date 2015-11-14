<?php include_once($_SERVER['DOCUMENT_ROOT'].'/MasterPages/required.php'); ?>
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
         
         <div class="switch">
            <input id="cmn-toggle-4" class="cmn-toggle cmn-toggle-round-flat" type="checkbox" name="search_check">
            <label for="cmn-toggle-4"></label>
            <div><h2>Search for: Courses</h2></div>
         </div>
         <?php ev_include("/includes/content/forms/search.php"); ?>


      
      </div>
      
      <footer>
         <?php ev_include('/MasterPages/footer.php') ?>
      </footer>
   </body>
</html>