<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";
$driver_phone = $input["driver_phone"];
$is_ONLINE_change = $input["status"];
if ($is_ONLINE_change == "true") {
    $on = "online";
} else {
    $on = "offline";
}
$q = update(
    "UPDATE drivers SET online = ? WHERE phone = ?",
    array("ss", (strval($on)), $driver_phone)
);
if ($on == "online") {
    $bool = true;
} else {
    $bool = false;
}
appError($bool, $bool ? "You are Online" : "You are Offline",array("data"=>$input));
