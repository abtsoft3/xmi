<?php
include('session_user.php');
if(!empty($_GET['date_from']) && !empty($_GET['date_to']))
{
	
	require_once("../koneksi.php");
	$db_handle = new koneksi();
	$conn = $db_handle->connectDB();
	$date_from = htmlspecialchars($_GET['date_from']);
	$date_to = htmlspecialchars($_GET['date_to']);
	$username = $_SESSION['username'];
	$query_get_data_earning = "select te.earning_amount
	,te.percentage_earning
	,DATE_FORMAT(te.earning_date,'%Y-%m-%d') as earning_date from tbl_deposit td, tbl_earning te
where td.id_transaction_deposit = te.id_transaction_deposit 
and td.username ='$username'
AND te.earning_date between '2017-10-23' and '2017-10-26'";
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