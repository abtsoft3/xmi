<?php
require_once("../koneksi.php");
$db_handle = new koneksi();
$conn =$db_handle->connectDB();
$query_str='';
$arr_returnVal = array();
if(isset($_POST['id']))
{
	$id = mysqli_real_escape_string($conn,$_POST['id']);
	$query_str =  "SELECT id_withdraw,
				username,
				amount_withdraw,
				date_time_req_wdw,
				eth_addr
				FROM tbl_with_draw WHERE status=0 
				AND id_withdraw =$id ORDER BY date_time_req_wdw ASC";
}
else{
	$query_str = "SELECT id_withdraw,
				username,
				amount_withdraw,
				date_time_req_wdw
				,eth_addr
				FROM tbl_with_draw WHERE status=0 ORDER BY date_time_req_wdw ASC";
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

