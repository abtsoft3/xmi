<?php
include 'koneksi2';
// menyimpan data kedalam variabel
$userTelegram        = $_POST['userTelegram'];
$ethereumAddres      = $_POST['ethereumAddres'];
$email       		 = $_POST['email'];
$email1 			 = $_POST['email1'];
$email2        		 = $_POST['email2'];
$email3 			 = $_POST['email3'];
$email4        		 = $_POST['email4'];
$email5 			 = $_POST['email5'];
$email6        		 = $_POST['email6'];
$email7 			 = $_POST['email7'];
$email8        		 = $_POST['email8'];
$email9 			 = $_POST['email9'];
$email10       		 = $_POST['email10'];
// query SQL untuk insert data
$query="INSERT INTO tbl_claim SET userTelegram='$user_telegram',ethereumAddres='$ethereum_address',email='$email_address',email1='$email_frend1',email2='$email_frend2',email3='$email_frend3',email4='$email_frend4',email5='$email_frend5',email6='$email_frend16',email7='$email_frend7',email8='$email_frend8',email9='$email_frend9,email9='$email_frend9'";
mysqli_query($koneksi2, $query);
// mengalihkan ke halaman index.php
header("location:airdrop.php");
?>