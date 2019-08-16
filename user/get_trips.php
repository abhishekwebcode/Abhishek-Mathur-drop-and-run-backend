<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";
$offset=$input["offset"];
$user_id=$input["user_id"];
$trips=select(
    "SELECT * from trips_meta WHERE user_id = ? LIMIT 10 OFFSET ?",
    array("si",$user_id,$offset)
);
appError(
    $trips==false?false:true,
    "Your trips...",
    $trips
);
