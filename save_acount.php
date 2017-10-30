<?php
require_once("koneksi.php");
$db_handle = new koneksi();
$conn = $db_handle->connectDB();
$arr_validation = array();
foreach($_POST as $key=>$value) {
	
	if(empty($_POST[$key]))
	{
		$arr_post = array('field'=>$key,'error_message'=>'required* ');
		array_push($arr_validation,$arr_post);
		$error_message='error';
	}
	
}
/*$upline = $_POST['upline'];
	if(empty($upline))
	{
		$_POST['upline']='NONE';
		$upline='NONE';
	}*/
if($_POST['password'] != $_POST['confirm_password']){ 
	$arr_post = array('field'=>'password','error_message'=>' password do not match!');
	array_push($arr_validation,$arr_post);
	$error_message='error';
	}
if(strlen($_POST['password']) < 6)
{
	$arr_post = array('field'=>'password','error_message'=>' password must be at least 6 characters!');
	array_push($arr_validation,$arr_post);
	$error_message='error';
				
}
$username = $_POST['username'];
	$check_username =ctype_alpha($username);
	if(!$check_username)
	{
		$arr_post = array('field'=>'username','error_message'=>' username must be letters!');
		array_push($arr_validation,$arr_post);
	}
	if (preg_match('/\s/',$username))
	{
		$arr_post = array('field'=>'username','error_message'=>' username do not spacing!');
		array_push($arr_validation,$arr_post);
	}
	$query_exists = "select * from tbl_register where username='$username'";
	$execute_exists = mysqli_query($conn,$query_exists);
	if($execute_exists)
	{
		$num_rows = mysqli_num_rows($execute_exists);
		if($num_rows > 0){
			$arr_post = array('username'=>'username already exist!');
			array_push($arr_validation,$arr_post);
		}
	}
if(!isset($error_message))
{

	/* Password Matching Validation */
	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
		$arr_post = array('field'=>'email','error_message'=>' invalid email address');
		array_push($arr_validation,$arr_post);
	}
	if(!isset($_POST["terms"])){
		$arr_post = array('field'=>'terms','error_message'=>' please Accept Terms and Conditions to Register');
		array_push($arr_validation,$arr_post);
	}
	
}

if(count($arr_validation) <=0)
{
	$fullname = mysqli_real_escape_string($conn,$_POST["fullname"]);
	$email_user = mysqli_real_escape_string($db_handle->connectDB(),$_POST["email"]);
	$password_user = md5(mysqli_real_escape_string($db_handle->connectDB(),$_POST["password"]));
	$addr_eth = mysqli_real_escape_string($db_handle->connectDB(),$_POST["etherium_address"]);
	$question = mysqli_real_escape_string($db_handle->connectDB(),$_POST["question_sec"]);
	$answer = mysqli_real_escape_string($db_handle->connectDB(),$_POST["secret_answer"]);
	$query_insert = "INSERT INTO tbl_register values 
						('$username'
						,'$fullname'
						,'$email_user'
						,'$password_user'
						,'$addr_eth'
						,'$question'
						,'$answer'
						,'$upline'
						,'0000-00-00 00:00:00'
						,NOW()
						)";
	$result = $db_handle->insertQuery($query_insert);
	if($result){
		header('Location:log_in.php');
	}
}
else
{
	$result =array('data'=>$arr_validation);
}


print json_encode($result);

?>