<?php
include('koneksi.php');
$db_handle = new koneksi();
$conn = $db_handle->connectDB();
$username='operator';
$password = MD5('P@sswordNyaAp@');
$query_insert = "INSERT INTO tbl_operator (username,password)
VALUES ('$username','$password')";
$execute = mysqli_query($conn,$query_insert);
if($execute)
{
	header("Location:login_operator.php");
}
?>