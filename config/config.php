<?php

$config = array(
	'userInfo' => array(
		'ip' => $_SERVER['REMOTE_ADDR'],
	),
	'sellerData' => array(
		'username' => 'ajl-seller_api1.pp.com',
		'password' => 'FL9P9SMJRPFZSX53',
		'signature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31Axdzr3P.uU8qsNo48PtQXW9AT.wG',
		'email' => 'ajl-seller@pp.com'
	),
	'apiInfo' => array(
		'version' => '117.0',
	),
	'payFlow' => array(
		/*'USER' => 'altest',
		'VENDOR' => 'alangsdonpaypal',
		'PARTNER' => 'PayPal',
		'PWD' => 'paypal1234',*/
		'USER' => 'capleswebdev1',
		'VENDOR' => 'capleswebdev',
		'PARTNER' => 'PayPal',
		'PWD' => 'password12345',
	)
);

// cURL function
function runCurl($api_endpoint, $nvp) {
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_VERBOSE, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	curl_setopt($curl, CURLOPT_URL, $api_endpoint);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp);
	$result = curl_exec($curl);

	return $result;
}

// Print Array in Preformat
function printVars($array) {
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

// Convert Parameters Array to NVP
function toNVP($array) {
	$i = 0;
	$nvp = "";
	foreach($array as $key => $val) {
		if($i != 0) {
			$nvp .= "&";
		}
		$nvp .= $key . '=' . $val;
		$i++;
	}
	return $nvp;
}

function ppResponse($myString) {
	$ppResponse = array();
	parse_str($myString, $ppResponse);
	return $ppResponse;
}