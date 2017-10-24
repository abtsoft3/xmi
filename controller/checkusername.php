<?php
	require_once("../connection/koneksi.php");
	$db_handle = new koneksi(); 
	$username = mysqli_real_escape_string($db_handle->connectDB(),$_POST['username']);
	if(isset($username))
	{
		$query_cek= "select * from tbl_register where username='$username'";
		
		$get= $db_handle->numRows($query_cek);
		if ($get>0) {
			print json_encode(1);
		}
		else
		{
			print json_encode(0);
		}
	}
?>