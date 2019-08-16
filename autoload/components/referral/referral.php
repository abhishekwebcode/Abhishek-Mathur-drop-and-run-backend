<?php
/**
 * Created by PhpStorm.
 */

class referral {
    public static function gerReferCode($user_name) {
        return self::getToken(12);
    }

    public static function getToken($length){
        $token = "";
        $codeAlphabet = "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);
        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
        return $token;
    }

    public static function addReferralCredit($refer_code,$user_new_phone) {
        $se=select(
            "SELECT * from users WHERE phone = ?",
            array("s",$user_new_phone)
        );
        if (sizeof($se)==0) {
            appError(false,"");
        }
        if ($se[0]["referred_by_code"]=="") {
            update("UPDATE users SET referred_by_code = ? WHERE phone = ?",
                array("ss",$refer_code,$user_new_phone)
            );
        }
    }

}


?>