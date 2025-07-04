<?php
    require ('admin/inc/db_config.php');
    require ('admin/inc/essentials.php');

    $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $settings_q = "SELECT * FROM `settings` WHERE `sr_no`=?";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q,$values,'i'));
    $settings_r = mysqli_fetch_assoc(select($settings_q,$values,'i'));

    if ($settings_r['shutdown']) {
        echo<<<alertbar
            <div class="bg-danger text-center p-2 fw-bold text-white">
                <i class="bi bi-exclamation-triangle-fill"></i> Orders are temporarily closed due to maintainance work!
            </div>
        alertbar;
    }
?>

<head>
    <style>
        .search-container {
            width: 40px;
            height: 40px;
            border-radius: 50px;
            background: white;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 5px;
            overflow: hidden;
            transition: width 0.4s ease-in-out;
            position: relative;
        }

        .search-container:hover {
            width: 200px;
            padding-left: 10px;
        }

        .search-input {
            flex: 1;
            border: none;
            outline: none;
            opacity: 0;
            transition: opacity 0.2s ease-in-out;
            padding-right: 10px;
            background: transparent;
        }

        .search-container:hover .search-input {
            opacity: 1;
        }

        .search-icon {
            width: 20px;
            cursor: pointer;
            position: absolute;
            right: 10px;
        }
    </style>
</head>

