
<html>
<head>

	<link rel="stylesheet" href="css/style.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type='text/javascript' src='js/autofill.js'></script>

</head>
<body>
<form action="processor.php" method="post">
	<div class="form-section">
		<label for="fname">First Name</label>
		<input type="text" name="fname" value="Sammy"/>
	</div>
	<div class="form-section">
		<label for="lname">Last Name</label>
		<input type="text" name="lname" value="Samuelson"/>
	</div>
	<div class="form-section">
		<label for="street">Street</label>
		<input type="text" name="street" value="816 E Vista Court"/>
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
		<label for="ctype">Card Type</label>
		<input type="text" name="ctype" value="Visa"/>
	</div>
	<div class="form-section">
		<label for="cardnum">Card Number</label>
		<input type="text" name="cardnum" value="4916583558988234"/>
	</div>
	<div class="form-section">
		<label for="expmonth">Expiration Month</label>
		<input type="text" name="expmonth" value="04"/>
	</div>
	<div class="form-section">
		<label for="expyear">Expiration Year</label>
		<input type="text" name="expyear" value="2019"/>
	</div>
	<div class="form-section">
		<label for="cvv">CVV</label>
		<input type="text" name="cvv" value="458"/>
	</div>
	<div class="form-section">
		<label for=""></label>
		<input type="submit" value="Submit" />
	</div>
</form>
</body>
</html>