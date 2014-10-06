<?php

require_once "../library/lib/Braintree.php";
$result = Braintree_Subscription::cancel('8bpb4b');

echo "<pre>";
print_r($result);