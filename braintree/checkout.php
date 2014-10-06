<?php
require_once 'environment.php';

$nonce = $_POST['payment_method_nonce'];
$custID = rand(1000,9999);

$result = Braintree_Transaction::sale(array(
	'amount' => $_POST['amount'],
	'paymentMethodNonce' => $nonce,
	'options' => array(
		'submitForSettlement' => true,
		'storeInVault' => true,
		'addBillingAddressToPaymentMethod' => true,
		'storeShippingAddressInVault' => true
	),
	'creditCard' => array(
		//'token' => 'a_token',
		'number' => '4111111111111111',
		//'expirationDate' => '05/2020',
	),
	'customer' => array(
		'id' => $custID,
		'firstName' => $_POST['fname'],
		'lastName' => $_POST['lname'],
	),
	'billing' => array(
		'firstName' => $_POST['fname'],
		'lastName' => $_POST['lname'],
		'streetAddress' => $_POST['street'],
		'locality' => $_POST['city'],
		'region' => $_POST['state'],
		'postalCode' => $_POST['zip']
	),
	'shipping' => array(
		'firstName' => $_POST['fname'],
		'lastName' => $_POST['lname'],
		'streetAddress' => $_POST['street'],
		'locality' => $_POST['city'],
		'region' => $_POST['state'],
		'postalCode' => $_POST['zip']
	),
));

echo "<pre>";
print_r($result);
echo "<br><br>";

$status = $result->transaction->_attributes['status'];
$status = ucwords(str_replace('_', ' ', $status));
$amount = $result->transaction->_attributes['amount'];
$payment_method_token = $result->transaction->_attributes['creditCard']['token'];

$output = "<b>Status</b>: $status<br>";
$output.= "<b>Abount</b>: $amount";

echo $output;

// Create transaction with payment Method
echo "<h3>Create transaction with payment Method</h3>";
$result = Braintree_Transaction::sale(
	array(
		'paymentMethodToken' => $payment_method_token,
		'amount' => '100.00'
	)
);

echo "<pre>";
print_r($result);