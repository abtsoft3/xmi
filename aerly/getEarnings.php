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
	$query_get_data_earning = "select te.earning_amount
	,te.percentage_earning
	,DATE_FORMAT(te.earning_date,'%Y-%m-%d') as earning_date from tbl_deposit td, tbl_earning te
where td.id_transaction_deposit = te.id_transaction_deposit 
and td.username ='$username'
AND te.earning_date between '$date_from' and '$date_to'";
	$execute = mysqli_query($conn,$query_get_data_earning);
	$json_arr = array();
	while($row = mysqli_fetch_array($execute,MYSQL_ASSOC))
	{
		array_push($json_arr,$row);
	}
	print json_encode($json_arr);
}
?>