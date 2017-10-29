<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Member Area</title>
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
          <a href="index.html">Referrals</a>
        </li>
      </ol>
      <div class="row">
        <div class="col-12">
			<div class="col-xl-3 col-sm-6 mb-3">
			  <div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
				  <div class="card-body-icon">
					<i class="fa fa-fw fa-comments"></i>
				  </div>
				  <div class="mr-5">26 New Messages!</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				  <span class="float-left">View Details</span>
				  <span class="float-right">
					<i class="fa fa-angle-right"></i>
				  </span>
				</a>
			  </div>
        </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
      <?php include('footer.php'); ?>
  </div>
</body>

</html>
