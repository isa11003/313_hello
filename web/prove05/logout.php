<?php
	
	
	session_start();
	
	if (isset($_POST['user']))
	{
		unset($_SESSION['user']);
	}
	
	header("Location: login.php"); /* Redirect browser */
?>