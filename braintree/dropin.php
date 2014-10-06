<html>
<head>
	<script src="https://js.braintreegateway.com/v2/braintree.js"></script>
</head>
<body>

<?php
require_once 'environment.php';
$clientToken = Braintree_ClientToken::generate();
?>

<form id="checkout" method="post" action="checkout.php">
	<div id="dropin"></div>
	<input type="text" name="amount" placeholder="Amount" />
	<input type="text" name="fname" placeholder="First Name" />
	<input type="text" name="lname" placeholder="Last Name" />
	<input type="text" name="street" placeholder="Street" />
	<input type="text" name="city" placeholder="City" />
	<input type="text" name="state" placeholder="State" />
	<input type="text" name="zip" placeholder="Zip" />
	<input type="submit" value="Pay Now" >
</form>

<script>
	braintree.setup("<?php echo $clientToken; ?>", 'dropin', {
		container: 'dropin'
	});</script>

</body>
</html>