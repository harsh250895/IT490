<?php
error_reporting(-1);
ini_set('display_errors', true);

include ('client.php');
$uid = $_GET['insurance'];
//$uid = '333d4bb6fcf640e18e93b11b00fe09eb';
$response = searchInsurance($uid);

$respo = rtrim($response);
header('Content-Type: application/json;charset=utf-8');

//echo json_decode($data);
echo ($respo);
?>
