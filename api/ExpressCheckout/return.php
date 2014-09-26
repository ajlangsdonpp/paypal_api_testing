<?php
include_once("../../config/config.php");

$api_endpoint = "https://api-3t.sandbox.paypal.com/nvp";

$params = array (
	'USER' => $config['sellerData']['username'],
	'PWD' => $config['sellerData']['password'],
	'SIGNATURE' => $config['sellerData']['signature'],
	'METHOD' => "GetExpressCheckoutDetails",
	'VERSION' => $config['apiInfo']['version'],
	'TOKEN' => $_GET['token'],
);

$postinfo = "";
$i = 0;
foreach($params as $key => $val) {
	if($i == 0) {
		$postinfo.= "&";
	}
	else {
		$postinfo.= "&";
	}
	$postinfo.= $key . '=' . urlencode($val);
	$i++;
}

// Create CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_VERBOSE, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_TIMEOUT, 30);
curl_setopt($curl, CURLOPT_URL, $api_endpoint);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $postinfo);

$result = curl_exec($curl);

// Parse the API response
$result_array = nvpConvert($result);

function nvpConvert($myString) {
	$ppResponse = array();
	parse_str($myString, $ppResponse);
	return $ppResponse;
}

echo "<h3>GetExpressCheckoutDetails</h3>";
echo "<pre>";
print_r($result_array);
echo "</pre>";

if($result_array['ACK']) {
	$payer_id = $result_array['PAYERID'];
	$token = $result_array['TOKEN'];
	$amount = $result_array['AMT'];

	$params = array (
		'USER' => $config['sellerData']['username'],
		'PWD' => $config['sellerData']['password'],
		'SIGNATURE' => $config['sellerData']['signature'],
		'METHOD' => "DoExpressCheckoutPayment",
		'VERSION' => $config['apiInfo']['version'],
		'TOKEN' => $_GET['token'],
		'PAYERID' => $payer_id,
		'PAYMENTREQUEST_0_AMT' => $amount,
		'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD',
		'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
	);

	$postinfo = '';
	foreach($params as $key => $val) {
		$postinfo.= "&$key=$val";
	}

	// Create CURL
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_VERBOSE, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	curl_setopt($curl, CURLOPT_URL, $api_endpoint);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postinfo);

	$result = curl_exec($curl);

	// Parse the API response
	function nvpConvert2($myString) {
		$ppResponse = array();
		parse_str($myString, $ppResponse);
		return $ppResponse;
	}
	$newArray = nvpConvert2($result);

	echo "<h3>DoExpressCheckoutPayment</h3>";
	echo "<pre>";
	print_r($newArray);
	echo "</pre>";

	if($newArray['ACK'] == "Success") {
		$output = "Payment complete for $" . $newArray['PAYMENTINFO_0_AMT'] . "<br>";
		$output.= "Fees: " . $newArray['PAYMENTINFO_0_FEEAMT'];
	}
	else {
		$output = "Payment Failed";
	}

	echo $output;
}


