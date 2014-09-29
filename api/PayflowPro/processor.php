<?php
include_once("../../config/config.php");

$api_endpoint = 'https://pilot-payflowpro.paypal.com';

$api_request_params = array (
	'USER' => $config['payFlow']['USER'],
	'VENDOR' => $config['payFlow']['VENDOR'],
	'PARTNER' => $config['payFlow']['PARTNER'],
	'PWD' => $config['payFlow']['PWD'],
	'TRXTYPE' => $_POST['trxtype'],
	'TENDER' => $_POST['tender'],
	'ACCT' => $_POST['cardnum'],
	'AMT' => $_POST['amount'],
	'EXPDATE' => $_POST['expmonth'] . $_POST['expyear'],
	'CVV2' => $_POST['cvv'],
	'FIRSTNAME' => $_POST['fname'],
	'LASTNAME' => $_POST['lname'],
	'STREET' => $_POST['street'],
	'CITY' => $_POST['city'],
	'STATE' => $_POST['state'],
	'ZIP' => $_POST['zip'],
	'COUNTRY' => 'US',
);

$nvp = "";
$nvp_test = "";
foreach($api_request_params as $var => $val) {
	$nvp .= '&'.$var.'='.urlencode($val);
	$nvp_test .= $var . '=' . $val . '<br/>';
}

echo $nvp_test;