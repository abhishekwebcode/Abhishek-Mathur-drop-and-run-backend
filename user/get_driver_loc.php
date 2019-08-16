<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";
$driver_phone=$input["driver_phone"];
$ans=select(
    "SELECT last_location,last_time_online from drivers WHERE phone = ?",
    array("s",$driver_phone)
);
appError(
    true,
    "driver found",
    $ans[0]
);
?>