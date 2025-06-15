<?php 

    require('../inc/essentials.php');
    require('../inc/db_config.php');
    adminLogin();

    if (isset($_POST['get_general']))
    {
        $q = "SELECT * FROM `settings` WHERE `sr_no`=?";
        $values = [1];
        $res = select($q,$values,"i");
        $data = mysqli_fetch_assoc($res);
        $json_data = json_encode($data);
        echo $json_data; 
    }

    if (isset($_POST['upd_general']))
    {
        $frm_data = filteration($_POST);

        $q = "UPDATE `settings` SET `site_title`=?,`site_about`=? WHERE `sr_no`=?";
        $values = [$frm_data['site_title'],$frm_data['site_about'],1];
        $res = update($q,$values,'ssi');
        echo $res;
    }

    if (isset($_POST['upd_shutdown']))
    {
        $frm_data = ($_POST['upd_shutdown']==0) ? 1 : 0;

        $q = "UPDATE `settings` SET `shutdown`=? WHERE `sr_no`=?";
        $values = [$frm_data,1];
        $res = update($q,$values,'ii');
        echo $res;
    }

    if (isset($_POST['get_contacts']))
    {
        $q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
        $values = [1];
        $res = select($q,$values,"i");
        $data = mysqli_fetch_assoc($res);
        $json_data = json_encode($data);
        echo $json_data; 
    }

    if (isset($_POST['upd_contacts'])) 
    {            
        $frm_data = filteration($_POST);

        $q = "UPDATE `contact_details` SET `ps`=?,`ios`=?,`email`=?,`pn1`=?,`pn2`=?,`fb`=?,`insta`=?,`yt`=? WHERE `sr_no`=?";
        $values = [$frm_data['ps'],$frm_data['ios'],$frm_data['email'],$frm_data['pn1'],$frm_data['pn2'],$frm_data['fb'],$frm_data['insta'],$frm_data['yt'],1];
        $res = update($q,$values,'ssssssssi');
        echo $res;
    }

    if (isset($_POST['add_category']))
    {
        $frm_data = filteration($_POST);

        $img_r = uploadImage($_FILES['picture'],CATEGORY_FOLDER);

        if ($img_r == 'inv_img') {
            echo $img_r;
        }
        else if ($img_r == 'inv_size') {
            echo $img_r;
        }
        else if ($img_r == 'upd_failed') {
            echo $img_r;
        }
        else {
            $q = "INSERT INTO `cat_details`(`name`, `page`, `picture`) VALUES (?,?,?)";
            $values = [$frm_data['name'],$frm_data['page'],$img_r];
            $res = insert($q,$values,'sss');
            echo $res;
        }
    }

    if (isset($_POST['get_categories']))
    {
        $res = selectAll('cat_details');

        while ($row = mysqli_fetch_assoc($res)) 
        {
            $path = CATEGORY_IMG_PATH;
            echo <<<data
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm text-bg-dark">
                        <img src="$path$row[picture]" class="card-img">
                        <div class="card-img-overlay text-end">
                            <button type="button" onclick="rem_category($row[sr_no])" class="btn btn-danger btn-sm shadow-none">
                                <i class="bi bi-trash3"></i> Delete
                            </button>
                        </div>
                    </div>
                    <div class="card mt-3 border-0 shadow-sm">
                        <div class="d-flex align-items-center">
                            <h6 class="fw-bold ms-2 mt-1 me-2">Name:</h6>
                            <p class="card-text text-center mb-1"><small>$row[name]</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <h6 class="fw-bold ms-2 mt-1 me-2">Page Link:</h6>
                            <p class="card-text text-center mb-1"><small>$row[page]</small></p>
                        </div>
                    </div>
                </div>
            data;
        }
    }

    if (isset($_POST['rem_category']))
    {
        $frm_data = filteration($_POST);
        $values = [$frm_data['rem_category']];

        $pre_q = "SELECT * FROM `cat_details` WHERE `sr_no`=?";
        $res = select($pre_q,$values,'i');
        $img = mysqli_fetch_assoc($res);

        if (deleteImage($img['picture'],CATEGORY_FOLDER)) {
            $q = "DELETE FROM `cat_details` WHERE `sr_no`=?";
            $res = delete($q,$values,'i');
            echo $res;
        }
        else {
            echo 0;
        }
    }

?>