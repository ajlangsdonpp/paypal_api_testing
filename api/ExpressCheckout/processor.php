<?php
include_once("../../config/config.php");

// Set default credentials for API
$api_endpoint = 'https://api-3t.sandbox.paypal.com/nvp';
$version = $config['apiInfo']['version'];
$method = 'SetExpressCheckout';
$process_amt = $_POST['amount'];
$process_amt2 = "34.99";
$payment_action = 'Sale';
$returl_url = 'http://api.local/api/ExpressCheckout/return.php';
$cancel_url = $returl_url;

// Store request params in an array (from API documentation)
$api_request_params = array (
	// API Data
	'USER' => $config['sellerData']['username'],
	'PWD' => $config['sellerData']['password'],
	'SIGNATURE' => $config['sellerData']['signature'],
	'METHOD' => $method,
	'VERSION' => $config['apiInfo']['version'],
	'RETURNURL' => $returl_url,
	'CANCELURL' => $cancel_url,
	'PAYMENTREQUEST_0_PAYMENTACTION' => $payment_action,
	'PAYMENTREQUEST_0_AMT' => $process_amt,
);

// Generate NVP
$nvp = '';
$nvp_test = '';
foreach($api_request_params as $var=>$val) {
	$nvp .= '&'.$var.'='.urlencode($val);
	$nvp_test .= $var . '=' . $val . '<br/>';
}

// Create CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_VERBOSE, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_TIMEOUT, 30);
curl_setopt($curl, CURLOPT_URL, $api_endpoint);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp);

$result = curl_exec($curl);

// Parse the API response
$result_array = nvpConvert($result);

function nvpConvert($myString) {
	$ppResponse = array();
	parse_str($myString, $ppResponse);
	return $ppResponse;
}

// Check for success and display output
if($result_array['ACK'] == "Success") {
	$output = "<h3>Transaction processed successfully!</h3>";
	$output.= "<b>Amount Charged:</b> \$$process_amt<br/>";
	$output.= "<b>Transaction ID:</b> " . $result_array['TRANSACTIONID'];
}
else {
	$output = "<h3>Transaction not processed.</h3>";
	$output.= "<b>" . $result_array['L_SHORTMESSAGE0'] . "</b><br/>";
	$output.= $result_array['L_LONGMESSAGE0'];
}

if($result_array) {
	$ec_token = $result_array['TOKEN'];
	$correlationid = $result_array['CORRELATIONID'];
	$ack = $result_array['ACK'];
	echo "<pre>";
	print_r($result_array);
	//exit();
}

if($ack == "Success") {
	/*$api_request_params = array (
		// API Data
		'USER' => $config['sellerData']['username'],
		'PWD' => $config['sellerData']['password'],
		'SIGNATURE' => $config['sellerData']['signature'],
		'METHOD' => $method,
		'VERSION' => $version,
		'TOKEN' => $ec_token,
		'PAYMENTREQUEST_0_AMT' => $process_amt,
		'RETURNURL' => $returl_url,
		'CANCELURL' => $cancel_url,
	);

	$nvp = '';
	foreach($api_request_params as $var => $key) {
		$nvp .= "&$var=$key";
	}

	curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp);
	$result = curl_exec($curl);

	// Parse the API response
	$result_array = nvpConvert($result);*/

	$output = "Total: $process_amt<br/><br/>";
	$output.= '<a href="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout
	&token=' . urldecode($ec_token) . '">Click to Continue</a>';

	echo $output;

}

