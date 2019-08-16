<?php
/**
 * Created by PhpStorm.
 */

require_once "../autoload/autoload.php";
$phone=$input["phone"];
$email=$input["email"];
$u=update("UPDATE users SET email = ? WHERE phone = ?",array("ss",$email,$phone));
appError(boolval($u),"");
?>