<?php 
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETERNA - ADMIN DASHBOARD</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    
    <?php

        require('inc/header.php');
        
        $is_shutdonw = mysqli_fetch_assoc(mysqli_query($con,"SELECT `shutdown` FROM `settings`"));

        $current_orders = mysqli_fetch_assoc(mysqli_query($con,"SELECT 
            COUNT(CASE WHEN order_status='confirmed' AND trans_status='success' THEN 1 END) AS `new_orders`,
            COUNT(CASE WHEN order_status='cancelled' AND trans_status='cancel' THEN 1 END) AS `refund_orders`
            FROM `booking_order`"));

        $unread_queries = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(sr_no) AS `count`
            FROM `user_queries` WHERE `seen`=0"));

        $unread_queries = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(sr_no) AS `count`
            FROM `user_queries` WHERE `seen`=0"));

        $current_users = mysqli_fetch_assoc(mysqli_query($con,"SELECT
            COUNT(id) AS `total`, 
            COUNT(CASE WHEN `status`= 1 THEN 1 END) AS `active`,
            COUNT(CASE WHEN `status`= 0 THEN 1 END) AS `inactive`,
            COUNT(CASE WHEN `is_verified`= 0 THEN 1 END) AS `unverified`
            FROM `user_cred`"));

    ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 p-4 overflow-hidden ms-auto">
                
                <!-- Dashboard, orders & queries section -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <!-- <h3>DASHBOARD</h3> -->
                    <h2 class="mb-3 h-font" style="color: #C23737;">DASHBOARD</h2>
                    <?php 
                        if ($is_shutdonw['shutdown']) {
                            echo<<<data
                                <h6 class="badge bg-danger py-2 px-3 rounded">Shutdown Mode Is Active!</h6>
                            data;
                        }
                    ?>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4 mb-4">
                        <a href="./order_records.php" class="text-decoration-none">
                            <div class="card text-center text-success p-3">
                                <h6>New Orders</h6>
                                <h1 class="mt-2 mb-0"><?php echo $current_orders['new_orders'] ?></h1>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="./refund_order.php" class="text-decoration-none">
                            <div class="card text-center text-warning p-3">
                                <h6>Refund Orders</h6>
                                <h1 class="mt-2 mb-0"><?php echo $current_orders['refund_orders'] ?></h1>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="./user_queries.php" class="text-decoration-none">
                            <div class="card text-center text-info p-3">
                                <h6>Unread Queries</h6>
                                <h1 class="mt-2 mb-0"><?php echo $unread_queries['count'] ?></h1>
                            </div>
                        </a>
                    </div>

                </div>

                <!-- Order analytics section -->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5>Order Analytics</h5>
                    <select class="form-select shadow-none bg-light w-auto" onchange="order_analytics(this.value)">
                        <option value="1">Last 30 Days</option>
                        <option value="2">Last 90 Days</option>
                        <option value="3">Last 1 Year</option>
                        <option value="4">All Time</option>
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-primary p-3">
                            <h6>Total Orders</h6>
                            <h1 class="mt-2 mb-0" id="total_orders">0</h1>
                            <h4 class="mt-2 mb-0" id="total_amt">₹0</h4>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-success p-3">
                            <h6>Active Orders</h6>
                            <h1 class="mt-2 mb-0" id="active_orders">0</h1>
                            <h4 class="mt-2 mb-0" id="active_amt">₹0</h4>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-danger p-3">
                            <h6>Cancelled Orders</h6>
                            <h1 class="mt-2 mb-0" id="cancelled_orders">0</h1>
                            <h4 class="mt-2 mb-0" id="cancelled_amt">₹0</h4>
                        </div>
                    </div>

                </div>

                <!-- Users & Queries analytics section -->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5>Users & Queries Analytics</h5>
                    <select class="form-select shadow-none bg-light w-auto" onchange="user_analytics(this.value)">
                        <option value="1">Last 30 Days</option>
                        <option value="2">Last 90 Days</option>
                        <option value="3">Last 1 Year</option>
                        <option value="4">All Time</option>
                    </select>
                </div>
                <div class="row mb-3">

                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-info p-3">
                            <h6>Total Users</h6>
                            <h1 class="mt-2 mb-0"><?php echo $current_users['total'] ?></h1>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-success p-3">
                            <h6>New Registration</h6>
                            <h1 class="mt-2 mb-0" id="total_new_reg">0</h1>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-primary p-3">
                            <h6>User Queries</h6>
                            <h1 class="mt-2 mb-0" id="total_queries">0</h1>
                        </div>
                    </div>

                </div>

                <!-- Users section -->
                <h5>Users</h5>
                <div class="row mb-3">

                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-success p-3">
                            <h6>Active Users</h6>
                            <h1 class="mt-2 mb-0"><?php echo $current_users['active'] ?></h1>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-warning p-3">
                            <h6>Inactive Users</h6>
                            <h1 class="mt-2 mb-0"><?php echo $current_users['inactive'] ?></h1>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-danger p-3">
                            <h6>Unverified Users</h6>
                            <h1 class="mt-2 mb-0"><?php echo $current_users['unverified'] ?></h1>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
    <script src="./scripts/dashboard.js"></script>
</body>
</html>