<?php
/*if(!isset($_SESSION))
{
		session_start();
}
$upline_value=$_SESSION['getupline'];*/
?>
<html lang="en"><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Register</title>
  <!-- Bootstrap core CSS-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-warning">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form action="save_acount.php" name="frm-register" id="form_register" method="post">
          <div class="form-group ">
            <div class="form-row">
			<!--<input type="hidden" name="upline" value="<?php //print $upline_value;?>" />-->
              <div class="col-md-6">
                <label>Full Name</label>
                <input class="form-control" type="text" name="fullname" id="fullname">
				
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Email Address</label>
                <input class="form-control" name="email" id="email">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input class="form-control" name="username" id="username">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="password" type="password" name="password" id="password">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="confirm_password" type="password" name="confirm_password" id="confirm_password">
              </div>
            </div>
          </div>
		  <div class="form-group">
            <label for="exampleInputEmail1">Your Etherium Address</label>
            <input class="form-control" name="etherium_address" id="etherium_address">
          </div>
		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Secret Question</label>
                <select name="question_sec" id="question_sec" class="form-control">
				  <option value="">-select your question item-</option>
				  <option value="What's your mother's given name">What's your mother's given name</option>
				  <option value="what's your pet's name">what's your pet's name</option>
				  <option value="What's your favorite food">What's your favorite food</option>
				  <option value="What's your favorite sport">What's your favorite sport</option>
				  <option value="What's your favorite color">What's your favorite color</option>
				</select>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Secret Answer</label>
                <input class="form-control" name="secret_answer" id="secret_answer">
              </div>
            </div>
          </div>
		  <div class="form-check">
			<label class="form-check-label">
			  <input type="checkbox" name="terms" id="terms" class="form-check-input">
			   I accept Terms and Conditions
			</label>
		   </div>
          <button class="btn btn-primary btn-block" type="submit">Register Now</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="log_in.php">Login Page</a>
          <a class="d-block small" href="index.php">Home</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script type="text/javascript">
	$(document).ready(function()
	{
		$('#form_register').submit(function(e){
			e.preventDefault();
			var data =$(this).serialize();
			var url =$(this).attr('action');
			$('.form-control-feedback').remove();
			$('input').removeClass('form-control-danger').addClass('form-control-success')
			.parent('div').removeClass('has-danger').addClass('has-success');
			$.ajax({
					url:url,
					type:'POST',
					dataType:'json',
					data:data,
					success:function(get){
						if(get.data.length>0){
							for(var i=0;i<get.data.length;i++)
							{
								console.log(get.data[i].field);
								$('#'+get.data[i].field).removeClass('form-control-success')
								.addClass('form-control-danger').parent('div')
								.removeClass('has-success')
								.addClass('has-danger').append('<small class="form-control-feedback">'
								+get.data[i].error_message+'</small>');
								if(get.data[i].field=='password')
								{
									$('#confirm_password').removeClass('form-control-success')
									.addClass('form-control-danger').parent('div')
									.removeClass('has-success')
									.addClass('has-danger').append('<small class="form-control-feedback">'
								+get.data[i].error_message+'</small>');
								}
								//if(get.data[i].error_message===' password do not match!'){
									//
									/**/
								//}
								
							}
						}else{
							alert('success');
							$(this).triger('reset');
						}
						
					},
					error:function(xhr,textStatus,errMsg){
						console.log(errMsg + " "+xhr.status+" "+textStatus);
					},
					complete:function()
					{
						//
					}
				});
		});
	});
  </script>
</body>

</html>