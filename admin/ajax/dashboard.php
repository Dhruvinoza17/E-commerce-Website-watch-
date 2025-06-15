<?php 

    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin();

    if(isset($_POST['order_analytics'])) 
    {

        $frm_data = filteration($_POST);

        $condition = "";

        if ($frm_data['period'] == 1) {
            $condition = "WHERE datentime BETWEEN NOW() - INTERVAL 30 DAY AND NOW()";
        }
        else if ($frm_data['period'] == 2) {
            $condition = "WHERE datentime BETWEEN NOW() - INTERVAL 90 DAY AND NOW()";
        }
        if ($frm_data['period'] == 3) {
            $condition = "WHERE datentime BETWEEN NOW() - INTERVAL 1 YEAR AND NOW()";
        }
        

        $result = mysqli_fetch_assoc(mysqli_query($con,"SELECT
            COUNT(CASE WHEN order_status!='failed' AND trans_status!='failed' AND order_status!='pending' THEN 1 END) AS `total_orders`,
            SUM(CASE WHEN order_status!='failed' AND trans_status!='failed' AND order_status!='pending' THEN `trans_amt` END) AS `total_amt`,

            COUNT(CASE WHEN order_status='confirmed' AND trans_status='success' THEN 1 END) AS `active_orders`,
            SUM(CASE WHEN order_status='confirmed' AND trans_status='success' THEN `trans_amt` END) AS `active_amt`,

            COUNT(CASE WHEN order_status='cancelled' AND trans_status='cancel' THEN 1 END) AS `cancelled_orders`,
            SUM(CASE WHEN order_status='cancelled' AND trans_status='cancel' THEN `trans_amt` END) AS `cancelled_amt`

            FROM `booking_order` $condition"));

        $output = json_encode($result);

        echo $output;

    }

    if(isset($_POST['user_analytics'])) 
    {

        $frm_data = filteration($_POST);

        $condition = "";

        if ($frm_data['period'] == 1) {
            $condition = "WHERE datentime BETWEEN NOW() - INTERVAL 30 DAY AND NOW()";
        }
        else if ($frm_data['period'] == 2) {
            $condition = "WHERE datentime BETWEEN NOW() - INTERVAL 90 DAY AND NOW()";
        }
        if ($frm_data['period'] == 3) {
            $condition = "WHERE datentime BETWEEN NOW() - INTERVAL 1 YEAR AND NOW()";
        }

        $total_queries = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(sr_no) AS `count`
            FROM `user_queries` $condition"));

        $total_new_reg = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(id) AS `count`
            FROM `user_cred` $condition"));

        $output = ['total_queries' => $total_queries['count'],
            'total_new_reg' => $total_new_reg['count']];

        $output = json_encode($output);

        echo $output;
    }

?>