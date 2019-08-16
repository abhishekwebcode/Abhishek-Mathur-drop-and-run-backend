<?php
/**
 * Created by PhpStorm.
 */

require_once "../autoload/autoload.php";
$phone=$input["phone"];
$email=$input["email"];
$name=$input["name"];
$u=update("UPDATE users SET name = ? , email = ? WHERE phone = ?",array("sss",$name,$email,$phone));
appError(boolval($u),"");
?>