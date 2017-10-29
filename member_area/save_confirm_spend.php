<?php
include('session_user.php');
require_once("../koneksi.php");
$db_handle = new koneksi();
$conn =$db_handle->connectDB();
$username = mysqli_real_escape_string($conn,$_SESSION["username"]);

foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
		print '<script type="text/javascript">alert("Invalid Input");window.location.href=deposit.php;</script>';
		break;
	}
}
if(!empty($_POST["amount_spend"])) {
	/* Form Required Field Validation */
	
	
		//$tx_id = mysqli_real_escape_string($conn,$_POST["tx_id"]);
		$date_time_spend = date("Y-m-d H:i:s");
		$amount_spend = floatval(mysqli_real_escape_string($conn,$_POST["amount_spend"]));
		$query_insert = "INSERT INTO tbl_deposit
						(username
						,amount_spend
						,date_time_spend
						) values 
						('$username'
						,'$amount_spend'
						,'$date_time_spend')";
		$result = mysqli_query($conn,$query_insert);
		if($result) 
		{
			
			$id_transaction_deposit = mysqli_insert_id($conn);
			$now = strtotime(date("Y-m-d"));
			$begin = new DateTime(date('Y-m-d', strtotime('+1 day', $now)));
			$end = new DateTime('2018-03-19');// date ico
			$daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);
			
			
			$accum_percentage=0;
			$days=1;
			$percentage_earning=1;
			$persen_total=0;
			if($amount_spend <= 6.0 && $amount_spend >= 3.01)
			{
				//do it
				foreach($daterange as $date){
					$days+=1;
				}
				$sisa=0;
				for($i=1;$i<=15;$i++)
				{
					$sisa+=$i;
					
				}
				$persen_total =(($days - 15)*15)+$sisa;
				$accum_percentage = $persen_total/100 * $amount_spend;
			}
			
			if($amount_spend <= 3.0 && $amount_spend >= 1.01)
			{
				foreach($daterange as $date){
					$days+=1;
				}
				$sisa=0;
				for($i=1;$i<=10;$i++)
				{
					$sisa+=$i;
					
				}
				$persen_total =(($days - 10)*10)+$sisa;
				$accum_percentage = $persen_total/100 * $amount_spend;
			}
			
			if($amount_spend <= 1.0 && $amount_spend >= 0.01)
			{
				foreach($daterange as $date){
					$days+=1;
				}
				$sisa=0;
				for($i=1;$i<=5;$i++)
				{
					$sisa+=$i;
					
				}
				$persen_total =(($days - 5)*5)+$sisa;
				$accum_percentage = $persen_total/100 * $amount_spend;
			}
			session_start();
			$_SESSION['id_transaction_deposit']=$id_transaction_deposit;
			$_SESSION['amount_to_spend'] = $amount_spend;
			$_SESSION['accum_percentage'] = $accum_percentage;
			$_SESSION['persen_total'] =$accum_percentage;
			header('Location:confirm_spend.php');
	}
}
else{
	
}
?>