<html>
<head>
	<link rel="stylesheet" href="../../css/style.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type='text/javascript' src='../../js/autofill.js'></script>
</head>
<body>
<h3>PayPal Hosted Checkout</h3>
<form action="processor.php" method="post">
	<div class="form-section">
		<label for="trxtype">Transaction Type</label>
		<select name="trxtype">
			<option value="S">Sale</option>
			<option value="A">Authorization</option>
		</select>
	</div>
	<div class="form-section">
		<label for="amount">Amount</label>
		<input type="text" name="amount" value="100"/>
	</div>
	<div class="form-section">
		<label></label>
		<input type="submit" value="Submit" />
	</div>
</form>