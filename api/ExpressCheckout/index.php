
<html>
<head>
	<link rel="stylesheet" href="../../css/style.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type='text/javascript' src='../../js/autofill.js'></script>
</head>
<body>
<h1>Express Checkout</h1>
<div class="pp-button">
	<form action="processor.php" method="post">
		<div class="form-section">
			<label>Total Amount</label>
			<input type="text" name="amount" />
		</div>
		<input type="submit"/>
	</form>


	<img src="https://www.paypal.com/en_US/i/logo/PayPal_mark_37x23.gif" align="left" style="margin-right:7px;"><span style="font-size:11px; font-family: Arial, Verdana;">The safer, easier way to pay.</span>
</div>
</body>
</html>