<?php 
    require('inc/essentials.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETERNA - MEN PRODUCTS</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 p-4 overflow-hidden ms-auto">
                <h3 class="mb-4">MEN</h3>

                <!-- Men Product Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-men">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>

                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col" class="bg-dark text-light">#</th>
                                        <th scope="col" class="bg-dark text-light">Name</th>
                                        <th scope="col" class="bg-dark text-light">Category</th>
                                        <th scope="col" class="bg-dark text-light">Price</th>
                                        <th scope="col" class="bg-dark text-light">Quantity</th>
                                        <th scope="col" class="bg-dark text-light">Status</th>
                                        <th scope="col" class="bg-dark text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="men-data">
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <!-- Men Product Modal -->
                <div class="modal fade" id="add-men" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="add_men_form" autocomplete="off">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Add Product</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Name</label>
                                            <input required type="text" name="name" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Category</label>
                                            <input required type="text" name="category" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Price</label>
                                            <input required type="number" name="price" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Quantity</label>
                                            <input required type="number" name="quantity" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Brand</label>
                                            <input required type="text" name="brand" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Model Number</label>
                                            <input required type="text" name="modelnumber" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Movement</label>
                                            <input required type="text" name="movement" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Case Material</label>
                                            <input required type="text" name="casematerial" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Strap Material</label>
                                            <input required type="text" name="strapmaterial" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Dial Size</label>
                                            <input required type="text" name="dialsize" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Water Resistance</label>
                                            <input required type="text" name="water" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Warranty</label>
                                            <input required type="text" name="warranty" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label fw-bold">Description</label>
                                            <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                                        </div>
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

                <!-- Edit Product Modal -->
                <div class="modal fade" id="edit-men" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="edit_men_form" autocomplete="off">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Edit Product</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Name</label>
                                            <input required type="text" name="name" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Category</label>
                                            <input required type="text" name="category" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Price</label>
                                            <input required type="number" name="price" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Quantity</label>
                                            <input required type="number" name="quantity" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Brand</label>
                                            <input required type="text" name="brand" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Model Number</label>
                                            <input required type="text" name="modelnumber" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Movement</label>
                                            <input required type="text" name="movement" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Case Material</label>
                                            <input required type="text" name="casematerial" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Strap Material</label>
                                            <input required type="text" name="strapmaterial" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Dial Size</label>
                                            <input required type="text" name="dialsize" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Water Resistance</label>
                                            <input required type="text" name="water" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>
    
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Warranty</label>
                                            <input required type="text" name="warranty" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label fw-bold">Description</label>
                                            <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                                        </div>

                                        <input type="hidden" name="men_id">
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

                <!-- Men Iages Modal -->
                <div class="modal fade" id="men-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Product Name</h1>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="image-alert">

                                </div>
                                <div class="border-bottom border-3 pb-3 mb-3">
                                    <form id="add_image_form">
                                        <label class="form-label fw-bold">Add Image</label>
                                        <input required type="file" name="image" accept=".jpg, .png, .webp, .jpeg" class="form-control mb-3 shadow-none">
                                        <button class="btn btn-outline-dark shadow-none">ADD</button>
                                        <input type="hidden" name="men_id">
                                    </form>
                                </div>

                                <div class="table-responsive-lg" style="height: 350px; overflow-y: scroll;">
                                    <table class="table table-hover border text-center">
                                        <thead>
                                            <tr class="bg-dark text-light sticky-top">
                                                <th scope="col" class="bg-dark text-light" width="60%">Image</th>
                                                <th scope="col" class="bg-dark text-light">Thumb</th>
                                                <th scope="col" class="bg-dark text-light">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody id="men-image-data">
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
    <script src="./scripts/men.js"></script>

</body>
</html>