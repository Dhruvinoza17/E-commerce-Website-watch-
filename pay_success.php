<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETERNA - PAYMENT</title>

    <?php require('inc/links.php') ?>
    <style>
      /* Prevent horizontal scrolling */
    html, body {
      overflow-x: hidden;
    }
    </style>
    
    <!-- Swiper JS's CDN Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>
<body>
  <!-- <div class="tagline mt-1 h"><span class="r">"</span> A Legacy In Every Second <span class="r">"</span></div> -->
 
  <!-- Includes Header -->
  <?php require('inc/header.php') ?>

  <div class="container">
    <div class="row px-3 px-md-5">
      <div class="col-12">
        <h3 class="fw-bold mt-5">PAYMENT STATUS</h3>

        <div class="alert alert-success d-flex flex-column" role="alert">
          <div class="d-flex align-items-center mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong>Payment done! Order successful.</strong>
          </div>
          <a href="orders.php" class="text-primary fw-bold">Go to Orders</a>
        </div>

      </div>
    </div>
  </div>

  <!-- Includes Footer -->
   <?php require('inc/footer.php') ?>
    
  <!-- jQuery's JS link -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>
</html>

