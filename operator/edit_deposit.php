<?php
if(isset($_POST['id_transaction_deposit']) 
	&& isset($_POST['txid']) && isset($_POST['eth_address']) && 
isset($_POST['amount_spend']))
{
	$id_trx = $_POST['id_transaction_deposit'];
	$txid = $_POST['txid'];
	$eth_address = $_POST['eth_address'];
	$amount_spend = $_POST['amount_spend'];
	
	require_once("../koneksi.php");
	$db_handle = new koneksi();
	$conn =$db_handle->connectDB();
	$qry_delete="UPDATE tbl_deposit SET tx_id='$txid',
	eth_address='$eth_address',amount_spend='$amount_spend'	
	WHERE id_transaction_deposit='$id_trx'";
		$execute = mysqli_query($conn,$qry_delete);
		if($execute)
		{
			print json_encode(1);
		}
}
?>