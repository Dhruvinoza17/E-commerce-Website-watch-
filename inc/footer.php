<!-- Footer -->
<footer class="py-5">
    <div class="row ms-lg-5">
        <div class="col-sm-6 col-lg-2 col-md-4 mb-3">
            <h6 style="color: #C23737;">COLLECTION</h6>
            <ul class="nav b flex-column">
                <li class="nav-item ue mb-2">
                    <a href="#" style="font-size: 13px;" class="nav-link p-0 text-body-secondary">Luxury Watches</a>
                </li>
                <li class="nav-item ue mb-2">
                    <a href="#" style="font-size: 13px;" class="nav-link p-0 text-body-secondary">Smart Watches</a>
                </li>
                <li class="nav-item ue mb-2">
                    <a href="#" style="font-size: 13px;" class="nav-link p-0 text-body-secondary">Accessories</a>
                </li>
            </ul>
        </div>

        <div class="col-sm-6 col-lg-2 col-md-4 mb-3">
            <h6 style="color: #C23737;">SERVICES</h6>
            <ul class="nav b flex-column">
                <li class="nav-item ue mb-2">
                    <a href="privacy_policy.php" style="font-size: 13px;" class="nav-link p-0 text-body-secondary">Privacy Policy</a>
                </li>
                <li class="nav-item ue mb-2">
                    <a href="terms_condition.php" style="font-size: 13px;" class="nav-link p-0 text-body-secondary">Terms & Condition</a>
                </li>
                <li class="nav-item ue mb-2">
                    <a href="#" style="font-size: 13px;" class="nav-link p-0 text-body-secondary">Warranty & Repairs</a>
                </li>
                <li class="nav-item ue mb-2">
                    <a href="#" style="font-size: 13px;" class="nav-link p-0 text-body-secondary">Watch Care & Instructions</a>
                </li>
                <li class="nav-item ue mb-2">
                    <a href="#" style="font-size: 13px;" class="nav-link p-0 text-body-secondary">7 Days Return Or Exchange</a>
                </li>
            </ul>
        </div>

        <div class="col-sm-6 col-lg-2 col-md-4 mb-3">
            <h6 style="color: #C23737;">CONTACT US</h6>
            <ul class="nav b flex-column">
                <li class="nav-item ue mb-2">
                    <a href="tel:+<?php echo $contact_r['pn1']; ?>" style="font-size: 13px;" class="nav-link p-0 text-body-secondary">+<?php echo $contact_r['pn1']; ?></a>
                </li>
                <?php if ($contact_r['pn2'] != '') {
                    echo <<<DATA
                    <li class="nav-item ue mb-2">
                        <a href="tel:+$contact_r[pn2]" style="font-size: 13px;" class="nav-link p-0 text-body-secondary">
                            +$contact_r[pn2]
                        </a>
                    </li>
                    DATA;
                } ?>
                <li class="nav-item ue mb-2">
                    <a href="mailto:<?php echo $contact_r['email']; ?>" style="font-size: 13px;" class="nav-link p-0 text-body-secondary"><?php echo $contact_r['email']; ?></a>
                </li>
            </ul>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-2 mb-3">
            <h6 style="color: #C23737;">Follow Us On:</h6>
            <a href="<?php echo $contact_r['fb']; ?>"><i class='bx logo1 i1 bxl-facebook-circle'></i></a>
            <a href="<?php echo $contact_r['insta']; ?>"><i class='bx logo1 i2 bxl-instagram-alt'></i></a>
            <a href="<?php echo $contact_r['yt']; ?>"><i class='bx logo1 i5 bxl-youtube'></i></a>
            <h6 style="color: #C23737;" class="mt-3">Available At:</h6>
            <a href="<?php echo $contact_r['ps']; ?>"><i class="bi i3 logo1 bi-google-play"></i></a>
            <a href="<?php echo $contact_r['ios']; ?>"><i class="bi i4 logo1 bi-apple"></i></a>
            <div class="row">
            <h6 style="color: #C23737;" class="mt-3">We Accept:</h6>
                <div class="justify-content-center">
                    <i class='bx fs-1 nv bxl-visa'></i>
                    <i class='bx fs-1 nv bxl-paypal' ></i>
                    <i class='bx fs-1 nv bxl-mastercard' ></i>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3 mb-3">
            <h6 style="color: #C23737;">Send a message</h6>
            <form method="POST">
                <div class="mb-2">
                    <input name="name" required type="text" class="form-control shadow-none" placeholder="Name">
                </div>
                <div class="mb-2">
                    <input name="email" required type="email" class="form-control shadow-none" placeholder="Email">
                </div>
                <div class="mb-2">
                    <input name="subject" required type="text" class="form-control shadow-none" placeholder="Subject">
                </div>
                <div class="mb-2">
                    <textarea name="message" required class="form-control shadow-none" rows="3" style="resize: none;" placeholder="Message"></textarea>
                </div>
                <button type="submit" name="send" class="btn shadow-none text-white btn-sm mt-3 btn-danger w-100">Send</button>
            </form>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-12 mb-3">
            <h3 class="h-font r"><?php echo $settings_r['site_title'] ?></h3>
            <p><?php echo $settings_r['site_about'] ?></p>
        </div>

    </div>
