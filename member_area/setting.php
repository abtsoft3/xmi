<?php
include('session_user.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Setting</title>
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
          <a href="setting.php">Settings</a>
        </li>
      </ol>
      <div class="row">
        <div class="col-12">
        <form action="edit_profile.php" method='post' name='form-setting'>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Account Name</label>
                <input class="form-control" 
				value="<?php print $_SESSION['username']; ?>" 
					readonly=true id="exampleInputName" name="username" type="text">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Full Name</label>
                <input class="form-control" value="<?php print $_SESSION['fullname']; ?>" 
					id="exampleInputLastName" type="text" name="fullname" required />
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" value="<?php print $_SESSION['email']; ?>" 
				id="exampleInputEmail1" type="email" name="email" required />
          </div>
		  <div class="form-group">
            <label for="exampleInputEmail1">Your Etherium Account</label>
            <input class="form-control" value="<?php print $_SESSION['ethereum_address']; ?>" 
			id="exampleInputEmail1" type="text" name="etherium_address" required/>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" 
				type="password" name="password" required/>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="exampleConfirmPassword" 
				name="confirm_password" type="password" />
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
