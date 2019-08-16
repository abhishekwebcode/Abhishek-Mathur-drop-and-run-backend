<?php
/**
 * Created by PhpStorm.
 *
 *  fname: fname,
email: email,
lname: lname,
pass: pass,
country: country,
postal: postal,
dob: dob,
mobile: mobile,
province: province,
city: city
 */
header("Content-Type: text/plain");
require_once "../autoload/autoload.php";
if ($fname=filter_var($_GET["fname"],FILTER_SANITIZE_STRING) || strlen($_GET["fname"])==0) {
    $err->messages[]=array("fname","Please Enter Your First Name Correctly");
}
if ($fname=filter_var($_GET["lname"],FILTER_SANITIZE_STRING) || strlen($_GET["lname"])==0) {
    $err->messages[]=array("fname","Please Enter Your Last Name Correctly");
}
if ($fname=filter_var($_GET["pass"],FILTER_SANITIZE_STRING) || strlen($_GET["pass"])==0) {
    $err->messages[]=array("fname","Please Enter Your First Name Correctly");
}
if ($fname=filter_var($_GET["postal"],FILTER_SANITIZE_NUMBER_INT) || strlen($_GET["postal"])==0) {
    $err->messages[]=array("fname","Please Enter Your First Name Correctly");
}
if ($fname=filter_var($_GET["dob"],FILTER_SANITIZE_STRING) || strlen($_GET["dob"])==0) {
    $err->messages[]=array("fname","Please Enter Your First Name Correctly");
}
if ($fname=filter_var($_GET["mobile"],FILTER_SANITIZE_NUMBER_INT) || strlen($_GET["mobile"])==0) {
    $err->messages[]=array("mobile","Please Enter Your Mobile Number Correctly");
}
if ($fname=filter_var($_GET["province"],FILTER_SANITIZE_STRING) || strlen($_GET["province"])==0) {
    $err->messages[]=array("fname","Please Enter Your First Name Correctly");
}
if ($fname=filter_var($_GET["city"],FILTER_SANITIZE_STRING) || strlen($_GET["city"])==0) {
    $err->messages[]=array("fname","Please Enter Your First Name Correctly");
}
appErrorfromErr();
