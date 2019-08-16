<?php
/**
 * Created by PhpStorm.
 */

require_once "../autoload/autoload.php";
require_once "../autoload/components/wallet/wallet.php";
$phone=$input["phone"];
$w=new wallet($phone);
$w->showBalance();
?>