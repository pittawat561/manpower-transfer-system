<?php
	session_start();
	session_destroy();
	setcookie('loggedIn', '', -1, '/'); 
	setcookie('UserID_MTS', '', -1, '/'); 
	header("location:login.php");
?>