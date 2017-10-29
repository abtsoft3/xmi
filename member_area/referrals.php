<?php
include('session_user.php');
require_once("../koneksi.php");
$db_handle = new koneksi();
$conn=$db_handle->connectDB();
$username = $_SESSION['username'];

$query_amount_earnings = mysqli_query($conn,
						"select ifnull(sum(te.earning_amount),0) as total_earning 
								from tbl_deposit td, tbl_earning te 
								where 
						td.id_transaction_deposit = te.id_transaction_deposit
									and td.username ='$username'
										and te.earning_type=1");
$results_amount_earnings = mysqli_fetch_assoc($query_amount_earnings);

//total downline
$query_total_ref ="select count(username) as total_downline from tbl_register where upline='$username'";
$execute_total_ref = mysqli_query($conn,$query_total_ref);
$get_total_ref = mysqli_fetch_assoc($execute_total_ref);
//total downline aktif
$query_aktif_downline = "select count(id_earnings_transaction) 
as total_active from tbl_earning te,tbl_deposit td where 
te.id_transaction_deposit = td.id_transaction_deposit 
AND
te.earning_type=1
AND td.username ='$username'";
$execute_total_downline = mysqli_query($conn,$query_aktif_downline);
$get_total_downline = mysqli_fetch_assoc($execute_total_downline);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Referrals</title>
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
          <a href="referrals.php">Referrals</a>
        </li>
      </ol>
      <div class="row">
        <div class="col-lg-8 col-sm-12 col-xs-12">
			<table class="table">
						<thead>
							<tr class="table-warning">
								<th>Your Upline</th>
								<th>Total Referrals</th>
								
							</tr>
							<tr>
								<th><?php print $_SESSION['upline'];?></th>
								<th><?php print $get_total_ref['total_downline'];?></th>
							</tr>
							
							<tr class="table-warning">
								<th>Referrals Earning</th>
								<th>Active Referrals</th>
							</tr>
							<tr>
								<th><?php print number_format($results_amount_earnings['total_earning'],8);?></th>
								<th><?php print $get_total_downline['total_active'];?></th>
							</tr>
						</thead>
						
				</table>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
      <?php include('footer.php'); ?>
  </div>
</body>

</html>