<!-- Navbar -->
<nav id="nav-bar" class="navbar navbar-expand-lg bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3" href="./Index.php">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="65" height="65" viewBox="0 0 1024 1024" enable-background="new 0 0 1024 1024" xml:space="preserve">
            <path fill="#C23737" opacity="1.000000" stroke="none" 
            d="
                M682.709717,661.382019 
                C668.554321,652.373840 654.609192,643.711548 640.931641,634.645630 
                C630.313965,627.607971 619.957825,620.167236 609.619019,612.720093 
                C599.661804,605.547913 589.890564,598.117920 580.000549,590.851685 
                C578.364746,589.649841 576.485535,588.611694 574.533325,590.259399 
                C566.036621,597.431274 556.553040,603.305237 548.202026,610.701111 
                C539.397400,618.498718 530.096985,625.733704 521.099548,633.317017 
                C510.424988,642.313843 500.045532,651.672852 489.162354,660.406555 
                C478.651398,668.841614 469.315643,678.545044 459.048889,687.259277 
                C448.167908,696.494751 438.696655,707.377197 428.439240,717.365173 
                C418.671417,726.876404 408.192200,735.608398 397.617737,744.195251 
                C393.351898,747.659241 387.657593,746.543274 382.694305,746.739014 
                C373.752441,747.091858 364.763245,746.270813 355.795044,745.909607 
                C354.047638,745.839233 352.657928,745.033752 351.493896,743.688660 
                C345.070282,736.265930 338.604828,728.879333 332.159729,721.475098 
                C329.140900,718.007080 328.726776,714.589111 330.641174,710.064514 
                C335.187225,699.319885 342.091034,691.502502 351.958008,684.741516 
                C388.221283,659.893372 423.972412,634.278381 459.486176,608.362671 
                C482.896454,591.279358 506.924713,575.091125 530.392761,558.102600 
                C535.702637,554.258728 535.761780,554.088928 530.714905,550.135681 
                C507.535492,531.979126 484.496429,513.640869 461.171448,495.673553 
                C442.083862,480.970276 422.576508,466.812988 403.420197,452.197479 
                C389.275940,441.405884 375.442596,430.207733 361.389984,419.294708 
                C338.178436,401.268951 315.525726,382.483643 291.094086,366.094391 
                C277.282104,356.829041 262.178650,350.514893 245.312515,349.323303 
                C235.686737,348.643219 227.336716,351.558899 222.063461,359.805206 
                C219.397079,363.974945 217.886780,369.037262 217.054214,374.156952 
                C214.970627,386.969696 217.016357,399.195831 221.173462,411.361633 
                C228.762436,433.570679 236.962738,455.478485 249.639908,475.398010 
                C260.170532,491.944702 271.767578,507.757782 282.983490,523.836914 
                C296.309296,542.940796 311.446228,560.659546 324.715607,579.784485 
                C326.700775,582.645691 328.634399,585.668640 331.160492,588.000977 
                C335.758423,592.246338 336.184113,597.218384 335.666534,603.028137 
                C334.734650,613.488281 335.348511,624.003113 335.911713,634.477539 
                C336.184418,639.548645 334.527008,643.256775 330.657837,646.628052 
                C321.393829,654.699829 312.251190,662.815247 301.600311,669.157837 
                C293.827454,673.786560 285.886871,672.463196 277.980133,670.956299 
                C272.665741,669.943481 267.638489,667.500183 262.398834,665.987610 
                C259.665436,665.198547 258.331207,663.198730 257.001831,661.114136 
                C243.575851,640.060852 229.777802,619.230652 216.888474,597.852905 
                C199.702103,569.348206 184.177200,539.909485 170.203995,509.681305 
                C158.678192,484.747650 148.627914,459.231750 141.151047,432.778595 
                C136.384644,415.915131 133.203079,398.688538 133.885757,381.105072 
                C134.472473,365.992950 135.621704,350.884674 140.781708,336.382690 
                C147.598251,317.224945 160.303436,304.323151 179.640717,297.694977 
                C199.562027,290.866638 220.109787,289.338989 240.764130,291.080414 
                C255.325180,292.308075 268.635986,298.544708 281.393982,305.662994 
                C319.274963,326.798706 355.080994,351.004547 389.496307,377.401611 
                C414.721863,396.749969 440.566254,415.291473 466.130371,434.198608 
                C491.154266,452.706207 516.122498,471.289612 541.213379,489.705872 
                C554.767700,499.654480 568.568359,509.266937 582.159424,519.166321 
                C584.832764,521.113525 586.666931,520.092773 588.831360,518.542297 
                C607.647583,505.063232 626.487732,491.617615 645.331299,478.176910 
                C678.268433,454.683594 710.677612,430.362885 745.980225,410.436432 
                C770.467285,396.614807 795.914307,384.623138 822.754272,376.045532 
                C838.373352,371.053894 854.424255,369.830597 870.404114,375.043915 
                C886.988586,380.454559 895.093201,393.256989 899.896851,408.984772 
                C902.362244,417.056458 902.299072,425.428711 903.022278,433.676605 
                C904.482849,450.335358 901.799561,466.925354 900.749878,483.491882 
                C900.168884,492.660339 897.910522,502.032379 896.109985,511.261444 
                C894.307617,520.499695 892.720825,529.775269 890.297302,538.877747 
                C886.969238,551.377014 883.503967,563.858276 878.521667,575.810791 
                C872.897034,589.304504 866.696472,602.549988 859.812134,615.458252 
                C852.775879,628.651367 844.259827,640.801147 835.207397,652.731201 
                C827.018494,663.523132 817.455200,672.450134 806.424133,679.942749 
                C796.549683,686.649719 785.743042,689.820312 773.503723,690.545288 
                C742.173218,692.401062 715.793945,679.464233 689.698792,664.942810 
                C687.522766,663.731995 685.258484,662.679932 682.709717,661.382019 
                M672.159668,516.640808 
                C670.862244,517.678833 669.666809,518.888794 668.251465,519.728027 
                C655.502014,527.288147 644.025208,536.518494 633.058716,546.419556 
                C629.213867,549.890869 629.272034,550.590515 633.979126,553.021362 
                C653.927124,563.322937 673.259766,574.801697 694.089111,583.414185 
                C714.842590,591.995239 735.756348,600.008789 757.877075,604.243774 
                C763.885559,605.394043 770.283936,605.578003 776.251221,604.091431 
                C791.722351,600.237366 803.494873,590.630493 813.444580,578.591614 
                C824.350464,565.395691 832.177612,550.421570 839.025635,534.799194 
                C848.370728,513.480469 855.236267,491.725037 855.968079,468.142670 
                C856.403076,454.125519 852.098267,442.926544 840.458069,435.238983 
                C833.980347,430.960938 826.702271,427.329803 818.511414,430.047485 
                C815.061829,431.192017 811.489563,432.184357 808.057495,432.976379 
                C794.204346,436.173309 782.288696,443.023346 770.655518,450.758911 
                C756.844177,459.942902 742.837158,468.832428 728.927734,477.869293 
                C720.183472,483.550415 711.359558,489.117157 702.758423,495.008270 
                C692.653198,501.929657 682.750427,509.146820 672.159668,516.640808 
            z"/>
        </svg>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav a me-auto mb-2 mb-lg-0 justify-content-center w-100">
                <li class="nav-item">
                <a class="nav-link ue nv me-2" href="men.php">MEN</a>
                </li>
                <li class="nav-item">
                <a class="nav-link ue nv me-2" href="women.php">WOMEN</a>
                </li>
                <li class="nav-item">
                <a class="nav-link ue nv me-2" href="couple.php">COUPLE</a>
                </li>
                <li class="nav-item">
                <a class="nav-link ue nv me-2" href="kids.php">KIDS</a>
                </li>
                <li class="nav-item">
                <a class="nav-link ue nv me-2" href="smartwatch.php">SMARTWATCH</a>
                </li>
            </ul>
        <div class="d-flex">
            <?php 
                if (isset($_SESSION['login']) && $_SESSION['login'] == true)
                {
                    $path = USERS_IMG_PATH;
                    echo<<<data
                        <div class="btn-group">
                                <img src="$path$_SESSION[uPic]" style="width:65px; height:55px; border-radius:50%;" class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="orders.php">Orders</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    data;
                }
                else 
                {
                    echo<<<data
                        <button type="button" class="btn btn-outline-dark hov shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginmodal">
                            Login
                        </button>
                        <button type="button" class="btn btn-outline-dark hov shadow-none" data-bs-toggle="modal" data-bs-target="#registermodal">
                            Register
                        </button>
                    data;
                }
            ?>
            <!-- <div class="search-container me-3">
                <input type="text" class="search-input shadow-none form-control" placeholder="Search...">
                <img src="https://cdn-icons-png.flaticon.com/512/622/622669.png" alt="Search" class="search-icon">
            </div> -->
        </div>
    </div>
