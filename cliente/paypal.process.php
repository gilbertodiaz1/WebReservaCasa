<?php
session_start();
include("includes/db.conn.php");
include("includes/conf.class.php");
include("includes/process.class.php");
include("includes/mail.class.php");
include_once("paypal.config.php");
include_once("paypal.class.php");

$paypalmode = ($PayPalMode == 'sandbox') ? '.sandbox' : '';

global $bsiCore;
global $bookprs;

if ($_POST) //Post Data received from product list page.
{

    $bsiCore->wLog('Comienzo armado de redireccion PayPal',$bsiCore::INFO,session_id());

    //Mainly we need 4 variables from product page Item Name, Item Price, Item Number and Item Quantity.

    //Please Note : People can manipulate hidden field amounts in form,
    //In practical world you must fetch actual price from database using item id. Eg:
    //$ItemPrice = $mysqli->query("SELECT item_price FROM products WHERE id = Product_Number");

    $ItemName       = $bookprs->itemName; //Item Name
    $ItemPrice      = $bookprs->totalPaymentAmount; //Item Price
    $ItemNumber     = $bookprs->bookingId; //Item Number
    $ItemDesc       = $bookprs->description; //Item Number
    $returnUrl      = $PayPalReturnURL; //Return Url page
    $cancelUrl      = $PayPalCancelURL; //Cancel URL if user clicks cancel
    $ItemQty        = 1; // Item Quantity
    $ItemTotalPrice = ($ItemPrice * $ItemQty); //(Item Price x Quantity = Total) Get total amount of product;

    //Other important variables like tax, shipping cost
    $TotalTaxAmount  = 0;  //Sum of tax for all items in this order.
    $HandalingCost   = 0;  //Handling cost for this order.
    $InsuranceCost   = 0;  //shipping insurance cost for this order.
    $ShippinDiscount = 0; //Shipping discount for this order. Specify this as negative number.
    $ShippinCost     = 0; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.

    //Grand total including all tax, insurance, shipping cost and discount
    $GrandTotal = ($ItemTotalPrice + $TotalTaxAmount + $HandalingCost + $InsuranceCost + $ShippinCost + $ShippinDiscount);

    $bsiCore->wLog('Comienzo armado de redireccion PayPal' . '[itemname]=' . $ItemName . '[itemprice]=' . $ItemPrice . '[itemnumber]=' . $ItemNumber . '[itemdesc]=' . $ItemDesc . '[returnUrl]=' . $returnUrl . '[cancelUrl]=' . $cancelUrl . '[GrandTotal]=' . $GrandTotal,$bsiCore::INFO,session_id());

    //Parameters for SetExpressCheckout, which will be sent to PayPal
    $padata = '&METHOD=SetExpressCheckout' .
        '&RETURNURL=' . urlencode($returnUrl) .
        '&CANCELURL=' . urlencode($cancelUrl) .
        '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .

        '&L_PAYMENTREQUEST_0_NAME0=' . urlencode($ItemName) .
        '&L_PAYMENTREQUEST_0_NUMBER0=' . urlencode($ItemNumber) .
        '&L_PAYMENTREQUEST_0_DESC0=' . urlencode($ItemDesc) .
        '&L_PAYMENTREQUEST_0_AMT0=' . urlencode($ItemPrice) .
        '&L_PAYMENTREQUEST_0_QTY0=' . urlencode($ItemQty) .

        '&NOSHIPPING=0' . //set 1 to hide buyer's shipping address, in-case products that does not require shipping

        '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) .
        '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($TotalTaxAmount) .
        '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($ShippinCost) .
        '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode($HandalingCost) .
        '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode($ShippinDiscount) .
        '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode($InsuranceCost) .
        '&PAYMENTREQUEST_0_AMT=' . urlencode($GrandTotal) .
        '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($PayPalCurrencyCode) .
        '&LOCALECODE=GB' . //PayPal pages to match the language on your website.
        //'&LOGOIMG=http://smartmarketer.com/wp-content/uploads/2014/03/logo.png' . //site logo
        '&CARTBORDERCOLOR=FFFFFF' . //border color of cart
        '&ALLOWNOTE=1';

    ############# set session variable we need later for "DoExpressCheckoutPayment" #######
    $_SESSION['ItemName'] = $ItemName; //Item Name
    $_SESSION['ItemPrice'] = $ItemPrice; //Item Price
    $_SESSION['ItemNumber'] = $ItemNumber; //Item Number
    $_SESSION['ItemDesc'] = $ItemDesc; //Item Number
    $_SESSION['ItemQty'] = $ItemQty; // Item Quantity
    $_SESSION['ItemTotalPrice'] = $ItemTotalPrice; //(Item Price x Quantity = Total) Get total amount of product;
    $_SESSION['TotalTaxAmount'] = $TotalTaxAmount;  //Sum of tax for all items in this order.
    $_SESSION['HandalingCost'] = $HandalingCost;  //Handling cost for this order.
    $_SESSION['InsuranceCost'] = $InsuranceCost;  //shipping insurance cost for this order.
    $_SESSION['ShippinDiscount'] = $ShippinDiscount; //Shipping discount for this order. Specify this as negative number.
    $_SESSION['ShippinCost'] = $ShippinCost; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
    $_SESSION['GrandTotal'] = $GrandTotal;


    //We need to execute the "SetExpressCheckOut" method to obtain paypal token
    $paypal = new MyPayPal();
    $httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

    //Respond according to message we receive from Paypal
    if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

        $bsiCore->wLog('Redireccionando hacia PayPal SetExpressCheckOut',$bsiCore::INFO,session_id());

        //Redirect user to PayPal store with Token received.
        $paypalurl = 'https://www' . $paypalmode . '.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=' . $httpParsedResponseAr["TOKEN"] . '';
        header('Location: ' . $paypalurl);

    } else {

        /*//Show error message
        echo '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
        echo '<pre>';
        print_r($httpParsedResponseAr);
        echo '</pre>';*/

        $bsiCore->wLog('Ocurrio un problema SetExpressCheckOut [CODIGO_ERROR]=' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]),$bsiCore::ERROR,session_id());
        header('Location: booking-failure.php?error_code=9');
    }

}

