<?php
//usefull link
// https://www.codexworld.com/paypal-standard-payment-gateway-integration-php/


  echo "<h1>PayPal Standard Payment Gateway Integration in PHP</h1><br>";

//Include DB configuration file
include "dbConfig.php";
//------------------------------------------------------------------------------------------------

//Set useful variables for paypal form
 $paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
//$paypalURL = 'https://www.paypal.com/cgi-bin/webscr'; //Test PayPal API URL


$paypalID = 'profwork.sp18-facilitator@gmail.com'; //Business Email

//Fetch products from the database


$result = $db->query("SELECT * FROM products");

while($row = $result->fetch_assoc()){
    ?>

<img width="300px" src="assets/images/<?php echo $row['image'];?>" alt=""/>
<br>
Name:<?php echo $row['name'];?><br>
Price:<?php echo $row['price'];?><br>


<form action="<?php echo $paypalURL; ?>" method="post">
 <!-- Identify your business so that you can collect the payments. -->
<input type="hidden" name="business" value="<?php echo $paypalID;?>">
 <!-- Specify a Buy Now button. -->
<input type="hidden" name="cmd" value="_xclick">

 <!-- Specify details about the item that buyers will purchase. -->
 <input type="hidden" name="item_name" value="<?php echo $row['name'];?>">
 <input type="hidden" name="item_number" value="<?php echo $row['id'];?>">
 <input type="hidden" name="amount" value="<?php echo $row['price'];?>">
 <input type="hidden" name="currency_code" value="USD">
 <!-- Specify URLs -->
 <input type="hidden" name="cancel_return" value="cancel.php">
 <input type="hidden" name="return" value="success.php">
 <input type='hidden' name='notify_url' value='ipn.php'>
<!-- Display the payment button. -->
<input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">

<img src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" alt="" border="0" width="1" height="1" >
</form>
<?php
}
?>
