<?php 
include 'koneksi.php';
include 'session_forget.php';
$db_handle = new koneksi();
$create_conn = $db_handle->connectDB();
$email = mysqli_real_escape_string($create_conn,$_SESSION['email_forget']);
if(isset($_POST['sequrity_answer']))
{
	$answer = mysqli_real_escape_string($create_conn,$_POST['sequrity_answer']);
	$query_login = mysqli_query($create_conn,"select * from 
	tbl_register where userEmail='$email' 
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
}
?>