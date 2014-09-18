<?php

include_once('config/config.php');

// Assign variables from POST
$method = $_POST['method'];
$ip = $config['userInfo']['ip'];
$amount = $_POST['amount'];

// Credit Card Info
$cardnum = $_POST['cardnum'];
$cardexpmonth = $_POST['cardexpmonth'];
$cardexpyear = $_POST['cardexpyear'];
$cvv = $_POST['cvv'];
$cardfirstname = $_POST['cardfirstname'];
$cardlastname = $_POST['cardlastname'];

// Billing Info
$billaddress = $_POST['billaddress'];
$billcity = $_POST['billcity'];
$billstate = $_POST['billstate'];
$billzip = $_POST['billzip'];

// Check to see which method is used and then direct to appropriate API call
if($method == "DoDirectPayment") {
	$api_endpoint = "https://api-3t.sandbox.paypal.com/nvp";

	$params = array(
		'METHOD' => $method,
		'IPADDRESS' => $ip,
		'ACCT' => $cardnum,
		'EXPDATE' => $cardexpmonth . $cardexpyear,
		'CVV2' => $cvv,
		'FIRSTNAME' => $cardfirstname,
		'LASTNAME' => $cardlastname,
		'STREET' => $billaddress,
		'CITY' => $billcity,
		'STATE' => $billstate,
		'COUNTRYCODE' => 'US',
		'ZIP' => $billzip,
		'AMT' => $amount,
	)
}
