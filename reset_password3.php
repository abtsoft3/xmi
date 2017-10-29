<?php 
include 'koneksi.php';
include 'session_forget2.php';
$db_handle = new koneksi();
$create_conn = $db_handle->connectDB();

if(isset($_POST['new_password']) && isset($_POST['confirm_password']))
{
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		print "<script type='text/javascript'>alert('your input is incorrect');window.location.href='reset_password.php';</script>";
		$error_message="error";
		break;
		}
	}
	
	if($_POST['new_password'] != $_POST['confirm_password']){ 
			print "<script type='text/javascript'>alert('your passwords do not match!');window.location.href='reset_password.php';</script>";
			$error_message="error";
		}
	if(!isset($error_message)){
		$email = mysqli_real_escape_string($create_conn,$_SESSION['email_forget']);
		$answer = mysqli_real_escape_string($create_conn,$_SESSION['answer']);
		$password = MD5($_POST['new_password']);
		$qry_change_pass = "UPDATE tbl_register SET 
		password='$password' where userEmail='$email' AND 
		answer_question='$answer'";
		$execute = mysqli_query($create_conn,$qry_change_pass);
		if($execute)
		{
			unset($_SESSION['email_forget']);
			unset($_SESSION['sequrity_answer']);
			print "<script type='text/javascript'>alert('your password is changed successfully!');window.location.href='log_in.php';</script>";
		}
	}
	
	
}


	
	$query_login = mysqli_query($create_conn,"select * from 
	tbl_register where email='$email' 
	and answer_question='$answer'") or 
	die(mysqli_error($create_conn));
	$num_rows = mysqli_num_rows($query_login);
	if($num_rows > 0){
		session_start();
		$_SESSION['email_forget'] = $email;
		$_SESSION['answer']=$answer;
		header("location:reset_password.php");
	}
	else
	{
		print "<script type='text/javascript'>alert('invalid answer');window.location.href='forget_password_security.php';</script>";
	}

?>