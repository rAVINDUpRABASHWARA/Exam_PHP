<?php

//Password Convert To Hash
function passwordtohash($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

//Password Is Valid
function passwordisvalid($password,$hashcode)
{
    if (password_verify($password, $hashcode)) {
       return true;
    } else {
       return false;
    }
}

//Password Is Valid
function getclientipaddress()
{
    $ip = "0.0.0.0";
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

//Password Is Valid
function getnewfileid()
{
    date_default_timezone_set("Asia/Colombo");
    $datetime = date('ymdHis');
    $after = rand(11,99);

    return "$datetime$after";
}

//Generate Authcode
function generateauthcode() {
    $length = 6;
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//Generate New Password
function generatepassword() {
    $length = 8;
    $characters = '0123456789#$@?!&abcdefghijklmnopqrstuvwxyz#$@?!&ABCDEFGHIJKLMNOPQRSTUVWXYZ#$@?!&';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function selectqryexecute($sqlstring)
{
    include '../dbconfig/setconnection.php';

    $result = $conn->query($sqlstring);

    $conn->close();

    return $result;
}

function executesql($sqlstring)
{
    include '../dbconfig/setconnection.php'; 

    if ($conn->query($sqlstring) === TRUE) {
        $result = true;
      } else {
        $result = false;
      }

    $conn->close();

    return $result;
}

?>