<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";
$review=$input["review"];
$rating=$input["rating"];
$trip_id=$input["trip_id"];

$s=insert(
    "INSERT into rating ( trip_id, rating, review, user_phone) VALUES (?,?,?,?)",
    array("iiss",(int)$trip_id,(int)$rating,$review,$input["phone"])
);
?>