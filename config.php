<?php
// Store Razorpay API keys
$apiKey = 'rzp_test_qmIg2rY51GFkzW';
$apiSecret = 'WYYZ73Hidb9ZMQ8ByMhVfGRY';

require_once 'razorpay/Razorpay.php';
use Razorpay\Api\Api;

$api = new Api($apiKey, $apiSecret);
?>
