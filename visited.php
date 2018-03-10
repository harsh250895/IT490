<?php
session_start();
ini_set("display_errors", 0);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);
include ('client.php');
if (!isset($_SESSION["user"])){
 header( "Refresh:1; url=login.html", true, 303);
 }
$type = $_GET['type'];
 if($type == "rm"){

$uid = $_GET['uid'];

$response = rmAP($uid,$_SESSION['user']);
echo $response;
}
else{
$response = newList($_SESSION['user']);
echo $response;
}
?>
