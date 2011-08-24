<?php
error_reporting(E_ALL);
include_once($_SERVER['DOCUMENT_ROOT'].'/catalog.php');
?>

<!DOCTYPE HTML>  

<head>
    <meta charset="utf-8">
    
    <title>Shopping Cart - Checkout</title>
    <meta name="description" content="">
    <meta name="author" content="">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico">
    
    <link rel="stylesheet" href="../css/global.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.js"></script>
</head>



<body>
	
<!-- <h1>Checkout</h1> -->

<section class="checkout">
	<p>Please enter your information below</p>
	<form action="" method="post" id="customer-info" name="customer-info">
		<fieldset class="shipping">
			<legend>Shipping</legend>
			
			<label for="customer-first-name">First Name</label><br />
			<input type="text" id="customer-first-name"/><br />

			<label for="customer-last-name">Last Name</label><br />
			<input type="text" id="customer-last-name"/><br />

			<label for="customer-email">Email</label><br />
			<input type="text" id="customer-email"/><br />

			<label for="customer-address-1">Address 1</label><br />
			<input type="text" id="customer-address-1"/><br />

			<label for="customer-address-2">Address 2</label><br />
			<input type="text" id="customer-address-2"/><br />

			<label for="customer-city">City</label><br />
			<input type="text" id="customer-city"/><br />

			<label for="customer-state">State</label><br />
			<input type="text" id="customer-state"/><br />

			<label for="customer-zip">Zip</label><br />
			<input type="text" id="customer-zip"/><br />
		</fieldset>
		
		<fieldset class="billing">
			<legend>Billing</legend>
			
			<label for="customer-billing-address-1">Address 1</label><br />
			<input type="text" id="customer-billing-address-1"/><br />

			<label for="customer-billing-address-2">Address 2</label><br />
			<input type="text" id="customer-billing-address-2"/><br />

			<label for="customer-billing-city">City</label><br />
			<input type="text" id="customer-billing-city"/><br />

			<label for="customer-billing-state">State</label><br />
			<input type="text" id="customer-billing-state"/><br />

			<label for="customer-billing-zip">Zip</label><br />
			<input type="text" id="customer-billing-zip"/><br />
			
			<label for="customer-credit-card-number">Credit Card Number</label><br />
			<input type="text" id="customer-credit-card-number"/><br />
			
			<label for="customer-credit-card-type">Credit Card Type</label><br />
			<input type="text" id="customer-credit-card-type"/><br />
		</fieldset>		
		
		<input type="submit" id="checkout" name="checkout" value="Complete purchase"/>
	</form>
</section>
  
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/cart.inc.php'; ?>


    
<!-- scripts -->          
<script src="js/core.js"></script>
</body>
</html>