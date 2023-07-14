<?php
session_start();
include('config.php');
include('connection.php');

$userID = $_SESSION["id"];
$usertype = $_SESSION['usertype'];

$ret_ca = mysqli_query($con, "SELECT * FROM users, clinics WHERE users.UserID = clinics.UserID AND clinics.UserID='$userID'");
$cnt_ca = 1;
$row_ca = mysqli_fetch_array($ret_ca);

$clinicID = $row_ca['ClinicID'];



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Paws N Pages | Orders</title>
    <link rel="icon" href="https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png" type="image/x-icon">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="Free HTML Templates" name="keywords">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">


    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            text-decoration: none;
            list-style: none;
            font-family: 'Montserrat', sans-serif;
        }

        .wrapper {
            background: white;
            display: flex;
        }

        .side_bar {
            width: 250px;
            height: 100vh;
        }


        .main_container {
            width: calc(100% - 250px);
            padding: 30px;
            height: 100vh;
        }



        .side_bar .side_bar_top .profile_pic {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .side_bar .side_bar_top .profile_pic img {
            width: 100px;
            height: 100px;
            padding: 5px;
            border: 2px solid white;
            border-radius: 50%;
        }

        .side_bar .side_bar_top .profile_info {
            text-align: center;
            color: #fff;
        }

        .side_bar .side_bar_top .profile_info p {
            margin-top: 5px;
            font-size: 12px;
        }

        .side_bar .side_bar_bottom {
            background: #80b434;
            padding: 20px 0;
            padding-left: 15px;
            height: 100%;

        }

        .side_bar .side_bar_bottom ul li {
            position: relative;
        }

        .side_bar .side_bar_bottom ul li a {
            display: block;
            padding: 15px;
            font-size: 14px;
            color: white;
            margin-bottom: 5px;
        }

        .side_bar .side_bar_bottom ul li a .icon {
            margin-right: 8px;
        }

        .side_bar .side_bar_bottom ul li.active a {
            background: white;
            color: #80b434;
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
        }

        .side_bar .side_bar_bottom ul li.active .top_curve,
        .side_bar .side_bar_bottom ul li.active .bottom_curve {
            position: absolute;
            left: 0;
            width: 100%;
            height: 20px;
            background: white;
        }

        .side_bar .side_bar_bottom ul li.active .top_curve {
            top: -20px;
        }

        .side_bar .side_bar_bottom ul li.active .bottom_curve {
            bottom: -20px;
        }

        .side_bar .side_bar_bottom ul li.active .top_curve:before,
        .side_bar .side_bar_bottom ul li.active .bottom_curve:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #80b434;
        }

        .side_bar .side_bar_bottom ul li.active .top_curve:before {
            border-bottom-right-radius: 25px;
        }

        .side_bar .side_bar_bottom ul li.active .bottom_curve:before {
            border-top-right-radius: 25px;
        }

        .side_bar .side_bar_bottom .sidebar-footer {
            height: 50px;
            position: absolute;
            width: 100%;
            bottom: 0;
            list-style-type: none;
            padding-bottom: 5.5em;
        }
    </style>
    <!-- FOR DIGITAL TIME AND DATE -->
    <script type="text/javascript">
        function updateClock() {
            var now = new Date();
            var dname = now.getDay(),
                mo = now.getMonth(),
                dnum = now.getDate(),
                yr = now.getFullYear(),
                hou = now.getHours(),
                min = now.getMinutes(),
                sec = now.getSeconds(),
                pe = "AM";

            if (hou >= 12) {
                pe = "PM";
            }
            if (hou == 0) {
                hou = 12;
            }
            if (hou > 12) {
                hou = hou - 12;
            }

            Number.prototype.pad = function(digits) {
                for (var n = this.toString(); n.length < digits; n = 0 + n);
                return n;
            }

            var months = ["January", "February", "March", "April", "May", "June", "July", "Augest", "September", "October", "November", "December"];
            var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
            var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
            for (var i = 0; i < ids.length; i++)
                document.getElementById(ids[i]).firstChild.nodeValue = values[i];
        }

        function initClock() {
            updateClock();
            window.setInterval("updateClock()", 1);
        }
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#orders').DataTable({
                order: [
                    [4, 'desc']
                ],

            });
        });
    </script>
