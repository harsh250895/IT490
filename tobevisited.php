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
 if($type == "add"){
$name = $_GET['name'];
$uid = $_GET['uid'];
$date = $_GET['date'];

$response = addAP($uid,$_SESSION['user'],$name,$date);
echo $response;
}
else{

$response = getList($_SESSION['user']);
echo $response;

}


?>
