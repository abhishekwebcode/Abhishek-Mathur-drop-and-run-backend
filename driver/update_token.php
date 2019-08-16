<?php
/**
 * Created by PhpStorm.
 */

require_once "../autoload/autoload.php";
$update_query="UPDATE drivers set fcm_id = ? WHERE phone = ?";

$par=array("ss",$input["fcm_token"],$input["phone"]);
/*$re=update(
    "UPDATE drivers set fcm_id = ? WHERE phone=? ",
    $par
);*/


$re=update(
    "UPDATE drivers SET fcm_id = ? WHERE phone = ?",
    array("ss",$input["fcm_token"],$input["phone"])
);

echo json_encode(array(
    "success"=>boolval($re)
));
die();
?>