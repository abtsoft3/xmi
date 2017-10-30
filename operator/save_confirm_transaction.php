<?php
require_once("../koneksi.php");
//insert upline earning jika ada uplline
if(isset($_POST['upline']) && isset($_POST['id_transaction_deposit']) && 
isset($_POST['amount_spend']))
{
			$db_handle = new koneksi();
			$conn =$db_handle->connectDB();
			$query_insert_earning="";
			$upline_username =mysqli_real_escape_string($conn,$_POST['upline']);
			$id_transaction_deposit = mysqli_real_escape_string($conn,$_POST['id_transaction_deposit']);
			$amount_spend = mysqli_real_escape_string($conn,$_POST['amount_spend']);

			$query_update ="update tbl_deposit set spend_status ='1'
				,operator_status = '1'
				,date_time_operator_read=NOW()
				where id_transaction_deposit=$id_transaction_deposit";

			$execute_update = mysqli_query($conn,$query_update);
			if($execute_update)
			{
				if( $upline_username!= 'NONE')
				{
					$query_get_id_deposit_upline = mysqli_query($conn,"select max(id_transaction_deposit) as maxid
						from tbl_deposit where username ='$upline_username'");
					$earning_amount_upline = (8/100) * $amount_spend;
					$get_id_deposit_upline = mysqli_fetch_assoc($query_get_id_deposit_upline);
					$upline_id_transaction = $get_id_deposit_upline['maxid'];
					$query_insert_earning= "INSERT INTO tbl_earning
								(id_transaction_deposit
								,earning_amount
								,earning_date
								,percentage_earning
								,earning_type
								) values 
								('$upline_id_transaction'
								,'$earning_amount_upline'
								,NOW()
								,8
								,1)";
					$db_handle->insertQuery($query_insert_earning);
				}
				
				$now = strtotime(date("2017-10-29 10:10:10"));
				//$begin = new DateTime(date('Y-m-d H:i:s', strtotime('+1 day', $now)));
				$begin = new DateTime(date('Y-m-d H:i:s', $now));
				$end = new DateTime('2018-03-19 12:00:00');// date ico
				$daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);
				
				
				$earning_amount=0;
				$counter=1;
				$percentage_earning=1;

				if($amount_spend <= 6.0 && $amount_spend >= 3.01)
				{
					//do it
					foreach($daterange as $date){
						$earning_date = $date->format("Y-m-d H:i:s");
						if($counter<=15)
						{
							$earning_amount = ($percentage_earning/100) * $amount_spend;
						}
						else{
							$percentage_earning=15;
							$earning_amount = ($percentage_earning/100) * $amount_spend;
						}
						$query_insert_earning= "INSERT INTO tbl_earning
								(id_transaction_deposit
								,earning_amount
								,earning_date
								,percentage_earning
								) values 
								('$id_transaction_deposit'
								,'$earning_amount'
								,'$earning_date'
								,'$percentage_earning')";
						$execute_earning_query=$db_handle->insertQuery($query_insert_earning);
						$counter+=1;
						$percentage_earning+=1;
					}
				}
				if($amount_spend <= 3.0 && $amount_spend >= 1.01)
				{
					foreach($daterange as $date){
						$earning_date =  $date->format("Y-m-d H:i:s");
						if($counter<=10)
						{
							$earning_amount = ($percentage_earning/100) * $amount_spend;
						}
						else{
							$percentage_earning=10;
							$earning_amount = ($percentage_earning/100) * $amount_spend;
						}
						$query_insert_earning= "INSERT INTO tbl_earning
								(id_transaction_deposit
								,earning_amount
								,earning_date
								,percentage_earning
								) values 
								('$id_transaction_deposit'
								,'$earning_amount'
								,'$earning_date'
								,'$percentage_earning')";
						$execute_earning_query=$db_handle->insertQuery($query_insert_earning);
						$counter+=1;
						$percentage_earning+=1;
					}
				}
				if($amount_spend <= 1.0 && $amount_spend >= 0.01)
				{
					foreach($daterange as $date){
						$earning_date =  $date->format("Y-m-d H:i:s");
						if($counter<=5)
						{
							$earning_amount = ($percentage_earning/100) * $amount_spend;
						}
						else{
							$percentage_earning=5;
							$earning_amount = ($percentage_earning/100) * $amount_spend;
						}
						$query_insert_earning= "INSERT INTO tbl_earning
								(id_transaction_deposit
								,earning_amount
								,earning_date
								,percentage_earning
								) values 
								('$id_transaction_deposit'
								,'$earning_amount'
								,'$earning_date'
								,'$percentage_earning')";
						$execute_earning_query=$db_handle->insertQuery($query_insert_earning);
						$counter+=1;
						$percentage_earning+=1;
					}
				
				}
				print json_encode(1);
		
			}
}
?>