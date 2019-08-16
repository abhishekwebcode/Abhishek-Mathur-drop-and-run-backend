<?php
/**
 * Created by PhpStorm.
 */
require_once "../autoload/autoload.php";

$query="SELECT * from drivers WHERE phone=?";
$par=array("s",$input["phone-number"]);
$ans=select($query,$par);
if (!$ans) {
    echo json_encode(
        array(
            "success"=>false,
            "message"=>"Error logging you in"
        )
    );die();
}
if (sizeof($ans)==0) {
    echo json_encode(
        array(
            "success"=>false,
            "message"=>"You are not registered"
        )
    );
    die();
}
else {
    echo json_encode(
        array(
            "success"=>true
        )
    );
    die();
}