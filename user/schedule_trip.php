<?php
require_once "../autoload/autoload.php";


/*
 * array(8) {
      ["type_trip"]=>
      string(10) "Pickup Now"
      ["pin"]=>
      string(4) "1234"
      ["drop_latitude"]=>
      string(10) "28.6828038"
      ["drop_longitude"]=>
      string(10) "77.3656493"
      ["pickup_longitude"]=>
      string(9) "77.365579"
      ["type"]=>
      string(13) "Pallet Pickup"
      ["weight"]=>
      string(2) "12"
      ["pickup_latitude"]=>
      string(10) "28.6829332"
    }
*/
$trip_weight = $input["weight"];
$trip_pin = $input["pin"];
$trip_pickup_latitude = $input["pickup_latitude"];
$trip_pickup_longitude = $input["pickup_longitude"];
$trip_drop_latitude = $input["drop_latitude"];
$trip_drop_longitude = $input["drop_longitude"];
$trip_type_car = $input["car_type"];
$phone_of_user = $input["phone"];
$rec_phone = $input["rphone"];
/*
 * {"type_trip":"Pickup Now","pin":"0888","drop_latitude":"28.6828038","drop_longitude":"77.3656493","pickup_longitude":"77.3656493","type":"Pallet Pickup","weight":"8888","pickup_latitude":"28.6828038"}
 * */
$check = select("SELECT * FROM drivers WHERE  max_weight >= ? ", array("s", $trip_weight));
if (sizeof($check) == 0) {
    appError(
        false,
        "No suitable drivers found"
    );
} else {
    $trip_obj = insert(
        "INSERT INTO trips_meta (
reciepient_phone,user_id,pickup_latitude,pickup_longitude,drop_latitude,drop_longitude,status,time_created_php,car_type,weight,pin
)
VALUES (?,?,?,?,?,?,?,?,?,?,?)"
        , array("sssssssssii", $rec_phone, $phone_of_user, $trip_pickup_latitude, $trip_pickup_longitude, $trip_drop_latitude, $trip_drop_longitude, TRIP_STATUSES::$TRIP_SCHEDULED, strval(gettimeofday()["sec"]), $trip_type_car, (int)$trip_weight, (int)$trip_pin)
    );
    $newTripid = $mysqli->insert_id;

    /*pushToMany($fcm_ids_of_drivers,"New Shipment Request","You have a new shipment request",array_merge(
        array("trip_id"=>$newTripid),$input
    )
    );*/
    appError(true, "Your Booking has been scheduled", array("trip_id" => $newTripid, "i" => $input));
}
?>