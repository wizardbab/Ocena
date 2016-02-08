<?php include_once($_SERVER['DOCUMENT_ROOT'].'/MasterPages/required.php'); ?>
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
     
      
      <footer>
         <?php ev_include('/MasterPages/footer.php') ?>
      </footer>
   </body>
</html>