<?php
require 'config.php';
use Razorpay\Api\Api;

$api = new Api($apiKey, $apiSecret);

$orderData = [
    'receipt' => 'order_rcptid_'.time(),
    'amount' => 50000, // Amount in paise (₹500)
    'currency' => 'INR',
    'payment_capture' => 1 // Auto capture payment
];

$order = $api->order->create($orderData);
echo json_encode(['order_id' => $order['id']]);
?>
