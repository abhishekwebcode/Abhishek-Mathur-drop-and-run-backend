<?php
/**
 * Created by PhpStorm.
 */

$car_types=array(
    "Car",
    "Small Van",
    "Big Truck"
);
$pricing_on_car=array(
    "Car"
    =>array(
        "base"=>50,
        "additonal"=>1,
        "waiting"=>1
    ),
    "Small Van"
    =>array(
    "base"=>70,
    "additonal"=>3,
    "waiting"=>1
),
    "Big Truck"=>array(
        "base"=>90,
        "additonal"=>5,
        "waiting"=>1
    ),
);
/**
 * @param int $index
 * @return string
 * */
function getCarType($index) {
    global $car_types;
    try {
        return $car_types[$index];
    } catch (Exception $e) {
        return false;
    }
}
function isPOssible($type_wanted,$type) {
    return getCarType($type_wanted)>=getCarType($type);
}
function getCarIndex($type) {
    global $car_types;
    $index=array_search($type,$car_types);
    if ($index==null) {return false;}else {return $index;}
}
/**/
function getList($type_string) {
    global $car_types;
    $include=false;
    $types=array();
    foreach ($car_types as $car_type) {
        if ($car_type==$type_string) {
            $include=true;
        }
    }
}
