<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETERNA - HOME</title>

    <?php require('inc/links.php'); ?>

    <!-- Swiper JS's CDN Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <style>
      /* Banner */
      .banner {
        width: 100%;
        position: relative;
      }

      .banner img {
        width: 100%;
        height: auto;
      }

      /* Categories Section */
      .categories {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px;
        background-color: #f9f9f9;
      }

      .category {
        flex: 1 1 calc(25% - 40px);
        max-width: calc(25% - 40px);
        text-align: center;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      .category img {
        width: 100%;
        height: auto;
        border-radius: 10px;
      }

      .category h3 {
        margin: 10px 0;
      }

      /* Gifts Block */
      .gifts {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        gap: 10px;
        padding: 60px;
        position: absolute; /* Absolute relative to parent container */
        top: 20px; /* Adjust placement above the banner */
        left: 0;
        width: 100%; /* Full width of the container */
        z-index: 10;
      }

      .gift-item {
        flex: 1;
        text-align: center;
        padding: 10px;
        text-decoration: none;
      }

      .gift-item img {
        width: 100%;
        height: auto;
        border-radius: 10px;
      }

      .banner {
        margin-top: 200px; /* Adjust margin to avoid overlap */
        position: relative;
      }


      .capsule-button {
        background-color: white; 
        color: black; 
        border-radius: 50px; 
        padding: 10px;
      }

      .capsule-button:hover {
        background-color: black;
        color: white;
      }

      /* Separator Line CSS */
      .separator {
      border: 0;
      height: 2px; /* Thickness of the line */
      background-color: #686464; /* Line color */
      margin: 20px 5px; /* Margin around the line */
      }

      /* Current Highlight Img Styling */
      .card {
        overflow: hidden; /* Prevents content from going outside the card */
      }

      .card-img-top {
        opacity: 0.8;
        transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
      }

      .card-img-top:hover {
        opacity: 1;
        transform: scale(1.05); /* Slight zoom effect */
      }

      /* Collection Section CSS */
      /* Style for the slider container */
      /* Remove any unnecessary margin/padding in the swiper wrapper and slides */
      .sld .swiper-wrapper {
        gap: 5px; /* Set a small gap here as well, though 'spaceBetween' should handle it */
        margin: 0;
        padding: 0;
      }

      .sld .swiper-slide {
        margin: 0;
        padding: 0;
      }

      .sld {
        width: 100%; /* Full width of the container */
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 0;
      }

      /* Swiper slide images */
      .sld .swiper-slide img {
        width: 180px; /* Fixed width */
        height: 180px; /* Fixed height */
        border-radius: 50%; /* Circular shape */
        object-fit: cover; /* Crop and center the image */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Optional: Add shadow */
        border: 2px solid #fff; /* Optional: Add a border */
        margin: auto; /* Center the image */
      }

      /* Swiper wrapper for spacing */
      .sld .swiper-wrapper {
        gap: 5px; /* 10px gap between slides */
      }

      /* Navigation button styling */
      .sld .swiper-button-next,
      .sld .swiper-button-prev {
        color: #000; /* Button color */
        background: rgba(255, 255, 255, 0.8); /* Light background */
        border-radius: 50%; /* Circular buttons */
        width: 30px; /* Reduced size */
        height: 30px; /* Reduced size */
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        position: absolute; /* Position buttons in the center of the images */
        top: 50%;
        transform: translateY(-50%); /* Vertically center the button */
        transition: none; /* Remove any transition on hover */
      }

      /* Adjust size of arrows */
      .sld .swiper-button-next::after,
      .sld .swiper-button-prev::after {
        font-size: 14px; /* Smaller arrow size */
      }

      .sld .swiper-button-next:hover,
      .sld .swiper-button-prev:hover {
        background: #000; /* Darker background on hover */
        color: #fff; /* White arrow on hover */
      }

      /* Pagination dots */
      .sld .swiper-pagination-bullet {
        background: #000; /* Bullet color */
        opacity: 1;
      }

      .sld .swiper-pagination-bullet-active {
        background: #C23737; /* Highlight active bullet */
      }


    </style>

</head>
<body>
  <!-- <div class="tagline mt-1 h"><span class="r">"</span> A Legacy In Every Second <span class="r">"</span></div> -->
 
  <!-- Includes Header -->
  <?php require('inc/header.php') ?>

  <!-- Carousel Body -->
  <div class="container-fluid px-lg-4 mt-4">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <?php 
          $res = selectAll('carousel');

          while ($row = mysqli_fetch_assoc($res)) 
          {
            $path = CAROUSEL_IMG_PATH;
            echo <<<data
              <div class="swiper-slide">
                <img class="w-100 d-block" src="$path$row[image]" />
              </div>
            data;
          }
        ?>
      </div>
    </div>
  </div>

  <!-- For Him Section -->
  <div class="container-fluid px-lg-4 mt-4 position-relative d-none d-lg-block">
    <section class="gifts" style="margin-top: -210px;">
      <a href="#" class="gift-item">
        <img src="https://www.fossil.com/on/demandware.static/-/Library-Sites-FossilSharedLibrary/default/dwb3538ba7/2024/HO24/set_10212024_global/hp/1021_Homepage_hero2_mensgifts_A.jpg" alt="Wallet">
      </a>
      <a href="#" class="gift-item">
        <img src="https://www.fossil.com/on/demandware.static/-/Library-Sites-FossilSharedLibrary/default/dwcd16786d/2024/HO24/set_10212024_global/1021_Homepage_hero2_mensgifts_2_Desktop.jpg" alt="Watches">
      </a>
      <a href="#" class="gift-item">
        <img src="https://www.fossil.com/on/demandware.static/-/Library-Sites-FossilSharedLibrary/default/dwd40bb626/2024/HO24/set_10212024_global/hp/1021_Homepage_hero2_mensgifts_C.jpg" alt="Bracelet">
      </a>
    </section>

    <section class="gifts" style="margin-top: 330px;">
      <div class="text-content text-center">
          <h1 style="color: white;" class="mb-3 h">FOR HIM</h1>
          <h6 style="color: white;" class="h-font fw-bold fs-5 mb-4" >Engravable watches in iconic finishes and our bestselling Arden jewelery collection, just to name a few.</h6>
          <a href="#" class="capsule-button fs-6 text-decoration-none">Shop Now</a>
      </div>
    </section>

  
    <!-- Banner -->
    <div class="banner d-block">
      <img style="margin-top: -170px;" src="https://www.fossil.com/on/demandware.static/-/Library-Sites-FossilSharedLibrary/default/dw2cb4f9d4/2024/HO24/set_10212024_global/hp/1021_Homepage_hero2_mensgifts_background_desktop-shorter.jpg" alt="Main Banner">
    </div>
  </div>

  <!-- For Her Section -->
  <div style="margin-top: -80px;" class="d-none d-lg-block">
    <div class="container-fluid px-lg-4 mt-4 position-relative">
      <section class="gifts" style="margin-top: -170px;">
        <a href="#" class="gift-item">
          <img src="https://www.fossil.com/on/demandware.static/-/Library-Sites-FossilSharedLibrary/default/dw3705a8fe/2024/HO24/set_10212024_global/hp/1021_Homepage_hero3_womensgifts_A.jpg" alt="Wallet">
        </a>
        <a href="#" class="gift-item">
          <img src="https://www.fossil.com/on/demandware.static/-/Library-Sites-FossilSharedLibrary/default/dw529c2162/2024/HO24/set_10212024_global/hp/1021_Homepage_hero3_womensgifts_B.jpg" alt="Watches">
        </a>
        <a href="#" class="gift-item">
          <img src="https://www.fossil.com/on/demandware.static/-/Library-Sites-FossilSharedLibrary/default/dw5b9dc455/2024/HO24/set_10212024_global/hp/1021_Homepage_hero3_womensgifts_C.jpg" alt="Bracelet">
        </a>
      </section>
  
      <section class="gifts" style="margin-top: 350px;">
        <div class="text-content text-center">
            <h1 style="color: white;" class="mb-3 h">FOR HER</h1>
            <h6 style="color: white;" class="h-font fw-bold fs-5 mb-4" >Wow her with a reissued vintage timepiece from the ‘90s or a pop of leopard.</h6>
            <a href="#" class="capsule-button fs-6 text-decoration-none">Shop Now</a>
        </div>
      </section>
  
    
      <!-- Banner -->
      <div class="banner d-block">
        <img style="margin-top: -150px;" src="https://www.fossil.com/on/demandware.static/-/Library-Sites-FossilSharedLibrary/default/dw4bf71381/2024/HO24/set_10212024_global/hp/1021_Homepage_hero3_womensgifts_background_desktop-shorter.jpg" alt="Main Banner">
      </div>
    </div>
  </div>

  <!-- Current Highlight -->
  <h1 class="h-font mt-5 pt-4 mb-4 text-center">CURRENT HIGHLIGHT</h1>
  <!-- <div class="container">
    <div class="row">

      <?php 
        $men_res = select("SELECT * FROM `men` WHERE `status`=? AND `removed`=? ORDER BY `id` DESC LIMIT 3",[1,0],'ii');

        while ($men_data = mysqli_fetch_assoc($men_res))
        {
          // get thumbnail of image
          $men_thumb = MEN_IMG_PATH."thumbnail.jpg";
          $thumb_q = mysqli_query($con,"SELECT * FROM `men_images` 
            WHERE `men_id`='$men_data[id]' 
            AND `thumb`='1'");

          if (mysqli_num_rows($thumb_q) > 0) {
            $thumb_res = mysqli_fetch_assoc($thumb_q);
            $men_thumb = MEN_IMG_PATH.$thumb_res['image'];
          }

          // remove buy now button while shutdown mode is on
          $book_btn = '';
          if (!$settings_r['shutdown']) {
            $login = 0;
            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                $login = 1;
            }
        
            if ($men_data['quantity'] > 0) {
                // Product is in stock, show the normal button
                $book_btn = "<button onclick='checkLoginToBook($login, $men_data[id])' class='btn btn-sm btn-outline-dark shadow-none mb-2 mb-lg-0'> Book Now </button>";
            } else {
                // Product is out of stock, show disabled button
                $book_btn = "<button class='btn btn-sm btn-outline-dark shadow-none mb-2 mb-lg-0' disabled>Book Now</button>";
            }
          }    

          // check quantity and show message according to it 
          $stock_status = ($men_data['quantity'] <= 0) ? "<span class='text-danger ms-3 fw-bold' style='font-size: 0.8rem;'>*Out of Stock</span>" : "";

          // Print product Card
          echo<<<data
            <div class="col-lg-4 col-md-6 ps-5 my-3">
              <div class="card border-0 shadow text-center p-2">
                <div class="img-container">
                  <img src="$men_thumb" class="img-fluid rounded" style="max-width: 80%; height: auto;">
                </div>
                <div class="card-body text-start p-2">
                  <h6 class="mb-1 fs-6">$men_data[name]</h6>
                  <p class="text-secondary mb-1" style="font-size: 0.8rem;">$men_data[category]</p>
                  <p class="fw-bold" style="font-size: 0.9rem;">₹$men_data[price]/- $stock_status</p>
                  <div class="rating mb-3">
                    <span class="badge bg-light">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-half text-warning"></i>
                    </span>
                  </div>
                  <div class="d-flex flex-column flex-lg-row justify-content-evenly mb-2">
                    $book_btn
                    <a href="men_details.php?id=$men_data[id]" class="btn btn-sm btn-outline-dark shadow-none"> More Details </a>
                  </div>
                </div>
              </div>
          </div>
          data;

        }
      ?>

      <div class="col-lg-12 text-center mt-5 ">
        <a href="#" class="capsule-button fs-6 btn btn-sm btn-outline-dark shadow-none"> Explore More </a>
      </div>

    </div>
  </div> -->
  <div class="container">
    <div class="row justify-content-center">

      <?php 
        $men_res = select("SELECT * FROM `men` WHERE `status`=? AND `removed`=? ORDER BY `id` DESC LIMIT 3",[1,0],'ii');

        while ($men_data = mysqli_fetch_assoc($men_res))
        {
          // Get thumbnail image
          $men_thumb = MEN_IMG_PATH."thumbnail.jpg";
          $thumb_q = mysqli_query($con,"SELECT * FROM `men_images` 
            WHERE `men_id`='$men_data[id]' 
            AND `thumb`='1'");

          if (mysqli_num_rows($thumb_q) > 0) {
            $thumb_res = mysqli_fetch_assoc($thumb_q);
            $men_thumb = MEN_IMG_PATH.$thumb_res['image'];
          }

          // Disable 'Book Now' button if site is in shutdown mode
          $book_btn = '';
          if (!$settings_r['shutdown']) {
            $login = 0;
            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                $login = 1;
            }
        
            if ($men_data['quantity'] > 0) {
                // Product in stock
                $book_btn = "<button onclick='checkLoginToBook($login, $men_data[id])' class='btn btn-sm btn-outline-dark shadow-none w-100'> Book Now </button>";
            } else {
                // Out of stock
                $book_btn = "<button class='btn btn-sm btn-outline-dark shadow-none w-100' disabled>Out of Stock</button>";
            }
          }    

          // Stock status message
          $stock_status = ($men_data['quantity'] <= 0) ? "<span class='text-danger fw-bold' style='font-size: 0.8rem;'>*Out of Stock</span>" : "";

          // Print product Card
          echo<<<data
            <div class="col-12 col-md-6 col-lg-4 px-2 my-3">
              <div class="card border-0 shadow text-center p-3 mx-auto w-100">
                <div class="img-container">
                  <img src="$men_thumb" class="img-fluid rounded w-100">
                </div>
                <div class="card-body text-start p-2">
                  <h6 class="mb-1 fs-6">$men_data[name]</h6>
                  <p class="text-secondary mb-1" style="font-size: 0.8rem;">$men_data[category]</p>
                  <p class="fw-bold mb-1" style="font-size: 0.9rem;">₹$men_data[price]/- $stock_status</p>
                  <div class="rating mb-3">
                    <span class="badge bg-light">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-half text-warning"></i>
                    </span>
                  </div>
                  <div class="d-flex flex-column flex-md-row justify-content-evenly gap-2">
                    $book_btn
                    <a href="men_details.php?id=$men_data[id]" class="btn btn-sm btn-outline-dark shadow-none w-100"> More Details </a>
                  </div>
                </div>
              </div>
            </div>
          data;
        }
      ?>

      <div class="col-12 text-center mt-5">
        <a href="#" class="capsule-button fs-6 btn btn-sm btn-outline-dark shadow-none"> Explore More </a>
      </div>

    </div>
  </div>

  <!-- Discover Your Style Section -->
  <h1 class="h-font mt-5 text-center">DISCOVER YOUR STYLE </h1>
  <div class="container-fluid px-lg-4 mt-4" style="padding: 30px 0px;">
      <div class="swiper text-center mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <a href="#">
              <img style="height: 100%; width: 350px;" src="https://www.titan.co.in/dw/image/v2/BKDD_PRD/on/demandware.static/-/Library-Sites-TitanSharedLibrary/default/dw0b293ab5/images/homepage/All_Banners/Discover_Minimal_D.jpg">
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#">
              <img style="height: 100%; width: 350px;" src="https://www.titan.co.in/dw/image/v2/BKDD_PRD/on/demandware.static/-/Library-Sites-TitanSharedLibrary/default/dwbf49db4e/images/homepage/All_Banners/Discover_Bold_D.jpg">
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#">
              <img style="height: 100%; width: 350px;" src="https://www.titan.co.in/dw/image/v2/BKDD_PRD/on/demandware.static/-/Library-Sites-TitanSharedLibrary/default/dwdae85b9d/images/homepage/All_Banners/Discover_Luxe_D.jpg">
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#">
              <img style="height: 100%; width: 350px;" src="https://www.titan.co.in/dw/image/v2/BKDD_PRD/on/demandware.static/-/Library-Sites-TitanSharedLibrary/default/dw93f8affd/images/homepage/All_Banners/Discover_Couple_D.jpg">
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#">
              <img style="height: 100%; width: 350px;" src="https://www.titan.co.in/dw/image/v2/BKDD_PRD/on/demandware.static/-/Library-Sites-TitanSharedLibrary/default/dw816cf69a/images/homepage/All_Banners/Discover_Sporty_D.jpg">
            </a>
          </div>
        </div>
      </div>
  </div>

  <!-- Collection -->
  <h1 class="h mt-5 pt-4 mb-4 text-center">THE BEST WAY TO BUY THE PRODUCTS YOU LOVE</h1>
  <div class="sld">
    <div class="swiper Sswiper">
      <div class="swiper-wrapper mb-5">
        <?php 
          $category_r = selectAll('cat_details');
          $path = CATEGORY_IMG_PATH;
          
          while ($row = mysqli_fetch_assoc($category_r)) {
            echo <<<data
              <div class="swiper-slide">
                <a href="$row[page]">
                  <img src="$path$row[picture]" alt="Image 1">
                </a>
                <h5 class="text-center pt-4">$row[name]</h5>
              </div>
            data;
          }
        
        ?>
      </div>
      <div class="swiper-button-next" style="margin-top: -50px;"></div>
      <div class="swiper-button-prev" style="margin-top: -50px;"></div>
    </div>
  </div>

  <!-- Watchout Section 1 -->
  <div class="container mb-5">
    <div class="row align-items-center">
        <!-- Carousel Section -->
        <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <img src="https://www.fastrack.in/dw/image/v2/BKDD_PRD/on/demandware.static/-/Library-Sites-FastrackSharedLibrary/default/dwa9cbcc92/images/homepage/desktop/3304KD01_4.jpg" 
                             class="d-block mx-auto img-fluid" style="max-height: 300px;">
                        <div class="carousel-caption-custom">
                            <h5 class="text-dark">CERAME</h5>
                            <p class="text-dark">Fastrack's pioneering ceramic collection...</p>
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <img src="https://www.fastrack.in/dw/image/v2/BKDD_PRD/on/demandware.static/-/Library-Sites-FastrackSharedLibrary/default/dw9a9828f3/images/homepage/desktop/3304ND01_4.jpg" 
                             class="d-block mx-auto img-fluid" style="max-height: 300px;">
                        <div class="carousel-caption-custom">
                            <h5 class="text-dark">CERAME</h5>
                            <p class="text-dark">Fastrack's pioneering ceramic collection...</p>
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <img src="https://www.fastrack.in/dw/image/v2/BKDD_PRD/on/demandware.static/-/Library-Sites-FastrackSharedLibrary/default/dwad094adf/images/homepage/desktop/6292QM01_3.jpg" 
                             class="d-block mx-auto img-fluid" style="max-height: 300px;">
                        <div class="carousel-caption-custom">
                            <h5 class="text-dark">CRUSH</h5>
                            <p class="text-dark">Uniquely styled with creases and pinches...</p>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" style="filter: invert(1);"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" style="filter: invert(1);"></span>
                </button>
            </div>
        </div>

        <!-- Image Section -->
        <div class="col-lg-6 col-md-12 text-center">
          <img src="https://www.fastrack.in/dw/image/v2/BKDD_PRD/on/demandware.static/-/Library-Sites-FastrackSharedLibrary/default/dw5830d29e/images/homepage/desktop/featured-collections-desktop.jpg" 
            class="img-fluid rounded" style="max-width: 100%; height: auto;">
        </div>
    </div>
  </div>


  <!-- Watchout Section 2 -->
  <section class="watch-features section-gap">
    <div class="container">
      <div class="row justify-content-center align-items-center text-center">
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="single-feature mb-3">
            <i class="bi bi-heart-pulse fs-2"></i>
            <h4>Heart Rate Monitoring</h4>
            <p>
              Track your heart rate in real-time, ensuring that you maintain optimal health during workouts or throughout the day.
            </p>
          </div>
          <div class="single-feature mb-3">
            <i class="bi bi-moon-stars fs-2"></i>
            <h4>Sleep Tracking</h4>
            <p>
              Analyze your sleep patterns to get insights on your sleep quality and duration, helping you improve your rest.
            </p>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 mb-4">
          <img class="img-fluid mx-auto d-block" src="https://themewagon.github.io/watch/img/c1.png" alt="Watch">
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="single-feature mb-3">
            <i class="bi bi-bell fs-2"></i>
            <h4>Notification</h4>
            <p>
              Receive notifications for calls, messages, emails, and apps directly on your smartwatch, keeping you updated even when your phone is out of reach.
            </p>
          </div>
          <div class="single-feature mb-3">
            <i class="bi bi-compass fs-2"></i>
            <h4>GPS Navigation</h4>
            <p>
              Use built-in GPS to get directions, track your runs, or find your way without needing to pull out your phone.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- About Us Section - TRIALS -->
  <div class="container d-none d-lg-block">
    <div class="row featurette">

    <div class="d-flex align-items-center mb-5">
      <div class="col-md-5">
        <img class="rounded" src="https://shop.timexindia.com/cdn/shop/files/pdp-home-page_686x.jpg?v=1731687438" style="box-shadow: rgb(155, 148, 148) 15px 15px 2rem;" height="350" width="350">
      </div>
      <div class="col-md-7 p-3">
        <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="" style="color: #C23737;">It’ll blow your mind.</span></h2>
        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
      </div>
    </div>

    <div class="d-flex align-items-center mb-5">
      <div class="col-md-7 p-3">
        <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="" style="color: #C23737;">It’ll blow your mind.</span></h2>
        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
      </div>
      <div class="col-md-5">
        <img class="rounded" src="https://shop.timexindia.com/cdn/shop/files/more-to-luv-1.png?v=1718365697" style="box-shadow: rgb(155, 148, 148) 15px 15px 2rem; margin-left: 140px;" height="350" width="350">
      </div>
    </div>

    <div class="d-flex align-items-center mb-5">
      <div class="col-md-5">
        <img class="rounded" src="https://shop.timexindia.com/cdn/shop/files/timex-home-right_686x.png?v=1718364360" style="box-shadow: rgb(155, 148, 148) 15px 15px 2rem;" height="350" width="350">
      </div>
      <div class="col-md-7 p-3">
        <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="" style="color: #C23737;">It’ll blow your mind.</span></h2>
        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
      </div>
    </div>

    <div class="d-flex align-items-center mb-5">
      <div class="col-md-7 p-3">
        <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="" style="color: #C23737;">It’ll blow your mind.</span></h2>
        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
      </div>
      <div class="col-md-5">
        <img class="rounded" src="https://shop.timexindia.com/cdn/shop/files/TW2W14900_N-CatCarousel.jpg?v=1710359526" style="box-shadow: rgb(155, 148, 148) 15px 15px 2rem; margin-left: 140px;" height="350" width="350">
      </div>
    </div>

    </div>
  </div>
  

  <!-- Services -->
  <div class="container py-5">
  <h2 class="text-center pb-2 border-bottom">SERVICES</h2>

  <div class="row g-4 text-center py-5 d-flex justify-content-center">

    <!-- First Service -->
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="feature d-flex flex-column align-items-center">
        <div class="feature-icon d-flex align-items-center justify-content-center mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 225 225" fill="#C23737">
          <g transform="translate(0.000000,225.000000) scale(0.100000,-0.100000)"
          fill="#C23737" stroke="none">
          <path d="
                M1106 1879 c-57 -30 -60 -30 -121 -19 -98 18 -128 3 -176 -92 -25
                -50 -37 -62 -87 -87 -90 -46 -96 -56 -88 -155 6 -80 4 -88 -24 -148 -44 -92
                -40 -109 36 -189 39 -39 46 -54 55 -109 15 -94 32 -115 104 -130 l30 -6 5
                -189 c5 -189 9 -215 34 -215 11 0 57 48 101 107 8 11 19 3 50 -34 l40 -48 5
                -110 c5 -100 7 -110 25 -113 14 -2 33 14 63 52 79 98 71 97 138 16 42 -51 64
                -70 79 -68 19 3 20 12 25 283 5 270 6 282 29 325 33 63 48 78 113 111 75 38
                82 53 74 156 -6 79 -5 86 25 145 39 77 34 111 -22 164 -49 47 -69 83 -69 124
                0 39 -21 90 -47 113 -11 10 -49 22 -83 28 -74 12 -91 20 -120 56 -55 70 -104
                78 -194 32z m149 -70 c50 -51 77 -65 144 -74 63 -9 91 -32 91 -77 0 -62 19
                -103 70 -153 27 -27 50 -55 50 -62 0 -8 -14 -42 -31 -76 -31 -60 -32 -64 -22
                -132 13 -86 8 -96 -72 -138 -52 -28 -64 -40 -95 -97 l-36 -65 -89 3 c-76 2
                -96 0 -130 -18 -83 -44 -79 -45 -146 15 -40 36 -72 56 -95 60 -19 3 -50 7 -69
                10 -39 6 -65 36 -65 75 0 54 -23 104 -71 155 -27 29 -49 57 -49 64 0 6 14 37
                30 68 31 59 36 92 20 158 -14 57 -5 72 58 104 67 34 81 48 116 119 15 29 33
                55 42 59 8 3 43 0 79 -7 63 -12 66 -11 127 18 35 17 72 31 83 31 12 1 38 -17
                60 -40z m-216 -979 l31 0 0 -87 0 -88 -39 43 c-21 23 -41 42 -44 42 -3 0 -24
                -19 -46 -42 l-41 -43 0 139 0 139 54 -52 c42 -38 62 -51 85 -51z m301 -170 l0
                -205 -46 53 c-40 45 -83 68 -84 45 -1 -5 -19 -28 -40 -53 l-40 -45 0 198 0
                198 39 17 c33 15 49 16 105 8 l66 -10 0 -206z"/>
                <path d="M1053 1740 c-116 -24 -220 -107 -269 -213 -26 -55 -29 -73 -29 -162
                0 -90 3 -106 29 -159 39 -79 102 -140 184 -179 60 -29 77 -32 157 -32 80 0 97
                3 157 32 82 39 145 100 184 179 26 53 29 69 29 159 0 89 -3 107 -29 163 -70
                152 -252 246 -413 212z m157 -66 c142 -42 229 -157 230 -300 0 -39 -7 -91 -16
                -117 -20 -61 -93 -141 -158 -175 -44 -23 -63 -27 -141 -27 -78 0 -97 4 -141
                27 -65 34 -138 114 -158 175 -23 67 -21 177 5 233 42 93 111 155 205 183 64
                20 109 20 174 1z"/>
                <path d="M1155 1380 c-60 -44 -111 -80 -112 -80 -2 0 -15 18 -29 40 -28 43
                -44 49 -64 25 -10 -12 -5 -26 26 -75 23 -35 46 -60 56 -60 17 0 245 157 267
                184 15 17 4 46 -18 46 -9 -1 -65 -37 -126 -80z"/>
              </g>
          </svg>
        </div>
        <h3 class="fs-4 text-body-emphasis">100% Original</h3>
      </div>
    </div>

    <!-- Second Service -->
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="feature d-flex flex-column align-items-center">
        <div class="feature-icon d-flex align-items-center justify-content-center mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 360 360" fill="#C23737">
            <g transform="translate(0.000000,360.000000) scale(0.100000,-0.100000)"
            fill="#C23737" stroke="none">
            <path d="M2302 2964 c-29 -20 -28 -29 13 -130 19 -47 29 -84 22 -81 -7 3 -49
            22 -95 42 -46 20 -127 48 -180 62 -86 23 -116 26 -262 26 -146 0 -176 -3 -262
            -26 -446 -119 -758 -471 -819 -924 -23 -174 8 -392 79 -559 57 -135 95 -177
            130 -142 19 19 14 43 -27 126 -22 43 -52 118 -67 168 -26 83 -28 101 -28 274
            0 173 2 191 27 273 29 93 90 223 140 297 40 58 169 192 228 235 173 128 379
            195 599 195 173 0 342 -42 478 -118 l47 -27 -114 -15 c-95 -13 -116 -18 -128
            -36 -12 -18 -11 -24 4 -43 l18 -22 165 21 c207 26 207 26 215 49 8 25 -121
            348 -145 361 -11 6 -24 4 -38 -6z"/>
            <path d="M2672 2368 c-19 -19 -14 -43 27 -126 22 -43 52 -118 67 -168 26 -83
            28 -101 28 -274 0 -173 -2 -191 -27 -273 -29 -93 -90 -223 -140 -297 -45 -66
            -173 -196 -242 -245 -118 -84 -281 -153 -415 -174 -95 -16 -266 -13 -361 5
            -92 17 -212 60 -287 102 l-47 27 114 15 c95 13 116 18 128 36 12 18 11 24 -4
            43 l-18 22 -165 -21 c-207 -26 -207 -26 -215 -49 -8 -25 121 -348 145 -361 20
            -11 60 13 60 36 0 8 -16 53 -35 100 -19 47 -29 84 -22 81 7 -3 49 -22 95 -42
            46 -20 127 -48 180 -62 86 -23 116 -26 262 -26 146 0 176 3 262 26 446 119
            758 471 819 924 23 174 -8 392 -79 559 -57 135 -95 177 -130 142z"/>
            <path d="M1425 2248 c-176 -28 -321 -52 -323 -53 -6 -5 -102 -369 -98 -372 2
            -2 23 -7 47 -11 l44 -8 3 -191 c2 -172 4 -192 20 -197 9 -3 168 -28 352 -56
            l335 -51 345 53 345 54 5 194 5 195 48 8 c26 5 47 12 47 16 0 3 -22 87 -49
            186 -31 117 -53 181 -62 183 -137 25 -671 102 -702 101 -23 -1 -186 -24 -362
            -51z m593 -43 c203 -32 264 -45 221 -45 -8 0 -112 -16 -231 -34 l-216 -34
            -218 34 c-220 34 -256 41 -219 44 16 1 419 65 434 69 2 1 105 -15 229 -34z
            m470 -203 c19 -67 33 -124 31 -125 -5 -4 -593 -95 -597 -92 -3 2 -59 205 -64
            230 -3 18 16 23 287 66 160 26 294 46 299 45 5 -1 25 -57 44 -124z m-1020 74
            c150 -24 274 -45 277 -47 4 -5 -59 -236 -67 -244 -4 -4 -590 84 -596 90 -1 1
            12 57 30 123 31 115 34 122 58 122 14 -1 148 -20 298 -44z m299 -692 c-2 -2
            -133 17 -292 41 -158 25 -292 45 -296 45 -5 0 -9 72 -9 160 0 88 3 160 8 160
            4 0 125 -18 270 -41 145 -22 269 -39 275 -36 7 3 19 29 27 58 15 52 15 48 18
            -165 1 -120 1 -220 -1 -222z m92 369 c6 -24 15 -43 19 -43 4 0 122 18 262 40
            140 22 265 40 277 40 23 0 23 0 23 -158 l0 -158 -272 -43 c-150 -23 -286 -43
            -301 -44 l-28 -2 -2 212 c-1 117 1 209 4 205 3 -4 11 -26 18 -49z"/>
            </g>
          </svg>
        </div>
        <h3 class="fs-4 text-body-emphasis">7 Days Return</h3>
      </div>
    </div>

    <!-- Third Service -->
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="feature d-flex flex-column align-items-center">
        <div class="feature-icon d-flex align-items-center justify-content-center mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 563 360" fill="#C23737">
          <g transform="translate(0.000000,360.000000) scale(0.100000,-0.100000)"
                fill="#C23737" stroke="none">
                <path d="M1494 2771 c-87 -22 -134 -77 -144 -168 -4 -39 -12 -68 -21 -74 -8
                -5 -74 -9 -147 -9 -99 0 -140 -4 -162 -15 -38 -19 -40 -56 -5 -90 l24 -25 504
                0 c521 0 557 3 578 41 11 22 -11 73 -36 83 -9 3 -151 6 -316 6 l-299 0 0 39
                c0 23 8 48 19 62 l19 24 1016 0 c776 0 1018 -3 1027 -12 9 -9 -3 -154 -55
                -650 -37 -351 -70 -668 -73 -706 -3 -37 -11 -74 -17 -82 -9 -12 -92 -15 -577
                -16 -311 -1 -571 1 -578 5 -6 4 -11 22 -11 39 0 49 -54 134 -105 166 -64 41
                -123 54 -212 49 -145 -8 -254 -81 -309 -204 l-24 -54 -117 0 c-65 0 -124 4
                -132 9 -31 20 3 383 41 428 8 10 50 13 164 13 146 0 154 1 180 23 21 18 26 29
                21 49 l-7 25 -197 7 c-109 3 -366 9 -570 12 -409 7 -403 8 -403 -52 0 -65 -3
                -64 351 -64 l319 0 0 -37 c0 -21 -7 -99 -15 -173 -18 -166 -19 -257 -2 -290 7
                -13 28 -35 46 -47 31 -21 45 -23 161 -23 141 0 137 2 164 -70 30 -80 78 -135
                150 -170 62 -31 70 -32 158 -28 82 3 100 8 156 38 73 39 111 78 152 160 l30
                60 723 0 723 0 17 -54 c57 -181 254 -264 433 -182 67 31 149 113 184 183 l25
                50 85 6 c47 4 103 11 124 18 49 14 94 60 100 102 46 344 57 436 56 509 0 134
                -16 166 -171 343 -189 217 -265 292 -329 323 -55 27 -57 27 -299 30 l-243 4 8
                76 c21 180 6 260 -53 299 -25 17 -93 18 -1063 20 -569 1 -1049 -2 -1066 -6z
                m2671 -555 c77 -40 214 -176 322 -320 97 -129 108 -163 93 -283 -6 -43 -15
                -130 -20 -193 -19 -218 -33 -243 -136 -238 -62 3 -62 3 -91 83 -24 70 -102
                146 -172 170 -84 27 -189 18 -269 -25 -73 -39 -155 -123 -172 -177 -7 -21 -19
                -44 -28 -50 -16 -13 -108 -18 -136 -7 -28 11 -25 48 54 714 16 140 32 279 36
                307 l5 53 187 2 c237 4 254 2 327 -36z m-2168 -897 c66 -25 122 -109 123 -185
                0 -97 -96 -205 -196 -220 -157 -23 -264 131 -189 274 32 61 52 85 99 116 42
                28 111 35 163 15z m2141 -17 c115 -53 117 -248 2 -331 -51 -37 -117 -55 -185
                -49 -63 5 -89 24 -116 83 -85 184 115 382 299 297z"/>
                <path d="M3818 2123 c-39 -3 -49 -8 -53 -26 -6 -30 -23 -167 -31 -259 l-6 -78
                341 0 c193 0 341 4 341 9 0 5 -51 66 -112 137 -62 70 -126 142 -141 160 -16
                20 -43 37 -65 43 -45 12 -209 20 -274 14z"/>
                <path d="M756 2244 c-22 -21 -20 -67 2 -87 17 -15 72 -17 580 -17 616 0 592
                -2 592 60 0 62 24 60 -595 60 -499 0 -565 -2 -579 -16z"/>
                <path d="M904 2000 c-29 -11 -39 -56 -20 -85 8 -12 29 -25 47 -29 57 -11 1203
                -7 1237 5 17 6 34 19 37 29 10 31 -6 71 -32 81 -31 11 -1240 11 -1269 -1z"/>
                </g>
          </svg>
        </div>
        <h3 class="fs-4 text-body-emphasis">Fast & Secure Delivery</h3>
      </div>
    </div>

  </div>


  <!-- Password reset modal & code-->
  <div class="modal fade" id="recoverymodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="recovery-form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 d-flex align-items-center">
                        <i class="bi bi-shield-lock fs-3 me-2 "></i> Set up new Password
                    </h1>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label class="form-label">New Password</label>
                        <input type="password" name="pass" required class="form-control shadow-none">
                        <input type="hidden" name="email">
                        <input type="hidden" name="token">
                    </div>
                    <div class="mb-2 text-end">
                        <button type="button" class="btn text-secondary shadow-none me-2" data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-sm btn-dark shadow-none">Reset Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>



  <!-- Includes Footer -->
  <?php require('inc/footer.php') ?>

  <!-- PHP code for forget password model open -->
  <?php 
  
    if (isset($_GET['accont_recovery']))
    {
      $data = filteration($_GET);

      $t_date = date("Y-m-d");

      $query = select("SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? AND `t_expire`=? LIMIT 1",
        [$data['email'],$data['token'],$t_date],'sss');
        
      if (mysqli_num_rows($query) == 1) {
        echo<<<showModal
          <script>
            var myModal = document.getElementById('recoverymodal');

            myModal.querySelector("input[name='email']").value = '$data[email]';
            myModal.querySelector("input[name='token']").value = '$data[token]';

            var modal = bootstrap.Modal.getOrCreateInstance(myModal);
            modal.show();
          </script>
        showModal;
      }
      else {
        alert("error","Invalid or expired link!");
      }
    }
  
  ?>
    
  <!-- jQuery's JS link -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Swiper JS's JS Link -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Carousel & Discover Your Style JS -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      effect: "fade",
      loop: true, // Enables looping
      autoplay: {
        delay: 3500, // 3.5 seconds
        disableOnInteraction: false, // Keeps autoplay active after user interactions
      },
    });
  </script>

  <!-- Collection section Carousel JS -->
  <script>
    var swiper = new Swiper(".Sswiper", {
      slidesPerView: 7,
      spaceBetween: 0,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        320: {
          slidesPerView: 2, // Show 2 slides on small screens
          spaceBetween: 70,
        },
        768: {
          slidesPerView: 4, // Show 4 slides on tablets
          spaceBetween: 50,
        },
        1024: {
          slidesPerView: 7, // Show 7 slides on desktops
          spaceBetween: 10,
        },
      },
    });

    // Reset password
    let recovery_form = document.getElementById('recovery-form');

    recovery_form.addEventListener('submit',(e)=>{
        e.preventDefault();

        let data = new FormData();

        data.append('email',recovery_form.elements['email'].value);
        data.append('token',recovery_form.elements['token'].value);
        data.append('pass',recovery_form.elements['pass'].value);
        data.append('recover_user','');

        var myModal = document.getElementById('recoverymodal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);

        xhr.onload = function() {
          if (this.responseText == 'failed') {
              alert('error',"Password reset failed. Server down!");
          }
          else {
              alert('success',"Password reset successfully!");
              recovery_form.reset();
          }
        }

        xhr.send(data);

    });

  </script>

</body>
</html>

