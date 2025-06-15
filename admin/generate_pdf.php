<?php
    require('./inc/essentials.php');
    require('./inc/db_config.php');
    require('./inc/mpdf/vendor/autoload.php');
    adminLogin();

    if (isset($_GET['gen_pdf']) && isset($_GET['id']))
    {
        $frm_data = filteration($_GET);
        
        $query = "SELECT bo.*, od.* FROM `booking_order` bo
        INNER JOIN `order_details` od ON bo.booking_id = od.booking_id
        WHERE ((bo.order_status = 'confirmed' AND bo.trans_status = 'success')
        OR (bo.order_status = 'failed' AND bo.trans_status = 'failed'))
        AND bo.booking_id = '$frm_data[id]'";

        $res = mysqli_query($con,$query);

        $total_rows = mysqli_num_rows($res);

        if ($total_rows == 0)
        {
            header('location: dashboard.php');
            exit;
        }

        $data = mysqli_fetch_assoc($res);

        $date = date("d-m-Y",strtotime($data['datentime']));

        $table_data = "
            <div style='display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f8f9fa;'>
                <div style='width: 850px; padding: 20px; border: 2px solid black; background: white; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);'>

                    <!-- Invoice Header -->
                    <div style='text-align: center; border-bottom: 2px solid black; padding-bottom: 10px; margin-bottom: 15px;'>
                        <h2 style='font-weight: bold; text-transform: uppercase; margin: 0;'>INVOICE</h2>
                        <p style='margin: 0; font-size: 14px;'>Date: <strong>$date</strong></p>
                    </div>

                    <!-- Company Details -->
                    <div style='border: 2px solid black; padding: 10px; margin-bottom: 15px; text-align: left;'>
                        <h3 style='font-weight: bold; margin-bottom: 5px;'>Company Details</h3>
                        <p style='margin: 0;'><b>Company Name:</b> ETERNA</p>
                        <p style='margin: 0;'><b>Address:</b> Eterna Watches, MG Road,<br>Bengaluru - 560001, Karnataka, India.</p>
                        <p style='margin: 0;'><b>Phone:</b> +91 98765 43210</p>
                        <p style='margin: 0;'><b>Email:</b> info@eterna.com</p>
                        <p style='margin: 0;'><b>GST No:</b> 29GST123456</p>
                    </div>


                    <!-- Customer Details -->
                    <table style='width: 100%; border: 2px solid black; text-align: left; margin-bottom: 15px; font-size: 14px; border-collapse: collapse;'>
                        <tr style='background: #f2f2f2;'>
                            <th colspan='4' style='border-bottom: 2px solid black; padding: 10px; font-size: 18px; text-align: center; white-space: nowrap;'>Customer Details</th>
                        </tr>
                        <tr>
                            <td style='padding: 10px; white-space: nowrap;'><b>Name:</b></td>
                            <td style='padding: 10px;'>$data[user_name]</td>
                            <td style='padding: 10px; white-space: nowrap;'><b>Phone No:</b></td>
                            <td style='padding: 10px;'>$data[phonenum]</td>
                        </tr>
                        <tr>
                            <td style='padding: 10px; white-space: nowrap;'><b>Email:</b></td>
                            <td style='padding: 10px;'>$data[email]</td>
                            <td style='padding: 10px; white-space: nowrap;'><b>Order ID:</b></td>
                            <td style='padding: 10px;'>$data[order_id]</td>
                        </tr>
                        <tr>
                            <td style='padding: 10px; white-space: nowrap;'><b>Transaction ID:</b></td>
                            <td style='padding: 10px;'>$data[trans_id]</td>
                            <td style='padding: 10px; white-space: nowrap;'><b>Address:</b></td>
                            <td style='padding: 10px;'>$data[address], $data[pincode]</td>
                        </tr>
                    </table>


                    <!-- Product Details Table -->
                    <table style='width: 100%; border-collapse: collapse; text-align: center; font-size: 14px; margin-bottom: 10px;'>
                        <thead>
                            <tr style='background: #f2f2f2;'>
                                <th style='border: 2px solid black; padding: 8px;'>Sl.</th>
                                <th style='border: 2px solid black; padding: 8px;'>Product Name</th>
                                <th style='border: 2px solid black; padding: 8px;'>Price (₹)</th>
                                <th style='border: 2px solid black; padding: 8px;'>Amount Paid (₹)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style='border: 2px solid black; padding: 8px;'>1</td>
                                <td style='border: 2px solid black; padding: 8px;'>$data[product_name]</td>
                                <td style='border: 2px solid black; padding: 8px;'>₹$data[price]</td>
                                <td style='border: 2px solid black; padding: 8px;'>₹$data[trans_amt]</td>
                            </tr>

                            <!-- Blank Rows for Extra Products -->
                            <tr>
                                <td style='border: 2px solid black; padding: 8px;'>2</td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                            </tr>
                            <tr>
                                <td style='border: 2px solid black; padding: 8px;'>3</td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                            </tr>
                            <tr>
                                <td style='border: 2px solid black; padding: 8px;'>4</td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                            </tr>
                            <tr>
                                <td style='border: 2px solid black; padding: 8px;'>5</td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                            </tr>
                            <tr>
                                <td style='border: 2px solid black; padding: 8px;'>6</td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                            </tr>
                            <tr>
                                <td style='border: 2px solid black; padding: 8px;'>7</td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                            </tr>
                            <tr>
                                <td style='border: 2px solid black; padding: 8px;'>8</td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                                <td style='border: 2px solid black; padding: 8px;'></td>
                            </tr>

                            <!-- Total Row -->
                            <tr style='font-weight: bold; background: #f2f2f2;'>
                                <td colspan='3' style='border: 2px solid black; padding: 8px; text-align: right;'>Total:</td>
                                <td style='border: 2px solid black; padding: 8px;'>₹$data[trans_amt]</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Signature Section -->
                    <div style='display: flex; justify-content: space-between; margin-top: 20px; font-size: 14px;'>
                        <div style='text-align: right;'>
                            <p style='font-weight: bold;'>Authorized Signatory</p>
                            <p style='border-top: 1px solid black; width: 200px; margin-left: auto;'></p>
                        </div>
                    </div>
                </div>
            </div>
        ";

        // Generates pdf of invoice with mpdf library
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($table_data);
        $mpdf->Output($data['order_id'].'.pdf','D');

    }
    else {
        header('location: dashboard.php');
    }

?>