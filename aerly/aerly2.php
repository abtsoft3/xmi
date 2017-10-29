<?php
include('session_user.php');
require_once("../connection/koneksi.php");
$db_handle = new koneksi();
$conn =$db_handle->connectDB();
$username = mysqli_real_escape_string($conn,$_SESSION["username"]);
if(isset($_REQUEST["SPEND"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		print '<script type="text/javascript">alert("Invalid Input");window.location.href=aerly2.php;</script>';
		break;
		}
	}
	
		$tx_id = mysqli_real_escape_string($conn,$_POST["tx_id"]);
		$amount_spend = floatval(mysqli_real_escape_string($conn,$_POST["amount_spend"]));
		$query_insert = "INSERT INTO tbl_deposit
						(username
						,tx_id
						,amount_spend
						) values 
						('$username'
						,'$tx_id'
						,'$amount_spend')";
		$result = mysqli_query($conn,$query_insert);
		if($result) {
			$id_transaction_deposit = mysqli_insert_id($conn);			
			
			$begin = new DateTime(date('Y-m-d'));
			 $end = new DateTime('2018-03-19');// date ico
			$daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);
			
			$query_insert_earning="";
			$earning_amount=0;
			$counter=1;
			$percentage_earning=1;
		
			//insert upline earning jika ada uplline
			$upline_username =$_SESSION['upline'];
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
		
		if($amount_spend <= 6.0 && $amount_spend >= 3.01)
		{
			//do it
			foreach($daterange as $date){
				$earning_date = $date->format("Y-m-d");
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
				$earning_date = $date->format("Y-m-d");
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
				$earning_date = $date->format("Y-m-d");
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
		
			$error_message = "";
			print '<script type="text/javascript">alert("your deposit success saved");window.history.back();</script>';
			unset($_POST);
		} else {
			print '<script type="text/javascript">alert("Problem when saving");window.history.back();</script>';
		}
		
}
$query_amount = mysqli_query($conn,
				"select IFNULL(sum(amount_spend),0) as Total_Spend 
					from tbl_deposit where username='$username'");
$results_amount = mysqli_fetch_assoc($query_amount);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>aerly</title>
<meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/font-awesome.css">
        <link rel="stylesheet" href="../css/templatemo_style.css">
        <link rel="stylesheet" href="../css/templatemo_misc.css">
        <link rel="stylesheet" href="../css/flexslider.css">
        <link rel="stylesheet" href="../css/testimonails-slider.css">

        <script src="../js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
<style type="text/css">
	.button_up {
    background-color:#FC0;
    border: none;
    color:#000;
    padding: 10px 50px 10px 50px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	font-family:"Times New Roman", Times, serif;
    font-size: 18px;
    margin: 4px 2px;
    cursor: pointer;
	}
	.button_down {
    background-color:#09F;
    border: none;
    color:#FFFFFF;
    padding: 15px 30px 15px 30px;
	font-style:inherit;
	font-family:Arial, Helvetica, sans-serif;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	box-shadow:#000 0px 2px;
	}
	.demoInputBox {
	padding: 10px 100px;
	border: #a9a9a9 1px solid;
	border-radius: 5px;
}
	
</style>		
</head>
<body>
 <?php
include('navigation.php');
?>
     <div id="services">
                <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                            <div class="heading-section">
                                <img src="../Gambar/minion-coin.png" alt="" > &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src="../Gambar/waktu.png" />
                                <p align="right">Starting ICO Price 1 MINC = 10% Of ETH <em>( Approximately USD $3.00 )</em></p>
                                <p><h1><font face="Arial Black, Gadget, sans-serif">INVEST NOW AND <font color="#FFCC00">BECOME A MINIONAIRE</h1></p></h2>
                                <p><h2> The Earlier You Invest ... The Bigger Payout You Receive</p>
                                
                            </div>
</div>
<form name="frmRegistration" method="post" action="aerly2.php">
 <table width="800" border="0" align="center">
   <?php
	include('dashboard_nav.php');
 ?>
  <td colspan="3"><h1>Make Deposit</h1></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><font color="#999999" font face="Times New Roman, Times, serif"><h4> Account balance:</h4></font> <p>
      <img src="../Gambar/471px-Ethereum_logo_2014.svg.png" width="13" height="22" /> 
		&nbsp; <strong><?php print $results_amount['Total_Spend'];?></strong>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td><font color="#999999" font face="Times New Roman, Times, serif">
      <h4> Payout</h4></font> <p></td>
    <td>&nbsp;</td>
    <td><font color="#999999" font face="Times New Roman, Times, serif"><h4>Daily Payout </h4></font> <p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
	<img src="../Gambar/471px-Ethereum_logo_2014.svg.png" width="8" height="15" />
	<font color="#000000" font face="Times New Roman, Times, serif"> &nbsp; &nbsp; 0.01 - 1.00 </font></td>
    <td>&nbsp;</td>
    <td><font color="#000000" font face="Times New Roman, Times, serif">5% Maximum</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
	<img src="../Gambar/471px-Ethereum_logo_2014.svg.png" width="8" height="15" />
	<font color="#000000" font face="Times New Roman, Times, serif"> &nbsp; &nbsp; 1.01 - 3.00 </font></td>
    <td>&nbsp;</td>
    <td><font color="#000000" font face="Times New Roman, Times, serif">10% Maximum</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
	<img src="../Gambar/471px-Ethereum_logo_2014.svg.png" width="8" height="15" />
	<font color="#000000" font face="Times New Roman, Times, serif"> &nbsp; &nbsp; 3.01 - 6.00 </font></td>
    <td>&nbsp;</td>
    <td><font color="#000000" font face="Times New Roman, Times, serif">15% Maximum</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3"><p align="left">Amount To Spend</p>
        <input type="number" class="demoInputBox" name="amount_spend" value="0.01" step='0.001' min="0.01" max="6.00" required>
        </p>
      </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3"><p align="left">TX ID</p>
        <input type="text" class="demoInputBox" name="tx_id" required/>
        </p>
      </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3"><p align="left">Spend funds from:</p>
      <p>
      		<img src="../Gambar/471px-Ethereum_logo_2014.svg.png" height="33" width="23" /> <font face="Georgia, Times New Roman, Times, serif"> Ethereum</font>
        </p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="SPEND" value="SPEND" class="btnRegister"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>