<?php 
include 'koneksi.php';
$db_handle = new koneksi();
$create_conn = $db_handle->connectDB();
$username = mysqli_real_escape_string($create_conn,$_POST['username']);
$password = MD5(mysqli_real_escape_string($create_conn,$_POST['password']));
if(isset($username) && isset($password))
{

	$query_login = mysqli_query($create_conn,"select * from tbl_operator where username='$username' and password='$password'") or 
	die(mysqli_error($create_conn));
	$num_rows = mysqli_num_rows($query_login);
	if($num_rows > 0){
			$query_update ="UPDATE tbl_operator SET 
		last_login = NOW() where username = '$username'";
		mysqli_query($create_conn,$query_update);
		session_start();
		$results=mysqli_fetch_assoc($query_login);
		$_SESSION['username'] = $username;
		$_SESSION['last_login'] =$results['last_login'];
		header("location:operator/index.php");
	}
	else
	{
		print "<script type='text/javascript'>alert('invalid username or password!');window.location.href='log_in.php';</script>";
	}
}


 

 
?>