<html>
<head>

	<link rel="stylesheet" href="../../css/style.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type='text/javascript' src='../../js/autofill.js'></script>

</head>
<body>
<form action="processor.php" method="post">
	<div class="form-section">
		<label for="action">Amount</label>
		<input type="text" name="amount" value="39.99"/>
	</div>
	<div class="form-section">
		<label for="action">Action</label>
		<select name="action">
			<option value="S" selected>SetExpressCheckout</option>
			<option value="G">GetExpressCheckoutDetails</option>
			<option value="D">DoExpressCheckoutPayment</option>
		</select>
	</div>
	<div class="form-section">
		<label for="trxtype">Transaction Type</label>
		<select name="trxtype">
			<option value="S" selected>Sale</option>
			<option value="A">Authorization</option>
			<option value="O">Order</option>
		</select>
	</div>
	<div class="form-section">
		<label for=""></label>
		<input type="submit" value="Submit" />
	</div>
</form>
</body>
</html>