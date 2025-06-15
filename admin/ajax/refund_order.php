<?php 

    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin();

    if(isset($_POST['get_orders'])) 
    {

        $frm_data = filteration($_POST);

        $query = "SELECT bo.*, od.* FROM `booking_order` bo
            INNER JOIN `order_details` od ON bo.booking_id = od.booking_id
            WHERE (bo.order_id LIKE ? OR od.phonenum LIKE ? OR od.user_name LIKE ?) 
            AND bo.order_status = ? AND bo.trans_status = ? ORDER BY bo.booking_id DESC";

        $res = select($query,["%$frm_data[search]%","%$frm_data[search]%","%$frm_data[search]%","cancelled","cancel"],'sssss');

        $i = 1;
        $table_data = "";

        if (mysqli_num_rows($res) == 0)
        {
            echo "<p class='fw-bold' style='white-space: nowrap;'>No Data Found!</p>";

            exit;
        }

        while ($data = mysqli_fetch_assoc($res)) 
        {
            $table_data .="
                <tr>
                    <td>$i</td>
                    <td>
                        <b class='mb-2'>Name: </b>$data[user_name]
                        <br>
                        <b class='mb-2'>Phone No: </b>$data[phonenum]
                    </td>
                    <td>
                        <b class='mb-2'>Product Name: </b>$data[product_name]
                    </td>
                    <td>
                        <span class='badge mb-2 bg-primary'>
                        Order ID: $data[order_id]
                        </span>
                        <br>
                        <span class='badge mb-2 bg-primary'>
                        Transaction ID: $data[trans_id]
                        </span>
                        
                        <b class='mb-2'>Date: </b>$data[datentime]
                        <br>
                    </td>
                    <td>
                        ₹$data[trans_amt]
                        <br>
                    </td>
                    <td>
                        <button type='button' class='btn btn-success btn-sm'>
                            <i class='bi bi-cash-stack'></i> Refunded
                        </button>
                    </td>
                </tr>
            "; 
            $i++;
        }

        echo $table_data;
    }

    // if (isset($_POST['remove_user']))
    // {
    //     $frm_data = filteration($_POST);

    //     $res = delete("DELETE FROM `user_cred` WHERE `id`=? AND `is_verified`=?",[$frm_data['user_id'],0],'ii');

    //     if ($res) {
    //         echo 1;
    //     }
    //     else {
    //         echo 0;
    //     }
    // }

    // if(isset($_POST['search_user'])) 
    // {
    //     $frm_data = filteration($_POST);

    //     $query = "SELECT * FROM `user_cred` WHERE `name` LIKE ?";

    //     $res = select($query,["%$frm_data[name]%"],'s');
    //     $i = 1;
    //     $path = USERS_IMG_PATH;

    //     $data = "";

    //     while ($row = mysqli_fetch_assoc($res)) 
    //     {

    //         $del_btn = "                    
    //             <button type='button' onclick='remove_user($row[id])' class='btn btn-danger fs-6 shadow-none btn-sm'>
    //                 <i class='bi bi-trash3'></i>
    //             </button>
    //         ";

    //         $verified = "<span class='badge bg-warning'><i class='bi fs-6 bi-x-lg'></i></span>";

    //         if ($row['is_verified']) {
    //             $verified = "<span class='badge bg-success'><i class='bi fs-6 bi-check-lg'></i></span>";
    //             $del_btn = "";
    //         }
            
    //         $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>Active</button>";

    //         if (!$row['status']) {
    //             $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-danger btn-sm shadow-none'>Inactive</button>";

    //         }

    //         $data.="
    //             <tr>
    //                 <td>$i</td>
    //                 <td>
    //                     <img src='$path$row[profile]' width='75px'>    
    //                     $row[name]
    //                 </td>
    //                 <td>$row[email]</td>
    //                 <td>$row[phonenum]</td>
    //                 <td>$row[address] | $row[pincode]</td>
    //                 <td>$row[city]</td>
    //                 <td>$verified</td>
    //                 <td>$status</td>
    //                 <td>$row[datentime]</td>
    //                 <td>$del_btn</td>
    //             </tr>
    //         ";
    //         $i++;
    //     }

    //     echo $data;
    // }

?>