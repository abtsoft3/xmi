<?php
require_once("../koneksi.php");
$db_handle = new koneksi();
$conn = $db_handle->connectDB();

	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		print "<script type='text/javascript'>alert('your input is incorrect');
		window.location.href='setting.php';</script>";
		$error_message="error";
		break;
		}
	}
	/* Password Matching Validation */
	if($_POST['password'] != $_POST['confirm_password']){ 
		print "<script type='text/javascript'>alert('your passwords do not match!');
		window.location.href='setting.php';</script>";
		$error_message="error";
	}

	/* Email Validation */
	if(!isset($error_message)) {
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			print "<script type='text/javascript'>alert('invalid email address');
			window.location.href='setting.php';</script>";
			$error_message="error";
		}
	}

		
		$fullname = mysqli_real_escape_string($conn,$_POST["fullname"]);
		$email_user = mysqli_real_escape_string($db_handle->connectDB(),$_POST["email"]);
		$username = mysqli_real_escape_string($db_handle->connectDB(),$_POST["username"]);
		$password_user = md5(mysqli_real_escape_string($db_handle->connectDB(),$_POST["password"]));
		$addr_eth = mysqli_real_escape_string($db_handle->connectDB(),$_POST["etherium_address"]);
		
	$check_username =ctype_alpha($username);
	if(!$check_username)
	{
		print "<script type='text/javascript'>alert('username must be letters!');
		window.location.href='setting.php';</script>";
		$error_message="error";
	}
	if (preg_match('/\s/',$username))
	{
		print "<script type='text/javascript'>alert('do not spacing!');
		window.location.href='setting.php';</script>";
		$error_message="error";
	}

	if(!isset($error_message)) {
		$query_exists = "UPDATE tbl_register SET fullName='$fullname',
		userEmail='$email_user',
		password='$password_user',
		ethereum_address='$addr_eth' where username='$username'";
		$execute_exists = mysqli_query($conn,$query_exists) or die(mysqli_error($conn));
		if($execute_exists)
		{
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['fullname'] =$fullname;
			$_SESSION['email'] =$email_user;
			$_SESSION['ethereum_address'] =$addr_eth;
			print "<script type='text/javascript'>alert('Your account data has been updated successfully');
					window.location.href='setting.php';</script>";
			
		}
		
	}

?>