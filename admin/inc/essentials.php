<?php 

    require_once 'config.php';

    // For Front-end Display Process
    define('SITE_URL','http://127.0.0.1/eterna/');
    define('CATEGORY_IMG_PATH',SITE_URL.'Images/category/');
    define('CAROUSEL_IMG_PATH',SITE_URL.'Images/carousel/');
    define('USERS_IMG_PATH',SITE_URL.'Images/users/');
    define('MEN_IMG_PATH',SITE_URL.'Images/men/');
    define('WOMEN_IMG_PATH',SITE_URL.'Images/women/');
    define('COUPLE_IMG_PATH',SITE_URL.'Images/couple/');
    define('KIDS_IMG_PATH',SITE_URL.'Images/kids/');
    define('SMARTWATCH_IMG_PATH',SITE_URL.'Images/smartwatch/');



    // For Back-end Upload Process
    define('UPLOAD_IMAGE_PATH',$_SERVER['DOCUMENT_ROOT'].'/eterna/Images/');
    define('CATEGORY_FOLDER','category/');
    define('CAROUSEL_FOLDER','carousel/');
    define('USERS_FOLDER','users/');
    define('MEN_FOLDER','men/');
    define('WOMEN_FOLDER','women/');
    define('COUPLE_FOLDER','couple/');
    define('KIDS_FOLDER','kids/');
    define('SMARTWATCH_FOLDER','smartwatch/');

    // Sendgrid api key
    // define('SENDGRID_API_KEY',"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");
    

    // 
    function adminLogin()
    {
        session_start();
        if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)) { 
            redirect('index.php');           
        }
        // session_regenerate_id(true);
    }

    // Redirect function after admin login
    function redirect($url) 
    {
        echo "
            <script>
                window.location.href='$url';
            </script>
        ";
    }

    // Custom Alert
    function alert($type,$msg) 
    {
        $bs_class = ($type== "success") ? "alert-success" : "alert-danger";
        echo <<<alert
            <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
                <strong class="me-3">$msg</strong>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        alert;
    }

    function uploadImage($image,$folder)
    {
        $valid_mime = ['image/jpeg','image/png','image/webp'];
        $img_mime = $image['type'];

        if (!in_array($img_mime,$valid_mime)) {
            return 'inv_img'; //invalid imge mime or format
        }
        else if (($image['size']/(1024*1024))>2) {
            return 'inv_size'; //invalid siz greater than 2MB
        }
        else {
            $ext = pathinfo($image['name'],PATHINFO_EXTENSION);
            $rname = 'IMG_'.random_int(11111,99999).".$ext";

            $img_path = UPLOAD_IMAGE_PATH.$folder.$rname;
            if (move_uploaded_file($image['tmp_name'],$img_path)) {
                return $rname;
            }
            else {
                return 'upd_failed';
            }
        }
    }

    function deleteImage($image,$folder) 
    {
        if (unlink(UPLOAD_IMAGE_PATH.$folder.$image)) {
            return true;
        }
        else {
            return false;
        }
    }

    function uploadUserImage($image) 
    {
        $valid_mime = ['image/jpeg','image/png','image/webp'];
        $img_mime = $image['type'];

        if (!in_array($img_mime,$valid_mime)) {
            return 'inv_img'; //invalid imge mime or format
        }
        else {
            $ext = pathinfo($image['name'],PATHINFO_EXTENSION);
            $rname = 'IMG_'.random_int(11111,99999).".jpeg";

            $img_path = UPLOAD_IMAGE_PATH.USERS_FOLDER.$rname;

            if ($ext == 'png' || $ext == 'PNG') {
                $img = imagecreatefrompng($image['tmp_name']);
            }
            else if ($ext == 'webp' || $ext == 'WEBP') {
                $img = imagecreatefromwebp($image['tmp_name']);
            }
            else {
                $img = imagecreatefromjpeg($image['tmp_name']);
            }

            if (imagejpeg($img,$img_path,75)) {
                return $rname;
            }
            else {
                return 'upd_failed';
            }
        }
    }

?>