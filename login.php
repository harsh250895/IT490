
<?php
session_start();
error_reporting(-1);
ini_set('display_errors', true);

include ('client.php');
$user = $_POST['user'];
$pass = $_POST['password'];

$response = login($user,$pass);
if($response == false)
  {
    echo "Unthorized";
    header( "Refresh:1; url=login.html", true, 303);
  }
  else
  {
  $_SESSION['user'] = $user;
  header( "Refresh:1; url=searchpage.php", true, 303);
  }
?>
