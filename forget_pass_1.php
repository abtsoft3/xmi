<?php 
include 'koneksi.php';
$db_handle = new koneksi();
$create_conn = $db_handle->connectDB();
$email = mysqli_real_escape_string($create_conn,$_POST['email']);
if(isset($email))
{
	$query_login = mysqli_query($create_conn,
	"select * from tbl_register where userEmail='$email'") or 
	die(mysqli_error($create_conn));
	$num_rows = mysqli_num_rows($query_login);
	if($num_rows > 0){
		session_start();
		$_SESSION['email_forget'] = $email;
		header("location:forget_password_security.php");
	}
	else
	{
		print "<script type='text/javascript'>alert('invalid email address!');window.location.href='forget_password.php';</script>";
	}
}


 

 
?>