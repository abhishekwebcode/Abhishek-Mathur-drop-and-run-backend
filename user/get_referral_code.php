<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";
$phone=$input["phone"];
$s=select("SELECT * from users WHERE phone = ?",array("s",$phone));
if (sizeof($s)!=0) {
    appError(true,$s[0]["referral_code"]);
}
?>