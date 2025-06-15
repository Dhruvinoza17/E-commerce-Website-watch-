<!-- Admin Panel Header -->
<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    <h3 class="mb-0">ETERNA</h3>
    <a href="logout.php" class="btn btn-light btn-sm">Logout</a>
</div>

<!-- Admin Panel Side Panel -->
<div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2 text-light">ADMIN PANEL</h4>
            <button class="navbar-toggler shadow-none mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2 flex-column align-items-stretch" id="adminDropdown">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item acc">
                        <div class="accordion accordion-flush" id="accordionOrders">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button bg-dark shadow-none collapsed text-start" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOrders" aria-expanded="false" aria-controls="flush-collapseProducts">
                                        Orders
                                    </button>
                                </h2>
                                <div id="flush-collapseOrders" class="accordion-collapse collapse" data-bs-parent="#accordionOrders">
                                    <div class="accordion-body bg-dark">
                                        <ul class="nav nav-pills flex-column">
                                            <li class="nav-item"><a class="nav-link text-white" href="order_records.php">Order Records</a></li>
                                            <li class="nav-item"><a class="nav-link text-white" href="refund_order.php">Refund Orders</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item acc">
                        <div class="accordion accordion-flush" id="accordionProducts">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button bg-dark shadow-none collapsed text-start" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseProducts" aria-expanded="false" aria-controls="flush-collapseProducts">
                                        Products
                                    </button>
                                </h2>
                                <div id="flush-collapseProducts" class="accordion-collapse collapse" data-bs-parent="#accordionProducts">
                                    <div class="accordion-body bg-dark">
                                        <ul class="nav nav-pills flex-column">
                                            <li class="nav-item"><a class="nav-link text-white" href="men.php">Men</a></li>
                                            <li class="nav-item"><a class="nav-link text-white" href="women.php">Women</a></li>
                                            <li class="nav-item"><a class="nav-link text-white" href="couple.php">Couple</a></li>
                                            <li class="nav-item"><a class="nav-link text-white" href="kids.php">Kids</a></li>
                                            <li class="nav-item"><a class="nav-link text-white" href="smartwatch.php">Smartwatch</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="user_queries.php">User Queries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="carousel.php">Carousel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="settings.php">Settings</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</div>