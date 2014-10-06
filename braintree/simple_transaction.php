<?php
require_once 'environment.php';

$clientToken = Braintree_ClientToken::generate();
echo "Token is " . $clientToken;
?>