</footer>

<center>
    <div class="cr">
    ©2025 ETERNA. All Rights Reserved
    </div>
</center>

<!-- Bootstrap's JS link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>

    function alert(type,msg,position='body',timeout = 2000) 
    {
        let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
        let element = document.createElement('div');
        element.innerHTML = `
            <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
                <strong class="me-3">${msg}</strong>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;

        if (position == 'body')
        {
            document.body.append(element);
            element.classList.add('custom-alert');
        }
        else
        {
            document.getElementById(position).appendChild(element);
        }
        setTimeout(() => {
            element.remove();
        }, timeout);
    }

    function setActive() 
    {
        let navbar = document.getElementById('nav-bar'); 
        let a_tags = navbar.getElementsByTagName('a');

        let currentFile = window.location.pathname.split('/').pop().split('.')[0];

        for (let i = 0; i < a_tags.length; i++) {
            let file = a_tags[i].href.split('/').pop().split('.')[0];

            if (file === currentFile) {  // Ensure exact match
                a_tags[i].classList.add('text-danger');
            }
        }
    } 

    let register_form = document.getElementById('register-form');

    register_form.addEventListener('submit',(e)=>{
        e.preventDefault();

        let data = new FormData();

        data.append('name',register_form.elements['name'].value);
        data.append('email',register_form.elements['email'].value);
        data.append('phonenum',register_form.elements['phonenum'].value);
        data.append('address',register_form.elements['address'].value);
        data.append('pincode',register_form.elements['pincode'].value);
        data.append('city',register_form.elements['city'].value);
        data.append('pass',register_form.elements['pass'].value);
        data.append('cpass',register_form.elements['cpass'].value);
        data.append('profile',register_form.elements['profile'].files[0]);
        data.append('register','');

        var myModal = document.getElementById('registermodal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);

        xhr.onload = function() {
            if (this.responseText == 'pass_mismatch') {
                alert('error',"Passowd mismatch!");
            }
            else if (this.responseText == 'email_already') {
                alert('error',"Email is already registered!");
            }
            else if (this.responseText == 'phone_already') {
                alert('error',"Phone number is already registered!");
            }
            else if (this.responseText == 'inv_img') {
                alert('error',"Only JPG, PNG & WEBP images are allowed!");
            }
            else if (this.responseText == 'upd_failed') {
                alert('error',"Image upload failed!");
            }
            else if (this.responseText == 'mail_failed') {
                alert('error',"Cannot send confirmation email. Server down!");
            }
            else if (this.responseText == 'ins_failed') {
                alert('error',"Registration failed. Try gain!");
            }
            else {
                alert('success',"Registration successful. Confirmation link send to mail!");
                register_form.reset();
            }
        }

        xhr.send(data);

    });

    let login_form = document.getElementById('login-form');

    login_form.addEventListener('submit',(e)=>{
        e.preventDefault();

        let data = new FormData();

        data.append('email_mob',login_form.elements['email_mob'].value);
        data.append('pass',login_form.elements['pass'].value);
        data.append('login','');

        var myModal = document.getElementById('loginmodal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);

        xhr.onload = function() {
            if (this.responseText == 'inv_email_mob') {
                alert('error',"Invalid Email or Mobile Number!");
            }
            else if (this.responseText == 'not_verified') {
                alert('error',"Email is not verified!");
            }
            else if (this.responseText == 'inactive') {
                alert('error',"Your account has been disabled by admin. Please contact admin!");
            }
            else if (this.responseText == 'invalid_pass') {
                alert('error',"Password is invalid!");
            }
            else {
                let fileurl = window.location.href.split('/').pop().split('?').shift();
                if (fileurl == 'men_details.php') {
                    window.location = window.location.href;
                }
                else {
                    window.location = window.location.pathname;
                }
            }
        }

        xhr.send(data);

    });

    let forgot_form = document.getElementById('forgot-form');

    forgot_form.addEventListener('submit',(e)=>{
        e.preventDefault();

        let data = new FormData();

        data.append('email',forgot_form.elements['email'].value);
        data.append('forgot_pass','');

        var myModal = document.getElementById('forgotmodal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/login_register.php", true);

        xhr.onload = function() {
            if (this.responseText == 'inv_email') {
                alert('error',"Enter valid Email!");
            }
            else if (this.responseText == 'not_verified') {
                alert('error',"Email is not verified!");
            }
            else if (this.responseText == 'inactive') {
                alert('error',"Your account has been disabled by admin. Please contact admin!");
            }
            else if (this.responseText == 'mail_failed') {
                alert('error',"Cannot send email. Server down!");
            }
            else if (this.responseText == 'upd_failed') {
                alert('error',"Password reset failed. Server down!");
            }
            else {
                alert('success',"Password reset link send to email!");
                forgot_form.reset();
            }
        }

        xhr.send(data);

    });

    // function checkLoginToBook(status,men_id) {
    //     if (status) {
    //         window.location.href='confirm_m_booking.php?id='+men_id;
    //     }
    //     else {
    //         alert('error','Please login to order product!');
    //     }
    // }


    // For Multiple pages 

    // function checkLoginToBook(status, men_id = null, women_id = null) {
    //     if (status) {
    //         let url = 'checkout.php?';

    //         if (men_id) {
    //             url += 'men_id=' + men_id + '&';
    //         }
    //         if (women_id) {
    //             url += 'women_id=' + women_id + '&';
    //         }

    //         window.location.href = url;
    //     } else {
    //         alert('error', 'Please login to order product!');
    //     }
    // }

    function checkLoginToBook(status, product_id) {
    console.log("Status:", status);
    console.log("Product ID:", product_id);
    console.log("Current URL:", window.location.pathname);

    if (!status) {
        alert('error',"Please login to order the product!");
        return;
    }

    if (!product_id || product_id === "num") {
        alert("Error","Invalid product selection!");
        return;
    }

    let currentPage = window.location.pathname.split("/").pop(); // Extracts the filename
    console.log("Current Page:", currentPage);

    let redirectPage = "";

    if (currentPage === "men_details.php" || currentPage === "men.php") {
        redirectPage = "confirm_m_booking.php";
    } else if (currentPage === "women_details.php" || currentPage === "women.php") {
        redirectPage = "confirm_w_booking.php";
    } else if (currentPage === "couple_details.php" || currentPage === "couple.php") {
        redirectPage = "confirm_c_booking.php";
    } else if (currentPage === "kids_details.php" || currentPage === "kids.php") {
        redirectPage = "confirm_k_booking.php";
    } else if (currentPage === "smartwatch_details.php" || currentPage === "smartwatch.php") {
        redirectPage = "confirm_s_booking.php";
    } else {
        alert("Error: Unable to determine product type!");
        return;
    }

    console.log("Redirecting to:", redirectPage);
    
    // Redirect to the correct booking page with the product ID
    window.location.href = redirectPage + "?id=" + product_id;
}


    setActive();
</script>


<!-- PHP script for send a message section -->
 <?php 
 
    if (isset($_POST['send']))
    {
        $frm_data = filteration($_POST);

        $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
        $values = [$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];

        $res = insert($q,$values,'ssss');
        if ($res == 1) {
            alert('success','Messege Submited!');
        }
        else {
            alert('error','Serverdown. Please try again!');
        }
    }
 
 ?>