<?php 
require 'config.php';
require './admin/inc/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    $order_id = mysqli_real_escape_string($con, $_POST['order_id']);
    $trans_id = mysqli_real_escape_string($con, $_POST['trans_id']);
    $trans_amt = mysqli_real_escape_string($con, $_POST['trans_amt']);
    $trans_status = mysqli_real_escape_string($con, $_POST['trans_status']);

    // ✅ Check if 'category' is set
    $category = isset($_POST['category']) ? mysqli_real_escape_string($con, $_POST['category']) : '';

    // Define valid categories
    $valid_categories = ['men', 'women', 'kids', 'couple', 'smartwatch', 'premium'];

    // ✅ Validate category
    if (!in_array($category, $valid_categories)) {
        echo "Invalid category!";
        exit;
    }

    // ✅ Fetch product details dynamically from the correct table
    $product_query = "SELECT name, price, quantity FROM $category WHERE id='$product_id' LIMIT 1";
    $product_result = mysqli_query($con, $product_query);

    if (!$product_result || mysqli_num_rows($product_result) == 0) {
        echo "Product Not Found!";
        exit;
    }

    $product_data = mysqli_fetch_assoc($product_result);
    $product_name = $product_data['name'];
    $price = $product_data['price'];
    $quantity = $product_data['quantity'];

    // Check if the product is in stock
    if ($quantity <= 0) {
        echo "Out of Stock!";
        exit;
    }

    // Get user details
    $user_name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phonenum']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $pincode = mysqli_real_escape_string($con, $_POST['pincode']);

    // Check if order already exists
    $check_query = "SELECT * FROM booking_order WHERE order_id = '$order_id' LIMIT 1";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) == 0) {
        // ✅ Insert into `booking_order` (now includes `category`)
        $order_status = ($trans_status == "success") ? "confirmed" : "failed";
        $query = "INSERT INTO booking_order (user_id, product_id, order_id, trans_id, trans_amt, trans_status, order_status) 
                  VALUES ('$user_id', '$product_id', '$order_id', '$trans_id', '$trans_amt', '$trans_status', '$order_status')";

        if (!mysqli_query($con, $query)) {
            echo "Error: " . mysqli_error($con);
            exit;
        }

        // Get the inserted booking_id
        $booking_id = mysqli_insert_id($con);

        // ✅ Insert into `order_details` only if payment is successful
        if ($trans_status === "success") {
            $query2 = "INSERT INTO order_details (booking_id, product_name, price, user_name, phonenum, email, address, city, pincode) 
                       VALUES ('$booking_id', '$product_name', '$price', '$user_name', '$phone', '$email', '$address', '$city', '$pincode')";

            if (!mysqli_query($con, $query2)) {
                echo "error: " . mysqli_error($con);
                exit;
            }

            // ✅ Reduce quantity by 1 if payment is successful
            $update_quantity_query = "UPDATE $category SET quantity = quantity - 1 WHERE id = '$product_id'";
            if (!mysqli_query($con, $update_quantity_query)) {
                echo "Error updating quantity: " . mysqli_error($con);
                exit;
            }
        }

        echo "success";
    } else {
        echo "duplicate"; // Order already exists
    }

    mysqli_close($con);
}
?>
