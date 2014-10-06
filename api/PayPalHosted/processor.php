<?php
include_once("../../config/config.php");

$api_endpoint = 'https://pilot-payflowpro.paypal.com';
$securetokenid = md5(uniqid(rand(), true));

$api_request_params = array (
	'TRXTYPE' => $_POST['trxtype'],
	//'TENDER' => $_POST['tender'],
	'USER' => $config['payFlow']['USER'],
	'VENDOR' => $config['payFlow']['VENDOR'],
	'PARTNER' => $config['payFlow']['PARTNER'],
	'PWD' => $config['payFlow']['PWD'],
	//'ACCT' => $_POST['cardnum'],
	//'EXPDATE' => $_POST['expmonth'] . $_POST['expyear'],
	'AMT' => $_POST['amount'],
	/*'CVV2' => $_POST['cvv'],
	'FIRSTNAME' => $_POST['fname'],
	'LASTNAME' => $_POST['lname'],
	'STREET' => $_POST['street'],
	'CITY' => $_POST['city'],
	'STATE' => $_POST['state'],
	'ZIP' => $_POST['zip'],
	'COUNTRY' => 'US',*/
	'CREATESECURETOKEN' => 'Y',
	'SECURETOKENID' => $securetokenid,
);

$nvp = toNVP($api_request_params);

// Parse the API response
$result = runCurl($api_endpoint, $nvp);
$result_array = ppResponse($result);

printVars($result_array);

$securetoken = $result_array['SECURETOKEN'];
$securetokenid = $result_array['SECURETOKENID'];
?>

<h3>iFrame</h3>
<iframe src="https://payflowlink.paypal.com?
MODE=TEST&SECURETOKENID=<?php echo $securetokenid; ?>&SECURETOKEN=<?php echo $securetoken; ?>"
		name="test_iframe" scrolling="no" width="570px" height="540px"></iframe>