<?php

$mysqli=new mysqli("mm.caompsumt9ml.ap-south-1.rds.amazonaws.com","yJcC91xR4YVyTWSS","sgMEviMEWYIz7XdF907JeUV8wUo8FgotawPsxl7d","dropandrun");
function refValues($arr){
    if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
    {
        $refs = array();
        foreach($arr as $key => $value)
            $refs[$key] = &$arr[$key];
        return $refs;
    }
    return $arr;
}
function select($query,$param_array) {
    global $mysqli;
    $stmt = $mysqli->prepare($query);
    if (!$stmt) {return false;}
    call_user_func_array(array($stmt,"bind_param"),refValues($param_array));
    if (!$stmt) {return false;}
    $stmt->execute();
    if (!$stmt) {return false;}
    $meta = $stmt->result_metadata();
    while ($field = $meta->fetch_field()) {
        $parameters[] = &$row[$field->name];
    }
    call_user_func_array(array($stmt, 'bind_result'), $parameters);
$results=[];
    while ($stmt->fetch()) {
        foreach($row as $key => $val) {
            $x[$key] = $val;
        }
        $results[] = $x;
    }
    /*if (!$results) {
        return false;
    }*/
    return $results;
}
function insert($query,$params) {
    global $mysqli;
    $query1=$mysqli->prepare($query);
    if (!$query1) {return false;}
    call_user_func_array(array($query1,"bind_param"),refValues($params));
    $result=$query1->execute();
    if (!$result) {return false;}
    return $result;
}
/**
 * @param string $query
 * @param array $params
 * @return boolean|mysqli_result
 * */
function update($query,$params) {
    global $mysqli;
    $query1=$mysqli->prepare($query);
    if (!$query1) {return false;}
    call_user_func_array(array($query1,"bind_param"),refValues($params));
    if (!$query1) {return false;}
    $result=$query1->execute();
    if (!$result) {return false;}
    return $result;
}

//$ans=select("Select * from dropandrun.drivers WHERE fcm_id = ?",array("s",""));
/*var_dump(
    update(
        "UPDATE drivers set fcm_id=? WHERE phone = ?",
    array("ss","new fcm id","33")
    )
);*/
?>