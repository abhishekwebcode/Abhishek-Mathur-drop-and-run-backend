<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";
$trip_id=(int)$input["trip_id"];
try {
    $select = select(
        "SELECT * FROM trips_meta WHERE id = ? ",
        array("i", $trip_id)
    );
} catch (Exception $e) {
    appError(false,"Trip not found");
}
if (sizeof($select)==0) {
    appError(false,"Trip not found");
}
else {
    appError(true,"TRIP FOUND",
        array(
            "status"=>$select[0]["status"],
            "trip_details"=>$select[0]
        )
    );
}