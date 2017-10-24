<?php
include('session_user.php');
if(isset($_POST['amount_withdraw']))
{
	
	require_once("../connection/koneksi.php");
	$db_handle = new koneksi();
	$conn = $db_handle->connectDB();
	$amount_withdraw = $_POST['amount_withdraw'];
	$username = $_SESSION['username'];
	$query_check = "select id_withdraw from tbl_with_draw where username ='$username' and status=0";
	$check = $db_handle->numRows($query_check);
	if($check > 0)
	{
		print '<script type="text/javascript">alert("please wait with draw in processing");window.history.back();</script>';
	}
	else{
		
		$insert = "insert into tbl_with_draw 
			(username
			,amount_withdraw) values
			('$username'
			,'$amount_withdraw')";
		$execute = mysqli_query($conn,$insert);
		if($execute)
		{
			print '<script type="text/javascript">alert("request success");window.history.back();</script>';
		}
	}
}
else
{
	header('Location:your_investment.php');
}
?>