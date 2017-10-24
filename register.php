<?php
if(!empty($_POST["register-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
	/* Password Matching Validation */
	if($_POST['password'] != $_POST['confirm_password']){ 
	$error_message = 'Passwords should be same<br>'; 
	}

	/* Email Validation */
	if(!isset($error_message)) {
		if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
		$error_message = "Invalid Email Address";
		}
	}

	/* Validation to check if Terms and Conditions are accepted */
	if(!isset($error_message)) {
		if(!isset($_POST["terms"])) {
		$error_message = "Accept Terms and Conditions to Register";
		}
	}

	if(!isset($error_message)) {
		require_once("connection/koneksi.php");
		$db_handle = new koneksi();
		$fullname = mysqli_real_escape_string($db_handle->connectDB(),$_POST["fullName"]);
		$email_user = mysqli_real_escape_string($db_handle->connectDB(),$_POST["userEmail"]);
		$username = mysqli_real_escape_string($db_handle->connectDB(),$_POST["userName"]);
		$password_user = md5(mysqli_real_escape_string($db_handle->connectDB(),$_POST["password"]));
		$addr_eth = mysqli_real_escape_string($db_handle->connectDB(),$_POST["ethereum_address"]);
		$question = mysqli_real_escape_string($db_handle->connectDB(),$_POST["question"]);
		$answer = mysqli_real_escape_string($db_handle->connectDB(),$_POST["answer_question"]);
		
		
		$query_insert = "INSERT INTO tbl_register values 
						('$username'
						,'$fullname'
						,'$email_user'
						,'$password_user'
						,'$addr_eth'
						,'$question'
						,'$answer')";
		$result = $db_handle->insertQuery($query_insert);
		if(!empty($result)) {
			$error_message = "";
			$success_message = "You have registered successfully!";	
			unset($_POST);
			header('Location:register.php');
		} else {
			$error_message = "Problem in registration. Try Again!";	
		}
	}
}
?>
<!-- kode html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 15px;
    }
.error-message {
	padding: 7px 10px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 4px;
}
.success-message {
	padding: 7px 10px;
	background: #cae0c4;
	border: #c3d0b5 1px solid;
	color: #027506;
	border-radius: 4px;
}
.demo-table td {
	padding: 1px 0px 0px 0px;
}
.demo-table {
	width: 10%;
	margin-left:450px;
	text-align:center;
	color: #333;
	border-radius: 14px;
	padding: 10px 14px;
}
.demoInputBox {
	padding: 10px 100px;
	border: #a9a9a9 1px solid;
	border-radius: 5px;
}
.btnRegister {
	padding: 10px 30px;
	background-color: #3367b2;
	border: 0;
	color: #FFF;
	cursor: pointer;
	border-radius: 14px;
	margin-left: 10px;
}
  small {
	font-size: 9px;
}
  </style>
  
  <script type='text/javascript'>
	  var isAddress = function (address) {
		if (!/^(0x)?[0-9a-f]{40}$/i.test(address)) {
			// check if it has the basic requirements of an address
			return false;
		} else if (/^(0x)?[0-9a-f]{40}$/.test(address) || /^(0x)?[0-9A-F]{40}$/.test(address)) {
			// If it's all small caps or all all caps, return true
			return true;
			
		} else {
			// Otherwise check each case
			return isChecksumAddress(address);
		}
	};
	
	var isChecksumAddress = function (address) {
    // Check each case
		address = address.replace('0x','');
		var addressHash = sha3(address.toLowerCase());
		for (var i = 0; i < 40; i++ ) {
			// the nth letter should be uppercase if the nth digit of casemap is 1
			if ((parseInt(addressHash[i], 16) > 7 && address[i].toUpperCase() !== address[i]) || (parseInt(addressHash[i], 16) <= 7 && address[i].toLowerCase() !== address[i])) {
				return false;
			}
		}
		return true;
	};

	$(document).ready(function(){
		
		$('#userid').keyup(function(){
			this.value = this.value.toUpperCase();
			$.ajax({
				url:'controller/checkusername.php',
				type:'POST',
				dataType:'json',
				data:{
					username : $(this).val()
				},
				success:function(data)
				{
					data = parseInt(data);
					if(data > 0)
					{
						$('#exist_username').show();
						$('.btnRegister').prop('disabled',true);
						
					}
					else{
						$('#exist_username').hide();
						$('.btnRegister').removeAttr('disabled');
					}
				},
				error:function(xhr,textStatus,errormessage)
				{
					//isian error
					console.log(errormessage + " "+ " "+xhr.status+textStatus);
				},
				complete:function()
				{
					//isian kalo udah selesai
					
				}
			});
		});
		
		$('#eth_address').keyup(function()
		{
			var results_addr = isAddress($(this).val());
			if(results_addr==false)
			{
				$('.btnRegister').prop('disabled',true);
				$('#emeth').text('incorrect value');
			}
			else{
				$('.btnRegister').removeAttr('disabled');
				$('#emeth').text('');
			}
		})
		.change(function()
		{
			var results_addr = isAddress($(this).val());
			console.log(results_addr);
			if(results_addr==false)
			{
				$('.btnRegister').prop('disabled',true);
				$('#emeth').text('incorrect value');
			}
			else{
				$('.btnRegister').removeAttr('disabled');
				$('#emeth').text('');
			}
		});
		
	});
  </script>
  
