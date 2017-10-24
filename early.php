<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Minion Coin</title>
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
div.gallery {
    border: 1px solid #ccc;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}

* {
    box-sizing: border-box;
}

.responsive {
    padding: 0 6px 0 50px;
    float: left;
    width: 30%;
}

@media only screen and (max-width: 700px){
    .responsive {
        width: 35%;
        margin: 10px 0;
    }
}

@media only screen and (max-width: 500px){
    .responsive {
        width: 100%;
    }
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
footer {
                clear: both;
				width:100%;
				background-color:#FFFFFF;
            }
section#content {
                float:left;
				background-color:#FC0;
                height: 550px;
                width: 100%
       }

#slidecontainer {
    width: 100%;
}

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 25px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    background: #333;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    background: #333;
    cursor: pointer;
}</style>
</head>
<body background="Gambar/bg1atas.png">
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
      </ul>
    </div>
  </div>
</nav>
<img src="Gambar/minion-coin.png" /> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="Gambar/TimeICO.png" />
<h2 align="center">Invest Now And  <font color="#FFCC00"><a href="login_conf.php">Become a Minionaire</a></font></blink></h2>
<h4 align="center">The Earlier You Invest ... The Bigger Payout You Receive</h4><br />

<div class="responsive">
  <div class="gallery">
      <img src="Gambar/kotak1.png" height="584" width="415">
    <div class="desc"><table width="320" border="0">
  <tr>
    <td colspan="3">
    	<div id="slidecontainer">
  <input type="range" min="0.01" max="1" step="0.01" value="50" class="slider" id="myRange1">
</div>
	</td>
    </tr>
  <tr>
    <td width="143" align="left">AMOUNT</td>
    <td width="125" align="">
    <span id="demo1"></span>
	</td>
    <td width="30"><strong>ETH</strong></td>
  </tr>
  <tr>
    <td align="left">MAX PAYOUT</td>
    <td><span id="totalPO1"></span></td>
    <td><strong>ETH</strong></td>
  </tr>
</table>
</div>
  </div>
</div>


<div class="responsive">
  <div class="gallery">
      <img src="Gambar/kotak2.png" width="415" height="584">
    
    <div class="desc"><table width="320" border="0">
  <tr>
    <td colspan="3"><div id="slidecontainer">
  <input type="range" min="1.01" max="3" step="0.01" value="50" class="slider" id="myRange2">
</div></td>
    </tr>
  <tr>
    <td width="143" align="left">AMOUNT</td>
    <td width="125" align="center">
    <span id="demo2"></span>

</td>
    <td width="30"><strong>ETH</strong></td>
  </tr>
  <tr>
    <td align="left">MAX PAYOUT</td>
    <td>&nbsp;</td>
    <td><strong>ETH</strong></td>
  </tr>
</table></div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
      <img src="Gambar/kotak-3.png" width="415" height="584">
    <div class="desc"><table width="320" border="0">
  <tr>
    <td colspan="3">
    <div id="slidecontainer">
  <input type="range" min="3.01" max="6" step="0.01" value="50" class="slider" id="myRange3">
</div>    
        </td>
    </tr>
  <tr>
    <td width="143" align="left">AMOUNT</td>
    <td width="125" align="center"><span id="demo3"></span>
    
	</td>
    <td width="30"><strong>ETH</strong></td>
  </tr>
  <tr>
    <td align="left">MAX PAYOUT</td>
    <td>&nbsp;</td>
    <td><strong>ETH</strong></td>
  </tr>
</table></div>
  </div>
</div>

<div class="clearfix"></div>

  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <p>
  <section id="content"><h1 align="center"><font color="#FFFFFF"><strong>MINION COIN PURELY RELIES ON DECENTRALIZATION WHICH MEANS COINS HOLD NO ACTUAL VALUE UNLESS PEOPLE BOSST ITS VALUE BY INVESTING. AND THEREFORE, WE WOULD LIKE TO INVITE ALL INVESTORS & DONATORS TO HELP MAKE MINIONCOIN ICO HAPPEN!</strong></font></h1><br />
  <h2 align="left">WHY ETHEREUM ?</h2><br />
  <h3 align="center"><font color="#FFFFFF">The creation of Enterprise Ethereum Alliance (EEA) - News - Enterprise Ethereum 
Alliance consisting of many global major banks and companies such as: Accenture,
Banco Santander, BlockApps, BNY Mellon, CME Group, ConsenSys, IC3, Intel,
 J.P. Morgan, Microsoft, and Nuco.</font></h3></footer>

<footer>
 	<img src="Gambar/sp.png" />
    <br />
    <br />
    <br />
 <p><h1 align="center"><font color="#666666"> <font face="Times New Roman, Times, serif">OUR CAPITAL VENTURER</font></font></h1> </p>
    <br />
  	<br />
    <p align="center">
  <img src="Gambar/catalinalogo.png" width="345" height="306" /> &nbsp; <img src="Gambar/bellagio_hotel_logo.gif" width="330" height="265" /> &nbsp;<img src="Gambar/american-express-logo-wallpaper.jpg" width="360" height="300"/> &nbsp; <br /><p><img src="Gambar/MCDLOGO.jpg" height="287" width="304" /> &nbsp; <img src="Gambar/Berkshire-Hathaway-Logo.png" width="617" height="280" /> &nbsp; <img src="Gambar/wells-fargo.jpg" width="200" height="200" /> &nbsp; <img src="Gambar/p2_508946.jpg" height="184"  width="615"/> &nbsp;<img src="Gambar/Universal_Studios_Logo.png" width="385" height="243" /><img src="Gambar/Illumination-Entertainment-336x124.png" height="124" width="336" />&nbsp; </p>
 
 
</footer>

</div>
</div>
<script type='text/javascript'>
var slider1 = document.getElementById("myRange1");

var output1 = document.getElementById("demo1");
var totalPO1_value = document.getElementById("totalPO1");
totalPO1_value.innerHTML = (slider1.value *0.05).toFixed(6);
output1.innerHTML = slider1.value;


slider1.oninput = function() {
	
  output1.innerHTML = this.value;
  totalPO1_value.innerHTML = (this.value * 0.05).toFixed(6);
}

var slider2 = document.getElementById("myRange2");
var output2 = document.getElementById("demo2");
output2.innerHTML = slider2.value;

slider2.oninput = function() {
  output2.innerHTML = this.value;
  
}

var slider3 = document.getElementById("myRange3");
var output3 = document.getElementById("demo3");
output3.innerHTML = slider3.value;

slider3.oninput = function() {
  output3.innerHTML = this.value;
  
}
</script>
</body>
</html>