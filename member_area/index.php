<?php
include('session_user.php');
require_once("../koneksi.php");
$db_handle = new koneksi();
$username = mysqli_real_escape_string($db_handle->connectDB(),$_SESSION["username"]);
$query_amount = mysqli_query($db_handle->connectDB(),
				"select ifnull(sum(amount_spend),0) as active_deposit 
					from tbl_deposit where username='$username' and spend_status=1");
$results_amount = mysqli_fetch_assoc($query_amount);

$query_amount_earnings = mysqli_query($db_handle->connectDB(),
						"select td.date_time_spend
							,ifnull(sum(te.earning_amount),0) as total_earning 
								from tbl_deposit td, tbl_earning te 
								where 
						td.id_transaction_deposit = te.id_transaction_deposit 
							and te.earning_date < NOW() 
									and td.username ='$username'");
$results_amount_earnings = mysqli_fetch_assoc($query_amount_earnings);

$query_amount_earnings_ref = mysqli_query($db_handle->connectDB(),
						"select ifnull(sum(te.earning_amount),0) as amount_earning_ref 
								from tbl_deposit td, tbl_earning te 
								where 
						td.id_transaction_deposit = te.id_transaction_deposit
									and td.username ='$username' 
									and td.spend_status=1 
									and te.earning_type=1");
$results_amount_earnings_ref = mysqli_fetch_assoc($query_amount_earnings_ref);

//wdw
$query_wdw = mysqli_query($db_handle->connectDB(),"select ifnull(sum(amount_withdraw),0) 
as total_withdraw from tbl_with_draw where username
	='$username' and status=1");
$execute_wdw = mysqli_fetch_assoc($query_wdw);
$earned_total =$results_amount_earnings['total_earning']+$results_amount_earnings_ref['amount_earning_ref']-
$execute_wdw['total_withdraw'];
$account_balance = $results_amount['active_deposit'] +$earned_total;
$account_balance =number_format($account_balance,8);
//urldecode
$root_url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Account</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 <?php
 include('navigation.php');
 ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
       
      </ol>
      <div class="row">
        <div class="col-lg-8 col-xs-12">
          <h1>Dashboard</h1>
			<table class="table">
						<thead>
							<tr class="table-success">
								<th>Account Balance</th>
								<th>Username</th>
							</tr>
							<tr>
								<th>
								<?php print round($account_balance,7);?>
								</th>
								<th><?php print $_SESSION['username'];?></th>
							</tr>
							<tr class="table-success">
								<th>Active Deposit</th>
								<th>Your Upline</th>
							</tr>
							<tr>
								<th><?php print round(number_format($results_amount['active_deposit'],8),7);?></th>
								<th><?php print $_SESSION['upline'];?></th>
							</tr>
							<tr class="table-success">
								<th>Earned Total</th>
								<th>Your Referral Link</th>
								
							</tr>
							<tr>
								<th><?php print round(number_format($earned_total,8),7);?></th>
								<th>
									<?php print $root_url."?ref=".$_SESSION['username'];?>
								
								</th>
							</tr>
						</thead>
						
				</table>
          </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
    <!-- Scroll to Top Button-->
    
  </div>
</body>

</html>
