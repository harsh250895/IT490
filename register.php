<?php
error_reporting(-1);
ini_set('display_errors', true);

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
