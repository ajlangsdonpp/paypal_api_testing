<?php
require_once 'environment.php';

$collection = Braintree_Customer::find('57937176');



echo "<pre>";
print_r($collection);