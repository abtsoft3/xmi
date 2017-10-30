<?php
include('session_user.php');
require_once("../koneksi.php");
$db_handle = new koneksi();
$username = mysqli_real_escape_string($db_handle->connectDB(),$_SESSION["username"]);
$query_amount_earnings = mysqli_query($db_handle->connectDB(),
						"select td.date_time_spend
							,ifnull(sum(te.earning_amount),0) as total_earning 
								from tbl_deposit td, tbl_earning te 
								where 
						td.id_transaction_deposit = te.id_transaction_deposit 
							and te.earning_date < NOW() 
									and td.username ='$username'");
$results_amount_earnings = mysqli_fetch_assoc($query_amount_earnings);
/*$query_amount_earnings = mysqli_query($db_handle->connectDB(),
						"select tbl1.amount_earning + tbl2.amount_earning as amount_earning from 
						(select ifnull(sum(te.earning_amount),0) as amount_earning 
								from tbl_deposit td, tbl_earning te 
								where 
						td.id_transaction_deposit = te.id_transaction_deposit
									and td.username ='$username' 
									and te.earning_date <= DATE(NOW())
									and td.spend_status=1) as tbl1,
									
									(select ifnull(sum(te.earning_amount),0) as amount_earning 
								from tbl_deposit td, tbl_earning te 
								where 
						td.id_transaction_deposit = te.id_transaction_deposit
									and td.username ='$username' 
									and td.spend_status=1 
									and te.earning_type=1) as tbl2");
$results_amount_earnings = mysqli_fetch_assoc($query_amount_earnings);*/

//total earning until ico
$query_amount_earnings_ico = mysqli_query($db_handle->connectDB(),
						"select ifnull(sum(te.earning_amount),0) as total_earning_ico 
								from tbl_deposit td, tbl_earning te 
								where 
						td.id_transaction_deposit = te.id_transaction_deposit
									and td.username ='$username'");
$results_amount_earnings_ico = mysqli_fetch_assoc($query_amount_earnings_ico);

//withdraw
$query_wdw = mysqli_query($db_handle->connectDB(),"select 
if(amount_withdraw IS NULL or amount_withdraw='',amount_withdraw=0,amount_withdraw) 
as amount_withdraw from tbl_with_draw where username
	='$username' and status=0");
$execute_wdw = mysqli_fetch_assoc($query_wdw);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Earning</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <!-- Bootstrap core CSS-->
  
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
          <a href="earning.php">Earnings</a>
        </li>
       
      </ol>
      <div class="row">
        <div class="col-lg-8 col-xs-12">
          <h1>Earnings</h1>
			<table class="table">
						<thead>
							<tr class="table-success">
								<th>Total :</th>
								<th>Total Until ICO :</th>
							</tr>
							<tr>
								<th>
								<?php print round(number_format($results_amount_earnings['total_earning']-
								$execute_wdw['amount_withdraw'],8),7);?>
								</th>
								<th><?php print round(number_format($results_amount_earnings_ico['total_earning_ico'],8),7);?></th>
							</tr>
							<tr class="table-success">
								<th>Transaction</th>
								<th></th>
							</tr>
							<tr>
								<th>
								
								<select name="transaction" class="form-control">
									<option value="transaction" >Transaction</option>
								</select>
								</th>
								<th></th>
							</tr>
							<tr class="table-success">
								<th>Date From</th>
								<th>Date To</th>
								
							</tr>
							<tr>
								<th>
								<div class="input-group">
									<div class="input-group-addon">
									<i class="fa fa-calendar"></i></div>
									<input type="text" name="date-from" id="date_from" 
									 readonly="true" />
								</div>
									
								</th>
								<th>
								<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i></div>
									<input type="text" 
									name="date-to" id="date_to" readonly="true" />
								</div>
								
								</th>
							</tr>
							<tr>
								<th><button id="btn-earning" type="button" class="btn btn-danger">GET</button></th>
							</tr>
						</thead>
						
				</table>
          </div>
		  <div class="col-lg-8 col-xs-12">
			<table id="tbl_earnings" class="table">
				<thead>
					<tr>
						<th>Date</th>
						<th>Amount</th>
						<th>Percen</th>
					</tr>
				</thead>
			</table>
		  </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type='text/javascript'>
	var gentable = null;
		$(document).ready(function(){
			gentable = $('#tbl_earnings').DataTable(
			{
				'searching':false,
				"bLengthChange": false,
				paging:false,
				"bInfo" : false,
				processing:true,
				ajax:'',
				columns:[
					{data:'earning_date'},
					{data:'earning_amount'},
					{data:'percentage_earning'},
				]
			});
			 $( "#date_from" ).datepicker(
				{
					dateFormat: "yy-mm-dd",
					minDate: '2017-09-30'
				});
				$( "#date_to" ).datepicker(
				{
					dateFormat: "yy-mm-dd",
					maxDate: '1',
					minDate: '2017-09-30'
				});
				
			$('#btn-earning').click(function()
			{
				var date_from =$('#date_from').val();
				var date_to =$('#date_to').val();
				if(date_from !='' && date_to!=''){
					var url ='getEarnings.php?date_from='+date_from+'&date_to='+date_to;
					gentable.ajax.url(url).load();
				}
				
				/*$.ajax({
					url:'getEarnings.php',
					type:'POST',
					dataType:'json',
					data:{date_from :date_from,date_to:date_to},
					success:function(getData){
						console.log(getData);
						return getData;
						
					}
				});*/
		});
});
	</script>
  </div>
</body>

</html>
