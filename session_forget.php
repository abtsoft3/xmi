<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
	
	if(!isset($_SESSION['email_forget']))
	{
		header('Location:log_in.php');
	}
?>