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
    <title>Paws N Pages | Users</title>
    <meta charset="UTF-8">
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

        /* Style the tab */
        .tab {
            overflow: auto;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            border-radius: 15px 15px 0px 0px;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #80b434;
            color: white;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .card-body {
            display: none;
        }
    </style>
    <script>
        $(document).ready(function() {
            var table = $('#clients').DataTable({
                order: [
                    [0, 'asc']
                ],
            });
            var table = $('#admins').DataTable({
                order: [
                    [0, 'asc']
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

    <script>
        $(document).ready(function() {

            $('.edit').on('click', function() {

                $('#edit_modal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[1]);
                $('#SupplyName').val(data[2]);
                $('#SupplyDescription').val(data[3]);
                $('#SupplyPrice').val(data[4]);
                $('#Stocks').val(data[5]);
                $('#NeedPrescription').val(data[6]);
            });
        });
    </script>

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

            <div class="side_bar_bottom" style="height:100%;">
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
                        <li class="active">
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

        <div class="main_container">
            <div style="padding-right:30px; padding-left:30px; padding-top:10px;">
                <div class="row">
                    <div class="col-xl-12">

                        <!-- START OF VACCINE RECORD -->
                        <div class="card mb-4 mb-xl-0" style="border-radius: 15px;" id="vaccine_tab" name="tab">
                            <!-- <div class="card-header userProfile-font"><b>💉 Vaccine Record</b>
                            </div> -->
                            <div class="tab">
                                <button id="v_tab" class="tablinks active" onclick="showContent('content1', this)">Clients</button>
                                <button id="ha_tab" class="tablinks" onclick="showContent('content2', this)">Admins</button>
                                <button class="tablinks" data-toggle="modal" data-target="#add_modal" style="float:right; background-color:#80b434; color:white;">Add</button>
                            </div>
                            <div class="card-body text-center" id="content1">
                                <table class="table table-striped table-hover" id="clients" style="text-align: left; border: 0;">
                                    <thead>
                                        <tr class="table100-head">
                                            <th class="column1" style="border:0px; color:#80b434; ">Name</th>
                                            <th class="column1" style="border:0px; color:#80b434; ">Username</th>
                                            <th class="column1" style="border:0px; color:#80b434;  display: none;">Address</th>
                                            <th class="column1" style="border:0px; color:#80b434;  display: none;">Age</th>
                                            <th class="column1" style="border:0px; color:#80b434; ">User Type</th>
                                            <th class="column1" style="border:0px; color:#80b434;  display: none;">Email</th>
                                            <th class="column1" style="border:0px; color:#80b434;  display: none;">Contact No.</th>
                                            <th class="column1" style="border:0px; color:#80b434; ">Date Modified</th>
                                            <th class="column1" style="border:0px; color:#80b434;  text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM users WHERE userType != 'Administrator'");
                                        $cnt = 1;
                                        $row = mysqli_num_rows($ret);
                                        if ($row > 0) {
                                            while ($row = mysqli_fetch_array($ret)) {
                                                $date = new DateTime($row['DateTimeModified']);
                                        ?>


                                                <?php
                                                $user_id = $row['UserID'];
                                                $ret1 = mysqli_query($con, "SELECT * FROM address WHERE UserID='$user_id'");
                                                $row1 = mysqli_fetch_array($ret1);
                                                ?>

                                                <!--Fetch the Records -->
                                                <tr border:0px;>

                                                    <td style="border:0px;"> <?php echo $row['FirstName'] . ' ' .  $row['MiddleName'] . ' ' . $row['LastName'] ?></td>
                                                    <td style="border:0px;"><?php echo $row['Username']; ?></td>

                                                    <?php if ($row1 > 0) { ?>
                                                        <td style="border:0px; display: none;"><?php echo $row1['LotNo_Street'] . ', Brgy. ' . $row1['Barangay'] . ',  ' . $row1['City']  . ',  ' . $row1['ZIPCode'] ?><br /></td>
                                                    <?php } else { ?>
                                                        <td style="border:0px; display: none;"></td>
                                                    <?php } ?>

                                                    <td style="border:0px; display: none;"><?php echo $row['Birth_Date']; ?></td>
                                                    <td style="border:0px;"><?php echo $row['UserType']; ?></td>
                                                    <td style="border:0px; display: none;"><?php echo $row['Email']; ?></td>
                                                    <td style="border:0px; display: none;"><?php echo $row['ContactNo']; ?></td>
                                                    <td style="border:0px;"><?php echo $date->format('Y-m-d h:i A');; ?></td>
                                                    <td style="text-align: center; border:0px;">
                                                        <a href="" user-id="<?php echo $row['UserID'] ?>" user-fname="<?php echo $row['FirstName'] ?>" user-mname="<?php echo $row['MiddleName'] ?>" user-lname="<?php echo $row['LastName'] ?>" user-lotnostreet="<?php echo $row1['LotNo_Street'] ?>" user-province="<?php echo $row1['Province'] ?>" user-barangay="<?php echo $row1['Barangay'] ?>" user-city="<?php echo $row1['City'] ?>" user-zipcode="<?php echo $row1['ZIPCode'] ?>" user-cnum="<?php echo $row['ContactNo'] ?>" user-bdate="<?php echo $row['Birth_Date'] ?>" user-utype="<?php echo $row['UserType'] ?>" user-email="<?php echo $row['Email'] ?>" user-username="<?php echo $row['Username'] ?>" user-password="<?php echo $row['Password'] ?>" class="edit" title="Edit" data-toggle="modal" data-target="#edit_modal"><i class="fa fa-edit"></i></a>
                                                        <a href="users.php?delid=<?php echo ($row['UserID']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Delete item?');"><i class="fa fa-trash" style="color:red; display: none;"></i></a>
                                                    </td>
                                                </tr>

                                            <?php
                                                $cnt = $cnt + 1;
                                            }
                                        } else { ?>
                                            <tr style="border:0px;">
                                                <td style="text-align:center; color:red; border:0px;" colspan="8">No Record Found</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END OF CLIENTS -->

                            <!-- START OF ADMINISTRATOR -->
                            <div class="card-body text-center" id="content2">
                                <table class="table table-striped table-hover" id="admins" style="text-align: left; border: 0px;">
                                    <thead>
                                        <tr class="table100-head">
                                            <th class="column1" style="border:0px; color:#80b434;">Name</th>
                                            <th class="column1" style="border:0px; color:#80b434;">Username</th>
                                            <th class="column1" style="border:0px; color:#80b434;">Email</th>
                                            <th class="column1" style="border:0px; color:#80b434;">Contact No.</th>
                                            <th class="column1" style="border:0px; color:#80b434;">Date Modified</th>
                                            <th class="column1" style="border:0px; color:#80b434;  text-align: center;">Action</th>
                                            <!-- <th class="column1">Edit/Delete</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM users WHERE userType ='Administrator'");
                                        $cnt = 1;
                                        $row = mysqli_num_rows($ret);
                                        if ($row > 0) {
                                            while ($row = mysqli_fetch_array($ret)) {
                                                $date = new DateTime($row['DateTimeModified']);
                                        ?>
                                                <!--Fetch the Records -->
                                                <tr>
                                                    <td style="border:0px;"><?php echo $row['FirstName'] . ' ' .  $row['MiddleName'] . ' ' . $row['LastName'] ?></td>
                                                    <td style="border:0px;"><?php echo $row['Username']; ?></td>
                                                    <td style="border:0px;"><?php echo $row['Email']; ?></td>
                                                    <td style="border:0px;"><?php echo $row['ContactNo']; ?></td>
                                                    <td style="border:0px;"><?php echo $date->format('Y-m-d h:i A'); ?></td>
                                                    <td style="text-align: center; border:0px;">
                                                        <a href="" auser-id="<?php echo $row['UserID'] ?>" auser-fname="<?php echo $row['FirstName'] ?>" auser-mname="<?php echo $row['MiddleName'] ?>" auser-lname="<?php echo $row['LastName'] ?>" auser-cnum="<?php echo $row['ContactNo'] ?>" auser-bdate="<?php echo $row['Birth_Date'] ?>" auser-utype="<?php echo $row['UserType'] ?>" auser-email="<?php echo $row['Email'] ?>" auser-username="<?php echo $row['Username'] ?>" auser-password="<?php echo $row['Password'] ?>" class="edit" title="Edit" data-toggle="modal" data-target="#edit_admin"><i class="fa fa-edit"></i></a>
                                                        <a href="users.php?delid=<?php echo ($row['UserID']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Delete item?');"><i class="fa fa-trash" style="color:red; display: none;"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $cnt = $cnt + 1;
                                            }
                                        } else { ?>
                                            <tr>
                                                <th style="text-align:center; border:0; color:red;" colspan="6">No Record Found</th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- END OF ADMINISTRATOR -->

                        </div>


                    </div>
                </div>
            </div>
            <!-- END OF USERS -->
        </div>
    </div>




    <!-- START OF MODAL FOR ADD USER -->
    <div class="modal fade" id="add_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" runat="server" id="form_add_user">
                    <div class="modal-header modal-header-success">
                        <h3 class="modal-title">Add User</h3>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group" style="display: none;">
                                <label>ID</label>
                                <input type="text" name="userID1" id="userID1" class="form-control" />
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label>First Name</label>
                                    <input type="text" name="FirstName1" id="FirstName1" class="form-control" required />
                                </div>
                                <div class="col-md-4">
                                    <label>Middle Name</label>
                                    <input type="text" name="MiddleName1" id="MiddleName1" class="form-control" required />
                                </div>
                                <div class="col-md-4">
                                    <label>Last Name</label>
                                    <input type="text" name="LastName1" id="LastName1" class="form-control" required />
                                </div>
                            </div>

                            <!-- Start address -->
                            <div class="row gx-3 mb-3" style="display: none;">
                                <div class="col-md-12">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-4">
                                    <label>House/Lot No./Street</label>
                                    <input type="text" name="HouseLotNo" id="HouseLotNo" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label>Barangay</label>
                                    <input type="text" name="Barangay" id="Barangay" class="form-control" readonly />
                                </div>
                                <div class="col-md-4">
                                    <label style="color: white;">Update Barangay</label>
                                    <?php
                                    $sql = mysqli_query($con, "SELECT BarangayName FROM Barangay");
                                    $data = $sql->fetch_all(MYSQLI_ASSOC);
                                    ?>
                                    <select style="border-radius: 5px; width: 100%; height: 47px;" class="bg-light border-0" name="Barangay2" id="Barangay2">
                                        <option selected disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- Update Barangay --</option>
                                        <?php foreach ($data as $row) : ?>
                                            <option value="<?= htmlspecialchars($row['BarangayName']) ?>">
                                                &nbsp;&nbsp;&nbsp;<?= htmlspecialchars($row['BarangayName']) ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row gx-3 mb-3" style="display: none;">
                                <div class="col-md-4">
                                    <label>City</label>
                                    <input type="text" name="City" id="City" class="form-control" value="Quezon City" readonly />
                                </div>
                                <div class="col-md-4">
                                    <label>Province</label>
                                    <input type="text" name="Province" id="Province" class="form-control" value="NCR" readonly />
                                </div>
                                <div class="col-md-4">
                                    <label>ZIP Code</label>
                                    <input type="text" name="ZIPCode" id="ZIPCode" class="form-control" />
                                </div>
                            </div>
                            <!-- End address -->


                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label>Birthdate</label>
                                    <input type="date" name="bdate1" id="bdate1" class="form-control" required />
                                </div>
                                <div class="col-md-4">
                                    <label>Email</label>
                                    <input type="text" name="Email1" id="Email1" class="form-control" required />
                                </div>
                                <div class="col-md-4">
                                    <label>Contact Number</label>
                                    <input type="text" name="ContactNo1" id="ContactNo1" class="form-control" required />
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label>User Type</label>
                                    <select name="UserType1" id="UserType1" style="border-radius: 5px; width: 100%; height: 47px;" class="bg-light border-0" required>
                                        <option value="Pet Owner">&nbsp;&nbsp;&nbsp;Pet Owner</option>
                                        <option value="Clinic Administrator">&nbsp;&nbsp;&nbsp;Clinic Administrator</option>
                                        <option value="Administrator">&nbsp;&nbsp;&nbsp;Administrator</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label>Username</label>
                                    <input type="text" name="Username1" id="Username1" class="form-control" required />
                                </div>
                                <div class="col-md-4">
                                    <label>Password</label>
                                    <input type="password" name="Password1" id="Password1" class="form-control" required /><br>
                                    <input type="checkbox" onclick="showPassword()">&nbsp;Show Password
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="add" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-edit"></span>
                            Submit
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END OF MODAL FOR ADD USER -->


    <!-- START OF MODAL FOR EDIT ADMIN -->
    <div class="modal fade" id="edit_admin" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" runat="server" id="form_edit_admin">
                    <div class="modal-header modal-header-success">
                        <h3 class="modal-title">Edit User</h3>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group" style="display: none;">
                                <label>ID</label>
                                <input type="text" name="auserID" id="auserID" class="form-control" />
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label>First Name</label>
                                    <input type="text" name="aFirstName" id="aFirstName" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label>Middle Name</label>
                                    <input type="text" name="aMiddleName" id="aMiddleName" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label>Last Name</label>
                                    <input type="text" name="aLastName" id="aLastName" class="form-control" />
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label>Birthdate</label>
                                    <input type="date" name="abdate" id="abdate" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label>User Type</label>
                                    <input type="text" name="aUserType" id="aUserType" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label style="color: white;">Update User Type</label>
                                    <select name="aUserType2" id="aUserType2" style="border-radius: 5px; width: 100%; height: 47px;" class="bg-light border-0">
                                        <option selected disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- Update User Type --</option>
                                        <option value="Pet Owner">&nbsp;&nbsp;&nbsp;Pet Owner</option>
                                        <option value="Clinic Administrator">&nbsp;&nbsp;&nbsp;Clinic Administrator</option>
                                        <option value="Administrator">&nbsp;&nbsp;&nbsp;Administrator</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label>Email</label>
                                    <input type="text" name="aEmail" id="aEmail" class="form-control" />
                                </div>
                                <div class="col-md-2">
                                    <label>Contact No.</label>
                                    <input type="text" name="aContactNo" id="aContactNo" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label>Username</label>
                                    <input type="text" name="aUsername" id="aUsername" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label>Password</label>
                                    <input type="password" name="aPassword" id="aPassword" class="form-control" /><br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button name="update_admin" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-edit"></span>
                            Update
                        </button>

                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END OF MODAL FOR EDIT ADMIN -->

    <!-- START OF MODAL FOR EDIT CLIENTS -->
    <div class="modal fade" id="edit_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" runat="server" id="form_edit_user">
                    <div class="modal-header modal-header-success">
                        <h3 class="modal-title">Edit User</h3>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group" style="display: none;">
                                <label>ID</label>
                                <input type="text" name="userID" id="userID" class="form-control" />
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label>First Name</label>
                                    <input type="text" name="FirstName" id="FirstName" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label>Middle Name</label>
                                    <input type="text" name="MiddleName" id="MiddleName" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label>Last Name</label>
                                    <input type="text" name="LastName" id="LastName" class="form-control" />
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label>Birthdate</label>
                                    <input type="date" name="bdate" id="bdate" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label>User Type</label>
                                    <input type="text" name="UserType" id="UserType" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label style="color: white;">Update User Type</label>
                                    <select name="UserType2" id="UserType2" style="border-radius: 5px; width: 100%; height: 47px;" class="bg-light border-0">
                                        <option selected disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- Update User Type --</option>
                                        <option value="Pet Owner">&nbsp;&nbsp;&nbsp;Pet Owner</option>
                                        <option value="Clinic Administrator">&nbsp;&nbsp;&nbsp;Clinic Administrator</option>
                                        <option value="Administrator">&nbsp;&nbsp;&nbsp;Administrator</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label>Email</label>
                                    <input type="text" name="Email" id="Email" class="form-control" />
                                </div>
                                <div class="col-md-2">
                                    <label>Contact No.</label>
                                    <input type="text" name="ContactNo" id="ContactNo" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label>Username</label>
                                    <input type="text" name="Username" id="Username" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label>Password</label>
                                    <input type="password" name="Password" id="Password" class="form-control" /><br>
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-12">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-4">
                                    <label>House/Lot No./Street</label>
                                    <input type="text" name="HouseLotNo" id="HouseLotNo" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label>Barangay</label>
                                    <input type="text" name="Barangay" id="Barangay" class="form-control" readonly />
                                </div>
                                <div class="col-md-4">
                                    <label style="color: white;">Update Barangay</label>
                                    <?php
                                    $sql = mysqli_query($con, "SELECT BarangayName FROM Barangay");
                                    $data = $sql->fetch_all(MYSQLI_ASSOC);
                                    ?>
                                    <select style="border-radius: 5px; width: 100%; height: 47px;" class="bg-light border-0" name="Barangay2" id="Barangay2">
                                        <option selected disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- Update Barangay --</option>
                                        <?php foreach ($data as $row) : ?>
                                            <option value="<?= htmlspecialchars($row['BarangayName']) ?>">
                                                &nbsp;&nbsp;&nbsp;<?= htmlspecialchars($row['BarangayName']) ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label>City</label>
                                    <input type="text" name="City" id="City" class="form-control" value="Quezon City" readonly />
                                </div>
                                <div class="col-md-4">
                                    <label>Province</label>
                                    <input type="text" name="Province" id="Province" class="form-control" value="NCR" readonly />
                                </div>
                                <div class="col-md-4">
                                    <label>ZIP Code</label>
                                    <input type="text" name="ZIPCode" id="ZIPCode" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button name="update" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-edit"></span>
                            Update
                        </button>

                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END OF MODAL FOR EDIT CLIENTS -->

    <?php
    if (isset($_POST['add'])) {
        $fname1 = $_POST['FirstName1'];
        $mname1 = $_POST['MiddleName1'];
        $lname1 = $_POST['LastName1'];
        $bdate1 = $_POST['bdate1'];
        $utype1 = $_POST['UserType1'];
        $email1 = $_POST['Email1'];
        $contactno1 = $_POST['ContactNo1'];
        $uname1 = $_POST['Username1'];
        $pword1 = $_POST['Password1'];

        $query = mysqli_query($con, "INSERT INTO users (FirstName, MiddleName, LastName, ContactNo, Birth_Date, UserType, Username, Email, Password) VALUES ('$fname1', '$mname1', '$lname1', '$contactno1', '$bdate1', '$utype1', '$uname1', '$email1', '$pword1')");

        if ($query) {
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script>';
            echo 'swal({
                                            title: "Success",
                                            text: "You have successfully added a user",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="users.php";
                                                    }
                                                })';
            echo '</script>';
        } else {
            echo "<script> alert('Error adding a user.'); </script>";
        }
    }


    if (isset($_POST['update'])) {
        $userid = $_POST['userID'];
        $fname = $_POST['FirstName'];
        $mname = $_POST['MiddleName'];
        $lname = $_POST['LastName'];
        $bdate = $_POST['bdate'];
        $utype = $_POST['UserType2'];
        $email = $_POST['Email'];
        $contactno = $_POST['ContactNo'];
        $uname = $_POST['Username'];
        $pword = $_POST['Password'];

        //For address
        $lotno_street = $_POST['HouseLotNo'];
        $barangay = $_POST['Barangay2'];
        $zipcode = $_POST['ZIPCode'];

        if ($utype == "")
            $utype = $_POST['UserType'];

        if ($barangay == "")
            $barangay = $_POST['Barangay'];

        $query = mysqli_query($con, "UPDATE users SET FirstName='$fname', MiddleName='$mname', LastName='$lname', ContactNo='$contactno', Birth_Date='$bdate', UserType='$utype', Email='$email', Password='$pword' WHERE UserID='$userid'");
        $address_query = mysqli_query($con, "UPDATE address SET LotNo_Street='$lotno_street', Barangay='$barangay', ZIPCode='$zipcode' WHERE UserID='$userid'");

        if ($query && $address_query) {
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script>';
            echo 'swal({
                                            title: "Success",
                                            text: "You have successfully updated a user",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="users.php";
                                                    }
                                                })';
            echo '</script>';
        } else {
            echo "<script> alert('Error updating a user.'); </script>";
        }
    }
    if (isset($_POST['update_admin'])) {
        $auserid = $_POST['auserID'];
        $afname = $_POST['aFirstName'];
        $amname = $_POST['aMiddleName'];
        $alname = $_POST['aLastName'];
        $abdate = $_POST['abdate'];
        $autype = $_POST['aUserType2'];
        $aemail = $_POST['aEmail'];
        $acontactno = $_POST['aContactNo'];
        $auname = $_POST['aUsername'];
        $apword = $_POST['aPassword'];

        if ($autype == "")
            $autype = $_POST['aUserType'];

        if ($barangay == "")
            $barangay = $_POST['Barangay'];

        $query = mysqli_query($con, "UPDATE users SET FirstName='$afname', MiddleName='$amname', LastName='$alname', ContactNo='$acontactno', Birth_Date='$abdate', UserType='$autype', Email='$aemail', Password='$apword' WHERE UserID='$auserid'");

        if ($query) {
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script>';
            echo 'swal({
                                            title: "Success",
                                            text: "You have successfully updated a user",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="users.php";
                                                    }
                                                })';
            echo '</script>';
        } else {
            echo "<script> alert('Error updating a user.'); </script>";
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
        $('#edit_modal').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;

            var user_id = $(opener).attr('user-id');
            var user_fname = $(opener).attr('user-fname');
            var user_mname = $(opener).attr('user-mname');
            var user_lname = $(opener).attr('user-lname');
            var user_lotnostreet = $(opener).attr('user-lotnostreet');
            var user_province = $(opener).attr('user-province');
            var user_barangay = $(opener).attr('user-barangay');
            var user_city = $(opener).attr('user-city');
            var user_zipcode = $(opener).attr('user-zipcode');
            var user_cnum = $(opener).attr('user-cnum');
            var user_bdate = $(opener).attr('user-bdate');
            var user_utype = $(opener).attr('user-utype');
            var user_email = $(opener).attr('user-email');
            var user_username = $(opener).attr('user-username');
            var user_password = $(opener).attr('user-password');

            $('#form_edit_user').find('[name="userID"]').val(user_id);
            $('#form_edit_user').find('[name="FirstName"]').val(user_fname);
            $('#form_edit_user').find('[name="MiddleName"]').val(user_mname);
            $('#form_edit_user').find('[name="LastName"]').val(user_lname);
            $('#form_edit_user').find('[name="HouseLotNo"]').val(user_lotnostreet);
            $('#form_edit_user').find('[name="Barangay"]').val(user_barangay);
            $('#form_edit_user').find('[name="City"]').val(user_city);
            $('#form_edit_user').find('[name="ZIPCode"]').val(user_zipcode);
            $('#form_edit_user').find('[name="Province"]').val(user_province);
            $('#form_edit_user').find('[name="ContactNo"]').val(user_cnum);
            $('#form_edit_user').find('[name="bdate"]').val(user_bdate);
            $('#form_edit_user').find('[name="UserType"]').val(user_utype);
            $('#form_edit_user').find('[name="Email"]').val(user_email);
            $('#form_edit_user').find('[name="Username"]').val(user_username);
            $('#form_edit_user').find('[name="Password"]').val(user_password);

            endResize();
        });

        $('#edit_admin').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;

            var auser_id = $(opener).attr('auser-id');
            var auser_fname = $(opener).attr('auser-fname');
            var auser_mname = $(opener).attr('auser-mname');
            var auser_lname = $(opener).attr('auser-lname');
            var auser_cnum = $(opener).attr('auser-cnum');
            var auser_bdate = $(opener).attr('auser-bdate');
            var auser_utype = $(opener).attr('auser-utype');
            var auser_email = $(opener).attr('auser-email');
            var auser_username = $(opener).attr('auser-username');
            var auser_password = $(opener).attr('auser-password');

            $('#form_edit_admin').find('[name="auserID"]').val(auser_id);
            $('#form_edit_admin').find('[name="aFirstName"]').val(auser_fname);
            $('#form_edit_admin').find('[name="aMiddleName"]').val(auser_mname);
            $('#form_edit_admin').find('[name="aLastName"]').val(auser_lname);
            $('#form_edit_admin').find('[name="aContactNo"]').val(auser_cnum);
            $('#form_edit_admin').find('[name="abdate"]').val(auser_bdate);
            $('#form_edit_admin').find('[name="aUserType"]').val(auser_utype);
            $('#form_edit_admin').find('[name="aEmail"]').val(auser_email);
            $('#form_edit_admin').find('[name="aUsername"]').val(auser_username);
            $('#form_edit_admin').find('[name="aPassword"]').val(auser_password);

            endResize();
        });

        function endResize() {
            $(window).off("resize", resizer);
        }

        function showPassword() {
            var x = document.getElementById("Password1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function showPassword_edit() {
            var x = document.getElementById("Password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <script>
        // FOR TAB LINKS
        function showContent(contentId) {
            // Hide all content elements
            var contentElements = document.getElementsByClassName('card-body');
            for (var i = 0; i < contentElements.length; i++) {
                contentElements[i].style.display = 'none';
            }
            // Show the selected content element
            var selectedContent = document.getElementById(contentId);
            if (selectedContent) {
                selectedContent.style.display = 'block';
                selectedContent.add('active');
            }
            // Add active class to the clicked tab
            tabElement.classList.add('active');
        }

        document.getElementById('content1').style.display = 'block';

        $(document).ready(function() {
            $('.tablinks').on('click', function() {
                $('.tablinks').removeClass('active');
                $(this).addClass('active');
            })
        });
    </script>

</body>

</html>