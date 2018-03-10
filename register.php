<?php
session_start();
ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);
if (!isset($_SESSION["user"])){
 header( "Refresh:1; url=login.html", true, 303);
 }

include ('client.php');
$email = $_POST['email'];
$user = $_POST['user'];
$pass = $_POST['password'];

$response = register($email,$user,$pass);
if($response == true)
  {
    echo "Registered";
    header( "Refresh:1; url=login.php", true, 303);
  }
  else
  {
  echo "Was not able to register";
  header( "Refresh:1; url=register.php", true, 303);
  }
?>
