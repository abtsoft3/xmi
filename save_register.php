<?php
require_once("koneksi.php");
$db_handle = new koneksi();
$conn = $db_handle->connectDB();
if(!empty($_POST["register-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		print "<script type='text/javascript'>alert('your input is incorrect');window.location.href='register.php';</script>";
		$error_message="error";
		break;
		}
	}
	/* Password Matching Validation */
	if($_POST['password'] != $_POST['confirm_password']){ 
		print "<script type='text/javascript'>alert('your passwords do not match!');window.location.href='register.php';</script>";
		$error_message="error";
	}

	/* Email Validation */
	if(!isset($error_message)) {
		if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
			print "<script type='text/javascript'>alert('invalid email address');window.location.href='register.php';</script>";
			$error_message="error";
		}
	}

	/* Validation to check if Terms and Conditions are accepted */
	if(!isset($error_message)) {
		if(!isset($_POST["terms"])) {
			print "<script type='text/javascript'>alert('please Accept Terms and Conditions to Register');window.location.href='register.php';</script>";
			$error_message="error";
		}
	}
	
		$fullname = mysqli_real_escape_string($conn,$_POST["fullName"]);
		$email_user = mysqli_real_escape_string($db_handle->connectDB(),$_POST["userEmail"]);
		$username = mysqli_real_escape_string($db_handle->connectDB(),$_POST["userName"]);
		$password_user = md5(mysqli_real_escape_string($db_handle->connectDB(),$_POST["password"]));
		$addr_eth = mysqli_real_escape_string($db_handle->connectDB(),$_POST["ethereum_address"]);
		$question = mysqli_real_escape_string($db_handle->connectDB(),$_POST["question_sec"]);
		$answer = mysqli_real_escape_string($db_handle->connectDB(),$_POST["answer_question"]);
		
	$check_username =ctype_alpha($username);
	if(!$check_username)
	{
		print "<script type='text/javascript'>alert('username must be letters!');window.location.href='register.php';</script>";
		$error_message="error";
	}
	if (preg_match('/\s/',$username))
	{
		print "<script type='text/javascript'>alert('do not spacing!');window.location.href='register.php';</script>";
		$error_message="error";
	}

	if(!isset($error_message)) {
		$query_exists = "select * from tbl_register where username='$username'";
		$execute_exists = mysqli_query($conn,$query_exists);
		if($execute_exists)
		{
			$num_rows = mysqli_num_rows($execute_exists);
			if($num_rows > 0){
				print "<script type='text/javascript'>alert('username already exist');window.location.href='register.php';</script>";
			}
			else{
				$query_insert = "INSERT INTO tbl_register values 
						('$username'
						,'$fullname'
						,'$email_user'
						,'$password_user'
						,'$addr_eth'
						,'$question'
						,'$answer'
						,'NONE'
						,'0000-00-00 00:00:00'
						,NOW()
						)";
				$result = $db_handle->insertQuery($query_insert);
				if($result) {
					print "<script type='text/javascript'>alert('You have registered successfully!');
					window.location.href='log_in.php';</script>";
				} else {
					print "<script type='text/javascript'>alert('Problem in registration. Try Again!');
					window.location.href='log_in.php';</script>";
				}
			}
		}
		
	}
}
?>