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
$i = 0;
foreach($api_request_params as $var => $val) {
	if($i != 0) {
		$nvp.= "&";
	}
	$nvp .= $var . '=' . $val;
	$nvp_test .= $var . '=' . $val . '<br/>';
	$i++;
}

function nvpConvert($myString) {
	$ppResponse = array();
	parse_str($myString, $ppResponse);
	return $ppResponse;
}

// Parse the API response
$result = runCurl($api_endpoint, $nvp);
$result_array = nvpConvert($result);

printVars($result_array);

?>

<h3>Reference Transaction</h3>
<b>Current Amount: </b><?php echo $_POST['amount']; ?><br/>
<b>PNREF: </b> <?php echo $result_array['PNREF']; ?>
<form action="reference.php" method="post">
	<div class="form-section">
		<label for="newamount">New Amount</label>
		<input type="text" name="newamount"/>
	</div>
	<div class="form-section">
		<label for=""></label>
		<input type="submit" value="Submit" />
	</div>
	<input type="hidden" name="pnref" value="<?php echo $result_array['PNREF']; ?>">
</form>
