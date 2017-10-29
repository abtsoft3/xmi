<?php
include('session_user.php');
if(isset($_POST['amount_withdraw']) && isset($_POST['eth_address']) && $_POST['payout'])
{
	
	require_once("../koneksi.php");
	$db_handle = new koneksi();
	$conn = $db_handle->connectDB();
	$amount_withdraw = $_POST['amount_withdraw'];
	$addr_eth =$_POST['eth_address'];
	$payout =$_POST['payout'];
	if($amount_withdraw > 0 && $amount_withdraw<=$payout)
	{
		$username = $_SESSION['username'];
		$query_check = "select id_withdraw from tbl_with_draw where username ='$username' and status=0";
		$check = $db_handle->numRows($query_check);
		if($check > 0)
		{
			print json_encode(0);
		}
		else{
			
			$insert = "insert into tbl_with_draw 
				(username
				,amount_withdraw
				,eth_addr
				,status) values
				('$username'
				,'$amount_withdraw'
				,'$addr_eth'
				,0)";
			$execute = mysqli_query($conn,$insert);
			if($execute)
			{
				print json_encode(2);
			}
		}
		
	}
	else
	{
		print json_encode(1);
	}
	
}
else
{
	header('Location:withdraw.php.php');
}
?>