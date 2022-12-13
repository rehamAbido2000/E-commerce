<?php


require_once "./vendor/autoload.php";

use Omnipay\Omnipay;
 
define('CLIENT_ID', 'AdqG1j_ic7f8gd5wbL-HcRkBY3bcu0kZ6DXQ48EIvQ28i8Qec3buUTUi8OzICe90aU_3YfAahLmyjXk1');
define('CLIENT_SECRET', 'EE5WSoYs8hu0EnejpiqJwzhZFdHJtoC1pNQ1Ydq0JAPA73zzorOeI_L-Apq3ZqAjROa87aISrNRRAjTN');

define('PAYPAL_RETURN_URL', 'http://localhost/graduation_year/e-commerce/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/graduation_year/e-commerce/cancel.php');
define('PAYPAL_CURRENCY', 'USD'); // set your currency here

$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true); //set it to 'false' when go live