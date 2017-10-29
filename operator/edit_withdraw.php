<?php
if(isset($_POST['idwdw']) && isset($_POST['eth_address']) && 
isset($_POST['amount_spend']))
{
	$id_trx = $_POST['idwdw'];
	$eth_address = $_POST['eth_address'];
	$amount_spend = $_POST['amount_spend'];
	
	require_once("../koneksi.php");
	$db_handle = new koneksi();
	$conn =$db_handle->connectDB();
	$qry_delete="UPDATE tbl_with_draw SET 
	eth_addr='$eth_address',amount_withdraw='$amount_spend'	
	WHERE id_withdraw='$id_trx'";
		$execute = mysqli_query($conn,$qry_delete) or die(mysqli_error($conn));
		if($execute)
		{
			print json_encode(1);
		}
}
//{
//	print json_encode(0);
//}
?>