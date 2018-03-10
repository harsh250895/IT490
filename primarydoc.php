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
$type=$_GET['type'];

if($type == "add"){
$uid = $_GET['uid'];
//$uid = '333d4bb6fcf640e18e93b11b00fe09eb';
$response = addPri($uid,$_SESSION['user']);

$respo = rtrim($response);
//header('Content-Type: application/json;charset=utf-8');

//echo json_decode($data);
header( "Refresh:1; url=testpri.php?lic=$response", true, 303);}
else{
  $response = getPri($_SESSION['user']);

  $respo = rtrim($response);
  //header('Content-Type: application/json;charset=utf-8');

  //echo json_decode($data);
  header( "Refresh:1; url=testpri.php?lic=$response", true, 303);

}
?>
