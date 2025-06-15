<?php 
    require('inc/essentials.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETERNA - CAROUSEL</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 p-4 overflow-hidden ms-auto">
                <h3 class="mb-4">CAROUSEL</h3>

                <!-- Carousel Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Image</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#carousel-s">
                            <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>

                        <div class="row" id="carousel-data"> 
                            <!-- <div class="col-md-3 mb-3">
                                <div class="card border-0 shadow-sm text-bg-dark">
                                    <img src="../Images/CH-1.jpg" class="card-img">
                                    <div class="card-img-overlay text-end">
                                        <button type="button" class="btn btn-danger btn-sm shadow-none">
                                            <i class="bi bi-trash3"></i> Delete
                                        </button>
                                    </div>
                                </div>
                                <div class="card mt-3 border-0 shadow-sm">
                                    <div class="d-flex align-items-center">
                                        <h6 class="fw-bold ms-2 mt-1 me-2">Name:</h6>
                                        <p class="card-text text-center mb-1"><small>Name</small></p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <h6 class="fw-bold ms-2 mt-1 me-2">Page Link:</h6>
                                        <p class="card-text text-center mb-1"><small>Name.php</small></p>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                    </div>
                </div>

                <!-- Carousel Modal -->
                <div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="carousel_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Add Image</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 p-0 mb-3">
                                        <label class="form-label fw-bold">Picture</label>
                                        <input required type="file" name="carousel_picture" id="carousel_picture_inp" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="carousel_picture.value=''" class="btn text-secondary border-0 shadow-none" data-bs-dismiss="modal">Cancle</button>
                                    <button type="submit" class="btn btn-outline-dark shadow-none">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
    <script src="./scripts/carousel.js"></script>

</body>
</html>