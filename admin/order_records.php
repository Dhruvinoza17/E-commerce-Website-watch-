<?php
    require('./inc/essentials.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETERNA - ORDER RECORDS</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 p-4 overflow-hidden ms-auto">
                <h3 class="mb-4">ORDER RECORDS</h3>

                <!-- Men Product Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <input type="text" id="search_input" oninput="get_orders(this.value)" class="form-control shadow-none w-25 ms-auto"
                                placeholder="Search...">
                        </div>

                        <div style="overflow-x: auto; width: 100%;">
                            <div class="table-responsive">
                                <table class="table table-hover border" style="min-width: 1200px;">
                                    <thead>
                                        <tr class="bg-dark text-light">
                                            <th scope="col" class="bg-dark text-light" width = 5%>#</th>
                                            <th scope="col" class="bg-dark text-light" width = 20%>User Details</th>
                                            <th scope="col" class="bg-dark text-light" width = 30%>Product Details</th>
                                            <th scope="col" class="bg-dark text-light" width = 25%>Order Details</th>
                                            <th scope="col" class="bg-dark text-light" width = 10%>Status</th>
                                            <th scope="col" class="bg-dark text-light" width = 10%>Invoice</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-data">
                                    </tbody>
                                </table>
                            </div>
                            <nav>
                                <ul class="pagination mt-3" id="table-pagination">
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
    <script src="./scripts/order_records.js"></script>

</body>
</html>