<?php

/**
 * Created by PhpStorm.
 */

require_once "../autoload/autoload.php";
require_once "../autoload/vendor/autoload.php";

$account_sid = 'AC226e484c4f0e95173bcb56735abeb24e';
$auth_token = 'b52744b706a31b037e1929695a305083';

use Twilio\Rest\Client;

$trip_id = $input["tri_ref"];
$driver_id = $input["driver_phone"];
$check_time = select(
    "SELECT * FROM trips_meta WHERE id = ? ",
    array(
        "i", (int)$trip_id
    )
);
if (sizeof($check_time) == 0) {
    echo json_encode(
        array(
            "success" => false,
            "message" => "The trip was not found"
        )
    );
    die();
}
if ($check_time[0]["status"] != TRIP_STATUSES::$TRIP_CREATED) {
    echo json_encode(
        array(
            "success" => false,
            "message" => "The trip has already been assigned",
            "assigned"=>true
        )
    );
    die();
}
$recc = $check_time[0]["reciepient_phone"];
$ee = explode(")", $recc);
$ee1 = explode("(", $ee[0]);
$country_code_rec = explode("+", $ee1[1])[1];
$phone_main_rec = $ee[1];

try {
    $client = new Twilio\Rest\Client($account_sid, $auth_token);
    $message = $client->messages->create(
        "+".$country_code_rec.$phone_main_rec, // Text this number
        array(
            'from' => "+16476960596", // From a valid Twilio number
            'body' => 'Hello , your shipment has started. Your OTP for receiving shipment is '.$check_time[0]["pin"]
        )
    );

} catch (\Twilio\Rest\Api\V2010\Account\TwilioException $e) {
    $err->messages[]=$e->getMessage();
} catch (\Twilio\Exceptions\ConfigurationException $e) {
    $err->messages[]=$e->getMessage();
}
catch (\Twilio\Exceptions\RestException $e) {
    $err->messages[]=$e->getMessage();
}
catch (Exception $e) {
    $err->messages[]=$e->getMessage();
}


$trip_start = (int)$check_time[0]["time_created_php"];
$now = gettimeofday()["sec"];
if (($now - $trip_start > 60) && false) {
    appError(false, "Trip timed out");
} else {
    update("UPDATE trips_meta SET status = ? , driver_id = ? WHERE id = ?", array("ssi", "started", $driver_id, (int)$trip_id));
    select("SELECT * FROM drivers WHERE id=?", array("i", (int)$driver_id));
    $user_id = $check_time[0]["user_id"];
    $user_token = select("SELECT fcm_token FROM users WHERE phone = ?", array("s", $user_id));
    $token_of_user = $user_token[0]["fcm_token"];
    basic_fcm(array("to" => ($token_of_user), "data" => array(
        "trip_update" => $trip_id,
        "status" => "Picking Up...",
        "driver_phone" => $driver_id
    )));
    basic_fcm(array("to" => "/topics/driver", "data" =>
        array(
            "trip_id"=>$trip_id,
            "trip_status"=>"assigned",
            "assigned"=>"true"
        )
    ));
    appError(true, "Starting trip", $check_time[0]);
}
