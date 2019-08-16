<?php
/**
 * Created by PhpStorm.
 */

require_once "../autoload/autoload.php";
$phone=$input["phone"];
$sel=select("SELECT name,email from drivers WHERE phone = ?",array("s",$phone));
if (sizeof($sel)==0) {
    appError(true,"",array($sel[0]));
}
