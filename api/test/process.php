<?php
// Set default credentials for API
$api_endpoint = 'https://api-3t.sandbox.paypal.com/nvp';
$biz_username = 'andrew_business_api1.paypal.com';
$biz_password = '1407699080';
$biz_signature = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AAfs6x4DQnIcsJq2561paao9wjLz';
$client_id = 'AaypZhBrM5u1F7gAVHKX1_Ro7B_8olpffGiyv8BkQA2SVPT4Ok3R32qikpNX';
$secret = 'EKT0BxDZsMnQsAOt6QLDcR6YXqy6g2b8LHrYLAaNZ4hnLcU_Btpqji45-OxW';
$version = '98';
$method = 'DoDirectPayment';
$process_amt = "97.99";
$payment_action = 'Sale';

// Store request params in an array (from API documentation)
$api_request_params = array (
    // API Data
    'USER' => $biz_username,
    'PWD' => $biz_password,
    'SIGNATURE' => $biz_signature,
    'VERSION' => $version,

    // API Transaction Data
    'METHOD' => $method,
    'PAYMENTACTION' => $payment_action,
    'IPADDRESS' => $_SERVER['REMOTE_ADDR'],

    // Credit Card Data
    'CREDITCARDTYPE' => $_POST['ctype'],
    'ACCT' => $_POST['cardnum'],
    'EXPDATE' => $_POST['expmonth'].$_POST['expyear'],
    'CVV2' => $_POST['cvv'],

    // Customer Information
    'FIRSTNAME' => $_POST['fname'],
    'LASTNAME' => $_POST['lname'],

    // Address Fields
    'STREET' => $_POST['street'],
    'CITY' => $_POST['city'],
    'STATE' => $_POST['state'],
    'COUNTRYCODE' => 'US',
    'ZIP' => $_POST['zip'],

    // Payment Details
    'AMT' => $process_amt,
    'CURRENCYCODE' => 'USD',
);

// Generate NVP
$nvp = '';
foreach($api_request_params as $var=>$val) {
    $nvp .= '&'.$var.'='.urlencode($val);
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

echo "$output";

function nvpConvert($myString) {
    $ppResponse = array();
    parse_str($myString, $ppResponse);
    return $ppResponse;
}