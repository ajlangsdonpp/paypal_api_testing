<p>Insert customer id or payment method token</p>
<form action="vaultTransactionProcessor.php" method="post">
	<select name="processType">
		<option value="customerID" selected>Customer ID</option>
		<option value="paymentMethodToken">Payment Method Token</option>
	</select>
	<input type="text" name="custID" placeholder="ID"/>
	<input type="text" name="amount" placeholder="amount"/>
	<input type="submit" value="submit" />
</form>

