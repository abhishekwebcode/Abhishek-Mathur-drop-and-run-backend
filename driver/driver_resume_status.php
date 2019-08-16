<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";
$trip_id=$input["trip_id"];
$select=select(
    "SELECT * FROM trips_meta WHERE id = ?",
    array("i",(int)$trip_id)
);

