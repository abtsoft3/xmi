<?php
$root_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$query_str =parse_url($root_url, PHP_URL_QUERY);
$length= strlen($query_str);
$upline= substr($query_str,4,$length);
if($upline!=NULL)
{
session_start();
$_SESSION['getupline'] = $upline;
}else
{
unset($_SESSION['getupline']);
}

?>