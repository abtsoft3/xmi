<?php
require_once("../koneksi.php");
$db_handle = new koneksi();
$conn =$db_handle->connectDB();
$query_str='';
$arr_returnVal = array();
if(isset($_POST['id']))
{
	$id = mysqli_real_escape_string($conn,$_POST['id']);
	$query_str = "SELECT td.*,tr.upline FROM tbl_deposit td,tbl_register tr 
	WHERE td.username = tr.username AND td.id_transaction_deposit =$id";
}
else{
	$query_str = "SELECT td.*,tr.upline FROM tbl_deposit td,tbl_register tr WHERE 
	td.username = tr.username AND 
	td.tx_id IS NOT NULL
	AND td.eth_address IS NOT NULL 
	AND td.spend_status IS NULL 
	AND td.operator_status IS NULL 
	AND td.date_time_operator_read IS NULL ORDER BY td.date_time_spend ASC";
}
$execute_query = mysqli_query($conn,$query_str);
if($execute_query)
{
	while($row = mysqli_fetch_array($execute_query,MYSQL_ASSOC))
	{
		array_push($arr_returnVal,$row);
	}
	$results =array('data'=>$arr_returnVal);
	print json_encode($results);
}
?>

