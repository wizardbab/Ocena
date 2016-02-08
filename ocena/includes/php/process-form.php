<?php
	// If login form is posted, log the user in
	/*if(isset($_POST['login'])) {
		userLogin($_POST['username'], $_POST['password']);
	}*/
		
	if (isset($_POST['signin_student'])) {
   	studentSignin($pdo);
	}

   if (isset($_POST['signin_teacher'])) {
      teacherSignin($pdo);
   }
   
   if (isset($_POST['submit_ratings'])) {
      submitRatings($pdo, $_SESSION['user_id'], $_POST['course_id'],  $_POST['teacher_id'], 
              $_POST['course_teacher_id'], $_POST['teacher_course_id'], $_POST['t_general'],  $_POST['c_general'], 
              $_POST['t_q1'], $_POST['t_q2'], $_POST['t_q3'], $_POST['t_q4'], $_POST['t_q5'], $_POST['teacher_comment'], 
              $_POST['c_q1'], $_POST['c_q2'], $_POST['c_q3'], $_POST['c_q4'], $_POST['c_q5'], $_POST['course_comment']);
   }

   if (isset($_POST['logout'])) {
      logout();
   }
   
   if (isset($_POST['red-theme'])) {
      changeTheme("red");
   }
   
   if (isset($_POST['blue-theme'])) {
      changeTheme("blue");
   }
   
   if (isset($_POST['orange-theme'])) {
      changeTheme("orange");
   }
   
   if (isset($_POST['purple-theme'])) {
      changeTheme("purple");
   }
   
   if (isset($_POST['green-theme'])) {
      changeTheme("pink");
   }
?>