</head>

<body onload="initClock()">
    <div style="width:100%; height:50px; background-color:#73a22e;">
        <p style="color:white; font-size:23px; padding-left:10px;"><img src="img/logo_white.png" height="50px">&nbsp;PawsNPages
            <?php
            $ret = mysqli_query($con, "SELECT * FROM users WHERE UserID='$userID'");
            while ($row = mysqli_fetch_array($ret)) {
            ?>
                <a href="logout.php" style="color:white; font-size:20px; padding-top:10px; float:right; padding-right:15px;"><i class="fa fa-sign-out"></i></a><a style="color:white; font-size:15px; padding-top:13px; float:right; padding-left:10px; padding-right:10px;">Logged
                    in as, <i>
                        <?php echo $row['Username'] ?>
                    </i></a>&nbsp;&nbsp;
        </p>
    <?php } ?>
    </div>
    <div class="wrapper">
        <div class="side_bar">

            <div class="side_bar_bottom">
                <ul>
                    <li>
                        <span class="top_curve"></span>
                        <a href="dashboard.php"><span class="icon"><i class="fa fa-home"></i></span>
                            <span class="item">Dashboard</span></a>
                        <span class="bottom_curve"></span>
                    </li>

                    <li>
                        <span class="top_curve"></span>
                        <a href="clinicadmin.php"><span class="icon"><i class="fa fa-user"></i></span>
                            <span class="item">Profile</span></a>
                        <span class="bottom_curve"></span>
                    </li>

                    <li>
                        <span class="top_curve"></span>
                        <a href="supplies.php"><span class="icon"><i class="fa fa-tags"></i></span>
                            <span class="item">Products</span></a>
                        <span class="bottom_curve"></span>
                    </li>

                    <li>
                        <span class="top_curve"></span>
                        <a href="bookings.php"><span class="icon"><i class="fa fa-calendar"></i></span>
                            <span class="item">Bookings</span></a>
                        <span class="bottom_curve"></span>
                    </li>

                    <li class="active">
                        <span class="top_curve"></span>
                        <a href="orders_admin.php"><span class="icon"><i class="fa fa-truck"></i></span>
                            <span class="item">Orders</span></a>
                        <span class="bottom_curve"></span>
                    </li>

                    <li>
                        <span class="top_curve"></span>
                        <a href="feedbacks_admin.php"><span class="icon"><i class="fa fa-envelope"></i></span>
                            <span class="item">Feedback</span></a>
                        <span class="bottom_curve"></span>
                    </li>

                    <li>
                        <span class="top_curve"></span>
                        <a href="services.php"><span class="icon"><i class="fa fa-list"></i></span>
                            <span class="item">Services</span></a>
                        <span class="bottom_curve"></span>
                    </li>

                    <li>
                        <span class="top_curve"></span>
                        <a href="petsearch.php"><span class="icon"><i class="fa fa-paw"></i></span>
                            <span class="item">Pet Records</span></a>
                        <span class="bottom_curve"></span>
                    </li>

                    <?php if ($usertype == 'Administrator') { ?>
                        <li>
                            <span class="top_curve"></span>
                            <a href="users.php"><span class="icon"><i class="fa fa-users"></i></span>
                                <span class="item">Users</span></a>
                            <span class="bottom_curve"></span>
                        </li>

                        <li>
                            <span class="top_curve"></span>
                            <a href="clinics_admin.php"><span class="icon"><i class="fa fa-building"></i></span>
                                <span class="item">Clinics</span></a>
                            <span class="bottom_curve"></span>
                        </li>

                        <li>
                            <span class="top_curve"></span>
                            <a href="petbooklet.php"><span class="icon"><i class="fa fa-book"></i></span>
                                <span class="item">Pet Booklet</span></a>
                            <span class="bottom_curve"></span>
                        </li>

                        <li>
                            <span class="top_curve"></span>
                            <a href="reports.php"><span class="icon"><i class="fa fa-exclamation-triangle"></i></span>
                                <span class="item">Reports</span></a>
                            <span class="bottom_curve"></span>
                        </li>
                    <?php } ?>
                </ul>
                <!--digital clock start-->
                <div class="datetime" style="color:white;  text-align:center;">
                    <div class="date">
                        <span id="dayname">Day</span>,
                        <span id="month">Month</span>
                        <span id="daynum">00</span>,
                        <span id="year">Year</span>
                    </div>
                    <div class="time">
                        <span id="hour">00</span>:
                        <span id="minutes">00</span>:
                        <span id="seconds">00</span>
                        <span id="period">AM</span>
                    </div>
                </div>
                <!--digital clock end-->
            </div>
        </div>

        <!-- START OF CLINIC ADMINISTRATOR -->
        <?php if ($usertype == 'Clinic Administrator') { ?>
            <div class="main_container">
                <div style="padding-right:30px; padding-left:30px; padding-top:10px;">
                    <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                        <div class="card-header userProfile-font"><b>📦 Orders</b></div>
                        <div class="card-body text-center">
                            <table class="table table-striped table-hover" style="border:0px;  text-align:left;" id="orders">
                                <thead style="border:0px;">
                                    <tr class="table100-head" style="border:0px;">
                                        <th class="column1" style="border:0px; color:#80b434;">Reference No.</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Total Price</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Customer</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Date & Time Checked Out</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Status</th>
                                    </tr>
                                </thead>
                                <tbody style="border:0px;">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM orders, users, clinics WHERE orders.UserID = users.UserID AND orders.ClinicID = clinics.ClinicID AND orders.ClinicID = '$clinicID'");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {
                                            $date = new DateTime($row['DateTimeCheckedOut']);
                                    ?>
                                            <!--Fetch the Records -->
                                            <tr style="border:0px;">
                                                <td style="border:0px;"><a href="" orderid="<?php echo $row['OrderID'] ?>" refno="<?php echo $row['Order_RefNo'] ?>" products="<?php $prod = $row['OrderedProducts'];
                                                                                                                                                                                $explodedArray = explode(', ', $prod);
                                                                                                                                                                                foreach ($explodedArray as $element) {
                                                                                                                                                                                    echo $element . "\n";
                                                                                                                                                                                } ?>" user="<?php echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'] ?>" totalprice="<?php echo "₱ " . $row['TotalPrice']; ?>" dtcout="<?php echo $date->format('Y-m-d h:i A'); ?>" address="<?php echo $row['ShippingTo'] ?>" proofpayment="<?php echo $row['ProofOfPayment']; ?>" proofrefno="<?php echo $row['Proof_RefNo']; ?>" prescription="<?php echo $row['OrderPrescription'] ?>" orderstatus="<?php echo $row['OrderStatus']; ?>" odremarks="<?php echo $row['OrderRemarks']; ?>" class="edit" title="View" data-toggle="modal" data-target="#view_order"><?php echo $row['Order_RefNo'] ?></a></td>

                                                <td style="border:0px;">₱
                                                    <?php echo $row['TotalPrice'] ?>
                                                </td>
                                                <td style="border:0px;">
                                                    <?php echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'] ?>
                                                </td>
                                                <td style="border:0px;">
                                                    <?php echo $date->format('Y-m-d h:i A'); ?>
                                                </td>
                                                <td style="border:0px;">
                                                    <?php $status = $row['OrderStatus'];
                                                    if ($status === 'Pending') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 25px; border-radius:10px; background-color:#F4BB44;">
                                                            <?php echo $row['OrderStatus']; ?>
                                                        </a>
                                                    <?php }
                                                    if ($status === 'To Ship') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 30px; border-radius:10px; background-color:#228B22;">
                                                            <?php echo $row['OrderStatus']; ?>
                                                        </a>
                                                    <?php }
                                                    if ($status === 'Denied') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 30px;  border-radius:10px; background-color:#A52A2A;">
                                                            <?php echo $row['OrderStatus']; ?>
                                                        </a>
                                                    <?php }
                                                    if ($status === 'Approved') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 22px;  border-radius:10px; background-color:#0096FF;">
                                                            <?php echo $row['OrderStatus']; ?>
                                                        </a>
                                                    <?php }
                                                    if ($status === 'Completed') { ?>
                                                    <?php echo $row['OrderStatus'];
                                                    } ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                    } else { ?>
                                        <tr style="border:0px;">
                                            <td style="text-align:center; color:red; border:0px;" colspan="5">No Record Found
                                            </td>
                                            <td style="text-align:center; color:red; border:0px;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px;" colspan="0"></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- END OF CLINIC ADMINISTRATOR -->

        <!-- START OF ADMINISTRATOR -->
        <?php if ($usertype == 'Administrator') { ?>
            <div class="main_container">
                <div style="padding-right:30px; padding-left:30px; padding-top:10px;">
                    <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                        <div class="card-header userProfile-font"><b>📦 Orders</b></div>
                        <div class="card-body text-center">
                            <table class="table table-striped table-hover" style="border:0px;  text-align:left;" id="orders">
                                <thead style="border:0px;">
                                    <tr class="table100-head" style="border:0px;">
                                        <th class="column1" style="border:0px; color:#80b434;">Reference No.</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Clinic Name</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Total Price</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Customer</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Date & Time Checked Out</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Status</th>
                                    </tr>
                                </thead>
                                <tbody style="border:0px;">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM orders, users, clinics WHERE orders.UserID = users.UserID AND orders.ClinicID = clinics.ClinicID AND orders.ClinicID = clinics.ClinicID");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {
                                            $date = new DateTime($row['DateTimeCheckedOut']);
                                    ?>
                                            <!--Fetch the Records -->
                                            <tr style="border:0px;">
                                                <td style="border:0px;"><a href="" aorderid="<?php echo $row['OrderID'] ?>" aclinic="<?php echo $row['ClinicName'] ?>" arefno="<?php echo $row['Order_RefNo'] ?>" aproducts="<?php $prod = $row['OrderedProducts'];
                                                                                                                                                                                                                                $explodedArray = explode(', ', $prod);
                                                                                                                                                                                                                                foreach ($explodedArray as $element) {
                                                                                                                                                                                                                                    echo $element . "\n";
                                                                                                                                                                                                                                } ?>" auser="<?php echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'] ?>" atotalprice="<?php echo "₱ " . $row['TotalPrice']; ?>" adtcout="<?php echo $date->format('Y-m-d h:i A'); ?>" aaddress="<?php echo $row['ShippingTo'] ?>" aproofpayment="<?php echo $row['ProofOfPayment']; ?>" aproofrefno="<?php echo $row['Proof_RefNo']; ?>" aprescription="<?php echo $row['OrderPrescription'] ?>" aorderstatus="<?php echo $row['OrderStatus']; ?>" aodremarks="<?php echo $row['OrderRemarks']; ?>" class="edit" title="View" data-toggle="modal" data-target="#admin_order"><?php echo $row['Order_RefNo'] ?></a></td>

                                                <td style="border:0px;">
                                                    <?php echo $row['ClinicName'] ?>
                                                </td>
                                                <td style="border:0px;">₱
                                                    <?php echo $row['TotalPrice'] ?>
                                                </td>
                                                <td style="border:0px;">
                                                    <?php echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'] ?>
                                                </td>
                                                <td style="border:0px;">
                                                    <?php echo $date->format('Y-m-d h:i A'); ?>
                                                </td>
                                                <td style="border:0px;">
                                                    <?php $status = $row['OrderStatus'];
                                                    if ($status === 'Pending') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 25px; border-radius:10px; background-color:#F4BB44;">
                                                            <?php echo $row['OrderStatus']; ?>
                                                        </a>
                                                    <?php }
                                                    if ($status === 'To Ship') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 30px; border-radius:10px; background-color:#228B22;">
                                                            <?php echo $row['OrderStatus']; ?>
                                                        </a>
                                                    <?php }
                                                    if ($status === 'Denied') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 30px;  border-radius:10px; background-color:#A52A2A;">
                                                            <?php echo $row['OrderStatus']; ?>
                                                        </a>
                                                    <?php }
                                                    if ($status === 'Approved') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 22px;  border-radius:10px; background-color:#0096FF;">
                                                            <?php echo $row['OrderStatus']; ?>
                                                        </a>
                                                    <?php }
                                                    if ($status === 'Completed') { ?>
                                                    <?php echo $row['OrderStatus'];
                                                    } ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                    } else { ?>
                                        <tr style="border:0px;">
                                            <td style="text-align:center; color:red; border:0px;" colspan="5">No Record Found
                                            </td>
                                            <td style="text-align:center; color:red; border:0px;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px;" colspan="0"></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- END OF ADMINISTRATOR -->



    </div>

    <!-- START OF MODAL FOR VIEWING ORDER DETAILS -->
    <div class="modal fade" id="view_order" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" runat="server" enctype="multipart/form-data" id="view_order_form">
                    <div class="modal-header modal-header-success">
                        <h3 class="modal-title">Order Details</h3>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group" style="display: none;">
                                <label>ID</label>
                                <input type="text" name="OrderID" id="OrderID" class="form-control" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Order Reference No.</label>
                                        <input type="text" name="Order_RefNo" id="Order_RefNo" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Ordered Products</label>
                                        <!-- <input type="textarea" name="Orders" id="Orders" class="form-control" readonly /> -->
                                        <textarea name="OrderedProducts" id="OrderedProducts" class="form-control" style="width: 100%; height: 150px;" readonly></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Price</label>
                                        <input type="text" name="TotalPrice" id="TotalPrice" class="form-control" readonly />
                                    </div>
                                    <hr />
                                    <div class="form-group">
                                        <label>Proof Of Payment</label>
                                        <br>
                                        <div class="row" style="width: 100%;">
                                            <div class="col-8">
                                                <a href="" id="DL_ProofOfPayment" target="_blank">
                                                    <span id="proofOP"></span>
                                                </a>
                                            </div>
                                            <div class="col-4" style="text-align: right;">
                                                <a href="" id="DL_ProofOfPayment" target="_blank" download>
                                                    Download
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Prescription</label>
                                        <br>
                                        <div class="row" style="width: 100%;">
                                            <div class="col-8">
                                                <a href="" id="DL_Presc" target="_blank">
                                                    <span id="presc"></span>
                                                </a>
                                            </div>
                                            <div class="col-4" style="text-align: right;">
                                                <a href="" id="DL_Presc" target="_blank" download>
                                                    Download
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Reference No. (For Proof of Payment)</label>
                                        <input type="text" name="Proof_RefNo" id="Proof_RefNo" class="form-control" readonly />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Customer</label>
                                        <input type="text" name="Customer" id="Customer" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Date & Time Checked Out</label>
                                        <input type="text" name="DTimeCO" id="DTimeCO" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Shipping To</label>
                                        <textarea name="ShippingTo" id="ShippingTo" class="form-control" style=" width: 100%; height: 150px;" readonly></textarea>
                                    </div>
                                    <hr />
                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="OrderStatus" id="OrderStatus" class="form-control" style="height: 100%;" readonly />
                                            </div>
                                            <div class="col-6">
                                                <select name="OrderStatus2" id="OrderStatus2" style="border-radius: 5px; width: 100%;" class="bg-light border-0 px-4 py-3">
                                                    <option selected disabled>-- Update Status --</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Denied">Denied</option>
                                                    <option value="Approved">Approved</option>
                                                    <option value="To Ship">To Ship</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea name="OrderRemarks" id="OrderRemarks" class="form-control" style=" width: 100%; height: 150px;"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div style="clear:both;"></div>
                    <div class="modal-footer">
                        <button name="edit" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-edit"></span>
                            Update
                        </button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span>
                            Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  END OF MODAL FOR VIEWING ORDER DETAILS -->

    <!-- START OF MODAL FOR ADMINSTRATOR VIEWING ORDER DETAILS -->
    <div class="modal fade" id="admin_order" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" runat="server" enctype="multipart/form-data" id="admin_order_form">
                    <div class="modal-header modal-header-success">
                        <h3 class="modal-title">Order Details</h3>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group" style="display: none;">
                                <label>ID</label>
                                <input type="text" name="OrderID" id="OrderID" class="form-control" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Order Reference No.</label>
                                        <input type="text" name="Order_RefNo" id="Order_RefNo" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Clinic Name</label>
                                        <input type="text" name="ClinicName" id="ClinicName" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Ordered Products</label>
                                        <!-- <input type="textarea" name="Orders" id="Orders" class="form-control" readonly /> -->
                                        <textarea name="OrderedProducts" id="OrderedProducts" class="form-control" style="width: 100%; height: 150px;" readonly></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Price</label>
                                        <input type="text" name="TotalPrice" id="TotalPrice" class="form-control" readonly />
                                    </div>
                                    <hr />
                                    <div class="form-group">
                                        <label>Proof Of Payment</label>
                                        <br>
                                        <div class="row" style="width: 100%;">
                                            <div class="col-8">
                                                <a href="" id="DL_ProofOfPayment" target="_blank">
                                                    <span id="proofOP"></span>
                                                </a>
                                            </div>
                                            <div class="col-4" style="text-align: right;">
                                                <a href="" id="DL_ProofOfPayment" target="_blank" download>
                                                    Download
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Prescription</label>
                                        <br>
                                        <div class="row" style="width: 100%;">
                                            <div class="col-8">
                                                <a href="" id="DL_Presc" target="_blank">
                                                    <span id="presc"></span>
                                                </a>
                                            </div>
                                            <div class="col-4" style="text-align: right;">
                                                <a href="" id="DL_Presc" target="_blank" download>
                                                    Download
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Reference No. (For Proof of Payment)</label>
                                        <input type="text" name="Proof_RefNo" id="Proof_RefNo" class="form-control" readonly />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Customer</label>
                                        <input type="text" name="Customer" id="Customer" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Date & Time Checked Out</label>
                                        <input type="text" name="DTimeCO" id="DTimeCO" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Shipping To</label>
                                        <textarea name="ShippingTo" id="ShippingTo" class="form-control" style=" width: 100%; height: 150px;" readonly></textarea>
                                    </div>
                                    <hr />
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" name="OrderStatus" id="OrderStatus" class="form-control" style="height: 100%;" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea name="OrderRemarks" id="OrderRemarks" class="form-control" style=" width: 100%; height: 150px;" readonly></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div style="clear:both;"></div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  END OF MODAL FOR ADMINSTRATOR VIEWING ORDER DETAILS -->

    <!-- FOR INSERTING DATA -->
    <?php
    if (isset($_POST['edit'])) {

        $orderid = $_POST['OrderID'];
        $orderstatus = $_POST['OrderStatus2'];
        $odremarks = $_POST['OrderRemarks'];

        if ($orderstatus != "") {

            if ($odremarks != "") {
                $query = mysqli_query($con, "UPDATE orders SET OrderStatus='$orderstatus', OrderRemarks='$odremarks' WHERE OrderID='$orderid'");

                if ($query) {
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                    echo '<script>';
                    echo 'swal({
                                            title: "Success",
                                            text: "You have successfully updated an order",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="orders_admin.php";
                                                    }
                                                })';
                    echo '</script>';
                } else {
                    echo "<script>alert('Something Went Wrong. Please try again');</script>";
                }
            } else {
                $query = mysqli_query($con, "UPDATE orders SET OrderStatus='$orderstatus' WHERE OrderID='$orderid'");

                if ($query) {
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                    echo '<script>';
                    echo 'swal({
                                            title: "Success",
                                            text: "You have successfully updated an order",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="orders_admin.php";
                                                    }
                                                })';
                    echo '</script>';
                } else {
                    echo "<script>alert('Something Went Wrong. Please try again');</script>";
                }
            }
        } else {
            if ($odremarks != "") {
                $query = mysqli_query($con, "UPDATE orders SET OrderRemarks='$odremarks' WHERE OrderID='$orderid'");

                if ($query) {
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                    echo '<script>';
                    echo 'swal({
                                            title: "Success",
                                            text: "You have successfully updated an order",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="orders_admin.php";
                                                    }
                                                })';
                    echo '</script>';
                } else {
                    echo "<script>alert('Something Went Wrong. Please try again');</script>";
                }
            }
        }
    }
    ?>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- For Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- Latest compiled and minified JavaScript (needed for editing details on a tabled list of data) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- To show details when editing -->
    <script>
        function endResize() {
            $(window).off("resize", resizer);
        }

        $('#view_order').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;

            var orderid = $(opener).attr('orderid');
            var refno = $(opener).attr('refno');
            var user = $(opener).attr('user');
            var products = $(opener).attr('products');
            var totalprice = $(opener).attr('totalprice');
            var dtcout = $(opener).attr('dtcout');
            var address = $(opener).attr('address');

            var proofpayment = $(opener).attr('proofpayment');
            var proofpaymentName = jQuery.trim(proofpayment).substring(0, 20) + "...";
            var proofrefno = $(opener).attr('proofrefno');

            var prescription = $(opener).attr('prescription');
            var prescriptionName = jQuery.trim(prescription).substring(0, 20) + "...";

            var orderstatus = $(opener).attr('orderstatus');
            var odremarks = $(opener).attr('odremarks');

            $('#view_order_form').find('[name="OrderID"]').val(orderid);
            $('#view_order_form').find('[name="Order_RefNo"]').val(refno);
            $('#view_order_form').find('[name="Customer"]').val(user);
            $('#view_order_form').find('[name="OrderedProducts"]').val(products);
            $('#view_order_form').find('[name="TotalPrice"]').val(totalprice);
            $('#view_order_form').find('[name="DTimeCO"]').val(dtcout);
            $('#view_order_form').find('[name="ShippingTo"]').val(address);

            $('#view_order_form').find('[id="proofOP"]').html(proofpaymentName);
            $('#view_order_form').find('[id="DL_ProofOfPayment"]').prop('href', 'image_upload/' + proofpayment);

            $('#view_order_form').find('[id="presc"]').html(prescriptionName);
            $('#view_order_form').find('[id="DL_Presc"]').prop('href', 'image_upload/' + prescription);

            $('#view_order_form').find('[name="Proof_RefNo"]').val(proofrefno);
            $('#view_order_form').find('[name="OrderStatus"]').val(orderstatus);
            $('#view_order_form').find('[name="OrderRemarks"]').val(odremarks);

            endResize();
        });

        $('#admin_order').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;

            var aorderid = $(opener).attr('aorderid');
            var aclinic = $(opener).attr('aclinic');
            var arefno = $(opener).attr('arefno');
            var auser = $(opener).attr('auser');
            var aproducts = $(opener).attr('aproducts');
            var atotalprice = $(opener).attr('atotalprice');
            var adtcout = $(opener).attr('adtcout');
            var aaddress = $(opener).attr('aaddress');

            var aproofpayment = $(opener).attr('aproofpayment');
            var aproofpaymentName = jQuery.trim(aproofpayment).substring(0, 20) + "...";
            var aproofrefno = $(opener).attr('aproofrefno');

            var aprescription = $(opener).attr('aprescription');
            var aprescriptionName = jQuery.trim(aprescription).substring(0, 20) + "...";

            var aorderstatus = $(opener).attr('aorderstatus');
            var aodremarks = $(opener).attr('aodremarks');

            $('#admin_order_form').find('[name="OrderID"]').val(aorderid);
            $('#admin_order_form').find('[name="ClinicName"]').val(aclinic);
            $('#admin_order_form').find('[name="Order_RefNo"]').val(arefno);
            $('#admin_order_form').find('[name="Customer"]').val(auser);
            $('#admin_order_form').find('[name="OrderedProducts"]').val(aproducts);
            $('#admin_order_form').find('[name="TotalPrice"]').val(atotalprice);
            $('#admin_order_form').find('[name="DTimeCO"]').val(adtcout);
            $('#admin_order_form').find('[name="ShippingTo"]').val(aaddress);

            $('#view_order_form').find('[id="proofOP"]').html(aproofpaymentName);
            $('#view_order_form').find('[id="DL_ProofOfPayment"]').prop('href', 'image_upload/' + aproofpayment);

            $('#view_order_form').find('[id="presc"]').html(aprescriptionName);
            $('#view_order_form').find('[id="DL_Presc"]').prop('href', 'image_upload/' + aprescription);

            $('#admin_order_form').find('[name="Proof_RefNo"]').val(aproofrefno);
            $('#admin_order_form').find('[name="OrderStatus"]').val(aorderstatus);
            $('#admin_order_form').find('[name="OrderRemarks"]').val(aodremarks);

            endResize();
        });

        function displayImg() {
            var img = document.getElementById("ProofOfPayment").src;
            window.open(img, '_blank');
        }
    </script>

</body>

</html>