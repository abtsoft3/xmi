<?php 
include 'connection/koneksi.php';
$db_handle = new koneksi();
$create_conn = $db_handle->connectDB();
$username = mysqli_real_escape_string($create_conn,$_POST['username']);
$password = MD5(mysqli_real_escape_string($create_conn,$_POST['password']));
if(isset($username) && isset($password))
{
	
	$query_login = mysqli_query($create_conn,"select * from tbl_register where username='$username' and password='$password'") or 
	die(mysqli_error($create_conn));
	$num_rows = mysqli_num_rows($query_login);
	if($num_rows > 0){
		session_start();
		$results=mysqli_fetch_assoc($query_login);
		$_SESSION['username'] = $username;
		$_SESSION['fullname'] =$results['fullName'];
		$_SESSION['email'] =$results['userEmail'];
		$_SESSION['ethereum_address'] =$results['ethereum_address'];
		$_SESSION['upline'] = $results['upline'];
		header("location:aerly/account.php");
	}
	else
	{
		print "<script type='text/javascript'>alert('invalid username or password!');window.history.back();</script>";
	}
}


 

 
?>