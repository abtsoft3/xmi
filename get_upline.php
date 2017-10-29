<?php
if(!isset($_SESSION))
{
		session_start();
}
if(isset($_GET['ref'])
{
	$uplinename =$_GET['ref'];
	if(!empty($uplinename))
	{
		session_start();;
		$_SESSION['getupline'];
	}
}
?>