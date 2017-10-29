<?php
include('session_spend.php');
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
      
      <div class="row">
        <div class="col-lg-8">
			<h3>DEPOSIT CONFIRMATION</h3>
				<div class="alert alert-danger">
					NOTE: The deposit will be credited after 1 transaction confirmation.
					We recommend to stay at the current page until the deposit get fully credited.
				 </div>
			<h2>Please send <?php print $_SESSION['amount_to_spend'];?> ETH to</h2>
			<a href="#"><h3>0xbe1f9B04c73C652Fa2EB90Be63A95b3b7C8580Df</h3></a>
			<button id="btn-copy" class="btn btn-success">COPY ADDRESS TO BUFFER</button>
			<h2>ORDER STATUS : Waiting for payment</h2>
		</div>
		<div class="col-lg-4">
			<table class="table">
						<thead>
							<tr>
								<th>Amount</th>
								<th><?php print $_SESSION['amount_to_spend'];?></th>
							</tr>
							<tr>
								<th>Max. PayOut</th>
								<?php print "<th>".$_SESSION['accum_percentage']." ETH Until ICO</th>"; ?>
							</tr>
							<tr>
								<th>Max. Percentage</th>
								<th><?php print $_SESSION['persen_total']."% Until ICO</th>";?></th>
							</tr>
						</thead>
						
				</table>
				<img class="img-thumbnail" src="eth_address.png" alt="ethaddr" />
		</div>
		<div class="col-lg-6">
			<div class="card-header">Confirm Your Payment</div>
			<div class="card-body">
			<form method="post" name="form-spend" action="paid.php">
				<div class="form-group">
					<label for="amount_to_spent">Your Eth Address</label>
					<input class="form-control" id="eth_addr" 
						name="eth_address" type="text" required>
				  </div>
			  <div class="form-group">
				<label for="amount_to_spent">Fill TX ID</label>
				<input class="form-control" id="txid" 
					name="tx_id" type="text" required>
			  </div>
			  <button type="submit" class="btn btn-primary btn-block">Confirm</button>
			</form>
			</div>
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

