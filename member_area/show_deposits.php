<?php
include('session_user.php');
require_once("../koneksi.php");
$db_handle = new koneksi();
$conn = $db_handle->connectDB();
$username = mysqli_real_escape_string($conn,$_SESSION["username"]);

if(isset($_GET['id']))
{
	$id_wdw =mysqli_real_escape_string($conn, htmlspecialchars($_GET['id']));
	if(!empty($id_wdw))
	{
		$query_update ="UPDATE tbl_deposit SET 
		owner_read_status=1,date_time_owner_read=NOW() WHERE id_transaction_deposit=$id_wdw";
		$execute = mysqli_query($conn,$query_update);
		if($execute)
		{
			$select = "select * from tbl_deposit where id_transaction_deposit=$id_wdw";
			$getdata =mysqli_fetch_assoc(mysqli_query($conn,$select));
		}
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>with draw accept</title>
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
          <a href="javascript:void(0);">Your Deposit is Successfully Invested</a>
        </li>
       
      </ol>
      <div class="row">
        <div class="col-lg-8 col-xs-12">
          <h1>Success Deposit</h1>
			<table class="table">
						<thead>
							<tr class="table-success">
								<th>Total :</th>
								<th><?php round(number_format(print $getdata['amount_spend'],8),7);?></th>
							</tr>
							<tr class="table-success">
								<th>Etherium Address :</th>
								<th><?php print $getdata['eth_address'];?></th>
							</tr>
							<tr class="table-success">
								<th>TX ID :</th>
								<th><?php print $getdata['tx_id'];?></th>
							</tr>
							<tr class="table-success">
								<th>Date :</th>
								<th><?php print $getdata['date_time_spend'];?></th>
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

