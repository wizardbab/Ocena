<?php
	// If login form is posted, log the user in
	if(isset($_POST['login'])) {
		userLogin($_POST['username'], $_POST['password']);
	}     
?>