<?php 
    require('inc/essentials.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETERNA - SETTINGS</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 p-4 overflow-hidden ms-auto">
                <h3 class="mb-4">SETTINGS</h3>

                <!-- General Settings Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                            <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Title</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">Abous Us</h6>
                        <p class="card-text" id="site_about"></p>
                    </div>
                </div>

                <!-- General Section Modal -->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">General Setting</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 ps-0 mb-3">
                                        <label class="form-label fw-bold">Title</label>
                                        <input required type="text" name="site_title" id="site_title_inp" class="form-control shadow-none">                  
                                    </div>
                                    <div class="col-md-12 p-0 mb-3">
                                        <label class="form-label fw-bold">Description</label>
                                        <textarea required name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about" class="btn text-secondary border-0 shadow-none" data-bs-dismiss="modal">Cancle</button>
                                    <button type="submit" class="btn btn-outline-dark shadow-none">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Shutdown Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Shutdown Website</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                                </form>
                            </div>
                        </div>
                        <p class="card-text">
                            No Customers Will Be Allowed To Made Purchases While Shoudown Mode Is Turned On.
                        </p>
                    </div>
                </div>

                <!-- Contact Us & Social Media Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Contacts Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                            <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Play Store</h6>
                                    <p class="card-text" id="ps"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">App Store</h6>
                                    <p class="card-text" id="ios"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">E-mail</h6>
                                    <p class="card-text" id="email"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Phone Number</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="pn1"></span>
                                    </p>
                                    <p class="card-text">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="pn2"></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                                <div class="mb-4">
                                    <p class="card-text mb-1">
                                        <div class="d-flex align-items-center">
                                            <i style="font-size: 22px;" class="bi bi-facebook me-2"></i>
                                            <span id="fb"></span>
                                        </div>
                                    </p>
                                    <p class="card-text mb-1">
                                        <div class="d-flex align-items-center">
                                            <i style="font-size: 22px;" class="bi bi-instagram me-2"></i>
                                            <span id="insta"></span>
                                        </div>
                                    </p>
                                    <p class="card-text">
                                        <div class="d-flex align-items-center">
                                            <i style="font-size: 22px;" class="bi bi-youtube me-2"></i>
                                            <span id="yt"></span>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contaact Us & Social Media Modal -->
                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="contacts_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Contacts Setting</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="p-0 container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Play Store</label>
                                                    <input required type="text" name="playstore" id="ps_inp" class="form-control shadow-none">                  
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">App Store</label>
                                                    <input required type="text" name="appstore" id="ios_inp" class="form-control shadow-none">                  
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Email</label>
                                                    <input required type="text" name="email" id="email_inp" class="form-control shadow-none">                  
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Facebook</label>
                                                    <input required type="text" name="fb" id="fb_inp" class="form-control shadow-none">                  
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Instagram</label>
                                                    <input required type="text" name="insta" id="insta_inp" class="form-control shadow-none">                  
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Youtube</label>
                                                    <input required type="text" name="yt" id="yt_inp" class="form-control shadow-none">                  
                                                </div>
                                            </div>
                                            <label class="form-label fw-bold">Phone Number (With Country Code)</label>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                    <input type="number" name="pn1" id="pn1_inp" required class="form-control shadow-none" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                    <input type="number" name="pn2" id="pn2_inp" class="form-control shadow-none" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="contacts_inp(contacts_data)" class="btn text-secondary border-0 shadow-none" data-bs-dismiss="modal">Cancle</button>
                                    <button type="submit" class="btn btn-outline-dark shadow-none">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Category Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Category Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#cat-s">
                            <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>

                        <div class="row" id="cat-data"> 
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

                <!-- category Modal -->
                <div class="modal fade" id="cat-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="cat_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Add Category</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 ps-0 mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input required type="text" name="cat_name" id="cat_name_inp" class="form-control shadow-none">                  
                                    </div>
                                    <div class="col-md-12 ps-0 mb-3">
                                        <label class="form-label fw-bold">Page Link</label>
                                        <input required type="text" name="cat_page" id="cat_page_inp" class="form-control shadow-none">                  
                                    </div>
                                    <div class="col-md-12 p-0 mb-3">
                                        <label class="form-label fw-bold">Picture</label>
                                        <input required type="file" name="cat_picture" id="cat_picture_inp" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="cat_name.value='', cat_page.value='', cat_picture.value=''" class="btn text-secondary border-0 shadow-none" data-bs-dismiss="modal">Cancle</button>
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
    <script src="./scripts/settings.js"></script>

</body>
</html>