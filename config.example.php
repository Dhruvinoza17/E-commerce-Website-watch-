<?php
// Store Razorpay API keys
$apiKey = 'YOUR_API_KEY';
$apiSecret = 'YOUR_SECRET_KEY';

require_once 'razorpay/Razorpay.php';
use Razorpay\Api\Api;

$api = new Api($apiKey, $apiSecret);
?>
