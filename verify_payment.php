<?php
require 'config.php';
use Razorpay\Api\Api;

if (!isset($_GET['payment_id'])) {
    die('Invalid request');
}

$api = new Api($apiKey, $apiSecret);
$payment_id = $_GET['payment_id'];
$payment = $api->payment->fetch($payment_id);

if ($payment['status'] == 'captured') {
    echo "Payment successful!";
    // Store order details in the database if needed
} else {
    echo "Payment failed!";
}
?>
