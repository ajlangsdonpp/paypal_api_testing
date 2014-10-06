<html>
<head>
</head>
<body>
<h1>Braintree Credit Card Transaction Form</h1>
<form action="transaction.php" method="POST" id="braintree-payment-form">
	<p>
		<label>Card Number</label>
		<input type="text" size="20" autocomplete="off" data-encrypted-name="number" />
	</p>
	<p>
		<label>CVV</label>
		<input type="text" size="4" autocomplete="off" data-encrypted-name="cvv" />
	</p>
	<p>
		<label>Expiration (MM/YYYY)</label>
		<input type="text" size="2" name="month" /> / <input type="text" size="4" name="year" />
	</p>
	<input type="submit" id="submit" />
</form>
<script type="text/javascript" src="https://js.braintreegateway.com/v1/braintree.js"></script>
<script type="text/javascript">
	var braintree = Braintree.create("79x88jnfjbrrghv3");
	braintree.onSubmitEncryptForm('braintree-payment-form');
</script>
</body>
</html>