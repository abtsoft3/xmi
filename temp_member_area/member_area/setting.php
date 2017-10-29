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
          <a href="index.html">Settings</a>
        </li>
      </ol>
      <div class="row">
        <div class="col-12">
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Account Name</label>
                <input class="form-control" readonly=true id="exampleInputName" type="text" aria-describedby="nameHelp">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Full Name</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" >
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" >
          </div>
		  <div class="form-group">
            <label for="exampleInputEmail1">Your Etherium Account</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" >
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" type="password" >
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="exampleConfirmPassword" type="password">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Save Settings</button>
        </form>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   
    <!-- Scroll to Top Button-->
    
    <!-- Logout Modal-->
    
    <!-- Bootstrap core JavaScript-->
     <?php include('footer.php'); ?>
  </div>
</body>

</html>
