<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";
$latitude=$input["latitude"];
$longitude=$input["longitude"];
$driver_phone=$input["driver_phone"];
$rr=update(
    "UPDATE drivers SET last_location = ? WHERE phone = ?",
    array("ss",$latitude."::".$longitude,$driver_phone)
);
appError(
    $rr,"$latitude::$longitude was received for $driver_phone",
    array(
        "debug"=>var_dump($rr)||"ok"
    )
);

?>
