
<html>
<head>

	<link rel="stylesheet" href="../../css/style.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type='text/javascript' src='../../js/autofill.js'></script>

</head>
<body>
<form action="processor.php" method="post">
	<div class="form-section">
		<label for="fname">First Name</label>
		<input type="text" name="fname" value="Johnny"/>
	</div>
	<div class="form-section">
		<label for="lname">Last Name</label>
		<input type="text" name="lname" value="Walker"/>
	</div>
	<div class="form-section">
		<label for="street">Street</label>
		<input type="text" name="street" value="927 N Palm Drive"/>
	</div>
	<div class="form-section">
		<label for="city">City</label>
		<input type="text" name="city" value="Scottsdale"/>
	</div>
	<div class="form-section">
		<label for="state">State</label>
		<input type="text" name="state" value="Arizona"/>
	</div>
	<div class="form-section">
		<label for="zip">Zip</label>
		<input type="text" name="zip" value="85251"/>
	</div>
	<div class="form-section">
		<label for="amount">Amount</label>
		<input type="text" name="amount" value="49.99"/>
	</div>
	<div class="form-section">
		<label for="ctype">Card Type</label>
		<input type="text" name="ctype" value="Visa"/>
	</div>
	<div class="form-section">
		<label for="cardnum">Card Number</label>
		<input type="text" name="cardnum" value="4556395726008141"/>
	</div>
	<div class="form-section">
		<label for="expmonth">Expiration Month</label>
		<input type="text" name="expmonth" value="04"/>
	</div>
	<div class="form-section">
		<label for="expyear">Expiration Year</label>
		<input type="text" name="expyear" value="19"/>
	</div>
	<div class="form-section">
		<label for="cvv">CVV</label>
		<input type="text" name="cvv" value="458"/>
	</div>
	<div class="form-section">
		<label for="tender">Tender</label>
		<select name="tender">
			<option value="A">A - Automated Clearinghouse</option>
			<option value="C" selected>C - Credit Card</option>
			<option value="D">D - Pinless Debit</option>
			<option value="K">K - Telecheck</option>
			<option value="P">P - PayPal</option>
		</select>
	</div>
	<div class="form-section">
		<label for="trxtype">Transaction Type</label>
		<select name="trxtype">
			<option value="S" selected>S - Sale Transaction</option>
			<option value="C">C - Credit</option>
			<option value="A">A - Authorization</option>
			<option value="D">D - Delayed Capture</option>
			<option value="V">V - Void</option>
			<option value="F">F - Voice Authorization</option>
			<option value="I">I - Inquiry</option>
			<option value="N">N - Duplicate Transaction</option>
		</select>
	</div>
	<div class="form-section">
		<label for=""></label>
		<input type="submit" value="Submit" />
	</div>
</form>
</body>
</html>