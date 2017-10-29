<?php
//if(isset($_POST['id_deposit']))
//{
	$id_trx = $_POST['id_wdw'];
	if(!empty($id_trx))
	{
		require_once("../koneksi.php");
		$db_handle = new koneksi();
		$conn =$db_handle->connectDB();
		$qry_delete="DELETE FROM tbl_with_draw WHERE id_withdraw='$id_trx'";
		$execute = mysqli_query($conn,$qry_delete);
		if($execute)
		{
			print json_encode(1);
		}
	}
//}
?>