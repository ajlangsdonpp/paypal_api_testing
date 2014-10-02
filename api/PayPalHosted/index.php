<html>
<head>
	<link rel="stylesheet" href="../../css/style.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type='text/javascript' src='../../js/autofill.js'></script>
</head>
<body>
<h3>PayPal Hosted Checkout</h3>
<form action="https://www.sandbox.paypal.com/acquiringweb?cmd=_hosted-payment" method="post">
	<input type="hidden" name="cmd" value="_hosted-payment" />
	<div class="form-section">
		<label for="cvv">Subtotal</label>
		<input type="text" name="subtotal" value="100"/>
	</div>
	<input type="hidden" name="business" value="AATJ9KCSEGBHE" />
	<div class="form-section">
		<label for="paymentaction">Action</label>
		<input type="hidden" name="paymentaction" value="sale" />
		<!--<select name="paymentaction">
			<option value="sale" selected>Sale</option>
			<option value="authorize">Authorize</option>
		</select>-->
	</div>
	<input type="hidden" name="return" value="http://api.local/api/PayPalHosted/return.php" />
	<div class="form-section">
		<label for=""></label>
		<input type="submit" value="Submit" name="METHOD" />
	</div>
</form>