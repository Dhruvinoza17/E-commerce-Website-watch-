<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETERNA - PROFILE</title>

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

    $u_exist = select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1",[$_SESSION['uId']],'s');

    if (mysqli_num_rows($u_exist) == 0) {
      redirect('index.php');
    }

    $u_fetch = mysqli_fetch_assoc($u_exist);
   ?>

  <div class="container">
    <div class="row mb-5">
        <div class="col-12 my-4 px-4">
            <h2 class="fw-bold h-font" style="color: #c23737;">PROFILE</h2>
            <div style="font-size: 14px;">
                <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                <span class="text-secondary"> > </span>
                <a href="#" class="text-secondary text-decoration-none">PROFILE</a>
            </div>
        </div>

        <!-- Flex container to align two divs side by side -->
        <div class="d-flex flex-wrap justify-content-between px-4">
            
            <!-- Left Side (Profile Picture) -->
            <div class="p col-md-4 mb-5">
                <div class="bg-white p-3 p-md-4 rounded shadow-sm">
                    <form id="profile-form">
                        <h5 class="mb-3 h-font fw-bold">Profile</h5>
                        <img src="<?php echo USERS_IMG_PATH . $u_fetch['profile'] ?>" class="img-fluid" style="border-radius: 50%;">
                        
                        <label class="form-label mt-2">New Picture</label>
                        <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required>  

                        <button type="submit" class="btn mt-3 btn-dark hov shadow-none">Save changes</button>
                    </form>
                </div>
            </div>

            <!-- Right Side (Personal Information) -->
            <div class="i col-md-7">
                <div class="bg-white p-3 p-md-4 rounded shadow-sm">
                    <form id="info-form">
                        <h5 class="mb-3 h-font fw-bold">Personal Information</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input name="name" type="text" value="<?php echo $u_fetch['name'] ?>" class="form-control shadow-none" required>                  
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Phone Number</label>
                                <input name="phonenum" type="number" value="<?php echo $u_fetch['phonenum'] ?>" class="form-control shadow-none" required>                  
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">City</label>
                                <input name="city" type="text" value="<?php echo $u_fetch['city'] ?>" class="form-control shadow-none" required>                  
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Pincode</label>
                                <input name="pincode" type="number" value="<?php echo $u_fetch['pincode'] ?>" class="form-control shadow-none" required>                  
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label fw-bold">Address</label>
                                <textarea name="address" class="form-control shadow-none" rows="5" required><?php echo $u_fetch['address'] ?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark hov shadow-none">Save changes</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
  </div>



  <!-- Includes Footer -->
  <?php require('inc/footer.php') ?>

  <script>
    let info_form = document.getElementById('info-form');

    info_form.addEventListener('submit', function (e) {
        e.preventDefault();

        let data = new FormData();
        data.append('info_form', '');
        data.append('name', info_form.elements['name'].value);
        data.append('phonenum', info_form.elements['phonenum'].value);
        data.append('city', info_form.elements['city'].value);
        data.append('pincode', info_form.elements['pincode'].value);
        data.append('address', info_form.elements['address'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/profile.php", true);

        xhr.onload = function () {
          if (this.responseText == 'phone_already') {
            alert('error',"Phone number is already registered!");
          }
          else if (this.responseText == 0) {
            alert('error',"No changes made!");
          }
          else {
            window.location.href=window.location.pathname;
          }
        };
        
        xhr.send(data);
    });

    let profile_form = document.getElementById('profile-form');

    profile_form.addEventListener('submit',function(e) {
      e.preventDefault();

      let data = new FormData();
      data.append('profile_form','');
      data.append('profile',profile_form.elements['profile'].files[0]);

      let xhr = new XMLHttpRequest();
      xhr.open("POST","ajax/profile.php",true);

      xhr.onload = function () {
        if (this.responseText == 'inv_img') {
          alert('error',"Only JPG, PNG & WEBP images are allowed!");
        }
        else if (this.responseText == 'upd_failed') {
          alert('error',"Image upload failed!");
        }
        else if (this.responseText == 0) {
          alert('error',"Updation failed!");
        }
        else {
          window.location.href=window.location.pathname;
        }
      }
      xhr.send(data);
    });



  </script>

</body>
</html>


