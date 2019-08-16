<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";
$trip=$input["trip_id"];
$s=select(
    "SELECT * FROM trips_meta WHERE id = ?",
    array("i",(int)$trip)
);
appError(true,"",$s[0]);
?>