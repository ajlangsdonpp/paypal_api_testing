<?php
include_once("../../config/config.php");

$reference_amt = $_POST['newamount'];
$api_endpoint = 'https://pilot-payflowpro.paypal.com';

$api_request_params = array (
	'TRXTYPE' => 'S',
	'USER' => $config['payFlow']['USER'],
	'TENDER' => 'C',
	'VENDOR' => $config['payFlow']['VENDOR'],
	'PARTNER' => $config['payFlow']['PARTNER'],
	'PWD' => $config['payFlow']['PWD'],
	'ORIGID' => $_POST['pnref'],
	//'BILLINGTYPE' => "RecurringBilling",
	'CURRENCY' => 'USD',
	'AMT' => $reference_amt,
);

$params = toNVP($api_request_params);

$result = runCurl($api_endpoint, $params);
$result_array = ppResponse($result);
printVars($result_array);