</nav>

<!-- Login Modal -->
<div class="modal fade" id="loginmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="login-form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2 "></i> User Login
                    </h1>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email / Mobile</label>
                        <input type="text" name="email_mob" required class="form-control shadow-none">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="pass" required class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                        <button type="button" class="btn text-secondary text-decoration-none shadow-none p-0" data-bs-toggle="modal" data-bs-target="#forgotmodal">
                            Forgot Password?
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registermodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="register-form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 d-flex align-items-center">
                        <i class="bi bi-person-lines-fill fs-3 me-2"></i> User Registration
                    </h1>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Name</label>
                                <input name="name" type="text" class="form-control shadow-none" required>                  
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control shadow-none" required>                  
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input name="phonenum" type="number" class="form-control shadow-none" required>                  
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Picture</label>
                                <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required>                  
                            </div>
                            <div class="col-md-12 p-0 mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Pincode</label>
                                <input name="pincode" type="number" class="form-control shadow-none" required>                  
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">City</label>
                                <input name="city" type="text" class="form-control shadow-none" required>                  
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Password</label>
                                <input name="pass" type="password" class="form-control shadow-none" required>                  
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input name="cpass" type="password" class="form-control shadow-none" required>                  
                            </div>
                        </div>
                        <div class="text-center my-1">
                            <button type="submit" class="btn btn-dark shadow-none">Register</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Forgot password modal -->
<div class="modal fade" id="forgotmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="forgot-form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 d-flex align-items-center">
                        <i class="bi bi-key-fill fs-3 me-2 "></i> Forgot Password
                    </h1>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4 text-center">
                        <span class="badge text-wrap rounded-pill bg-light text-dark mb-3">
                            Note: A link will be sent to your email to reset your password.
                        </span>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" required class="form-control shadow-none">
                    </div>
                    <div class="mb-2 text-end">
                        <button type="button" class="btn text-secondary shadow-none p-0 me-2" data-bs-toggle="modal" data-bs-target="#loginmodal">
                            CANCEL
                        </button>
                        <button type="submit" class="btn btn-sm btn-dark shadow-none">SEND LINK</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>