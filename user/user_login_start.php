<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";
require_once  "../autoload/vendor/autoload.php";
$authy_api = new Authy\AuthyApi('ZbJFibgVFzs0YQP2xhahMoiGrU3SofHA');
$response=$authy_api->phoneVerificationStart($input["phone_number"],$input["country_code"]);
if ($response->ok()) {
    appError(true,"");
}
else {
    appError(false,"");
}
