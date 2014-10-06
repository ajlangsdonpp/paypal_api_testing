<?php

require_once "library/lib/Braintree.php";

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('srkt95r5jy33nxz4');
Braintree_Configuration::publicKey('79x88jnfjbrrghv3');
Braintree_Configuration::privateKey('edda230ad6d8054ef9c335e90f2dc6e9');

$result = Braintree_Transaction::sale(array(
	"amount" => "1000.00",
	"creditCard" => array(
		"number" => $_POST["number"],
		"cvv" => $_POST["cvv"],
		"expirationMonth" => $_POST["month"],
		"expirationYear" => $_POST["year"]
	),
	"options" => array(
		"submitForSettlement" => true
	)
));

if ($result->success) {
	echo("Success! Transaction ID: " . $result->transaction->id);
} else if ($result->transaction) {
	echo("Error: " . $result->message);
	echo("<br/>");
	echo("Code: " . $result->transaction->processorResponseCode);
} else {
	echo("Validation errors:<br/>");
	foreach (($result->errors->deepAll()) as $error) {
		echo("- " . $error->message . "<br/>");
	}
}
?>