</head>
<body>
<?php
include('master_nav.php');
?>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Become A Minionaire</h1>      
    <p>use good and correct data...</p>
  </div>
</div>
<footer class="container-fluid text-center">
 <p>
 <?php 
	if(!empty($success_message)) {	
print "<div class='success-message'>";
	if(isset($success_message)) echo $success_message."</div>";
 }
if(!empty($error_message)) {
print '<div class="error-message">';
	if(isset($error_message)) echo $error_message.'</div>';
}
?>

<form name="frmRegistration" method="post" action="register.php" autocomplete="off">
<table align="center" border="0" width="10%" class="demo-table" >
<tr>
<td bgcolor="#FFCC00"> <h3 class="Arial">Data General </h3></td>
</tr>
<tr>
<td><p align="left">Full Name:</p>
  <p>
  <input type="text" class="demoInputBox" name="fullName"  placeholder="Enter Your Name*" onkeyup="this.value = this.value.toUpperCase()">
  </p></td>
</tr>
<tr>
<td><p align="left">Email Address:
  </p>
  <p>
    <input type="text" class="demoInputBox" name="userEmail" placeholder="Your@gmail.com*">
  </p></td>
</tr>
<tr>
<td bgcolor="#FFCC00"><h3 class="Arial">Acount Data</h3></td>
</tr>
<tr>
<td><p align="left">Username:</p>
  <p>
  <input type="text" class="demoInputBox" id="userid" name="userName" placeholder="Enter Your Name*">
  </p>
  <h6 class="show"  align="left"><em>( Username must all alphabet and no space )</em></h6>
  <h6 class="show" align="left"><em id="exist_username" style="display:none;color:red;" >( Username already exist )</em></h6>
  </td>
</tr>
<tr>
<td><p align="left">Password</p>
  <p>
  <input type="password" class="demoInputBox" name="password" value="" placeholder="Your Strong Password*">
  </p></td>
</tr>
<tr>
<td><p align="left">Confirm Password
  </p>
  <p>
    <input type="password" class="demoInputBox" name="confirm_password" value="" placeholder="Password one more time*">
  </p></td>
</tr>
<tr>
<td bgcolor="#FFCC00"><h3 class="Arial">Payment Options </h3></td>
</tr>
<tr>
<td>
		<p align="left">Your ethereum Address:</p>
	  <p>
	  <input type="text" class="demoInputBox" id="eth_address" name="ethereum_address" placeholder="Ex: 0xe99356bde974bbe08721d77712168fa070aa8da4*">
	  <h6 class="show" align="left" style="color:red;"><em id="emeth"></em></h6>
	  </p>
 </td>
</tr> 
<tr>
<td bgcolor="#FFCC00"><h3 class="Arial">Security </h3></td>
</tr>
<tr>
<td><p align="left"></p>
  <p><select name="question">
  <option value="Slected your security">--------- select your question item ----------</option>
  <option value="What's your mother's given name">What's your mother's given name</option>
  <option value="what's your pet's name">what's your pet's name</option>
  <option value="What's your favorite food">What's your favorite food</option>
  <option value="What's your favorite sport">What's your favorite sport</option>
  <option value="What's your favorite color">What's your favorite color</option>
  </select>
</p></td>
  </tr>
  <tr>
<td><p align="left">Your Answer</p>
  <p>
  <input type="text" class="demoInputBox" name="answer_question"  placeholder="Enter Your Answer*" onkeyup="this.value = this.value.toUpperCase()">
  </p>
  </td>
</tr>

<tr>
  <td>
  <input type="checkbox" name="terms"> I accept Terms and Conditions <input type="submit" name="register-user" value="Register Now" class="btnRegister"></td>
</tr>
</table>
</form>
</p>
</footer>
</body>
</html>