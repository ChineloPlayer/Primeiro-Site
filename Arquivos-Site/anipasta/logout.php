<?php
	 session_start();
	 require('includes/func.php');
	
	$_SESSION['user'];
	
	unset($_SESSION['user']);


	session_destroy();
	if(file_exists("index.php")){
		header("location:index.php");
	}
?>