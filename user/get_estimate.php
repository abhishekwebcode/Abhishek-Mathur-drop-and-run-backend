<?php
/**
 * Created by PhpStorm.
 */

require_once "../autoload/autoload.php";
$distance=(doubleval($input["distance"]));
$car_type=strval($input["car_type"]);
$price_estimate_ref=$pricing_on_car[$car_type];
$add_distance=$distance-5000>0?$distance-5000:0;
$pr_Est=(double)$price_estimate_ref["base"]+$price_estimate_ref["additonal"]*$add_distance;
appError(true,"",array(
    "base"=>(double)$price_estimate_ref["base"],
    "add"=>(double)$price_estimate_ref["additonal"]*$add_distance,
    "total"=>$pr_Est
));