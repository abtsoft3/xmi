<?php
	/*session_start();
 	if (empty($_SESSION['username'])) {
 	header("location:index.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Minion Coin</title>
<link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<style type="text/css">
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
.demo-table-logo {
	width: 70%;
	margin-top:1px;
	text-align:center;
	color:#666;
	border-radius: 14px;
	padding: 1px 14px;
}
.demo-table {
	width: 70%;
	margin-top:200px;
	text-align:center;
	color:#666;
	border-radius: 14px;
	padding: 1px 14px;
}
.button {
    background-color:#FC0;
    border: none;
    color: #333;
    padding: 15px 32px ;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
</style>
</head>
<body background="Gambar/bg_page2.png">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class=""></span> Home</a></li>
      	<li><a href="airdrop.php"<span class=""></span> Airdrop_compaign</a></li>
         <li><a href="early.php"><span class=""></span> Early_Investment</a></li>
      </ul>
    </div>
  </div>
</nav>

<form name="frmRegistration" method="post" action="controller/save_airdrop.php">
<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<p class="Arial">GET 10.000 MINION COIN ( MINC ) AIRDROP</p> 
<div>

<input type="text" class="demoInputBox" name="userTelegram" value="<?php if(isset($_POST['userTelegram'])) echo $_POST['userTelegram']; ?>" placeholder="Enter Your Telegram*"><br />
<input type="text" class="demoInputBox" name="ethereumAddres" value="<?php if(isset($_POST['ethereumAddres'])) echo $_POST['ethereumAddres']; ?>" placeholder="Ethereum Address*"><br />
<input type="text" class="demoInputBox" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Email Address*">
</div>

<p class="Arial">INVITE 10 FRIENDS’ EMAIL</p>
<div>
    <input type="text" class="demoInputBox" name="email1" value="" placeholder="Email Address*"> 
    <input type="text" class="demoInputBox" name="email2" value="" placeholder="Email Address*">
    <br/>
    <input type="text" class="demoInputBox" name="email3" value="" placeholder="Email Address*">
    <input type="text" class="demoInputBox" name="email4" value="" placeholder="Email Address*">
    <br/>
    <input type="text" class="demoInputBox" name="email5" value="" placeholder="Email Address*"> 
    <input type="text" class="demoInputBox" name="email6" value="" placeholder="Email Address*">
    <br/>
    <input type="text" class="demoInputBox" name="email7" value="" placeholder="Email Address*">
    <input type="text" class="demoInputBox" name="email8" value="" placeholder="Email Address*">
    <br/>
    <input type="text" class="demoInputBox" name="email9" value="" placeholder="Email Address*">
    <input type="text" class="demoInputBox" name="email10" value="" placeholder="Email Address*">
    <br/>
     
  <input type="submit" name="register-user" value="Claim Now" class="button">
  <input type="checkbox" name="terms"> I accept Terms and Conditions
</form>
</div>
</body>
</html>