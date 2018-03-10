
<?php
session_start();
ini_set("display_errors", 0);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);


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
