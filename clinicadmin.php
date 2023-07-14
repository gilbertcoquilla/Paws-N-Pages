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

$ret_cb = mysqli_query($con, "SELECT * FROM clinic_billing WHERE ClinicID='$clinicID'");
$row_cb = mysqli_num_rows($ret_cb);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Paws N Pages | Profile</title>
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

    <!-- For Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
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

        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#cliniclogo").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#supplies').DataTable({
                order: [
                    [2, 'asc']
                ],
            });
        });
    </script>

    <script type="text/javascript">
        function preview() {
            image.src = URL.createObjectURL(event.target.files[0]);
        }

        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#image").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
</head>

<body onload="initClock()">
    <div style="width:100%; height:50px; background-color:#73a22e;">
        <p style="color:white; font-size:23px; padding-left:10px;"><img src="img/logo_white.png" height="50px">&nbsp;PawsNPages
            <?php
            $ret = mysqli_query($con, "SELECT * FROM users WHERE UserID='$userID'");
            while ($row = mysqli_fetch_array($ret)) {
            ?>
                <a href="logout.php" style="color:white; font-size:20px; padding-top:10px; float:right; padding-right:15px;"><i class="fa fa-sign-out"></i></a><a style="color:white; font-size:15px; padding-top:13px; float:right; padding-left:10px; padding-right:10px;">Logged in as, <i><?php echo $row['Username'] ?></i></a>&nbsp;&nbsp;
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

                    <li class="active">
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

                    <li>
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

        <?php if ($usertype == 'Clinic Administrator') { ?>
            <div class="main_container">

                <div style="padding-right:30px; padding-left:30px; padding-top:10px;">
                    <div class="row">

                        <div class="col-xl-6">
                            <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                                <div class="card-header userProfile-font">👤 <b>User Details</b> &nbsp; <a href="" data-toggle="modal" title="Delete" style="float:right;" data-target="#update_modal<?php echo $row['userID'] ?>"><i class="material-icons" style="color:dodgerblue;">&#xE254;</i></a></div>
                                <div class="card-body text-center">

                                    <div class="userProfile">
                                        <center>
                                            <table class="table">
                                                <tbody>
                                                    <?php
                                                    $ret = mysqli_query($con, "SELECT * FROM users WHERE UserID='$userID'");
                                                    while ($row = mysqli_fetch_array($ret)) {
                                                    ?>
                                                        <tr>
                                                            <td style="color:#80b434;"><b>Name: &nbsp;&nbsp;</b></td>
                                                            <td>
                                                                <?php echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'] ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="color:#80b434;"><b>Contact No: &nbsp;&nbsp;</b></td>
                                                            <td>
                                                                <?php echo $row['ContactNo'] ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="color:#80b434;"><b>Birthdate: &nbsp;&nbsp;</b></td>
                                                            <td>
                                                                <?php echo $row['Birth_Date'] ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="color:#80b434;"><b>Username: &nbsp;&nbsp;</b></td>
                                                            <td>
                                                                <?php echo $row['Username'] ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="color:#80b434;"><b>Email: &nbsp;&nbsp;</b></td>
                                                            <td>
                                                                <?php echo $row['Email'] ?>
                                                            </td>
                                                        </tr>

                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-6">

                            <?php
                            $ret = mysqli_query($con, "SELECT * FROM address, clinics, users WHERE address.UserID = users.UserID AND clinics.UserID = users.UserID AND users.UserID='$userID'");
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <div class="card mb-4" style="border-radius: 15px;">
                                    <div class="card-header userProfile-font">🔔 <b>Subscription Details</b> &nbsp;</div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td style="color:#80b434;"><b>Subscription No.: &nbsp;&nbsp;</b></td>
                                                    <td>
                                                        <?php echo $row['subscriptionNo'] ?><br />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="color:#80b434;"><b>Date of Subscription &nbsp;&nbsp;</b></td>
                                                    <td>
                                                        <?php echo $row['DateOSubscription'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="color:#80b434;"><b>Expiry Date of Subscription &nbsp;&nbsp;</b></td>
                                                    <td>
                                                        <?php echo $row['ExpiryDateOfSub'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="color:#80b434;"><b>Subscription Status: &nbsp;&nbsp;</b></td>
                                                    <td>
                                                        <?php echo $row['SubscriptionStatus'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="color:#80b434;"><b>Subscription Type: &nbsp;&nbsp;</b></td>
                                                    <td>
                                                        <?php echo $row['SubscriptionType'] ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- END OF PET PROFILE -->
                        <!-- END OF PROFILE -->
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                                <div class="card-header userProfile-font">🏥 <b>Clinic Details</b> &nbsp; <a href="" data-toggle="modal" title="Edit" style="float:right;" data-target="#clinic_modal<?php echo $row['userID'] ?>"><i class="material-icons" style="color:dodgerblue;">&#xE254;</i></a></div>
                                <div class="card-body text-center">
                                    <div class="userProfile">
                                        <center>
                                            <table class="table">
                                                <tbody>
                                                    <?php
                                                    $ret = mysqli_query($con, "SELECT * FROM address, clinics, users WHERE address.UserID = users.UserID AND clinics.UserID = users.UserID AND users.UserID='$userID'");
                                                    while ($row = mysqli_fetch_array($ret)) {
                                                    ?>
                                                        <center style="display: none;">
                                                            <?php if ($row['ClinicImage'] != "") {
                                                                echo '<img class="img-fluid" src=image_upload/' . $row['ClinicImage'] . ' height=200px; width=200px;';
                                                            }
                                                            ?>
                                                        </center>
                                                        <br />
                                                        <br />
                                                        <tr>
                                                            <td style="color:#80b434;"><b>Clinic Name: &nbsp;&nbsp;</b></td>
                                                            <td>
                                                                <?php echo $row['ClinicName'] ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="color:#80b434;"><b>Clinic Address: &nbsp;&nbsp;</b></td>
                                                            <td>
                                                                <?php echo $row['LotNo_Street'] . ', Brgy. ' . $row['Barangay'] . ',  ' . $row['City'] . '<br/>' . $row['Province'] . ',' . $row['ZIPCode'] ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="color:#80b434;"><b>Operating Hours: &nbsp;&nbsp;</b></td>
                                                            <td>
                                                                <?php echo date('h:i A', strtotime($row['OpeningTime'])) . ' - ' . date('h:i A', strtotime($row['ClosingTime'])) ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="color:#80b434;"><b>Operating Days: &nbsp;&nbsp;</b></td>
                                                            <td>
                                                                <?php echo $row['OperatingDays'] ?>
                                                            </td>
                                                        </tr>

                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                                <div class="card-header userProfile-font"> <b>GCash QR</b> &nbsp;
                                    <?php if ($row_cb < 1) { ?>
                                        <button class="btn btn-primary" style="float:right; border-radius:15px;" data-toggle="modal" data-target="#billing_upload">Add</button>
                                    <?php } else { ?>
                                        <a href="" data-toggle="modal" title="Edit" style="float:right;" data-target="#billing_modal"><i class="material-icons" style="color:dodgerblue;">&#xE254;</i></a>
                                    <?php } ?>
                                </div>
                                <div class="card-body text-center">
                                    <div class="userProfile">
                                        <center>
                                            <table class="table">
                                                <tbody>
                                                    <?php
                                                    $ret = mysqli_query($con, "SELECT * FROM clinic_billing WHERE ClinicID = '$clinicID'");
                                                    while ($row = mysqli_fetch_array($ret)) {
                                                    ?>
                                                        <center>
                                                            <?php if ($row['BillingImage'] != "") {
                                                                echo '<img class="img-fluid" src="image_upload/' . $row['BillingImage'] . '" height=300px; width=300px;';
                                                            }
                                                            ?>
                                                        </center>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if ($usertype == 'Administrator') { ?>
            <div class="main_container">
                <div style="padding-right:30px; padding-left:30px; padding-top:10px;">
                    <div class="col-xl-12">
                        <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                            <div class="card-header userProfile-font">👤 <b>User Details</b> &nbsp; <a href="" data-toggle="modal" title="Delete" style="float:right;" data-target="#admin_modal<?php echo $row['userID'] ?>"><i class="material-icons" style="color:dodgerblue;">&#xE254;</i></a></div>
                            <div class="card-body text-center">
                                <div class="userProfile">
                                    <center>
                                        <table class="table">
                                            <tbody>
                                                <?php
                                                $ret = mysqli_query($con, "SELECT * FROM users WHERE UserID='$userID'");
                                                while ($row = mysqli_fetch_array($ret)) {
                                                ?>
                                                    <tr>
                                                        <td style="color:#80b434;"><b>Name: &nbsp;&nbsp;</b></td>
                                                        <td>
                                                            <?php echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="color:#80b434;"><b>Contact No: &nbsp;&nbsp;</b></td>
                                                        <td>
                                                            <?php echo $row['ContactNo'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="color:#80b434;"><b>Birthdate: &nbsp;&nbsp;</b></td>
                                                        <td>
                                                            <?php echo $row['Birth_Date'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="color:#80b434;"><b>Username: &nbsp;&nbsp;</b></td>
                                                        <td>
                                                            <?php echo $row['Username'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="color:#80b434;"><b>Email: &nbsp;&nbsp;</b></td>
                                                        <td>
                                                            <?php echo $row['Email'] ?>
                                                        </td>
                                                    </tr>

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- START OF MODAL FOR EDIT USER PROFILE (ADMIN) -->
        <div class="modal fade" id="admin_modal<?php echo $row['userID'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST">
                        <div class="modal-header modal-header-success">
                            <h3 class="modal-title">Edit Profile</h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-2"></div>
                            <div class="col-md-12">
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM users WHERE UserID='$userID'");
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-4">
                                            <label>First Name</label>
                                            <input type="hidden" name="userID" value="<?php echo $row['UserID'] ?>" />
                                            <input type="text" name="fname" value="<?php echo $row['FirstName'] ?>" class="form-control" />
                                        </div>
                                        <div class="col-md-4">
                                            <label>Middle Name</label>
                                            <input type="text" name="mname" value="<?php echo $row['MiddleName'] ?>" class="form-control" />
                                        </div>
                                        <div class="col-md-4">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" value="<?php echo $row['LastName'] ?>" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label>Contact No.</label>
                                            <input type="text" name="cnum" value="<?php echo $row['ContactNo'] ?>" class="form-control" />
                                        </div>
                                        <div class="col-md-6">
                                            <label>Birthdate</label>
                                            <input type="date" name="bdate" value="<?php echo $row['Birth_Date'] ?>" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" value="<?php echo $row['Username'] ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" value="<?php echo $row['Email'] ?>" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" value="<?php echo $row['Password'] ?>" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="newpassword" class="form-control" />
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button name="update_admin" class="btn btn-primary" style="border-radius: 15px;">Update</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END OF MODAL FOR EDIT USER PROFILE -->

        <!-- START OF MODAL FOR EDIT USER PROFILE (CLINIC ADMIN) -->
        <div class="modal fade" id="update_modal<?php echo $row['userID'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST">
                        <div class="modal-header modal-header-success">
                            <h3 class="modal-title">Edit Profile</h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-2"></div>
                            <div class="col-md-12">
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM users WHERE UserID='$userID'");
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-4">
                                            <label>First Name</label>
                                            <input type="hidden" name="userID" value="<?php echo $row['UserID'] ?>" />
                                            <input type="text" name="fname" value="<?php echo $row['FirstName'] ?>" class="form-control" />
                                        </div>
                                        <div class="col-md-4">
                                            <label>Middle Name</label>
                                            <input type="text" name="mname" value="<?php echo $row['MiddleName'] ?>" class="form-control" />
                                        </div>
                                        <div class="col-md-4">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" value="<?php echo $row['LastName'] ?>" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label>Contact No.</label>
                                            <input type="text" name="cnum" value="<?php echo $row['ContactNo'] ?>" class="form-control" />
                                        </div>
                                        <div class="col-md-6">
                                            <label>Birthdate</label>
                                            <input type="date" name="bdate" value="<?php echo $row['Birth_Date'] ?>" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" value="<?php echo $row['Username'] ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" value="<?php echo $row['Email'] ?>" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" value="<?php echo $row['Password'] ?>" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="newpassword" class="form-control" />
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button name="update" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-edit"></span>
                                Update</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span>
                                Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END OF MODAL FOR EDIT USER PROFILE -->

        <!-- START OF MODAL FOR EDIT CLINIC DETAILS -->
        <div class="modal fade" id="clinic_modal<?php echo $row['userID'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST" enctype="multipart/form-data" runat="server">
                        <div class="modal-header modal-header-success">
                            <h3 class="modal-title">Edit Clinic Details</h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-2"></div>
                            <div class="col-md-12">
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM address, clinics, users WHERE address.UserID = users.UserID AND clinics.UserID = users.UserID AND clinics.UserID='$userID'");
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                    <div class="row gx-3 mb-3">

                                        <input type="hidden" name="id_clinic" value="<?php echo $row['ClinicID'] ?>" />
                                        <input type="hidden" name="id_user" value="<?php echo $row['ClinicID'] ?>" />

                                        <div class="col-md-6">
                                            <label style="padding-bottom: 5px;">Clinic Profile Picture (Current)</label><br>
                                            <a href="clinic_verification/<?php echo $row['ClinicImage']; ?>" target="_blank">
                                                <span name="old" value="<?php echo $row['ClinicImage']; ?>">
                                                    <?php echo $row['ClinicImage']; ?>
                                                </span>
                                            </a>&nbsp;<a href="clinic_verification/<?php echo $row['ClinicImage']; ?>" target="_blank" download>(Download)</a></span>

                                        </div>
                                        <div class="col-md-6">
                                            <label>Update Clinic Profile Picture</label>
                                            <input type="file" id="cliniclogo" name="cliniclogo" class="form-control" style="width: 100%;" accept="image/*">
                                        </div>

                                    </div>

                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-12">
                                            <label>Clinic Name</label>
                                            <input type="text" name="clinicname" value="<?php echo $row['ClinicName'] ?>" class="form-control" style="width: 100%;" />
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label>Opening Hours</label>
                                            <input type="time" name="openhours" value="<?php echo $row['OpeningTime'] ?>" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Closing Hours</label>
                                            <input type="time" name="closehours" value="<?php echo $row['ClosingTime'] ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label>Operating Days (Current)</label>
                                            <textarea name="opendays1" id="opendays1" class="form-control" style="width: 100%;" rows="6" readonly><?php echo $row['OperatingDays'] ?></textarea>
                                            <input type="hidden" name="opendays_1" value="<?php echo $row['OperatingDays'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Update Operating Days</label><br>
                                            <div style="padding-left: 20px;">
                                                <input type="checkbox" name="operatingdays[]" value="Sunday"> Sunday <br>
                                                <input type="checkbox" name="operatingdays[]" value="Monday"> Monday <br>
                                                <input type="checkbox" name="operatingdays[]" value="Tuesday"> Tuesday <br>
                                                <input type="checkbox" name="operatingdays[]" value="Wednesday"> Wednesday <br>
                                                <input type="checkbox" name="operatingdays[]" value="Thursday"> Thursday <br>
                                                <input type="checkbox" name="operatingdays[]" value="Friday"> Friday <br>
                                                <input type="checkbox" name="operatingdays[]" value="Saturday"> Saturday <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-12" style="padding-bottom: 15px;">
                                            <label style="font-weight: bold;">Clinic Address</label>
                                        </div>

                                        <div class="col-md-8">
                                            <label>House/Lot No. & Street</label>
                                            <input type="text" name="lotno_street" class="form-control" value="<?php echo $row['LotNo_Street'] ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Barangay</label>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT BarangayName FROM Barangay");
                                            $data = $sql->fetch_all(MYSQLI_ASSOC);
                                            ?>
                                            <select id="barangay" style="height: 48px; width: 100%; border-radius: 5px;" class="bg-light border-0" name="barangay" placeholder="Barangay" required>
                                                <option value="<?php echo $row['Barangay'] ?>" selected hidden>&nbsp;&nbsp;<?php echo $row['Barangay'] ?></option>
                                                <?php foreach ($data as $row1) : ?>
                                                    <option value="<?= htmlspecialchars($row1['BarangayName']) ?>">
                                                        &nbsp;&nbsp;<?= htmlspecialchars($row1['BarangayName']) ?>
                                                    </option>
                                                <?php endforeach ?>
                                                <!-- <option value="'.htmlspecialchars($barangay).'"></option>' -->
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-4">
                                            <label>City</label>
                                            <input type="text" name="city" class="form-control" value="Quezon City" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Province</label>
                                            <input type="text" name="province" class="form-control" value="NCR" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>ZIP Code</label>
                                            <input type="text" name="zipcode" style="height: 48px;" class="form-control" value="<?php echo $row['ZIPCode'] ?>" required>
                                        </div>
                                    </div>


                                <?php } ?>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button name="update_clinic" type="submit" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-edit"></span>
                                Update</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span>
                                Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END OF MODAL FOR EDIT CLINIC DETAILS -->

        <!-- START OF MODAL FOR EDIT CLINIC QR -->
        <div class="modal fade" id="billing_modal" aria-hidden="true">
            <div class="modal-dialog modal-m">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST" enctype="multipart/form-data" runat="server">
                        <div class="modal-header modal-header-success">
                            <h3 class="modal-title">GCash QR</h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-2"></div>
                            <div class="col-md-12">
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM clinic_billing WHERE clinicID ='$clinicID'");
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                    <input type="hidden" name="id_clinic" value="<?php echo $row['ClinicID'] ?>" />
                                    <input type="hidden" name="id_user" value="<?php echo $row['ClinicID'] ?>" />

                                    <div class="col-md-12">
                                        <label style="padding-bottom: 5px;">Clinic GCash QR (Current)</label><br>
                                        <a href="image_upload/<?php echo $row['BillingImage']; ?>" target="_blank">
                                            <span name="old">
                                                <?php
                                                $b_image = substr($row['BillingImage'], 0, 15);
                                                echo $b_image . '...';
                                                ?>
                                            </span>
                                        </a>&nbsp;<a href="image_upload/<?php echo $row['BillingImage']; ?>" target="_blank" download>(Download)</a></span>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <label>Update Clinic GCash QR</label>
                                        <input type="file" id="uClinicQR" name="uClinicQR" class="form-control" style="width: 100%;" accept="image/*" required="required">
                                    </div>
                                    <br>
                                <?php } ?>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button name="update_qr" type="submit" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-edit"></span>
                                Update</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span>
                                Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END OF MODAL FOR EDIT CLINIC QR -->

        <!-- START OF MODAL FOR ADD CLINIC QR -->
        <div class="modal fade" id="billing_upload" aria-hidden="true">
            <div class="modal-dialog modal-m">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST" enctype="multipart/form-data" runat="server">
                        <div class="modal-header modal-header-success">
                            <h3 class="modal-title">GCash QR</h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-2"></div>
                            <div class="col-md-12">
                                <input type="hidden" name="id_clinic" value="<?php echo $row['ClinicID'] ?>" />
                                <input type="hidden" name="id_user" value="<?php echo $row['ClinicID'] ?>" />

                                <div class="col-md-12">
                                    <label>Upload GCash QR</label>
                                    <input type="file" id="ClinicQR" name="ClinicQR" class="form-control" style="width: 100%;" required="required">
                                </div>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button name="submit_billing" type="submit" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-edit"></span>
                                Submit</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span>
                                Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END OF MODAL FOR EDIT CLINIC DETAILS -->



        <!-- START OF EDIT -->

        <?php
        //FOR EDITING CLINIC QR

        if (isset($_POST['update_qr'])) {
            $ufile_cb = $_FILES['uClinicQR']['name'];
            $utempfile_cb = $_FILES['uClinicQR']['tmp_name'];
            $ufolder_cb = "image_upload/" . $ufile_cb;
            move_uploaded_file($utempfile_cb, $ufolder_cb);

            if ($ufile_cb != "") {

                $uquery_cb = mysqli_query($con, "UPDATE clinic_billing set BillingImage='$ufile_cb' WHERE ClinicID='$clinicID'");

                if ($uquery_cb) {
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                    echo '<script>';
                    echo 'swal({
                                                title: "Success",
                                                text: "You have successfully updated your QR",
                                                icon: "success",
                                                html: true,
                                                showCancelButton: true,
                                                })
                                                    .then((willDelete) => {
                                                        if (willDelete) {

                                                            document.location ="clinicadmin.php";
                                                        }
                                                    })';
                    echo '</script>';
                } else {
                    echo "<script>alert('Something Went Wrong. Please try again');</script>";
                }
            } else {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
            }
        }

        //FOR ADDING CLINIC QR
        if (isset($_POST['submit_billing'])) {
            $file_cb = $_FILES['ClinicQR']['name'];
            $tempfile_cb = $_FILES['ClinicQR']['tmp_name'];
            $folder_cb = "image_upload/" . $file_cb;
            move_uploaded_file($tempfile_cb, $folder_cb);

            $query_cb = mysqli_query($con, "INSERT INTO clinic_billing(BillingImage, ClinicID) VALUES ('$file_cb', '$clinicID')");

            if ($query_cb) {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                            title: "Success",
                                            text: "You have successfully added your QR",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {

                                                        document.location ="clinicadmin.php";
                                                    }
                                                })';
                echo '</script>';
            } else {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
            }
        }

        if (isset($_POST['update_clinic'])) {

            // For clinic logo
            $file = $_FILES['cliniclogo']['name'];
            $tempfile = $_FILES['cliniclogo']['tmp_name'];
            $folder = "image_upload/" . $file;
            move_uploaded_file($tempfile, $folder);

            // Other details
            $cname = $_POST['clinicname'];
            $op_hours = $_POST['openhours'];
            $cl_hours = $_POST['closehours'];

            $operatingDays = $_POST['operatingdays'];
            $op_days = '';

            foreach ($operatingDays as $opDays) {
                $op_days .= $opDays . ", ";
            }

            $op_days = rtrim($op_days, ", ");

            // For address
            $lotno_street1 = $_POST['lotno_street'];
            $barangay = $_POST['barangay'];
            $zipcode = $_POST['zipcode'];

            // For operating days
            if ($op_days == null)
                $op_days = $_POST['opendays_1'];


            if ($file != "")
                $query = mysqli_query($con, "UPDATE clinics SET ClinicImage='$file', ClinicName='$cname', OpeningTime='$op_hours', ClosingTime='$cl_hours', OperatingDays='$op_days' WHERE ClinicID='$clinicID'");
            else
                $query = mysqli_query($con, "UPDATE clinics SET ClinicName='$cname', OpeningTime='$op_hours', ClosingTime='$cl_hours', OperatingDays='$op_days' WHERE ClinicID='$clinicID'");

            // $query = mysqli_query($con, "UPDATE clinics SET ClinicImage='$file', ClinicName='$cname', OpeningTime='$op_hours', ClosingTime='$cl_hours', OperatingDays='$op_days' WHERE ClinicID='$clinicID'");
            $query_a = mysqli_query($con, "UPDATE address SET LotNo_Street='$lotno_street1', Barangay='$barangay', ZIPCode='$zipcode' WHERE UserID='$userID'");

            if ($query && $query_a) {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                            title: "Success",
                                            text: "You have successfully updated your clinic details",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {

                                                        document.location ="clinicadmin.php";
                                                    }
                                                })';
                echo '</script>';
            } else {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
            }
        }

        ?>



        <?php
        /////////////////////////////////////// FOR UPDATING USER PROFILE (ADMIN) ///////////////////////////////////////
        $anewpass = $_POST['anewpassword'];

        // Hashed password
        $ah_pword = password_hash($anewpass, PASSWORD_DEFAULT);

        if (isset($_POST['update_admin']) && $anewpass != "") {

            $ausername = $_POST['ausername'];
            $aemail = $_POST['aemail'];


            $query = mysqli_query($con, "UPDATE users SET  Username='$ausername', Password='$ah_pword', Email='$aemail' WHERE UserID='$userID'");

            if ($query) {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                            title: "Success",
                                            text: "You have successfully updated an information",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="clinicadmin.php";
                                                    }
                                                })';
                echo '</script>';
            } else {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
            }
        }
        if (isset($_POST['update_admin']) && $anewpass == "") {

            $username = $_POST['ausername'];
            $aemail = $_POST['aemail'];

            $query = mysqli_query($con, "UPDATE users SET Username='$username', Email='$aemail' WHERE UserID='$userID'");

            if ($query) {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                            title: "Success",
                                            text: "You have successfully updated your information",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="clinicadmin.php";
                                                    }
                                                })';
                echo '</script>';
            } else {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
            }
        }

        /////////////////////////////////////// FOR UPDATING USER PROFILE (CLINIC ADMIN) ///////////////////////////////////////
        $newpass = $_POST['newpassword'];

        // Hashed password
        $h_pword = password_hash($newpass, PASSWORD_DEFAULT);

        if (isset($_POST['update']) && $newpass != "") {

            $userID = $_POST['userID'];
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $lname = $_POST['lname'];
            $cnum = $_POST['cnum'];
            $username = $_POST['username'];
            $bdate = $_POST['bdate'];


            $query = mysqli_query($con, "UPDATE users SET FirstName='$fname', MiddleName='$mname', LastName='$lname', ContactNo='$cnum', Birth_Date='$bdate', Username='$username', Password='$h_pword' WHERE UserID='$userID'");

            if ($query) {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                            title: "Success",
                                            text: "You have successfully updated your information",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="clinicadmin.php";
                                                    }
                                                })';
                echo '</script>';
            } else {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
            }
        }

        if (isset($_POST['update']) && $newpass == "") {

            $userID = $_POST['userID'];
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $lname = $_POST['lname'];
            $cnum = $_POST['cnum'];
            $username = $_POST['username'];
            $bdate = $_POST['bdate'];


            $query = mysqli_query($con, "UPDATE users SET FirstName='$fname', MiddleName='$mname', LastName='$lname', ContactNo='$cnum', Birth_Date='$bdate', Username='$username' WHERE UserID='$userID'");

            if ($query) {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                            title: "Success",
                                            text: "You have successfully updated your information",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="clinicadmin.php";
                                                    }
                                                })';
                echo '</script>';
            } else {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
            }
        }
        ?>

</body>

</html>