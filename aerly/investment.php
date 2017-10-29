<?php
include('session_user.php');
require_once("../connection/koneksi.php");
$db_handle = new koneksi();
$username = mysqli_real_escape_string($db_handle->connectDB(),$_SESSION["username"]);
$query_amount = mysqli_query($db_handle->connectDB(),
				"select ifnull(sum(amount_spend),0) as Total_Spend 
					from tbl_deposit where username='$username'");
$results_amount = mysqli_fetch_assoc($query_amount);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>aerly</title>
<meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/font-awesome.css">
        <link rel="stylesheet" href="../css/templatemo_style.css">
        <link rel="stylesheet" href="../css/templatemo_misc.css">
        <link rel="stylesheet" href="../css/flexslider.css">
        <link rel="stylesheet" href="../css/testimonails-slider.css">

        <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
<style type="text/css">
	.button_up {
    background-color:#FC0;
    border: none;
    color:#000;
    padding: 10px 50px 10px 50px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	font-family:"Times New Roman", Times, serif;
    font-size: 18px;
    margin: 4px 2px;
    cursor: pointer;
	}
	.button_down {
    background-color:#09F;
    border: none;
    color:#FFFFFF;
    padding: 15px 30px 15px 30px;
	font-style:inherit;
	font-family:Arial, Helvetica, sans-serif;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	box-shadow:#000 0px 2px;
	}
	.demoInputBox {
	padding: 10px 100px;
	border: #a9a9a9 1px solid;
	border-radius: 5px;
}
	
</style>		
</head>
<body>
   <?php
include('navigation.php');
?>
     <div id="services">
                <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                            <div class="heading-section">
                                <img src="../Gambar/minion-coin.png" alt="" > &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src="../Gambar/waktu.png" />
                                <p align="right">Starting ICO Price 1 MINC = 10% Of ETH <em>( Approximately USD $3.00 )</em></p>
                                <p><h1><font face="Arial Black, Gadget, sans-serif">INVEST NOW AND <font color="#FFCC00">BECOME A MINIONAIRE</h1></p></h2>
                                <p><h2> The Earlier You Invest ... The Bigger Payout You Receive</p>
                                
                            </div>
                        </div>
 <table width="800" border="0" align="center">
   <?php
	include('dashboard_nav.php');
 ?>
    <td colspan="3"><font color="#0099FF" font face="Times New Roman, Times, serif"><h1> Deposits</h1></font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><font color="#999999" font face="Times New Roman, Times, serif"><h4> Account balance:</h4></font> <p>
      <img src="../Gambar/471px-Ethereum_logo_2014.svg.png" width="13" height="22" /> 
	  &nbsp;  <strong><?php print $results_amount['Total_Spend'];?></strong>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

                        
                    </div>
                </div>
            </div>
            
            
</body>
</html>