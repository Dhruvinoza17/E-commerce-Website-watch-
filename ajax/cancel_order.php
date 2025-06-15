<?php 

    session_start();
    require ('../admin/inc/db_config.php');
    require ('../admin/inc/essentials.php');

    if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
        redirect('index.php');
    }

    if (isset($_POST['cancel_order'])) 
    {
        $frm_data = filteration($_POST);

        $query = "UPDATE `booking_order` SET `order_status`=?, `trans_status`=?, `refund`=?  
            WHERE `booking_id`=? AND `user_id`=?";

        $value = ['cancelled','cancel',0,$frm_data['id'],$_SESSION['uId']];

        $result = update($query,$value,'ssiii');

        echo $result;

    }
    
?>