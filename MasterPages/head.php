<link rel="stylesheet" href="/includes/css/bootstrap.min.css" type="text/css" >
<link rel="stylesheet" href="/includes/css/bootstrap-tagsinput.css" type="text/css" >
<link rel="stylesheet" href="/includes/css/bootstrap-slider.css" type="text/css" >

<link rel="stylesheet" href="/includes/css/styles.css" type="text/css" >
<?php
   if (isset($_SESSION['theme'])) {
      echo '<link rel="stylesheet" href="/includes/css/themes/'.$_SESSION['theme'].'.css" type="text/css" >';
   }
?>

<script src="/includes/js/jquery.js" type="text/javascript"></script>
<script src="/includes/js/_commonScripts.js" type="text/javascript"></script>

<meta charset="UTF-8">

<?php ev_include("/includes/php/process-form.php"); ?>