<?php
include_once("config.php");
?>

<form method="post" action="process.php">
    <input type="hidden" name="itemname" value="AlienWare"/>
    <input type="hidden" name="itemnumber" value="10000"/>
    <input type="hidden" name="itemdesc" value="Lorem ipsum dolor sit amet."/>
    <input type="hidden" name="itemprice" value="3500"/>
    <input type="hidden" name="returnUrl" value="http://localhost:8080/paypal/process.php"/>
    <input type="hidden" name="cancelUrl" value="http://localhost:8080/paypal/cancel.php"/>
    Quantity : <select name="itemQty">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
    <input class="dw_button" type="submit" name="submitbutt" value="Buy"/>
</form>
