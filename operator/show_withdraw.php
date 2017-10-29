<?php
require_once("../koneksi.php");
$db_handle = new koneksi();
$conn =$db_handle->connectDB();
$id = htmlspecialchars($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>show withdraw</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
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
          <a href="#">Read WithDraw</a>
        </li>
       
      </ol>
      <div class="row">
        <div class="col-lg-12 col-xs-12">
          <h1>New WithDraw</h1>
		  <input type="hidden" name="str_id" id="query_str" 
			value="<?php print $id;?>" />
			<table class="table" id="tbl_deposit">
						<thead>
							<tr>
								<th>Username</th>
								<th>Amount</th>
								<th>Date Req</th>
								<th>Etherium Address</th>
								<th></th>
							</tr>
						</thead>
						
				</table>
          </div>
		  <div class="col-lg-8 col-xs-12" id="parent-form" style="display:none;">
			<div class="card-header"> 
				<h6 class="card-title"></h6></div>
			<div class="card-body">
				<form action="edit_withdraw.php" method='post' id="frm_depo" name='form-depo'>
				<input type="hidden" id="idwdw" name="idwdw" />
				  
				  <div class="form-group">
					<label for="exampleInputEmail1">Etherium address</label>
					<input class="form-control" id="eth_address" type="text" name="eth_address" required />
				  </div>
				  <div class="form-group">
					<label for="exampleInputEmail1">Amount</label>
					<input class="form-control" id="amount_spend" min="0" step="0.00000001" type="number" name="amount_spend" required/>
				  </div>
				  
				  <button type="submit" class="btn btn-primary btn-block">Update</button>
				</form>
			</div>
        
        </div>
      </div>
    </div>
	<!-- Logout Modal-->
	<div class="modal fade" id="modal_confirm_withdraw" tabindex="-1" role="dialog" aria-labelledby="modal_confirmModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal_confirmModalLabel">Are You Sure?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Yes" below if you are ready to confirm this transaction.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="button" id="btn-submit-withdraw" class="btn btn-primary">Yes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
	
  </div>
  <script type='text/javascript' src='show_withdraw_js.js'></script>
</body>
</html>