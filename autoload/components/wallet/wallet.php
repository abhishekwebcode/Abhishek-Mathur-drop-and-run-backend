<?php
/**
 * Created by PhpStorm.
 */
require_once "../../autoload.php";

class wallet
{
    public $wallet_data = array();
    public $phone;

    public function __construct($user_phone)

    {
        $this->phone = $user_phone;

    }

    public function showBalance()
    {
        $select = select(
            "SELECT * FROM wallet WHERE user_id = ? ",
            array("s", $this->phone)
        );
        if (sizeof($select) == 0) {
            appError(false, "User Not found");
        } else {
            appError(true, "Balance Found", array("balance" => $select[0]["balance"]));
        }
    }

    /**
     * @param $amount
     */
    public function start_add($amount,$type,$purpose)
    {
        $amount=($type=="debit")?(((int)$amount)*-1):(int)$amount;
        update("UPDATE wallet SET balance=balance+? WHERE user_phone = ?",
            array("is",$amount,$this->phone)
        );
        insert("INSERT into wallet_transcation_user ( user_phone, type, amount, purpose) VALUES (?,?,?,?) "
        ,array(
            "ssis",$this->phone,$type,$amount,$purpose
            )
        );
    }

    public function trip_action($amount, $trip_id)
    {

    }



    /*
     * @return float|boolean
     */
    public function getBalance()
    {
        $select = select(
            "SELECT * FROM wallet WHERE user_phone = ? ",
            array("s", $this->phone)
        );
        if (sizeof($select) == 0) {
            return false;
        } else {
            return (float)$select[0]["balance"];
        }
    }

    public function getTranscations() {
        $select = select(
            "SELECT * FROM wallet_transcation_user WHERE user_phone = ? ",
            array("s", $this->phone)
        );
        if (sizeof($select) == 0) {
            return false;
        } else {
            return $select;
        }
    }

}