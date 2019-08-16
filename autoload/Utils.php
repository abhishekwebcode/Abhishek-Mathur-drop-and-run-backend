<?php
/**
 * @return false|string
 */
function now()
{
    return date("Y:m:d:H:i:s");
}
date_default_timezone_set('Canada/Eastern');
function distance($lat1, $lon1, $lat2, $lon2, $unit) {

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
}
/**
 * @param string $dt
 * @return DateTime
 */
function build_date($dt)
{
    return DateTime::createFromFormat('Y:m:d:H:i:s', $dt);
}

function basic_fcm($json)
{
    $json["delay_while_idle"]=false;
    $json["content_available"]=true;
    $json["priority"]="high";

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
        CURLOPT_RETURNTRANSFER => true, 
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($json),
        CURLOPT_HTTPHEADER => array(
            "Authorization: key=YOUR FCM KEY",
            "Content-Type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return false;
    } else {
        return $response;
    }
}