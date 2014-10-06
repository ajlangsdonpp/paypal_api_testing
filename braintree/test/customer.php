<?php

require_once "../library/lib/Braintree.php";

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('srkt95r5jy33nxz4');
Braintree_Configuration::publicKey('79x88jnfjbrrghv3');
Braintree_Configuration::privateKey('edda230ad6d8054ef9c335e90f2dc6e9');

$result = Braintree_Customer::create(array(
	"firstName" => $_POST["first_name"],
	"lastName" => $_POST["last_name"],
	"creditCard" => array(
		"number" => $_POST["number"],
		"expirationMonth" => $_POST["month"],
		"expirationYear" => $_POST["year"],
		"cvv" => $_POST["cvv"],
		"billingAddress" => array(
			"postalCode" => $_POST["postal_code"]
		)
	)
));

if ($result->success) {
	echo("Success! Customer ID: " . $result->customer->id . "<br/>");
	echo("<a href='./subscription.php?customer_id=" . $result->customer->id . "'>Create subscription for this customer</a>");
} else {
	echo("Validation errors:<br/>");
	foreach (($result->errors->deepAll()) as $error) {
		echo("- " . $error->message . "<br/>");
	}
}
?>