<?php
/**
 * Created by PhpStorm.
 */

require_once "../autoload/autoload.php";
$update_query="UPDATE users set fcm_token = ? WHERE phone = ?";

$par=array("ss",$input["fcm_token"],$input["phone"]);
/*$re=update(
    "UPDATE users set fcm_token = ? WHERE phone=? ",
    $par
);*/

$re=update(
    "INSERT into users (fcm_token,phone) VALUES (?,?) ON DUPLICATE KEY UPDATE fcm_token = ?",
    array("sss",$input["fcm_token"],$input["phone"],$input["fcm_token"])
);
// INSERT INSTEAD
if (!$re) {
    $rr1=insert("INSERT into users (fcm_token,phone) VALUES (?,?)",$par);
}
echo json_encode(array(
    "success"=>$re||$rr1
));
die();
?>