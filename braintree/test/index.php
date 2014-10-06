<html>
<head>
</head>
<body>
<h1>Braintree Customer Create Form</h1>
<form action="customer.php" method="POST" id="braintree-payment-form">
	<h2>Customer Information</h2>
	<p>
		<label>First Name</label>
		<input type="text" name="first_name" id="first_name" />
	</p>
	<p>
		<label for="last_name">Last Name</label>
		<input type="text" name="last_name" id="last_name" />
	</p>
	<p>
		<label for="postal_code">Postal Code</label>
		<input type="text" name="postal_code" id="postal_code" />
	</p>
	<h2>Credit Card</h2>
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
		<input type="text" size="2" data-encrypted-name="month" /> / <input type="text" size="4" data-encrypted-name="year" />
	</p>
	<input class="submit-button" type="submit" />
</form>
<script type="text/javascript" src="https://js.braintreegateway.com/v1/braintree.js"></script>
<script type="text/javascript">
	var braintree = Braintree.create("MIIBCgKCAQEAwoWvBqiuyu+Nsm686JSVfDhTvUmbWvvlBj3iIdCOsmmh+eVROjv4BN+ewp/qC1q+RDcsRr8/lfQ075sYBsEx44BEmR6hsea+Dz1R09U1nQGEDh9CW7IU6zSEO3fWNFuJnzhw78yYEljobXZqQ4WHCrF/ER9uqJ3jUVYeBxOM7aMkTX/bEgrjgiREz9/kGcNi83RorF7MXKL7lPWtPU4SK9fk/PUBZTWX1U8DD4jJVrWnsu+N3w5FYbKPcR6AKousyRw+rjXe+fLKBOp66gU730jl0/qBiQrpmjrVjPzDeA8RezloTO/VdLAdVFHX24o8NtokkQiKrWXvwP/5UOW64QIDAQAB");
	braintree.onSubmitEncryptForm("braintree-payment-form");
</script>
</body>
</html>