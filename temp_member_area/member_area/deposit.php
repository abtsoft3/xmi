<?php
include('session_user.php');
require_once("../koneksi.php");
$db_handle = new koneksi();
$conn =$db_handle->connectDB();
$username = mysqli_real_escape_string($conn,$_SESSION['username']);
$query_amount = mysqli_query($conn,
				"select IFNULL(sum(amount_spend),0) as Total_Spend 
					from tbl_deposit where username='$username' and spend_status=1");
$results_amount = mysqli_fetch_assoc($query_amount);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Make Deposit</title>
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
          <a href="index.html">Deposit</a>
        </li>
        
      </ol>
      <div class="row">
        <div class="col-lg-7">
			<h3>ACCOUNT BALANCE :</h3>
			<h5><?php print $results_amount['Total_Spend'];?></h5>
			<div class="card card-register mx-auto mt-5">
      <div class="card-header">ADD</div>
      <div class="card-body">
        <form method="post" name="form-spend" action="save_confirm_spend.php">
          <div class="form-group">
            <label for="amount_to_spent">Amount To Spent</label>
            <input class="form-control" id="amount_to_spent" 
				name="amount_spend" type="number" step='0.001' min="0.01" max="6.00" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block" >SPEND</button>
        </form>
      </div>
    </div>
		</div>
			<div class="col-lg-5">
				<table class="table">
					<thead>
						<tr>
							<th>Spent Amount</th>
							<th>Daily PayOut</th>
						</tr>
						
					</thead>
					<tbody>
						<tr>
							<th>0.01 - 1.00</th>
							<th>5% Maximum</th>
						</tr>
						<tr>
							<th>1.01 - 3.00</th>
							<th>10% Maximum</th>
						</tr>
						<tr>
							<th>3.01 - 6.00</th>
							<th>15% Maximum</th>
						</tr>
					</tbody>
				</table>
			</div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php
	include('footer.php');
   ?>
    
  </div>
</body>

</html>
