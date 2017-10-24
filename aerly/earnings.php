<?php
include('session_user.php');
require_once("../connection/koneksi.php");
$db_handle = new koneksi();
$username = mysqli_real_escape_string($db_handle->connectDB(),$_SESSION["username"]);
$query_amount_earnings = mysqli_query($db_handle->connectDB(),
						"select td.date_time_spend
							,ifnull(sum(te.earning_amount),0) as total_earning 
								from tbl_deposit td, tbl_earning te 
								where 
						td.id_transaction_deposit = te.id_transaction_deposit 
							and te.earning_date <= DATE(NOW()) 
									and td.username ='$username'");
$results_amount_earnings = mysqli_fetch_assoc($query_amount_earnings);

//total earning until ico
$query_amount_earnings_ico = mysqli_query($db_handle->connectDB(),
						"select ifnull(sum(te.earning_amount),0) as total_earning_ico 
								from tbl_deposit td, tbl_earning te 
								where 
						td.id_transaction_deposit = te.id_transaction_deposit
									and td.username ='$username'");
$results_amount_earnings_ico = mysqli_fetch_assoc($query_amount_earnings_ico);
$begin = new DateTime(date('Y-m-d'));
?>
<html lang="en">
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
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		
		  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<form name="form-earnings" method="post" action="getEarnings.php" id="frm-earning">
 <table width="800" border="0" align="center">
  <?php
	include('dashboard_nav.php');
 ?>
    <td colspan="3"><font color="#0099FF" font face="Times New Roman, Times, serif"><h1>Earnings</h1></font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><font color="#999999" font face="Times New Roman, Times, serif"><h4> Total:</h4></font> <p>
      <img src="../Gambar/471px-Ethereum_logo_2014.svg.png" width="13" height="22" /> &nbsp;  
		<strong><?php print $results_amount_earnings['total_earning'];?></strong>
    </td>
	<td colspan="2"><font color="#999999" font face="Times New Roman, Times, serif"><h4> Total Until ICO:</h4></font> <p>
      <img src="../Gambar/471px-Ethereum_logo_2014.svg.png" width="13" height="22" /> &nbsp;  
		<strong><?php print $results_amount_earnings_ico['total_earning_ico'];?></strong>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td><font color="#999999" font face="Times New Roman, Times, serif">
      <h4> Transaction</h4></font> <p>
	  <select name="earning_transaction" id="et">
		<option value="1">All Transaction</option>
	  </select>
	  </td>
    <td>&nbsp;</td>
   
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td><font color="#999999" font face="Times New Roman, Times, serif">
      <h4> Date From :</h4></font> <p>
	  <input readonly='true' type="text" name="date-from" id="date_from"
		value="<?php print date('Y-m-d', strtotime($results_amount_earnings['date_time_spend']));?>" required/>
	  </td>
	  <td>&nbsp;</td>
    <td><font color="#999999" font face="Times New Roman, Times, serif">
      <h4> Date To:</h4></font> <p>
	  <input readonly='true' type="text" id="date_to" name="date-to" value="<?php print date('Y-m-d');?>" required />
	  </td>
  </tr>
  <tr>
  <td></td>
    <td>&nbsp;</td>
	<td><button type="submit" class="button_down">GET</button></td>
  </tr>
</table>
</form>
<div id="place_earning_table">

</div>
</div>
                </div>
            </div>
            
 <script>

 var check = true;
  $(document).ready(function() {
    $( "#date_from" ).datepicker(
	{
		dateFormat: "yy-mm-dd"
	});
	$( "#date_to" ).datepicker(
	{
		dateFormat: "yy-mm-dd",
		maxDate: '0'
	});
	
	$('#frm-earning').submit(function(e){
			var strhtml='';
			e.preventDefault();
			$.ajax({
			url:$(this).attr('action'),
			type:'POST',
			dataType:'json',
			data:$(this).serialize(),
			success:function(getdata)
			{
				strhtml +='<table id="tbl_earning" class="table">';
				strhtml +='<thead>';
				strhtml +='<tr>';
				strhtml +='<th>Date</th>';
				strhtml +='<th>Amount</th>';
				strhtml +='<th>Percentage</th>';
				strhtml +='</tr>';
				strhtml +='<tbody>';
				if(getdata.length > 0)
				{
					$.each(getdata,function(i,item){
						strhtml +='<tr>';
						strhtml +='<td>'+getdata[i].earning_date+'</td>';
						strhtml +='<td>'+getdata[i].earning_amount+'</td>';
						strhtml +='<td>'+getdata[i].percentage_earning+'%'+'</td>';
						strhtml +='</tr>';
					});
				}
				else
				{
					strhtml +='<tr>';
					strhtml +='<td colspan="3" style="text-align: center;">Empty</td>';
					strhtml +='</tr>';
				}
				
				strhtml +='</tbody>';
				strhtml +='</table>';
				console.log();
				$('#place_earning_table').html(strhtml);
			},
			error:function(xhr,textStatus,errormessage)
			{
				console.log(errormessage + " "+ " "+xhr.status+textStatus);
			}
		});
	});
  });
  </script>
</body>
</html>