<link rel="stylesheet" href="/includes/css/bootstrap.min.css" type="text/css" >
<link rel="stylesheet" href="/includes/css/bootstrap-slider.css" type="text/css" >

<link rel="stylesheet" href="/includes/css/styles.css" type="text/css" >


<?php
   if (isset($_SESSION['theme'])) {
      echo '<link rel="stylesheet" href="/includes/css/themes/'.$_SESSION['theme'].'.css" type="text/css" >';
   }
   else {
      echo '<link rel="stylesheet" href="/includes/css/themes/red.css" type="text/css" >';
   }
?>

   <meta name="viewport" content="width=device-width, initial-scale=1">
   
<meta charset="UTF-8">

<?php //ev_include("/includes/php/process-form.php"); ?>