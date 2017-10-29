<?php
require_once('session_user.php');
require_once("../koneksi.php");
$db_handle = new koneksi();
$username = mysqli_real_escape_string($db_handle->connectDB(),$_SESSION["username"]);
$query_amount_earnings = mysqli_query($db_handle->connectDB(),
						"select td.date_time_spend
							,ifnull(sum(te.earning_amount),0) as total_earning 
								from tbl_deposit td, tbl_earning te 
								where 
						td.id_transaction_deposit = te.id_transaction_deposit 
							and te.earning_date <= DATE(NOW()) 
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
//
//wdw
$query_wdw_f = mysqli_query($db_handle->connectDB(),"select ifnull(sum(amount_withdraw),0) 
as total_withdraw from tbl_with_draw where username
	='$username' and status=1");
$execute_wdw_f = mysqli_fetch_assoc($query_wdw_f);

//withdraw
$query_wdw = mysqli_query($db_handle->connectDB(),"select 
if(amount_withdraw IS NULL or amount_withdraw='',amount_withdraw=0,amount_withdraw) 
as amount_withdraw from tbl_with_draw where username
	='$username' and status=0");
$execute_wdw = mysqli_fetch_assoc($query_wdw);

$earned_total =$results_amount_earnings['total_earning']+$results_amount_earnings_ref['amount_earning_ref']-$execute_wdw_f['total_withdraw'];
$earned_total = round($earned_total,7);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>WithDraw</title>
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
          <a href="withdraw.php">WithDraw</a>
        </li>
        
      </ol>
      <div class="row">
		<div class="col-lg-12 col-xs-12" id="alert_place">
		
		</div>
        <div class="col-lg-7 col-xs-12">
			<h3>PAYOUT :</h3>
			<h5 id="payout_show"><?php print round(number_format($earned_total,8),7);?>
			</h5>
			<div class="card card-register mx-auto mt-5">
      <div class="card-header">ADD WithDraw</div>
      <div class="card-body">
        <form method="post" name="form-wdw" id="form_wdw" action="save_confirm_with_draw.php">
          <div class="form-group">
            <label for="amount_to_spent">Amount</label>
			<input type="hidden" id="hide_po" name="payout" 
			value="<?php print round(number_format($earned_total,8),7);?>" />
            <input class="form-control" id="amount_to_wdw" 
				name="amount_withdraw" type="number" step='0.00000001' min="0" 
				max="<?php print round(number_format($earned_total,8),7);?>" 
				required>
          </div>
		  <div class="form-group">
            <label for="amount_to_spent">Your Etherium Address</label>
            <input class="form-control" id="eth_addr" 
				name="eth_address" type="text" 
				required>
          </div>
          <button type="submit" class="btn btn-primary btn-block" >WITHDRAW</button>
        </form>
      </div>
    </div>
		</div>
			<div class="col-lg-5">
				<table class="table">
					<thead>
						<tr class="table-warning">
							<th>Pending WithDraw</th>
							<th><div id="txt_wdw"><?php print round(number_format($execute_wdw['amount_withdraw'],8),7);?></div></th>
						</tr>
						
					</thead>
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
  <script type='text/javascript'>
	$(document).ready(function(){
		var strhtml= null;
		$('#form_wdw').submit(function(e)
		{
			var substr_po = $('#hide_po').val()-$('#amount_to_wdw').val();
			substr_po = parseFloat(substr_po).toFixed(7);
			e.preventDefault();
			$.ajax({
				url:$(this).attr('action'),
				type:'POST',
				dataType:'json',
				data:$(this).serialize(),
				success:function(data)
				{
					$('#alert_wdw').remove();
					strhtml='';
					if(data==2)
					{
						$('#payout_show').text(substr_po);
						$('#amount_to_wdw').attr('max',substr_po);
						$('#txt_wdw').text(parseFloat($('#amount_to_wdw').val()).toFixed(7));
					}
					else if(data==1)
					{
						strhtml+='<div class="alert alert-warning" id="alert_wdw">You earning is not enough!</div>';
					}
					else
					{
						strhtml+='<div class="alert alert-danger" id="alert_wdw">You only can withdraw again after your previous withdraw successfull!</div>';
					}
					
				},
				complete:function()
				{
					$('#alert_place').html(strhtml);
					setTimeout(function(){
						$('#alert_wdw').hide('slow');
					},2000);
					
				}
			});
		});
	});
  </script>
</body>

</html>
