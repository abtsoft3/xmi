<?php
include('session_user.php');
if(isset($_POST['date-from']))
{
	
	require_once("../connection/koneksi.php");
	$db_handle = new koneksi();
	$conn = $db_handle->connectDB();
	$date_from = $_POST['date-from'];
	$date_to = $_POST['date-to'];
	$username = $_SESSION['username'];
		$query_get_data_wdw = "select amount_withdraw,date_time_req_wdw from tbl_with_draw 
		where 
		username='$username' and status=1 
		and date_time_acc_wdw between '$date_from' and '$date_to'";
	$execute = mysqli_query($conn,$query_get_data_wdw);
	$json_arr = array();
	while($row = mysqli_fetch_array($execute))
	{
		array_push($json_arr,$row);
	}
	print json_encode($json_arr);
}
?>
