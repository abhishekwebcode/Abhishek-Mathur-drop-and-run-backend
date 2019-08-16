<?php

/**
 * Created by PhpStorm.
 */
class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
    }

    public function getDriver($offset=0) {
        $s=select(
            "SELECT * from drivers LIMIT 10 OFFSET  ?",
            array("i",$offset)
        );
        appError(true,"",$s);
    }


    public function getUser($offset=0) {
        $s=select(
            "SELECT * from users LIMIT 10 OFFSET  ?",
            array("i",$offset)
        );
        appError(true,"",$s);
    }

    public function getTrip($offset=0) {
        $s=select(
            "SELECT * from trips_meta LIMIT 10 OFFSET  ?",
            array("i",$offset)
        );
        appError(true,"",$s);
    }

    public function getApplication($offset=0) {
        $s=select(
            "SELECT * from submissions LIMIT 10 OFFSET  ?",
            array("i",$offset)
        );
        appError(true,"",$s);
    }

    public function approveDriver($driver_id) {
        $driver_get_array=select("
        SELECT * from submissions where id = ?
        ",array("i",(int)$driver_id));
        if (sizeof($driver_get_array)==0) {
            appError(false,"Driver not found");
        }
        $driver_get_array=$driver_get_array[0];
        $this->load->model("country");
        $countryCode=$this->country->getCode($driver_get_array["country"]);
        $phone="(+".$countryCode.")".$driver_get_array["mobile"];


        $rrt=insert("INSERT into drivers (name, status, car_type, max_weight, email,  phone, online,verified)
VALUES  (?,?,?,?,?,?,?,?)
           "
        ,array("ssssssss",$driver_get_array["fname"]." ".$driver_get_array["lname"],"active",$driver_get_array["type"],"not defined",$driver_get_array["email"],$phone,"offline","unverified")
        );
        $rrt1=update("INSERT into driver_approved SELECT * from submissions WHERE id = ?",array("i",(int)$driver_id));
        $rrt2=update("DELETE from submissions WHERE id = ?",array("i",(int)$driver_id));
        appError(true,"");
    }

}