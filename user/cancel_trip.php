<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";
error_reporting(0);
$select=select(
    "SELECT * from trips_meta WHERE id = ?",
    array("i",(int)$input["trip_id"])
);
if ($select[0]["status"]!=TRIP_STATUSES::$TRIP_FINISHED) {
    appError(false,"Trip is already finished");
}
if ($select[0]["status"]!=TRIP_STATUSES::$TRIP_CREATED) {
    basic_fcm(array("to" => $select[0]["driver_id"], "data" =>
        array_merge(
            array("trip_id" => $input["trip_id"], "cancelled"=>true)
        )
    ));
    $time_Elapsed=$select[0]["time_created_php"];
    $time_Elapsed=(int)$time_Elapsed;
    if ($time_Elapsed-300>0) {
        $car_type=$check_time[0]["car_type"];
        $farer=$pricing_on_car[$car_type];
        $base_fare=(int)$farer["base"];
        update("UPDATE trips_meta SET base_fare = ? , total = ? WHERE id = ?",
            array("iii",(int)$base_fare,(int)$base_fare,(int)$input["trip_id"])
        );
    }

}
$rr=update(
    "UPDATE trips_meta SET status = ? , cancelled_reason = ? WHERE id = ?",
    array("ssi",TRIP_STATUSES::$TRIP_CANCELLED,
        isset($input["reason"])?$input["reason"]:""
    ,(int)$input["trip_id"])
);
basic_fcm(array("to" => "/topics/driver", "data" =>
    array(
        "trip_id"=>$input["trip_id"],
        "trip_status"=>"cancelled",
        "cancelled"=>"true"
    )
));
appError($rr==false?false:true,"Trip Cancelled",array(
    "trip_id"=>$input["trip_id"]
));
