<?php
/**
 * Created by PhpStorm.
 */

require_once "../autoload/autoload.php";
require_once  "../autoload/vendor/autoload.php";
$authy_api = new Authy\AuthyApi('ZbJFibgVFzs0YQP2xhahMoiGrU3SofHA');
$response=$authy_api->phoneVerificationCheck($input["phone_number"],$input["country_code"],$input["otp"]);
if ($response->ok()) {
    $i=insert(
        "INSERT into users (name,  status, phone, verified ) VALUES (?,?,?,?) ON DUPLICATE KEY UPDATE status = ?"
        ,
        array("sssss","","active",$input["rphone"],"true","true")
    );
    $ss=select("SELECT * from users WHERE phone = ?",array("s",$input["rphone"]));
    if ($ss[0]["name"]=="") {
        appError(true,"",array("intro"=>true));
    }
    appError(true,"",array("intro"=>false));
}
else {
    appError(false,"");
}