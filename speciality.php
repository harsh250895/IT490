<?php
error_reporting(-1);
ini_set('display_errors', true);

include ('client.php');
$speciality = $_GET['speciality'];
$location = $_GET['location'];
//$uid = '333d4bb6fcf640e18e93b11b00fe09eb';
$response = searchSpeciality($speciality,$location);

$respo = rtrim($response);
header('Content-Type: application/json;charset=utf-8');

//echo json_decode($data);
echo ($respo);
?>
