<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";
$driver_phone=$input["driver_phone"];
$q=select(
    "SELECT * from drivers WHERE phone = ? ",
    array("s",$driver_phone)
);
if (sizeof($q)==0) {
    appError(false,"Driver not found");
}
$online_status=$q[0]["online"];
$bool=null;
if ($online_status=="online") {$bool=true;} else {$bool=false;}
appError($bool,$bool?"You are Online":"You are Offline");