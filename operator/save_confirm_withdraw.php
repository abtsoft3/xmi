<?php
require_once("../koneksi.php");
if(isset($_POST['id_wdw']))
{
	$db_handle = new koneksi();
	$conn =$db_handle->connectDB();
	$id = $_POST['id_wdw'];
	$query_str = "UPDATE tbl_with_draw SET 
	date_time_acc_wdw = NOW(),
	status=1 
	where id_withdraw =$id";
	$execute = mysqli_query($conn,$query_str);
	if($execute)
	{
		print json_encode(1);
	}
}
?>