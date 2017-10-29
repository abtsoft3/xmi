<?php
include 'session_user.php';
require '../koneksi.php';
$db_handle = new koneksi();
$conn =$db_handle->connectDB();
$arr_notif = array();
//if()
//{
	$username=$_SESSION['username'];
	$query = "SELECT id_transaction_deposit,
				username,
				tx_id,
				eth_address,
				amount_spend,
				date_time_spend	
				FROM tbl_deposit WHERE tx_id IS NOT NULL 
				AND eth_address IS NOT NULL 
				AND spend_status IS NOT NULL 
				AND operator_status IS NOT NULL 
				AND date_time_operator_read IS NOT NULL 
				AND owner_read_status IS NULL AND username='$username' ORDER BY date_time_spend ASC";
	
	$execute_query = mysqli_query($conn,$query);
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