<?php
	
	if(!isset($_SESSION))
	{
		session_start();
	}
	if(!isset($_SESSION['accum_percentage']))
	{
		header('Location:deposit.php');
	}
?>