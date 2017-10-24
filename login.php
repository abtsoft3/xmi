<!DOCTYPE html>
<html>
<head>
	<title>login</title>
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
	color:#666;
	border-radius: 14px;
	padding: 10px 14px;
}
.demoInputBox {
	padding: 10px 100px;
	border: #a9a9a9 1px solid;
	border-radius: 14px;
}
.btnRegister {
	padding: 10px 30px;
	background-color: #FC0;
	border: 0;
	color: #FFF;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 10px;
}
.btnSingUup {
	padding: 10px 30px;
	background-color: #FC0;
	border: 0;
	color: #FFF;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 10px;
}
  small {
	font-size: 9px;
}
  </style>
</head>
<body>

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
      	<li><a href="airdrop.php"><span class=""></span> Airdrop_compaign</a></li>
         <li><a href="early.php"><span class=""></span> Early_Investment</a></li>
        <li><a href="login_conf.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a href="register.php"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Become A Minionaire</h1>      
    <p>use good and correct data...</p>
  </div>
</div>
<footer class="container-fluid text-center">
  <p>
  <form name="frmRegistration" method="post" action="login_conf.php">
<table align="left" border="0" width="1%" class="demo-table" >

	<br/>
	Please click <a href="register.php">Sign Up</a>, if you don't have an account.
	<div class="login">
	
	<br/>
	<div>
    <tr>
    	<td>
			<p align="left"><label>Username:</label></p>
			<input type="text" name="username" class="demoInputBox" id="username" required/>
		</td>
    </tr>
    </div>
    <tr>
    	<td>
			<div>
			<br/>
				<p align="left"><label>Password:</label></p>
				<input type="password" name="password" class="demoInputBox" id="password" required/>
			</div>			
    	</td>
    </tr>
    <tr>
		<td>
			
			<div>
            <br><p align="right">
				<input type="submit" value="Login" class="btn btn-success"> </br>
			</div>
		</td>
    	<td>
			<div>
            <br><p align="right">
				</br>
			</div>
        </td>
    </tr>
		</form>
     </table>  
	</div>
</body>

</html>