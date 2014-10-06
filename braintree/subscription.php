<?php
require_once 'environment.php';

$customerID = $_POST['customerID'];


try {
	$customer_id = $customerID;
	$customer = Braintree_Customer::find($customer_id);
	$payment_method_token = $customer->creditCards[0]->token;

	$result = Braintree_Subscription::create(array('paymentMethodToken' => $payment_method_token,'planId' => 'test_plan_1'));

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