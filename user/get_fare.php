<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";
$trip_id=$input["tri_ref"];
$check_time=select(
    "Select * from trips_meta WHERE id = ? ",
    array(
        "i",(int)$trip_id
    )
);
$car_type=$check_time[0]["car_type"];
$farer=$pricing_on_car[$car_type];
$base_fare=$farer["base"];
$addtional_fare_kms=distance((double)$check_time[0]["pickup_latitude"],(double)$check_time[0]["pickup_longitude"],(double)$check_time[0]["drop_latitude"],(double)$check_time[0]["drop_longitude"],"K");
$addiotnal_fare=$addtional_fare_kms*((int)$farer["additonal"]);
$waiting_charge_time=((int)$check_time[0]["end_time"])-((int)$check_time[0]["dropped_time"])-300;
if ($waiting_charge_time>0) {
    $waiting_charge = $waiting_charge_time * $farer["waiting"];
} else {
    $waiting_charge_time=0;
    $waiting_charge=0;
}
$total=$base_fare+$addiotnal_fare+$waiting_charge;
update("UPDATE trips_meta set base_fare = ? , km_fare = ? , waiting_charge = ? , total =?  WHERE id = ?",array(
    "iiiii",
    (int)$base_fare,
    (int)$addiotnal_fare,
    (int)$waiting_charge,
    (int)$total,
    (int)$trip_id
    ));
appError(true,"Your fare ...",
    array_merge($check_time[0],array(
        "base_fare"=>(int)$base_fare,
        "st"=>date("d-m-y h:i:s",(int)$check_time[0]["start_time"]),
        "et"=>date("d-m-y h:i:s",(int)$check_time[0]["end_time"]),
        "af"=>(int)$addiotnal_fare,
        "wc"=>(int)$waiting_charge,
        "wt"=>$waiting_charge_time,
        (int)$trip_id,
        "total"=>(int)$total
    ))
    );
