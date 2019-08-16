<?php
/**
 * Created by PhpStorm.
 */

require_once "../autoload/autoload.php";
$phone=$input["phone"];
$sel=select("SELECT name,email from users WHERE phone = ?",array("s",$phone));
if (sizeof($sel)!=0) {
    appError(true,"",($sel[0]));
}
appError(false,"",array());
?>