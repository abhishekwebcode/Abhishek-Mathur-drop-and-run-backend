<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";
require_once "../autoload/components/referral/referral.php";
$user_phone=$input["phone"];

$up=update(
    "UPDATE users SET name = ? , email = ? ,referred_by_code = ? ,referral_code = ? WHERE phone = ?",
    array("sssss",$input["name"],$input["email"],$input["referral_by_code"],referral::gerReferCode($user_phone),$user_phone)
);
if ($up) {
    referral::addReferralCredit($input["referral_by_code"],$user_phone);
    appError(true,"UPDATED",array());
} else {
    appError(false,"unable to update",array());
}
