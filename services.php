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
    <title>Paws N Pages | Services</title>
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
                    [2, 'asc']
                ],

                "columns": [
                    null,
                    {
                        "width": "50%"
                    },
                    null,
                    null
                ],

                lengthMenu: [5, 10, 20, 50],

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

                    <li class="active">
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
                        <div class="card-header userProfile-font"><b>🛎️ Services</b>
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#form_modal" style="float:right; width:5%; height: 35px; border-radius: 15px; padding: 0;">ADD</button>
                        </div>
                        <div class="card-body text-center">

                            <table class="table table-striped table-hover" style="border:0px; text-align:left;" id="orders">
                                <thead style="border:0px;">
                                    <tr class="table100-head" style="border:0px;">
                                        <th class="column1" style="border:0px; color:#80b434;">Name</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Description</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Price</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="border:0px;">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM services, clinics WHERE services.ClinicID = clinics.ClinicID AND services.ClinicID = '$clinicID'");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {

                                    ?>
                                            <!--Fetch the Records -->
                                            <tr style="border:0px;">
                                                <td style="border:0px;">
                                                    <?php echo $row['ServiceName'] ?>
                                                </td>
                                                <td style="border:0px;">
                                                    <?php echo $row['ServiceDescription'] ?>
                                                </td>
                                                <td style="border:0px;">₱
                                                    <?php echo $row['ServicePrice']; ?>
                                                </td>
                                                <td style="border:0px;">
                                                    <a href="" serviceid="<?php echo $row['ServiceID'] ?>" servicename="<?php echo $row['ServiceName'] ?>" servicedescription="<?php echo $row['ServiceDescription'] ?>" serviceprice="<?php echo $row['ServicePrice']; ?>" class="edit" title="edit" data-toggle="modal" data-target="#edit_service"><i class="fa fa-edit"></i></a>
                                                    <button class="delete_service" name="delete_service" value="<?php echo $row['ServiceID'] ?>" style="border:0px; background-color:inherit;"><i class="fa fa-trash" style="color:red;"></i></button>
                                                </td>


                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                    } else { ?>
                                        <tr style="border:0px;">
                                            <td style="text-align:center; color:red; border:0px;" colspan="4">No Record Found
                                            </td>
                                            <td style="text-align:center; color:red; display:none;">No Record Found</td>
                                            <td style="text-align:center; color:red; display:none;">No Record Found</td>
                                            <td style="text-align:center; color:red; display:none;">No Record Found</td>
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
                        <div class="card-header userProfile-font"><b>🛎️ Services</b></div>
                        <div class="card-body text-center">
                            <table class="table table-striped table-hover" style="border:0px; text-align:left;" id="orders">
                                <thead style="border:0px;">
                                    <tr class="table100-head" style="border:0px;">
                                        <th class="column1" style="border:0px; color:#80b434;">Clinic</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Name</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Description</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Price</th>
                                    </tr>
                                </thead>
                                <tbody style="border:0px;">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM services, clinics WHERE services.ClinicID = clinics.ClinicID AND services.ClinicID = clinics.clinicID");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {

                                    ?>
                                            <!--Fetch the Records -->
                                            <tr style="border:0px;">
                                                <td style="border:0px;">
                                                    <?php echo $row['ClinicName'] ?>
                                                </td>
                                                <td style="border:0px;">
                                                    <?php echo $row['ServiceName'] ?>
                                                </td>
                                                <td style="border:0px;">
                                                    <?php echo $row['ServiceDescription'] ?>
                                                </td>
                                                <td style="border:0px;">₱
                                                    <?php echo $row['ServicePrice']; ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                    } else { ?>
                                        <tr style="border:0px;">
                                            <td style="text-align:center; color:red; border:0px;" colspan="4">No Record Found
                                            </td>
                                            <td style="text-align:center; color:red; display:none;">No Record Found</td>
                                            <td style="text-align:center; color:red; display:none;">No Record Found</td>
                                            <td style="text-align:center; color:red; display:none;">No Record Found</td>
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

        <!-- START OF MODAL FOR ADDING NEW SERVICE -->
        <div class="modal fade" id="form_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST" enctype="multipart/form-data" runat="server">
                        <div class="modal-header">
                            <h3 class="modal-title">Add New Service</h3>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" required="required" />
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" style="width: 100%; height: 150px;" required="required"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control" required="required" />
                                </div>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button name="save_service" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-save"></span>
                                Add</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END OF MODAL FOR ADDING NEW SERVICE -->

        <!-- START OF MODAL FOR EDITING SERVICES -->
        <div class="modal fade" id="edit_service" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-m">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST" runat="server" id="edit_service">
                        <div class="modal-header modal-header-success">
                            <h3 class="modal-title">Edit Service</h3>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group" style="display: none;">
                                    <label>ID</label>
                                    <input type="text" name="ServiceID" id="ServiceID" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="ServiceName" id="ServiceName" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="ServiceDescription" id="ServiceDescription" class="form-control" style=" width: 100%; height: 150px;" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="Price" id="Price" class="form-control" required />
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button name="update_service" style="border-radius: 15px;" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span>
                                Update
                            </button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span>
                                Cancel</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!--  START OF MODAL FOR EDITING SERVICES -->

        <!-- FOR INSERTING DATA -->
        <?php
        if (isset($_POST['update_service'])) {
            $name = $_POST['ServiceName'];
            $description = $_POST['ServiceDescription'];
            $price = $_POST['Price'];
            $a_id = $_POST['ServiceID'];


            $query = mysqli_query($con, "UPDATE services SET ServiceName='$name', ServiceDescription='$description', ServicePrice='$price' WHERE ServiceID='$a_id' AND ClinicID='$clinicID'");

            if ($query) {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                            title: "Success",
                                            text: "You have successfully updated a service",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="services.php";
                                                    }
                                                })';
                echo '</script>';
            } else {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
            }
        }

        ///////////////////////// FOR ADDING NEW SERVICE /////////////////////////
        if (isset($_POST['save_service'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            $query = mysqli_query($con, "INSERT INTO services (ServiceName, ServiceDescription, ServicePrice, ClinicID) VALUES ('$name', '$description', '$price', '$clinicID')");

            if ($query) {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                                title: "Success",
                                                text: "You have successfully added a new service",
                                                icon: "success",
                                                html: true,
                                                showCancelButton: true,
                                                })
                                                    .then((willDelete) => {
                                                        if (willDelete) {
                                                        
                                                            document.location ="services.php";
                                                        }
                                                    })';
                echo '</script>';
            } else {
                echo "<script>alert('Error adding new product.');</script>";
            }
        }


        ///////////////////// FOR DELETING SERVICES ////////////////////////////  
        if (isset($_GET['delid'])) {
            $rid = intval($_GET['delid']);
            $sql = mysqli_query($con, "DELETE FROM services WHERE ServiceID=$rid");
            echo "<script>alert('You have successfully deleted a service.');</script>";
            echo "<script>window.location.href = 'services.php'</script>";
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
            $('#edit_service').on('show.bs.modal', function(e) {
                var opener = e.relatedTarget;

                var serviceid = $(opener).attr('serviceid');
                var servicename = $(opener).attr('servicename');
                var servicedescription = $(opener).attr('servicedescription');
                var serviceprice = $(opener).attr('serviceprice');

                $('#edit_service').find('[name="ServiceID"]').val(serviceid);
                $('#edit_service').find('[name="ServiceName"]').val(servicename);
                $('#edit_service').find('[name="ServiceDescription"]').val(servicedescription);
                $('#edit_service').find('[name="Price"]').val(serviceprice);

                endResize();
            });

            $('#form_modal').on('show.bs.modal', function(e) {
                endResize();
            });

            function endResize() {
                $(window).off("resize", resizer);
            }
        </script>

        <!-- SWAL -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.delete_service').click(function(e) {
                    var id = $(this).val();
                    swal({
                            title: "Warning",
                            text: "Are you sure you want to delete this service?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    method: "POST",
                                    url: "action.php",
                                    data: {
                                        'Service_ID': id,
                                        'delete_service': true
                                    },
                                    success: function(response) {
                                        console.log(response);
                                        if (response == 200) {
                                            swal("Success", "You have successfully deleted a service", "success").then(function() {
                                                location.reload();
                                            });
                                        }
                                    }
                                })
                            }
                        });
                })
            })
        </script>

</body>

</html>