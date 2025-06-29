<?php 

    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin();

    if(isset($_POST['get_users'])) 
    {
        $res = selectAll('user_cred');
        $i = 1;
        $path = USERS_IMG_PATH;

        $data = "";

        while ($row = mysqli_fetch_assoc($res)) 
        {

            $del_btn = "                    
                <button type='button' onclick='remove_user($row[id])' class='btn btn-danger fs-6 shadow-none btn-sm'>
                    <i class='bi bi-trash3'></i>
                </button>
            ";

            $verified = "<span class='badge bg-warning'><i class='bi fs-6 bi-x-lg'></i></span>";

            if ($row['is_verified']) {
                $verified = "<span class='badge bg-success'><i class='bi fs-6 bi-check-lg'></i></span>";
                $del_btn = "";
            }
            
            $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>Active</button>";

            if (!$row['status']) {
                $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-danger btn-sm shadow-none'>Inactive</button>";

            }

            $data.="
                <tr>
                    <td>$i</td>
                    <td>
                        <img src='$path$row[profile]' width='75px'>    
                        $row[name]
                    </td>
                    <td>$row[email]</td>
                    <td>$row[phonenum]</td>
                    <td>$row[address] | $row[pincode]</td>
                    <td>$row[city]</td>
                    <td>$verified</td>
                    <td>$status</td>
                    <td>$row[datentime]</td>
                    <td>$del_btn</td>
                </tr>
            ";
            $i++;
        }

        echo $data;
    }

    if(isset($_POST['toggle_status']))
    {
        $frm_data = filteration($_POST);

        $q = "UPDATE `user_cred` SET `status`=? WHERE `id`=?";
        $v = [$frm_data['value'],$frm_data['toggle_status']];

        if (update($q,$v,'ii'))
        {
            echo 1;
        }
        else {
            echo 0;
        }
    }

    if (isset($_POST['remove_user']))
    {
        $frm_data = filteration($_POST);

        $res = delete("DELETE FROM `user_cred` WHERE `id`=? AND `is_verified`=?",[$frm_data['user_id'],0],'ii');

        if ($res) {
            echo 1;
        }
        else {
            echo 0;
        }
    }

    if(isset($_POST['search_user'])) 
    {
        $frm_data = filteration($_POST);

        $query = "SELECT * FROM `user_cred` WHERE `name` LIKE ?";

        $res = select($query,["%$frm_data[name]%"],'s');
        $i = 1;
        $path = USERS_IMG_PATH;

        $data = "";

        while ($row = mysqli_fetch_assoc($res)) 
        {

            $del_btn = "                    
                <button type='button' onclick='remove_user($row[id])' class='btn btn-danger fs-6 shadow-none btn-sm'>
                    <i class='bi bi-trash3'></i>
                </button>
            ";

            $verified = "<span class='badge bg-warning'><i class='bi fs-6 bi-x-lg'></i></span>";

            if ($row['is_verified']) {
                $verified = "<span class='badge bg-success'><i class='bi fs-6 bi-check-lg'></i></span>";
                $del_btn = "";
            }
            
            $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>Active</button>";

            if (!$row['status']) {
                $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-danger btn-sm shadow-none'>Inactive</button>";

            }

            $data.="
                <tr>
                    <td>$i</td>
                    <td>
                        <img src='$path$row[profile]' width='75px'>    
                        $row[name]
                    </td>
                    <td>$row[email]</td>
                    <td>$row[phonenum]</td>
                    <td>$row[address] | $row[pincode]</td>
                    <td>$row[city]</td>
                    <td>$verified</td>
                    <td>$status</td>
                    <td>$row[datentime]</td>
                    <td>$del_btn</td>
                </tr>
            ";
            $i++;
        }

        echo $data;
    }

?>