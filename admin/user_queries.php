<?php 
    require('inc/essentials.php');
    require('inc/db_config.php');
    require('inc/links.php');
    adminLogin();

    if (isset($_GET['seen']))
    {
        $frm_data = filteration($_GET);

        if ($frm_data['seen'] == 'all') {
            $q = "UPDATE `user_queries` SET `seen`=?";
            $values = [1];

            if (update($q,$values,'i')) {
                alert('success','Marked all as read!');
            }
            else {
                alert('error','Operation failed!');
            }
        }
        else {
            $q = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
            $values = [1,$frm_data['seen']];

            if (update($q,$values,'ii')) {
                alert('success','Marked as read!');
            }
            else {
                alert('error','Operation failed!');
            }
        }
    }

    if (isset($_GET['del']))
    {
        $frm_data = filteration($_GET);

        if ($frm_data['del'] == 'all') {
            $q = "DELETE FROM `user_queries`";

            if (mysqli_query($con,$q)) {
                alert('success','All data deleted!');
            }
            else {
                alert('error','Operation failed!');
            }
        }
        else {
            $q = "DELETE FROM `user_queries` WHERE `sr_no`=?";
            $values = [$frm_data['del']];

            if (delete($q,$values,'i')) {
                alert('success','Data deleted!');
            }
            else {
                alert('error','Operation failed!');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETERNA - USER QUERIES</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 p-4 overflow-hidden ms-auto">
                <h3 class="mb-4">User Queries</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <a href='?seen=all' class='btn btn-sm rounded-pill shadow-none btn-primary'><i class="bi text-white bi-check2-all"></i> Mark all read</a>
                            <a href='?del=all' class='btn btn-sm rounded-pill shadow-none btn-danger'><i class="bi text-white bi-trash3"></i> Delete all</a>
                        </div>
                        <div class="table-responsive-md" style="height: 490px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr>
                                        <th scope="col" class="bg-dark text-light">#</th>
                                        <th scope="col" class="bg-dark text-light">Name</th>
                                        <th scope="col" class="bg-dark text-light">Email</th>
                                        <th scope="col" class="bg-dark text-light" width="20%">Subject</th>
                                        <th scope="col" class="bg-dark text-light" width="25%">Message</th>
                                        <th scope="col" class="bg-dark text-light">Date</th>
                                        <th scope="col" class="bg-dark text-light">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $q = "SELECT * FROM `user_queries` ORDER BY `sr_no` DESC";
                                        $data = mysqli_query($con,$q);
                                        $i=1;

                                        while ($row = mysqli_fetch_assoc($data)) 
                                        {
                                            $date = date('d-m-Y',strtotime($row['datentime']));
                                            $seen = '';
                                            if ($row['seen'] != 1) {
                                                $seen = "<a href='?seen=$row[sr_no]' class='btn btn-sm rounded-pill btn-primary'>Mark as read</a> <br>";
                                            }
                                            $seen.="<a href='?del=$row[sr_no]' class='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>";
                                            echo<<<query
                                                <tr>
                                                    <td>$i</td>
                                                    <td>$row[name]</td>
                                                    <td>$row[email]</td>
                                                    <td>$row[subject]</td>
                                                    <td>$row[message]</td>
                                                    <td>$date</td>
                                                    <td>$seen</td>
                                                </tr>
                                            query;
                                            $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
</body>
</html>