//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
if (isset($_GET["token"]) && isset($_GET["PayerID"])) {
    //we will be using these two variables to execute the "DoExpressCheckoutPayment"
    //Note: we haven't received any payment yet.

    $token = $_GET["token"];
    $payer_id = $_GET["PayerID"];

    //get session variables
    $ItemName = $_SESSION['ItemName']; //Item Name
    $ItemPrice = $_SESSION['ItemPrice']; //Item Price
    $ItemNumber = $_SESSION['ItemNumber']; //Item Number
    $ItemDesc = $_SESSION['ItemDesc']; //Item Number
    $ItemQty = $_SESSION['ItemQty']; // Item Quantity
    $ItemTotalPrice = $_SESSION['ItemTotalPrice']; //(Item Price x Quantity = Total) Get total amount of product;
    $TotalTaxAmount = $_SESSION['TotalTaxAmount'];  //Sum of tax for all items in this order.
    $HandalingCost = $_SESSION['HandalingCost'];  //Handling cost for this order.
    $InsuranceCost = $_SESSION['InsuranceCost'];  //shipping insurance cost for this order.
    $ShippinDiscount = $_SESSION['ShippinDiscount']; //Shipping discount for this order. Specify this as negative number.
    $ShippinCost = $_SESSION['ShippinCost']; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
    $GrandTotal = $_SESSION['GrandTotal'];

    $padata = '&TOKEN=' . urlencode($token) .
        '&PAYERID=' . urlencode($payer_id) .
        '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode("SALE") .

        //set item info here, otherwise we won't see product details later
        '&L_PAYMENTREQUEST_0_NAME0=' . urlencode($ItemName) .
        '&L_PAYMENTREQUEST_0_NUMBER0=' . urlencode($ItemNumber) .
        '&L_PAYMENTREQUEST_0_DESC0=' . urlencode($ItemDesc) .
        '&L_PAYMENTREQUEST_0_AMT0=' . urlencode($ItemPrice) .
        '&L_PAYMENTREQUEST_0_QTY0=' . urlencode($ItemQty) .

        '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) .
        '&PAYMENTREQUEST_0_TAXAMT=' . urlencode($TotalTaxAmount) .
        '&PAYMENTREQUEST_0_SHIPPINGAMT=' . urlencode($ShippinCost) .
        '&PAYMENTREQUEST_0_HANDLINGAMT=' . urlencode($HandalingCost) .
        '&PAYMENTREQUEST_0_SHIPDISCAMT=' . urlencode($ShippinDiscount) .
        '&PAYMENTREQUEST_0_INSURANCEAMT=' . urlencode($InsuranceCost) .
        '&PAYMENTREQUEST_0_AMT=' . urlencode($GrandTotal) .
        '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($PayPalCurrencyCode);

    //We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
    $paypal = new MyPayPal();
    $httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

    //Check if everything went ok..
    if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

        $bsiCore->wLog('Respuesta de PayPal DoExpressCheckoutPayment',$bsiCore::INFO,session_id());

        $bsiMail = new bsiMail();
        $emailContent = $bsiMail->loadEmailContent();
        $subject = $emailContent['subject'];

        $bsiCore->wLog('Actualizando reserva',$bsiCore::INFO,session_id());

        mysql_query("UPDATE bsi_bookings SET payment_success=true WHERE booking_id = " . $bookprs->bookingId);
        mysql_query("UPDATE bsi_clients SET existing_client = 1 WHERE email = '" . $bookprs->clientEmail . "'");

        $bsiCore->wLog('Reserva actualizada',$bsiCore::INFO,session_id());

        $emailBody = "Dear " . $bookprs->clientName . ",<br><br>";
        $emailBody .= $emailContent['body'] . "<br><br>";
        $emailBody .= $bookprs->invoiceHtml;
        $emailBody .= '<br><br>' . mysql_real_escape_string(PP_REGARDS) . ',<br>' . $bsiCore->config['conf_hotel_name'] . '<br>' . $bsiCore->config['conf_hotel_phone'];
        $emailBody .= '<br><br><font style=\"color:#F00; font-size:10px;\">[ ' . mysql_real_escape_string(PP_CARRY) . ' ]</font>';

        $returnMsg = $bsiMail->sendEMail($bookprs->clientEmail, $subject, $emailBody);

        if ($returnMsg == true) {

            $notifyEmailSubject = "Booking no." . $bookprs->bookingId . " - Notification of Room Booking by " . $bookprs->clientName;
            $notifynMsg = $bsiMail->sendEMail($bsiCore->config['conf_hotel_email'], $notifyEmailSubject, $bookprs->invoiceHtml);

        } else {
            //correo de que no se encio el correo de notificacion.
        }


        if ('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {
            echo '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
        } elseif ('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]) {
            echo '<div style="color:red">Transaction Complete, but payment is still pending! ' .
                'You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';
        }

        // we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
        // GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
        $padata = '&TOKEN=' . urlencode($token);
        $paypal = new MyPayPal();
        $httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

        if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

            echo '<br /><b>Stuff to store in database :</b><br /><pre>';

            echo '<pre>';
            print_r($httpParsedResponseAr);
            echo '</pre>';

        } else {
          /*  echo '<div style="color:red"><b>GetTransactionDetails failed:</b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
            echo '<pre>';
            print_r($httpParsedResponseAr);
            echo '</pre>';*/

            $bsiCore->wLog('Ocurrio un problema paos 3 invalidRequest [CODIGO_ERROR]=' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]),$bsiCore::ERROR,session_id());
            header('Location: booking-failure.php?error_code=9');

        }

        header('Location: booking-confirm.php?success_code=1');
        die;

    } else {

        /*echo '<div style="color:red"><b>Error : </b>' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]) . '</div>';
        echo '<pre>';
        print_r($httpParsedResponseAr);
        echo '</pre>';*/

        $bsiCore->wLog('Ocurrio un problema paos 3 invalidRequest [CODIGO_ERROR]=' . urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]),$bsiCore::ERROR,session_id());
        header('Location: booking-failure.php?error_code=9');

        die;
    }
}
?>
