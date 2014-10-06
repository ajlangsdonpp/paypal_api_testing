<?php

require_once "../library/lib/Braintree.php";

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('srkt95r5jy33nxz4');
Braintree_Configuration::publicKey('79x88jnfjbrrghv3');
Braintree_Configuration::privateKey('edda230ad6d8054ef9c335e90f2dc6e9');

try {
	$customer_id = $_GET["customer_id"];
	$customer = Braintree_Customer::find($customer_id);
	$payment_method_token = $customer->creditCards[0]->token;

	$result = Braintree_Subscription::create(array(
		'paymentMethodToken' => $payment_method_token,
		'planId' => 'test_plan_1'
	));

	if ($result->success) {
		echo("Success! Subscription " . $result->subscription->id . " is " . $result->subscription->status);
	} else {
		echo("Validation errors:<br/>");
		foreach (($result->errors->deepAll()) as $error) {
			echo("- " . $error->message . "<br/>");
		}
	}
} catch (Braintree_Exception_NotFound $e) {
	echo("Failure: no customer found with ID " . $_GET["customer_id"]);
}
?>