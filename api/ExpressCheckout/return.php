<?php
include_once("../../config/config.php");

$params = array (
	'USER' => $config['sellerData']['username'],
	'PWD' => $config['sellerData']['password'],
	'SIGNATURE' => $config['sellerData']['signature'],
	'VERSION' => $config['apiInfo']['version'],
	'TOKEN' => $_GET['token'],
	'METHOD' => "GetExpressCheckoutDetails",
);

$postinfo = "";
$i = 0;
foreach($params as $key => $val) {
	if($i == 0) {
		$postinfo.= "?";
	}
	else {
		$postinfo.= "&";
	}
	$postinfo.= "$key=$val";
}

?>

<form method=post action=https://api-3t.sandbox.paypal.com/nvp>
	<input type=text name=USER value=<?php echo $config['sellerData']['username']; ?>>
	<input type=text name=PWD value=<?php echo $config['sellerData']['password']; ?>>
	<input type=text name=SIGNATURE value=<?php echo $config['sellerData']['signature']?>>
	<input type=text name=VERSION value=<?php echo $config['apiInfo']['version']; ?>>
	<input name=TOKEN value=<?php echo $_GET['token']; ?>>
	<input type=submit name=METHOD value=GetExpressCheckoutDetails>
</form>

<form method=post action=https://api-3t.sandbox.paypal.com/nvp>
	<input type=hidden name=USER value=API_username>
	<input type=hidden name=PWD value=API_password>
	<input type=hidden name=SIGNATURE value=API_signature>
	<input type=hidden name=VERSION value=XX.0>
	<input type=hidden name=PAYMENTREQUEST_0_PAYMENTACTION value=Sale>
	<input type=hidden name=PAYERID value=7AKUSARZ7SAT8>
	<input type=hidden name=TOKEN value= EC%2d1NK66318YB717835M>
	<input type=hidden name=PAYMENTREQUEST_0_AMT value= 19.95>
	<input type=submit name=METHOD value=DoExpressCheckoutPayment>
</form>