<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} //PHP >= 5.4.0

$PayPalMode = 'sandbox'; // sandbox or live
$PayPalApiUsername = 'jose.gilbertopinto-facilitator_api1.gmail.com'; //PayPal API Username
$PayPalApiPassword = 'FW5L48HBYHBT8VY4'; //Paypal API password
$PayPalApiSignature = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AE0ZIWnV9Fx5vXITxQoyYf2BxNZV'; //Paypal API Signature
$PayPalCurrencyCode = 'USD'; //Paypal Currency Code
$PayPalReturnURL = 'http://localhost/paypal/process.php'; //Point to process.php page
$PayPalCancelURL = 'http://localhost/paypal/cancel_url.php'; //Cancel URL if user clicks cancel
?>
