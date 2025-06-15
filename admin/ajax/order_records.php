<?php 

    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin();

    if(isset($_POST['get_orders'])) 
    {

        $frm_data = filteration($_POST);

        $limit = 5;
        $page = $page = isset($frm_data['page']) ? $frm_data['page'] : 1;
        $start = ($page-1) * $limit;

        $query = "SELECT bo.*, od.* FROM `booking_order` bo
            INNER JOIN `order_details` od ON bo.booking_id = od.booking_id
            WHERE ((bo.order_status = 'confirmed' AND bo.trans_status = 'success')
            OR (bo.order_status = 'failed' AND bo.trans_status = 'failed')
            OR (bo.order_status = 'cancelled' AND bo.trans_status = 'cancel'))
            AND (bo.order_id LIKE ? OR od.phonenum LIKE ? OR od.user_name LIKE ?) 
            ORDER BY bo.booking_id DESC";

        $res = select($query,["%$frm_data[search]%","%$frm_data[search]%","%$frm_data[search]%"],'sss');

        $limit_query = $query ." LIMIT $start,$limit";
        $limit_res = select($limit_query,["%$frm_data[search]%","%$frm_data[search]%","%$frm_data[search]%"],'sss');

        $total_rows = mysqli_num_rows($res);

        if ($total_rows == 0)
        {
            $output = json_encode(["table_data"=>"<p class='fw-bold' style='white-space: nowrap;'>No Data Found!</p>","pagination"=>'']);
            echo $output;
            exit;
        }

        $i = $start+1;
        $table_data = "";

        while ($data = mysqli_fetch_assoc($limit_res)) 
        {
            $status = "";
            $invoice = "";

            if ($data['order_status'] == 'confirmed' && $data['trans_status'] == 'success')
            {
                $status = "<span style='font-size: 0.9rem;' class='badge align-middle text-bg-success'><i class='bi bi-check2-square'></i> Confirmed</span>";
                $invoice = "<button type='button' onclick='download($data[booking_id])' class='btn btn-success fw-bold shadow-none btn-sm'><i class='bi bi-download'></i></button>";
            }
            else if ($data['order_status'] == 'failed' && $data['trans_status'] == 'failed')
            {
                $status = "<span style='font-size: 0.9rem;' class='badge align-middle text-dark text-bg-warning'><i class='bi bi-x-circle'></i> Failed</span>";
            }
            else if ($data['order_status'] == 'cancelled' && $data['trans_status'] == 'cancel')
            {
                $status = "<span style='font-size: 0.9rem;' class='badge align-middle text-bg-danger'><i class='bi bi-x-circle'></i> Cancelled</span>";
            }

            $date = date("d-m-Y",strtotime($data['datentime']));
            $table_data .="
                <tr>
                    <td>$i</td>
                    <td>
                        <b class='mb-2'>Name: </b>$data[user_name]
                        <br>
                        <b class='mb-2'>Phone No: </b>$data[phonenum]
                        <br>
                        <b class='mb-2'>Address: </b>$data[address]
                    </td>
                    <td>
                        <b class='mb-2'>Product Name: </b>$data[product_name]
                        <br>
                        <b class='mb-2'>Price: </b>₹$data[price]
                    </td>
                    <td>
                        <span class='badge mb-2 bg-primary'>
                            Order ID: $data[order_id]
                        </span>
                        <br>
                        <span class='badge mb-2 bg-primary'>
                            Transaction ID: $data[trans_id]
                        </span>
                        <br>
                        <b class='mb-2'>Amount: </b>₹$data[trans_amt]
                        <br>
                        <b class='mb-2'>Date: </b>$date
                        <br>
                    </td>
                    <td>$status</td>
                    <td>$invoice</td>
                </tr>
            "; 
            $i++;
        }

        $pagination = "";

        if ($total_rows > $limit) 
        {
            $total_pages = ceil($total_rows/$limit);

            if ($page!=1) {
                $pagination .="<li class='page-item'><button onclick='change_page(1)' class='page-link shadow-none'>First</button></li>";
            }

            $disabled = ($page==1) ? "disabled" : "";
            $prev = $page-1;
            $pagination .="<li class='page-item $disabled'><button onclick='change_page($prev)' class='page-link shadow-none'>Previous</button></li>";

            $disabled = ($page==$total_pages) ? "disabled" : "";
            $next = $page+1;
            $pagination .="<li class='page-item $disabled'><button onclick='change_page($next)' class='page-link shadow-none'>Next</button></li>";

            if ($page!=$total_pages) {
                $pagination .="<li class='page-item'><button onclick='change_page($total_pages)' class='page-link shadow-none'>Last</button></li>";
            }
        }

        $output = json_encode(["table_data"=>$table_data,"pagination"=>$pagination]);
        echo $output;
    }

?>