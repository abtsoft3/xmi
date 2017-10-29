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
						"select ifnull(sum(te.earning_amount),0) as total_earning 
								from tbl_deposit td, tbl_earning te 
								where 
						td.id_transaction_deposit = te.id_transaction_deposit 
							and te.earning_date <= DATE(NOW()) 
									and td.username ='$username' 
									and td.spend_status=1");
$results_amount_earnings = mysqli_fetch_assoc($query_amount_earnings);

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
          <a href="account_deposit.php">Deposits</a>
        </li>
       
      </ol>
      <div class="row">
        <div class="col-8">
          <h1>Deposits</h1>
			<table class="table">
						<thead>
							<tr class="table-success">
								<th>Account Balance</th>
								
							</tr>
							<tr>
								<th>
								<?php print $results_amount['active_deposit']
									+$results_amount_earnings['total_earning'];?>
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
    
  </div>
</body>

</html>
