<html>
<head>
	<link rel="stylesheet" href="css/style.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type='text/javascript' src='js/autofill.js'></script>
</head>
<body>

<h1>PayPal API Tester</h1>

<div class="autofill-form">
	<a class="autofill">Autofill Form</a>
</div>

<form action="processor.php" method="post">
	<div class="input-field">
		<label for="">Payment Amount:</label>
		<input type="text" name="amount" id="amount"/>
	</div>
	<div class="input-field">
		<label for="">Credit Card Number:</label>
		<input type="text" name="cardnum" id="cardnum" />
	</div>
	<div class="input-field">
		<label for="">Expiration Month:</label>
		<input type="text" name="cardexpmonth" id="cardexpmonth" />
	</div>
	<div class="input-field">
		<label for="">Expiration Year:</label>
		<input type="text" name="cardexpyear" id="cardexpyear"/>
	</div>
	<div class="input-field">
		<label for="">Card CVV:</label>
		<input type="text" name="cvv" id="cvv"/>
	</div>
	<div class="input-field">
		<label for="">Name on Card (First):</label>
		<input type="text" name="cardfirstname"  id="cardfirstname"/>
	</div>
	<div class="input-field">
		<label for="">Name on Card (Last):</label>
		<input type="text" name="cardlastname"  id="cardlastname"/>
	</div>
	<div class="input-field">
		<label for="">Billing Address:</label>
		<input type="text" name="billaddress"  id="billaddress"/>
	</div>
	<div class="input-field">
		<label for="">Billing City:</label>
		<input type="text" name="billcity"  id="billcity"/>
	</div>
	<div class="input-field">
		<label for="">Billing State:</label>
		<input type="text" name="billstate"  id="billstate"/>
	</div>
	<div class="input-field">
		<label for="">Billing Zip:</label>
		<input type="text" name="billzip"  id="billzip"/>
	</div>
	<div class="input-field">
		<label for="">Method:</label>
		<select name="method">
			<option value="" class="default-select">--- Select a Method ---</option>
			<option value="DoDirectPayment">DoDirectPayment</option>
		</select>
	</div>
	<div class="input-field">
		<label for="">:</label>
		<input type="submit" value="Submit" />
	</div>

</form>

</body>
</html>