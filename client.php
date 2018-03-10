
<?php
session_start();
ini_set("display_errors", 0);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);
if (!isset($_SESSION["user"])){
 header( "Refresh:1; url=login.html", true, 303);
 }

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function login($user,$pass){
    $client = new rabbitMQClient("testRabbitMQ.ini","DBServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "login";
    $request['username'] = $user;
    $request['password'] = $pass;
    $request['message'] = $msg;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}

function register($email,$user,$pass){
    $client = new rabbitMQClient("testRabbitMQ.ini","DBServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "register";
    $request['email'] = $email;
    $request['username'] = $user;
    $request['password'] = $pass;
    $request['message'] = $msg;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}

function searchLocation($location){
    $client = new rabbitMQClient("testRabbitMQ.ini","DBServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "location";
    $request['location'] = $location;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}

function searchInsurance($insurance,$location){
    $client = new rabbitMQClient("testRabbitMQ.ini","DBServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "insurance";
    $request['location'] = $location;
    $request['insurance']=$insurance;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}

function searchSpeciality($speciality,$location){
    $client = new rabbitMQClient("testRabbitMQ.ini","DBServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "speciality";
    $request['location'] = $location;
    $request['speciality'] = $speciality;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}

function search($uid){
    $client = new rabbitMQClient("testRabbitMQ.ini","DBServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "uid";
    $request['uid'] = $uid;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}

function addAP($uid,$user,$name,$date){
    $client = new rabbitMQClient("testRabbitMQ.ini","DBServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "addap";
    $request['uid'] = $uid;
    $request['name'] = $name;
    $request['date'] = $date;
    $request['user'] = $user;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}
function getList($user){
    $client = new rabbitMQClient("testRabbitMQ.ini","DBServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "getlist";
    $request['user'] = $user;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}

function rmAP($uid,$user){
    $client = new rabbitMQClient("testRabbitMQ.ini","DBServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "rmap";
    $request['user'] = $user;
    $request['uid'] = $uid;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}

function newList($user){
    $client = new rabbitMQClient("testRabbitMQ.ini","DBServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "nlist";
    $request['user'] = $user;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}

function addPri($uid,$user){
    $client = new rabbitMQClient("testRabbitMQ.ini","DBServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "addpri";
    $request['uid'] = $uid;
    $request['user'] = $user;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}
function getPri($user){
    $client = new rabbitMQClient("testRabbitMQ.ini","DBServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "plist";
    $request['user'] = $user;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}


?>
