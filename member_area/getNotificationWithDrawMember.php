<?php
require '../koneksi.php';
require 'session_user.php';
$db_handle = new koneksi();
$conn =$db_handle->connectDB();
$arr_notif = array();
//if()
//{
	$username=$_SESSION['username'];
	$query = "SELECT id_withdraw,
				username,
				amount_withdraw,
				date_time_req_wdw
				FROM tbl_with_draw WHERE status=1 AND 
				owner_status IS NULL AND 
				username='$username' 
				ORDER BY date_time_req_wdw ASC";
	
	$execute_query = mysqli_query($conn,$query) or die(mysql_error($conn));
	if($execute_query)
	{
		while($row = mysqli_fetch_array($execute_query,MYSQL_ASSOC))
		{
			array_push($arr_notif,$row);
		}
		print json_encode($arr_notif);
	}
//}
?>