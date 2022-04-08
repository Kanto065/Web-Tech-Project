<?php 
	session_start();
	session_unset();
	setcookie('uname', "", time()-60, '/');
	header("Location: ../view/landingPage.php");
?>