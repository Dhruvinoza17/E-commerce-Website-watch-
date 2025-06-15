<?php
session_start(); // Start the session if not already started
echo "<pre>";
print_r($_SESSION); // Show all session variables
echo "</pre>";
require_once 'razorpay/Razorpay.php';
require 'config.php';

use Razorpay\Api\Api;


$api_key = $apiKey;
$api_secret = $apiSecret;

// Initialize Razorpay API
$api = new Api($api_key, $api_secret);

// Replace with actual payment ID from your test transaction
$payment_id = "pay_PzyqPieBxsNinh"; 

if (isset($_SESSION['men']['price'])) {
    $refund_amount = $_SESSION['men']['price'] * 100; // Convert to paise

    try {
        // Process refund with dynamic amount
        $refund = $api->payment->fetch($payment_id)->refund([
            'amount' => $refund_amount
        ]);

        // Display refund details
        echo "<pre>";
        print_r($refund);
        echo "</pre>";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: Session variable 'men' or 'price' is not set.";
}
?>
