<?php
/**
 * Created by PhpStorm.
 */


require_once "../autoload/autoload.php";
require_once  "../autoload/vendor/autoload.php";
$authy_api = new Authy\AuthyApi('kPEgCKTcEkfyIASJ8qLeLlO2m8HqPQTE');
$response=$authy_api->phoneVerificationCheck($input["phone_number"],$input["country_code"],$input["otp"]);
if ($response->ok()) {
    $phone_string="(+".strval($input["country_code"]).")".$input["phone_number"];
    $i=update("UPDATE drivers SET verified = ? WHERE phone = ?",array("ss","verified",$phone_string));
    appError(true,"");
}
else {
    appError(false,"");
}