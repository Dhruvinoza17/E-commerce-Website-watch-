<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETERNA - CONFIRM BOOKING</title>

    <?php 
    require('inc/links.php');
    ?>
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

  <?php
  
    /*
      Check men id from url is present or not 
      Shutdown mode is active or not 
      User is logged in or not
    */

    if (!isset($_GET['id']) || $settings_r['shutdown'] == true) {
      redirect('kids.php');
    }
    else if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
      redirect('kids.php');
    }

    // filter and get product and user data 

    $data = filteration($_GET);

    $kids_res = select("SELECT * FROM `kids` WHERE `id`=? AND `status`=? AND `removed`=?",[$data['id'],1,0],'iii');

    if (mysqli_num_rows($kids_res) == 0) {
      redirect('kids.php');
    }

    $kids_data = mysqli_fetch_assoc($kids_res);

    $_SESSION['kids'] = [
      "id" => $kids_data['id'],
      "name" => $kids_data['name'],
      "price" => $kids_data['price'],
      "payment" => null,
      "available" => false,
    ];

    $user_res = select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1", [$_SESSION['uId']],"i");
    $user_data = mysqli_fetch_assoc($user_res); 

    require 'config.php';
    use Razorpay\Api\Api;

    $api = new Api($apiKey, $apiSecret);
    $orderData = [
        'receipt' => 'order_rcptid_' . time(),
        'amount' => $kids_data['price'] * 100, // Convert to paise
        'currency' => 'INR',
        'payment_capture' => 1 // Auto capture
    ];
    $order = $api->order->create($orderData);

  ?>

  <div class="container">
    <div class="row mb-5">
      <div class="col-12 my-4 mb-4 px-4">
        <h2 class="fw-bold h-font" style="color: #c23737;">CONFIRM ORDER</h2>
        <div style="font-size: 14px;">
          <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
          <span class="text-secondary"> > </span>
          <a href="kids.php" class="text-secondary text-decoration-none">KIDS</a>
          <span class="text-secondary"> > </span>
          <a href="#" class="text-secondary text-decoration-none">CONFIRM</a>
        </div>
      </div>

      <div class="col-lg-5 col-md-12 px-4 mb-md-4" style="max-height: 550px; max-width: 550px;">
        
        <?php 
        
          // get thumbnail of image
          $kids_thumb = KIDS_IMG_PATH."thumbnail.jpg";
          $thumb_q = mysqli_query($con,"SELECT * FROM `kids_images` 
            WHERE `kids_id`='$kids_data[id]' 
            AND `thumb`='1'");

          if (mysqli_num_rows($thumb_q) > 0) {
            $thumb_res = mysqli_fetch_assoc($thumb_q);
            $kids_thumb = KIDS_IMG_PATH.$thumb_res['image'];
          }

          echo<<<data
            <div class="card p-3 shadow-sm rounded border-0">
              <img src="$kids_thumb" class="img-fluid rounded mb-3">
              <h6 class="mb-2" style="font-size: 23px;">$kids_data[name]</h6>
              <p class="fw-bold mb-2" style="font-size: 1.2rem;">₹$kids_data[price]/-</p>
            </div>
          data;

        ?>

      </div>

      <div class="col-lg-7 col-md-12 px-4">
        <div class="card border-0 shadow-sm rounded-3">
          <div class="card-body me-0">
            <form action="#" id="booking_form" method="POST">
              <h5 class="mb-3">ORDER DETAILS</h5>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Name</label>
                  <input name="name" type="text" value="<?php echo $user_data['name'] ?>" class="form-control shadow-none" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Phone Number</label>
                  <input name="phonenum" type="number"  value="<?php echo $user_data['phonenum'] ?>" value="<?php echo $user_data['name'] ?>" class="form-control shadow-none" required>
                </div>
                <div class="col-md-12 mb-3 fw-bold">
                  <label class="form-label">Email</label>
                  <input name="email" type="email"  value="<?php echo $user_data['email'] ?>" value="<?php echo $user_data['name'] ?>" class="form-control shadow-none" required>
                </div>
                <div class="col-md-12 mb-3 fw-bold">
                  <label class="form-label">Address</label>
                  <textarea name="address" class="form-control shadow-none" rows="2" required><?php echo $user_data['address'] ?></textarea>
                </div>
                <div class="col-md-6 mb-3 fw-bold">
                  <label class="form-label">City</label>
                  <input name="city" type="text"  value="<?php echo $user_data['city'] ?>" value="<?php echo $user_data['name'] ?>" class="form-control shadow-none" required>
                </div>
                <div class="col-md-6 mb-4 fw-bold">
                  <label class="form-label">Pincode</label>
                  <input name="pincode" type="number"  value="<?php echo $user_data['pincode'] ?>" value="<?php echo $user_data['name'] ?>" class="form-control shadow-none" required>
                </div>
                <div class="col-12">
                  <button name="payNow" id="payNow" class='btn w-100 mt-3 btn-outline-dark shadow-none mb-2 mb-lg-0'> Pay Now </button>
                </div>
                <input type="hidden" name="category" value="kids"> <!-- Change dynamically -->
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>

<!-- Includes Footer -->
<?php require('inc/footer.php') ?>

<!-- Add Razorpay SDK -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
  document.getElementById("payNow").addEventListener("click", function(e) {
      e.preventDefault();

      var formData = new FormData(document.getElementById("booking_form"));
      formData.append("user_id", "<?php echo $_SESSION['uId']; ?>");
      formData.append("product_id", "<?php echo $_SESSION['kids']['id']; ?>");
      formData.append("order_id", "<?php echo $order['id']; ?>");
      formData.append("trans_amt", "<?php echo $_SESSION['kids']['price']; ?>");

      var options = {
          "key": "<?php echo $apiKey; ?>",
          "amount": "<?php echo $_SESSION['kids']['price'] * 100; ?>",
          "currency": "INR",
          "name": "ETERNA",
          "description": "Order Payment",
          "image": "Images/Logotask.png",
          "order_id": "<?php echo $order['id']; ?>",
          "handler": function(response) {
              formData.append("trans_id", response.razorpay_payment_id);
              formData.append("trans_status", "success");

              $.ajax({
                  url: "process_payment.php",
                  type: "POST",
                  data: formData,
                  processData: false,
                  contentType: false,
                  success: function(res) {
                      if (res.trim() === "success") {
                          window.location.href = "pay_success.php";
                      } else {
                          alert("Error processing payment: " + res);
                      }
                  }
              });
          },
          "theme": {
              "color": "#37c2c2"
          }
      };

      var rzp1 = new Razorpay(options);

      rzp1.on('payment.failed', function(response) {
          formData.append("trans_id", response.error.metadata.payment_id);
          formData.append("trans_status", "failed");

          $.ajax({
              url: "process_payment.php",
              type: "POST",
              data: formData,
              processData: false,
              contentType: false,
              success: function(res) {
                  if (res.trim() === "success") {
                      window.location.href = "pay_failed.php";
                  } else {
                      alert("Error saving failed transaction: " + res);
                  }
              }
          });
      });

      rzp1.open();
  });
</script>
    
<!-- jQuery's JS link -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>
</html>

