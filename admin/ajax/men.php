<?php 

    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin();

    if(isset($_POST['add_men_product'])) 
    {
        $frm_data = filteration($_POST);
        $flag = 0;

        $q1 = "INSERT INTO `men`(`name`, `category`, `price`, `quantity`, `brand`, `modelnumber`, `movement`, `casematerial`, `strapmaterial`, `dialsize`, `waterresistance`, `warranty`, `description`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $values = [
            $frm_data['name'],
            $frm_data['category'],
            $frm_data['price'],
            $frm_data['quantity'],
            $frm_data['brand'],
            $frm_data['modelnumber'],
            $frm_data['movement'],
            $frm_data['casematerial'],
            $frm_data['strapmaterial'],
            $frm_data['dialsize'],
            $frm_data['waterresistance'],
            $frm_data['warranty'],
            $frm_data['desc']
        ];

        if (insert($q1,$values,'ssiisssssssss')) 
        {
            $flag = 1;
        }

        if ($flag == 1)
        {
            echo 1;
        }
        else 
        {
            echo 0;
        }
    }

    if(isset($_POST['get_men_product'])) 
    {
        $res = select("SELECT * FROM `men` WHERE `removed`=?",[0],'i');
        $i = 1;

        $data = "";

        while ($row = mysqli_fetch_assoc($res)) 
        {

            if ($row['status'] == 1) {
                $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>Active</button>";
            }
            else {
                $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-warning btn-sm shadow-none'>Inactive</button>";
            }

            $data.="
            <tr class='text-start'>
                <td>$i</td>
                <td>$row[name]</td>
                <td>$row[category]</td>
                <td>₹$row[price]/-</td>
                <td>$row[quantity]</td>
                <td>$status</td>
                <td>
                    <button type='button' onclick='edit_men_details($row[id])' class='btn btn-primary fs-6 shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-men'>
                        <i class='bi bi-pencil-square'></i>
                    </button>
                    <button type='button' onclick=\"men_images($row[id],'$row[name]')\" class='btn btn-info text-white fs-6 shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#men-images'>
                        <i class='bi bi-images'></i>
                    </button>
                    <button type='button' onclick='remove_men($row[id])' class='btn btn-danger fs-6 shadow-none btn-sm'>
                        <i class='bi bi-trash3'></i>
                    </button>
                </td>
            </tr>
            ";
            $i++;
        }

        echo $data;
    }

    if(isset($_POST['get_product']))
    {
        $frm_data = filteration($_POST);

        $res1 = select("SELECT * FROM `men` WHERE `id`=?",[$frm_data['get_product']],'i');

        $mendata = mysqli_fetch_assoc($res1);

        $data = ["mendata" => $mendata];

        $data = json_encode($data);

        echo $data;
    }

    if(isset($_POST['submit_edit']))
    {
        $frm_data = filteration($_POST);
        $flag = 0;

        $q1 = "UPDATE `men` SET `name`=?,`category`=?,`price`=?,`quantity`=?,`brand`=?,`modelnumber`=?,`movement`=?,`casematerial`=?,`strapmaterial`=?,`dialsize`=?,`waterresistance`=?,`warranty`=?,`description`=? WHERE `id`=?";

        $values = [
            $frm_data['name'],
            $frm_data['category'],
            $frm_data['price'],
            $frm_data['quantity'],
            $frm_data['brand'],
            $frm_data['modelnumber'],
            $frm_data['movement'],
            $frm_data['casematerial'],
            $frm_data['strapmaterial'],
            $frm_data['dialsize'],
            $frm_data['waterresistance'],
            $frm_data['warranty'],
            $frm_data['desc'],
            $frm_data['men_id']
        ];

        if (update($q1,$values,'ssiisssssssssi')) {
            $flag = 1;
        }

        if ($flag == 1) {
            echo 1;
        }
        else {
            echo 0;
        }


    }

    if(isset($_POST['toggle_status']))
    {
        $frm_data = filteration($_POST);

        $q = "UPDATE `men` SET `status`=? WHERE `id`=?";
        $v = [$frm_data['value'],$frm_data['toggle_status']];

        if (update($q,$v,'ii'))
        {
            echo 1;
        }
        else {
            echo 0;
        }
    }

    if (isset($_POST['add_image']))
    {
        $frm_data = filteration($_POST);

        $img_r = uploadImage($_FILES['image'],MEN_FOLDER);

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
            $q = "INSERT INTO `men_images`(`men_id`, `image`) VALUES (?,?)";
            $values = [$frm_data['men_id'],$img_r];
            $res = insert($q,$values,'is');
            echo $res;
        }
    }

    if (isset($_POST['get_men_images']))
    {
        $frm_data = filteration($_POST);
        $res = select("SELECT * FROM `men_images` WHERE `men_id`=?",[$frm_data['get_men_images']],'i');

        $path = MEN_IMG_PATH;

        while ($row = mysqli_fetch_assoc($res))
        {
            if ($row['thumb']==1) {
                $thumb_btn = "<i class='bi bg-success text-white px-2 py-1 rounded-circle bi-check-lg fs-5'></i>";
            }
            else {
                $thumb_btn = "<button onclick='thumb_image($row[sr_no],$row[men_id])' class='btn btn-secondary btn-sm rounded-circle shadow-none'><i class='bi bi-check-lg'></i></button>";
            }
            echo<<<data
                <tr class='align-middle'>
                    <td><img src='$path$row[image]' class='img-fluid'></td>
                    <td>$thumb_btn</td>
                    <td>
                        <button onclick='rem_image($row[sr_no],$row[men_id])' class='btn btn-danger btn-sm shadow-none'><i class="bi bi-trash3"></i></button>  
                    </td>
                </tr>
            data;
        }
    }

    if (isset($_POST['rem_image']))
    {
        $frm_data = filteration($_POST);
        $values = [$frm_data['image_id'],$frm_data['men_id']];

        $pre_q = "SELECT * FROM `men_images` WHERE `sr_no`=? AND `men_id`=?";
        $res = select($pre_q,$values,'ii');
        $img = mysqli_fetch_assoc($res);

        if (deleteImage($img['image'],MEN_FOLDER)) {
            $q = "DELETE FROM `men_images` WHERE `sr_no`=? AND `men_id`=?";
            $res = delete($q,$values,'ii');
            echo $res;
        }
        else {
            echo 0;
        }
    }

    if (isset($_POST['thumb_image']))
    {
        $frm_data = filteration($_POST);

        $pre_q = "UPDATE `men_images` SET `thumb`=? WHERE `men_id`=?";
        $pre_v = [0,$frm_data['men_id']];
        $pre_res = update($pre_q,$pre_v,'ii');

        $q = "UPDATE `men_images` SET `thumb`=? WHERE `sr_no`=? AND `men_id`=?";
        $v = [1,$frm_data['image_id'],$frm_data['men_id']];
        $res = update($q,$v,'iii');

        echo $res;
        
    }
    if (isset($_POST['remove_men']))
    {
        $frm_data = filteration($_POST);
        
        $res1 = select("SELECT * FROM `men_images` WHERE `men_id`=?",[$frm_data['men_id']],'i');

        while ($row = mysqli_fetch_assoc($res1))
        {
            deleteImage($row['image'],MEN_FOLDER);
        }

        $res2 = delete("DELETE FROM `men_images` WHERE `men_id`=?",[$frm_data['men_id']],'i');
        $res3 = update("UPDATE `men` SET `removed`=? WHERE `id`=?",[1,$frm_data['men_id']],'ii');

        if ($res2 || $res3) {
            echo 1;
        }
        else {
            echo 0;
        }
    }



?>