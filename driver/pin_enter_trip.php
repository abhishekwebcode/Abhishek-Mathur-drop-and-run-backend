<?php

/**
 * Created by PhpStorm.
 */

require_once "../autoload/autoload.php";
$trip_id=$input["tri_ref"];
$driver_id=$input["driver_phone"];
$pin=$input["pin"];
$check_time=select(
    "Select * from trips_meta WHERE id = ? ",
    array(
        "i",(int)$trip_id
    )
);
if ($check_time[0]["pin"]!=$pin) {
    appError(false,"incorrect pin,please try again");
}
$end_time=strval(gettimeofday()["sec"]);
update("UPDATE trips_meta set status = ? , driver_id = ? , end_time = ? WHERE id = ?",array("sssi",TRIP_STATUSES::$TRIP_FINISHED,$driver_id,$end_time,(int)$trip_id));
select("SELECT * from drivers WHERE id=?",array("i",(int)$driver_id));
$user_id=$check_time[0]["user_id"];
$user_token=select("SELECT fcm_token from users WHERE phone = ?",array("s",$user_id));
$token_of_user=$user_token[0]["fcm_token"];
basic_fcm(array("to"=>($token_of_user),"data"=>array(
    "trip_update"=>$trip_id,
    "status"=>"Trip Finished",
    "driver_phone"=>$driver_id,
    "trip_data"=>$check_time[0],
    "trip_finished"=>true
)));
appError(true,"Dropping started",$check_time[0]);
