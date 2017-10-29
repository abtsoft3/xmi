<?php
if(!isset($_SESSION))
{
		session_start();
}
$upline_value=$_SESSION['getupline'];
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
input[type=text]{
    width:70%;
    border:2px solid #aaa;
    border-radius:4px;
    margin:8px 0;
    outline:none;
    padding:8px;
    box-sizing:border-box;
    transition:.3s;
	font-size:12px;
	text-align:left;
  }


input[type=password]{
    width:70%;
    border:2px solid #aaa;
    border-radius:4px;
    margin:8px 258;
    outline:none;
    padding:8px;
    box-sizing:border-box;
    transition:.3s;
    font-size:12px;
    text-align:lift;
  }

.question{
    width:70%;
    border:2px solid #aaa;
    border-radius:4px;
    margin:8px 258;
    outline:none;
    padding:8px;
    box-sizing:border-box;
    transition:.3s;
    font-size:12px;
    text-align:right;
  }
  
  input[type=text]:focus{
    border-color:#FC0;
    box-shadow:0 0 8px 0 #FC0;
  }
  form {
    display: inline-block;
    text-align: center;
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
	
	var fnCheckUsername = function(obj)
	{
		var returnVal = false;
		
		$.ajax({
				url:'checkusername.php',
				type:'POST',
				dataType:'json',
				data:{
					username : obj
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
						returnVal=true;
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
		return returnVal;
	}
	
	var checketh_addres = function(obj)
	{
		var val_return = false;
		var results_addr = isAddress(obj);
			if(results_addr==false)
			{
				$('.btnRegister').prop('disabled',true);
				$('#emeth').text('incorrect value');
			}
			else{
				$('.btnRegister').removeAttr('disabled');
				$('#emeth').text('');
				val_return=true;
			}
		return val_return;
	}
	
	var ret_checkusername;
	var ret_checketh;
	
	$(document).ready(function(){
		
		$('#userid').keyup(function(){
			refnCheckUsername($(this).val());
		}).
		change(function(){
			fnCheckUsername($(this).val());
		});
		
		$('#eth_address').keyup(function()
		{
			checketh_addres($(this).val());
		})
		.change(function()
		{
			checketh_addres($(this).val());
		});
		$('#sec_ques').change(function()
		{
			fnCheckUsername($('#userid').val());
			checketh_addres($('#eth_address').val());
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
  </div>
</div>
<footer class="container-fluid text-center">
 <p>

<div class="jumbotron">
  <div class="container text-center" align="left">
    <form name="frmRegistration" method="post" action="save_register.php" autocomplete="off">
 

<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="90" align="left">Full Name</td>
    <td width="367">:
	<input type="hidden" name="upline" value="<?php print $upline_value;?>" />
      <input type="text" class="demoInputBox" name="fullName"  placeholder="Enter Your Name*" align="right" required></td>
  </tr>
  <tr>
  <td width="90" align="left">Email Address</td>
  <td width="367">:
      <input type="text" class="demoInputBox" name="userEmail" placeholder="Your@email.com*" required></td>
  </tr>
  <tr>
  <td width="90" align="left">Username</td>
  <td width="367">:
      <input type="text" class="demoInputBox" id="userid" name="userName" placeholder="Enter Your Username*" required></td>
  </tr>
  <tr>
  <td></td>
  <td width="90"  align="center"><em id="exist_username" style="display:none;color:red">( Username already exists )</em></td>
  <td width="90" align="center"><em>( Username must all alphabet and no space )</em></td>
  </tr>
  <tr>
  <td width="90" align="left">Password</td>
  <td width="367">:
      <input type="password" class="demoInputBox" name="password" value="" placeholder="Your Strong Password*" required></td>
  </tr>  
  <tr>
  <td width="90" align="left">Confirm Password</td>
  <td width="367">:
      <input type="password" class="demoInputBox" name="confirm_password" value="" placeholder="Password one more time*" required>
   </td>
   </tr>  
  <tr>
  <td width="90" align="left">Your ethereum Address</td>
  <td width="367">:
      <input type="text" class="demoInputBox" id="eth_address" name="ethereum_address" placeholder="Ex: 0xe99356bde974bbe08721d77712168fa070aa8da4*" required></td>
      <td align="center"><em id="emeth">( Invalid Etherium address )</em></td>
  </tr>
  <tr>
  <td></td>
    
  </tr>
  <td></td>
  </tr>
  <tr>
    <td width="90" align="left" id="sec_ques">Secret question</td>
    <td>:
      <select name="question_sec" class="question">
      <option value="Slected your security">-select your question item-</option>
      <option value="What's your mother's given name">What's your mother's given name</option>
      <option value="what's your pet's name">what's your pet's name</option>
      <option value="What's your favorite food">What's your favorite food</option>
      <option value="What's your favorite sport">What's your favorite sport</option>
      <option value="What's your favorite color">What's your favorite color</option>
    </select></td>
  </tr>
  <tr>
  <td width="90" align="left">Secret answer</td>
    <td>:
     <input type="text" class="demoInputBox" name="answer_question"  placeholder="Enter Your Answer*" required></td>
  </tr>
    <tr>
    <td><input type="checkbox" name="terms">
    I accept Terms and Conditions</td>
    <td><input type="submit" name="register-user" value="Register Now" class="btnRegister"></td>
	</tr>
</table>
</form>
 </div>
</div>
</footer>
</body>
</html>