<?php
require "session_forget2.php";
?>

<html lang="en"><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>reset password</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Your Password</div>
      <div class="card-body">
        <form name="form_login" method="post" action="reset_password3.php">
          <div class="form-group">
		  <input type="hidden" name="email_forget" 
		  value="<?php print $_SESSION['email_forget'];?>" />
		  <input type="hidden" name="sequrity_answer" 
		  value="<?php print $_SESSION['answer'];?>" />
            <label for="exampleInputEmail1">New Password</label>
            <input class="form-control" id="new_pass" name="new_password" type="password" required>
          </div>
		  <div class="form-group">
            <label for="exampleInputEmail1">Confirm Password</label>
            <input class="form-control" id="conf_pass" name="confirm_password" type="password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body></html>