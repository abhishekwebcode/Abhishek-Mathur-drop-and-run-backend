<?php
/**
 * Created by PhpStorm.
 */
$input=array();
foreach ($_POST as $item=>$value) {
    global $input;
    $input[$item]=$value;
}
/**
 * @param string $string
 * @param int $type
 * @return bool
*/
function validate_String($string,$type) {
    return filter_var($string,$type);
}
