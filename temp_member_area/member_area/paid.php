<?php	
include('session_user.php');
include('session_spend.php');
require_once("../koneksi.php");
foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
		print '<script type="text/javascript">alert("Invalid Input");window.location.href=confirm_spend.php;</script>';
		break;
	}
}
$db_handle = new koneksi();
$conn =$db_handle->connectDB();

$id_transaction_deposit = $_SESSION['id_transaction_deposit'];
$tx_id = mysqli_real_escape_string($conn,$_POST['tx_id']);
$eth_addr = mysqli_real_escape_string($conn,$_POST['eth_address']);
$query_update ="update tbl_deposit set tx_id ='$tx_id'
				,eth_address = '$eth_addr'
				where id_transaction_deposit=$id_transaction_deposit";
$execute_update = mysqli_query($conn,$query_update);
if($execute_update)
{
	unset($_SESSION['id_transaction_deposit']);
	unset($_SESSION['amount_to_spend']);
	unset($_SESSION['accum_percentage']);
	unset($_SESSION['persen_total']);
	print '<script type="text/javascript">alert("your deposit success confirmed");window.location.href="index.php";</script>';
	
}	

?>