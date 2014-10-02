<?php
include_once("../../config/config.php");

session_start();

$api_endpoint = 'https://pilot-payflowpro.paypal.com';

$api_request_params = array (
	'TRXTYPE' => 'S',
	'PARTNER' => $config['payFlow']['PARTNER'],
	'PWD' => $config['payFlow']['PWD'],
	'USER' => $config['payFlow']['USER'],
	'VENDOR' => $config['payFlow']['VENDOR'],
	'TENDER' => 'P',
	'ACTION' => 'G',
	'TOKEN' => $_GET['token'],
);

$nvp = toNVP($api_request_params);

$result = runCurl($api_endpoint, $nvp);
$result_array = ppResponse($result);

echo "<h3>GetExpressCheckoutDetails</h3>";
printVars($result_array);

// DoExpressCheckout
if($result_array['RESULT'] == 0) {
	$api_request_params = array(
		'ACTION' => 'D',
		'TOKEN' => $_GET['token'],
		'PAYERID' => $_GET['PayerID'],
		'TRXTYPE' => 'S',
		'PARTNER' => $config['payFlow']['PARTNER'],
		'PWD' => $config['payFlow']['PWD'],
		'USER' => $config['payFlow']['USER'],
		'VENDOR' => $config['payFlow']['VENDOR'],
		'TENDER' => 'P',
		'AMT' => $_SESSION['amount'],
	);

	$nvp = toNVP($api_request_params);

	$result = runCurl($api_endpoint, $nvp);
	$result_array = ppResponse($result);

	echo "<h3>DoExpressCheckout</h3>";
	printVars($result_array);

	echo "Transaction processed for $" . $_SESSION['amount'];
	echo "<br/>Fees: $" . $result_array['FEEAMT'];
}

else {
	echo "Error";
}