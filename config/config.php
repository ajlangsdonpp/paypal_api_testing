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

return $config;