<?php
/**
 * Created by PhpStorm.
 */


require_once "../autoload/autoload.php";
require_once "../autoload/vendor/autoload.php";

$account_sid = 'AC226e484c4f0e95173bcb56735abeb24e';
$auth_token = 'b52744b706a31b037e1929695a305083';
/*
try {
    $client = new Client($account_sid, $auth_token);

    $twilio->api->v2010->accounts->create();

} catch (\Twilio\Exceptions\ConfigurationException $e) {
    //appError(false,"CONTACT SUPPORT");
    echo $e->getMessage();
}


try {
    $messages = $client->accounts("AC226e484c4f0e95173bcb56735abeb24e")
        ->messages->create("+917834817092", array(
            'From' => "+16476960596",
            'Body' => 'Your shipment has started ... The OTP for drop of your goods is ' . "PIN HERE",
        ));
} catch (\Twilio\Rest\Api\V2010\Account\TwilioException $e) {
    //appError(false,"CONTACT SUPPORT");
    echo $e->getMessage();
}
*/
try {
    $client = new Twilio\Rest\Client($account_sid, $auth_token);
    $message = $client->messages->create(
        '+919958448040', // Text this number
        array(
            'from' => "+16476960596", // From a valid Twilio number
            'body' => 'Hello from Drop and RUn your otp is 8888!'
        )
    );

    print $message->sid;
} catch (\Twilio\Rest\Api\V2010\Account\TwilioException $e) {
    $err->messages[]=$e->getMessage();
}