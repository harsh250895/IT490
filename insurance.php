<?php
session_start();
ini_set("display_errors", 0);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);
if (!isset($_SESSION["user"])){
 header( "Refresh:1; url=login.html", true, 303);
 }


include ('client.php');
$uid = $_GET['insurance'];
$location = $_GET['location'];
//$uid = '333d4bb6fcf640e18e93b11b00fe09eb';
$response = searchInsurance($uid,$location);


$respo = rtrim($response);
header('Content-Type: application/json;charset=utf-8');

//echo json_decode($data);
echo ($respo);
?>
