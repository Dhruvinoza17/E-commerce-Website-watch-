<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETERNA - ORDERS</title>

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
  <?php 
    
    require('inc/header.php');

    if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
      redirect('index.php');
    }

   ?>

  <div class="container">
    <div class="row mb-5">
      <div class="col-12 my-4 px-4">
        <h2 class="fw-bold h-font" style="color: #c23737;">ORDERS</h2>
        <div style="font-size: 14px;">
          <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
          <span class="text-secondary"> > </span>
          <a href="#" class="text-secondary text-decoration-none">ORDERS</a>
        </div>
      </div>

      <?php 
      
        $query = "SELECT bo.*, od.* FROM `booking_order` bo
        INNER JOIN `order_details` od ON bo.booking_id = od.booking_id
        WHERE (bo.order_status = 'confirmed' OR bo.trans_status = 'success')
        AND (bo.user_id=?) 
        ORDER BY bo.booking_id DESC";

        $result = select($query,[$_SESSION['uId']],'i');

        while ($data = mysqli_fetch_assoc($result))
        {
          $date = date("d-m-Y",strtotime($data['datentime']));
          $delivery_date = date("d-m-Y", strtotime($date . ' +10 days'));

          $status = "";
          $btn_pdf = "";
          $btn_cancel = "";

          if ($data['order_status'] == 'confirmed' && $data['trans_status'] == 'success') 
          {
            $status = "<button type='button' class='btn mt-3 btn-success btn-sm shadow-none'><i class='bi bi-check2-square'></i> Confirmed</button>";
            $btn_pdf = "<a href='generate_pdf.php?gen_pdf&id=$data[booking_id]' class='btn mt-3 btn-dark btn-sm shadow-none'><i class='bi text-white bi-download'></i> Invoice</a>";
            $btn_cancel = "<button type='button' onclick='cancel_order($data[booking_id])' class='btn mt-3 btn-danger btn-sm shadow-none'><i class='bi text-white bi-trash3'></i> Cancel</button>";
          }
          else if ($data['order_status'] == 'cancelled' && $data['trans_status'] == 'cancel')
          {
            $status = "<button type='button' class='btn mt-3 btn-danger btn-sm shadow-none'><i class='bi bi-x-circle'></i> Cancelled</button>";
            $btn_cancel = "<button type='button' class='btn mt-3 btn-info btn-sm shadow-none'><i class='bi bi-x-circle'></i> Refund In Process</button>";
            $btn_pdf = "";
          }

          echo<<<orders
            <div class='row' id='order_$data[booking_id]'>
              <div class='col-lg-12 col-md-6 px-4 mb-4'> <!-- Parent container -->
                <div class='bg-white p-3 rounded shadow-sm d-flex justify-content-between'>
                  
                  <!-- Left Side (Product Name & More Info) -->
                  <div class="left-side">
                    <h5 class='mb-1' style='font-size: 18px;'>$data[product_name]</h5>
                    <p class='mb-1' style='font-size: 0.9rem;'>₹$data[price]</p> 
                    <h5 class="mb-2 text-primary" style='font-size: 15px;'>Order Date: $date</h5>
                    <h5 class="mb-2 text-primary" style='font-size: 15px;'>Delivered Before: $delivery_date</h5>
                        <span class='badge mb-2 bg-primary'>Order ID: $data[order_id]</span>
                        <br>
                        <span class='badge mb-2 bg-primary'>Transaction ID: $data[trans_id]</span>
                  </div>

                  <!-- Right Side (Price & More Info) -->
                  <div class="right-side text-end">
                    $status <br>
                    $btn_pdf <br>
                    $btn_cancel
                  </div>

                </div>
              </div>
            </div>
          orders;
        }
        
      ?>

  </div>


  <!-- Includes Footer -->
  <?php require('inc/footer.php') ?>

  <script>
    // function cancel_order(id) 
    // {
    //   if (confirm('Are you sure, you want to cancel order?')) 
    //   {
    //     let xhr = new XMLHttpRequest();
    //     xhr.open("POST","ajax/cancel_order.php",true);
    //     xhr.setRequestHeader('Content-Type' , 'application/x-www-form-urlencoded');

    //     xhr.onload = function () {
    //         if (this.responseText == 1) {
    //           window.location.href="orders.php?cancel_status=true";
    //         }
    //         else {
    //           alert('error','Cancellation failed!');
    //         }
    //     }
    //     xhr.send('cancel_order&id='+id);
    //   }
    // }
    function cancel_order(id) {
    if (confirm('Are you sure, you want to cancel the order?')) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/cancel_order.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function () {
            console.log("Response:", this.responseText); // Debugging

            if (this.responseText.trim() === "1") {  // Ensure successful response
                let orderDiv = document.getElementById("order_" + id);
                if (orderDiv) {
                    orderDiv.remove(); // ✅ Instantly remove the order from UI
                    console.log("Order removed: ", id);
                    alert('success','Cancellation successful!');
                } else {
                    console.log("Order div not found for ID:", id);
                }
            } else {
                alert('error','Cancellation failed!');
            }
        };

        xhr.send("cancel_order=true&id=" + id);
    }
}

  </script>

</body>
</html>


