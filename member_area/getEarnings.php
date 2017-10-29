<?php
include('session_user.php');
if(!empty($_GET['date_from']) && !empty($_GET['date_to']))
{
	
	require_once("../koneksi.php");
	$db_handle = new koneksi();
	$conn = $db_handle->connectDB();
	$date_from = $_GET['date_from'];
	$date_to = $_GET['date_to'];
	$username = $_SESSION['username'];
	$query_get_data_earning = "select te.earning_amount
	,te.percentage_earning
	,DATE_FORMAT(te.earning_date,'%Y-%m-%d') as earning_date from tbl_deposit td, tbl_earning te
where td.id_transaction_deposit = te.id_transaction_deposit 
and td.username ='basri' 
AND te.earning_date between '$date_from' and '$date_to' order by te.earning_date";
	$execute = mysqli_query($conn,$query_get_data_earning);
	$json_arr = array();
	while($row = mysqli_fetch_array($execute,MYSQL_ASSOC))
	{
		array_push($json_arr,$row);
	}
	$results =array('data'=>$json_arr);
	print json_encode($results);
}
?>