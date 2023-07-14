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
    <title>Paws N Pages | Pet Booklet</title>
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

                        <li class="active">
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



        <!-- START OF ADMINISTRATOR -->
        <?php if ($usertype == 'Administrator') { ?>
            <div class="main_container">
                <div style="padding-right:30px; padding-left:30px; padding-top:10px;">
                    <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                        <div class="card-header userProfile-font"><b>📖 Pet Booklet</b></div>
                        <div class="card-body text-center">
                            <table class="table table-striped table-hover" style="border:0px; text-align:left;" id="orders">
                                <thead style="border:0px;">
                                    <tr class="table100-head" style="border:0px;">
                                        <th class="column1" style="border:0px; color:#80b434;">Customer</th>
                                        <th class="column1" style="border:0px; color:#80b434;">No. of Pets</th>
                                        <th class="column1" style="border:0px; color:#80b434; display: none;">Proof of Payment</th>
                                        <th class="column1" style="border:0px; color:#80b434;">Total Amount</th>
                                        <th class="column1" style="border:0px; color:#80b434; text-align: center;">Payment Status</th>
                                        <th class="column1" style="border:0px; color:#80b434; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="border:0px;">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM petbooklet, users WHERE petbooklet.userID = users.UserID");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {

                                    ?>
                                            <!--Fetch the Records -->
                                            <tr style="border:0px;">
                                                <td style="border:0px;"><?php echo $row['FirstName'] . ' ' .  $row['MiddleName'] . ' ' . $row['LastName'] ?></td>
                                                <td style="border:0px;"><?php echo $row['NoOfPets'] ?></td>
                                                <td style="border:0px; display: none;"><a href="image_upload/<?php echo $row['Payment_Proof'] ?>" id="POPayment" target="_blank"><?php echo $row['Payment_Proof'] ?></a></td>
                                                <td style="border:0px;"><?php echo $row['AmountToPay']; ?></td>
                                                <td style="border:0px; text-align: center;">
                                                    <?php $status = $row['PaymentStatus'];
                                                    if ($status === 'Pending') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 10px; border-radius:10px; background-color:#F4BB44;"><?php echo $row['PaymentStatus']; ?></a>
                                                    <?php }
                                                    if ($status === 'Approved') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 7px; border-radius:10px; background-color:#228B22;"><?php echo $row['PaymentStatus']; ?></a>
                                                    <?php }
                                                    if ($status === 'Denied') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 15px;  border-radius:10px; background-color:#A52A2A;"><?php echo $row['PaymentStatus']; ?></a>
                                                    <?php }
                                                    ?>
                                                </td>
                                                <td style="border:0px; text-align: center;">
                                                    <a href="" bookletid="<?php echo $row['BookletID'] ?>" owner="<?php echo $row['FirstName'] . ' ' .  $row['MiddleName'] . ' ' . $row['LastName'] ?>" proofofpayment="<?php echo $row['Payment_Proof'] ?>" refno="<?php echo $row['RefNo_Input'] ?>" pets="<?php echo $row['NoOfPets'] ?>" total="<?php echo $row['AmountToPay'] ?>" status="<?php echo $row['PaymentStatus'] ?>" remarks="<?php echo $row['Remarks'] ?>" class="edit" title="Edit" data-toggle="modal" data-target="#view_pbooklet"><i class="fa fa-edit"></i></a>
                                                </td>



                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                    } else { ?>
                                        <tr style="border:0px;">
                                            <td style="text-align:center; color:red; border:0px;" colspan="7">No Record Found</td>
                                            <td style="text-align:center; color:red; display:none;">No Record Found</td>
                                            <td style="text-align:center; color:red; display:none;">No Record Found</td>
                                            <td style="text-align:center; color:red; display:none;">No Record Found</td>
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

        <!-- START OF MODAL FOR VIEWING CLINIC DETAILS -->
        <div class="modal fade" id="view_pbooklet" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST" runat="server" enctype="multipart/form-data" id="view_pbooklet_form">
                        <div class="modal-header modal-header-success">
                            <h3 class="modal-title">Pet Booklet Details</h3>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="display: none;">
                                        <label>ID</label>
                                        <input type="text" name="BookletID" id="ClinicID" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Proof of Payment</label>
                                        <br>
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="" id="POPayment" target="_blank">
                                                    <span id="view_PPayemnt"></span>
                                                </a>
                                            </div>
                                            <div class="col-6" style="text-align: right;">
                                                <a href="" id="POPayment" target="_blank" download>
                                                    Download
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>No. of Pets</label>
                                        <input type="text" name="Pets" id="Pets" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Owner</label>
                                        <input type="text" name="Owner" id="Owner" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Total</label>
                                        <input type="text" name="Total" id="Total" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Reference No. (For proof of payment)</label>
                                        <input type="text" name="PPayment" id="PPayment" class="form-control" readonly />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="Status" id="Status" class="form-control" style="height: 100%;" readonly />
                                            </div>
                                            <div class="col-6">
                                                <select name="Status2" id="Status2" style="border-radius: 5px; width: 100%;" class="bg-light border-0 px-4 py-3">
                                                    <option selected disabled>-- Update Status --</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Approved">Approved</option>
                                                    <option value="Denied">Denied</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea name="Remarks" id="Remarks" class="form-control" style="width: 100%;" rows="4"></textarea>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                            <div class="modal-footer">
                                <button name="edit" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-edit"></span>
                                    Update
                                </button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!--  END OF MODAL FOR VIEWING CLINIC DETAILS -->


        <?php
        if (isset($_POST['edit'])) {
            $bookletid = $_POST['BookletID'];

            $status = $_POST['Status2'];
            $remarks = $_POST['Remarks'];

            if ($remarks != '') {
                $query = mysqli_query($con, "UPDATE petbooklet SET PaymentStatus='$status', Remarks='$remarks' WHERE BookletID ='$bookletid'");

                if ($query) {
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                    echo '<script>';
                    echo 'swal({
                                            title: "Success",
                                            text: "You have successfully updated a pet booklet",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="petbooklet.php";
                                                    }
                                                })';
                    echo '</script>';
                } else {
                    echo "<script> alert('Error updating a pet booklet'); </script>";
                }
            } else {
                $query = mysqli_query($con, "UPDATE petbooklet SET PaymentStatus='$status' WHERE BookletID ='$bookletid'");

                if ($query) {
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                    echo '<script>';
                    echo 'swal({
                                            title: "Success",
                                            text: "You have successfully updated a pet booklet",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="petbooklet.php";
                                                    }
                                                })';
                    echo '</script>';
                } else {
                    echo "<script> alert('Error updating a pet booklet'); </script>";
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

            $('#view_pbooklet').on('show.bs.modal', function(e) {
                var opener = e.relatedTarget;

                var bookletid = $(opener).attr('bookletid');
                var owner = $(opener).attr('owner');

                var proofofpayment = $(opener).attr('proofofpayment');
                var proof_OPName = jQuery.trim(proofofpayment).substring(0, 20) + "...";

                var refno = $(opener).attr('refno');
                var total = $(opener).attr('total');
                var status = $(opener).attr('status');
                var remarks = $(opener).attr('remarks');
                var pets = $(opener).attr('pets');

                $('#view_pbooklet_form').find('[name="BookletID"]').val(bookletid);
                $('#view_pbooklet_form').find('[name="Pets"]').val(pets);
                $('#view_pbooklet_form').find('[name="Owner"]').val(owner);
                $('#view_pbooklet_form').find('[id="POPayment"]').prop('href', 'image_upload/' + proofofpayment);
                $('#view_pbooklet_form').find('[id="view_PPayemnt"]').html(proof_OPName);
                $('#view_pbooklet_form').find('[name="PPayment"]').val(refno);
                $('#view_pbooklet_form').find('[name="Total"]').val(total);
                $('#view_pbooklet_form').find('[name="Status"]').val(status);
                $('#view_pbooklet_form').find('[name="Remarks"]').val(remarks);

                endResize();
            });
        </script>

</body>

</html>