<?php
require_once 'environment.php';

$customerID = $_POST['custID'];

if($_POST['processType'] == 'customerID') {
	$result = Braintree_Transaction::sale(
		array(
			'customerId' => $customerID,
			'amount' => $_POST['amount'],
			'options' => array(
				'submitForSettlement' => true
			)
		)
	);
}

elseif($_POST['processType'] == 'paymentMethodToken') {
	$result = Braintree_Transaction::sale(
		array(
			'customerId' => $customerID,
			'amount' => $_POST['amount'],
			'options' => array(
				'submitForSettlement' => true
			)
		)
	);
}

echo "<pre>";
print_r($result);