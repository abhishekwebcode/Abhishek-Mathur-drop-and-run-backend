<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";
require_once  "../autoload/vendor/autoload.php";
$select=select("SELECT * from drivers WHERE phone = ?",array("s",$input["input"]));
if (sizeof($select)==0) {
    appError(false,"Your Number is either not approved or you have not applied",array("no"=>true));
}
if ($select[0]["status"]!="active") {
    appError(false,"Your Application is on hold",array("hold"=>true));
}
$authy_api = new Authy\AuthyApi('kPEgCKTcEkfyIASJ8qLeLlO2m8HqPQTE');
$response=$authy_api->phoneVerificationStart($input["phone_number"],$input["country_code"]);
if ($response->ok()) {
    appError(true,"");
}
else {
    appError(false,"OTP couldn't be sent",array("otp"=>false));
}
