<?php
/**
 * Created by PhpStorm.
 */

function appError($success,$message,$data=array(),$term=true ) {
    echo json_encode(
        array(
            "success"=>$success,
            "message"=>$message,
            "data"=>$data
        )
    );
    if ($term) {
        die();
    }
}

class err  {
    public $success;
    public $messages=array();
    public function __construct()
    {
        $this->success=false;
    }
}
$err=new err();
function appErrorfromErr() {
    global $err;
    appError($err->success,"Unable to complete request",$err->messages);
}