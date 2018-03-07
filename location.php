<?php
error_reporting(-1);
ini_set('display_errors', true);

include ('client.php');
$location = $_GET['loc'];
//$location='NJ';
$response = searchLocation($location);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 4c3529f083f03d7bbc9c718df1051c8d34ec6674
$respo = rtrim($response);
header('Content-Type: application/json;charset=utf-8');

//echo json_decode($data);
echo ($respo);
<<<<<<< HEAD
=======
=======

header('Content-Type: application/json;charset=utf-8');

//echo json_decode($data);
echo ($response);
>>>>>>> ad3a7856f8fcd71837e211b217a52b4019152f7e
>>>>>>> 4c3529f083f03d7bbc9c718df1051c8d34ec6674
?>
