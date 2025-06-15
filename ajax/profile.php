<?php 

    require('../admin/inc/essentials.php');
    require('../admin/inc/db_config.php');
    date_default_timezone_set("Asia/Kolkata");

    if (isset($_POST['info_form']))
    {
        $frm_data = filteration($_POST);
        session_start();

        $u_exist = select("SELECT * FROM `user_cred` WHERE `phonenum`=? AND `id`!=? LIMIT 1",
        [$frm_data['phonenum'],$_SESSION['uId']],"si");

        if (mysqli_num_rows($u_exist)!=0)
        {
            $u_exist_fetch = mysqli_fetch_assoc($u_exist);
            echo 'phone_already';
            exit;
        }

        $query = "UPDATE `user_cred` SET `name`=?,`address`=?,`phonenum`=?,`pincode`=?,`city`=? WHERE `id`=?";

        $values = [$frm_data['name'],$frm_data['address'],$frm_data['phonenum'],$frm_data['pincode'],$frm_data['city'],$_SESSION['uId']];

        if (update($query,$values,'ssssss')) {
            $_SESSION['uName'] = $frm_data['name'];
            echo 1;
        }
        else {
            echo 0;
        }
    }

    if (isset($_POST['profile_form'])) {

        session_start();

        // Check if file is uploaded
        if (!isset($_FILES['profile']) || $_FILES['profile']['error'] !== 0) {
            echo 'upl_failed';
            exit;
        }
    
        // Upload image
        $img = uploadUserImage($_FILES['profile']);
    
        if ($img == 'inv_img') {
            echo 'inv_img';
            exit;
        } elseif ($img == 'upl_failed') {
            echo 'upd_failed';
            exit;
        }
    
        // Get current user data
        $u_exist = select("SELECT * FROM `user_cred` WHERE `id`=?", [$_SESSION['uId']], "s");
    
        if (mysqli_num_rows($u_exist) > 0) {
            $u_fetch = mysqli_fetch_assoc($u_exist);
    
            // Delete old image if exists
            if (isset($u_fetch['profile']) && !empty($u_fetch['profile'])) {
                deleteImage($u_fetch['profile'], USERS_FOLDER);
            }
    
            // Update new profile image
            $query = "UPDATE `user_cred` SET `profile`=? WHERE `id`=?";
            $values = [$img, $_SESSION['uId']];
    
            if (update($query, $values, 'si')) {
                $_SESSION['uPic'] = $img; // ✅ Correctly store new image in session
                echo 'success';
            } else {
                echo '0';
            }
        } else {
            echo '0';
        }
    }

?>