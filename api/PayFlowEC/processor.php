<?php
include_once("../../config/config.php");

session_start();

$api_endpoint = 'https://pilot-payflowpro.paypal.com';
$returl_url = 'http://api.local/api/PayFlowEC/return.php';
$cancel_url = $returl_url;
$process_amt = $_POST['amount'];
$_SESSION['amount'] = $process_amt;
// Send EC rerdirect to
// https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=<EC-TOKEN>

$api_request_params = array (
	'TRXTYPE' => $_POST['trxtype'],
	'ACTION' => $_POST['action'],
	'AMT' => $_POST['amount'],
	'CANCELURL' => $cancel_url,
	'RETURNURL' => $returl_url,
	'PARTNER' => $config['payFlow']['PARTNER'],
	'PWD' => $config['payFlow']['PWD'],
	'USER' => $config['payFlow']['USER'],
	'VENDOR' => $config['payFlow']['VENDOR'],
	'TENDER' => 'P',
);

$nvp = toNVP($api_request_params);

$result = runCurl($api_endpoint, $nvp);
$result_array = ppResponse($result);

printVars($result_array);

$ec_token = $result_array['TOKEN'];

$output = "Total: \$$process_amt<br/><br/>";
$output.= '<a href="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout
	&token=' . urldecode($ec_token) . '" class="ec-submit">Click to Continue</a>';

echo $output;