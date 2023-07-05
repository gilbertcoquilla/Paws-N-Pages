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

if (isset($_POST['update_booking'])) {
    $a_status = $_POST['Status2'];
    $a_remarks = $_POST['Remarks'];
    $a_id = $_POST['AppointmentID'];

    if ($a_status != "") {
        $query = mysqli_query($con, "UPDATE appointments SET AppointmentStatus='$a_status', Remarks='$a_remarks' WHERE AppointmentID='$a_id' AND UserID='$userID'");

        if ($query) {
            echo "<script>alert('You have successfully updated an appointment.');</script>";
            echo "<script> document.location ='bookings.php'; </script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
    } else {
        $query = mysqli_query($con, "UPDATE appointments SET Remarks='$a_remarks' WHERE AppointmentID='$a_id' AND UserID='$userID'");

        if ($query) {
            echo "<script>alert('You have successfully updated an appointment.');</script>";
            echo "<script> document.location ='bookings.php'; </script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
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
        @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;

        }

        body {
            background-color: white;

        }

        .profile {
            border-bottom: 1px solid #e0e4e8;

        }

        .wrapper {
            display: flex;
            position: relative;
            border-right: 1.5px solid rgb(235, 235, 235);
        }

        .wrapper .sidebar {
            width: 250px;
            height: 100%;
            background: white;
            padding: 30px 0px;
            position: fixed;
            border-right: 1px solid #e0e4e8;
        }

        .wrapper .sidebar h2 {
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 30px;
            border-left: 1px solid #e0e4e8;
        }

        .wrapper .sidebar ul li {
            width: 210px;

            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding: 10px;
        }

        .wrapper .sidebar ul li a {
            color: #80b434;
            display: block;
        }

        .wrapper .sidebar ul li a .fas {
            width: 25px;
        }

        .wrapper .sidebar ul li:hover {
            background-color: #80b434;
        }

        .wrapper .sidebar ul li:hover a {
            color: white;
        }

        .wrapper .sidebar .wrapper .sidebar .social_media {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
        }

        .wrapper .sidebar .social_media a {
            display: block;
            width: 40px;
            background: #80b434;
            height: 40px;
            line-height: 45px;
            text-align: center;
            margin: 0 5px;
            color: #bdb8d7;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .wrapper .main_content {
            width: 100%;
            margin-left: 250px;

        }
    </style>

    <script>
        $(document).ready(function() {
            var table = $('#bookings').DataTable({
                order: [
                    [2, 'asc']
                ],

            });
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="profile">
                <table class="profile-container" style="padding-bottom:10px;">
                    <tr>
                        <td width="35%">
                            <img src="https://media.istockphoto.com/id/1337144146/vector/default-avatar-profile-icon-vector.jpg?s=612x612&w=0&k=20&c=BIbFwuv7FxTWvh5S3vB6bkT0Qv8Vn8N5Ffseq84ClGI=" alt="" width="100%" style="border-radius:50%">
                        </td>
                        <td width="65%" style="text-align:center; padding-top:10px">
                            <?php
                            $ret = mysqli_query($con, "SELECT * FROM users WHERE UserID='$userID'");
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <a style="text-transform:uppercase; padding:bottom:1px;"><b><?php echo $row['FirstName'] . ' ' . $row['LastName'] ?></b></a>
                                <a><?php echo $row['Username'] ?></a>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
                <br>
            </div>
            <ul class="nav nav-sidebar">
                <li style="text-transform:uppercase;"><a href=""><b>Dashboard</b></a></li>
                <li style="text-transform:uppercase;"><a href="clinicadmin.php"><b>Profile</b></a></li>
                <li style="text-transform:uppercase;"><a href="supplies.php"><b>Products</b></a></li>
                <?php if ($usertype == 'Administrator') { ?>
                    <li style="text-transform:uppercase;"><a href="users.php"><b>Users</b></a></li>
                <?php } ?>
                <li style="text-transform:uppercase;"><a href="bookings.php"><b>Bookings</b></a></li>
                <li style="text-transform:uppercase;"><a href="orders_admin.php"><b>Orders</b></a></li>
                <li style="text-transform:uppercase;"><a href="feedbacks_admin.php"><b>Feedback</b></a></li>
                <li style="text-transform:uppercase;"><a href="services.php"><b>Services</b></a></li>
                <li style="text-transform:uppercase;"><a href="petsearch.php"><b>Pet Records</b></a></li>
            </ul>
            <div style="padding-top:30px;">
                <center><a href="logout.php" class="btn btn-primary" style="border-radius: 15px; width: 50%; height:20%;">Logout</a></center>
            </div>
        </div>


        <!-- START OF ADMINISTRATOR -->
        <?php if ($usertype == 'Administrator') { ?>

            <div class="main_content">
                <div style="padding-right:30px; padding-left:30px; padding-top:30px;">
                    <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                        <div class="card-header userProfile-font"><b>⏳ Appointments</b></div>
                        <div class="card-body text-center">
                            <table class="table table-striped table-hover" style="border:0px; text-align:left;" id="bookings">
                                <thead style="border:0px;">
                                    <tr class="table100-head" style="border:0px;">
                                        <th class="column1" style="border:0px;"></th>
                                        <th class="column1" style="border:0px;">Clinic Name</th>
                                        <th class="column1" style="border:0px;">Reference No.</th>
                                        <th class="column1" style="border:0px;">Preferred Date</th>
                                        <th class="column1" style="border:0px;">Preferred Time</th>
                                        <th class="column1" style="border:0px;">Notes</th>
                                        <th class="column1" style="border:0px;">Services</th>
                                        <th class="column1" style="border:0px;">Customer</th>
                                        <th class="column1" style="border:0px;">Status</th>
                                        <th class="column1" style="border:0px;">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody style="border:0px;">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM appointments, clinics, users WHERE appointments.ClinicID = clinics.ClinicID AND appointments.UserID = users.UserID");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {

                                    ?>
                                            <!--Fetch the Records -->
                                            <tr style="border:0px;">
                                                <td style="border:0px;"><?php echo $cnt; ?></td>
                                                <td style="border:0px;"><?php echo $row['ClinicName'] ?></td>
                                                <td style="border:0px;"><?php echo $row['Appointment_RefNo'] ?></td>
                                                <td style="border:0px;"><?php echo $row['PreferredDate'] ?></td>
                                                <td style="border:0px;">
                                                    <?php echo date('h:i A', strtotime($row['PreferredTime'])) ?></td>
                                                <td style="border:0px;"><?php echo $row['Notes']; ?></td>
                                                <td style="border:0px;"><?php echo $row['AvailedServices'] ?></td>
                                                <td style="border:0px;">
                                                    <?php echo $row['FirstName'] . ' ' .  $row['MiddleName'] . ' ' . $row['LastName'] ?>
                                                </td>
                                                <td style="border:0px;">
                                                    <?php $status = $row['AppointmentStatus'];
                                                    if ($status === 'Processing') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 5px; border-radius:10px; background-color:#F4BB44;"><?php echo $row['AppointmentStatus']; ?></a>
                                                    <?php }
                                                    if ($status === 'Confirmed') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 7px; border-radius:10px; background-color:#228B22;"><?php echo $row['AppointmentStatus']; ?></a>
                                                    <?php }
                                                    if ($status === 'Denied') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 15px;  border-radius:10px; background-color:#A52A2A;"><?php echo $row['AppointmentStatus']; ?></a>
                                                    <?php }
                                                    if ($status === 'Completed') { ?>
                                                        <?php echo $row['AppointmentStatus']; ?>
                                                    <?php } ?>
                                                </td>
                                                <td style="border:0px;"><?php echo $row['Remarks']; ?></td>
                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                    } else { ?>
                                        <tr style="border:0px;">
                                            <td style="text-align:center; color:red; border:0px;" colspan="9">No Record Found
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><?php } ?>
        <!-- END OF ADMINISTRATOR -->

        <!-- START OF CLINIC ADMINISTRATOR -->
        <?php if ($usertype == 'Clinic Administrator') { ?>

            <div class="main_content">
                <div style="padding-right:30px; padding-left:30px; padding-top:30px;">
                    <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                        <div class="card-header userProfile-font"><b>⏳ Appointments</b></div>
                        <div class="card-body text-center">
                            <table class="table table-striped table-hover" style="border:0px; text-align:left;" id="bookings">
                                <thead style="border:0px;">
                                    <tr class="table100-head" style="border:0px;">
                                        <th class="column1" style="border:0px;">Reference No.</th>
                                        <th class="column1" style="border:0px;">Preferred Date</th>
                                        <th class="column1" style="border:0px;">Preferred Time</th>
                                        <th class="column1" style="border:0px;">Services</th>
                                        <th class="column1" style="border:0px;">Customer</th>
                                        <th class="column1" style="border:0px;">Date & Time Booked</th>
                                        <th class="column1" style="border:0px;">Status</th>
                                        <th class="column1" style="border:0px; text-align:center; display: none;">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="border:0px;">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM appointments, users WHERE appointments.UserID = users.UserID AND appointments.ClinicID='$clinicID'");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {

                                    ?>
                                            <!--Fetch the Records -->
                                            <tr style="border:0px;">
                                                <td style="border:0px;"><a href="" appid="<?php echo $row['AppointmentID'] ?>" refno="<?php echo $row['Appointment_RefNo'] ?>" pdate="<?php echo $row['PreferredDate'] ?>" ptime="<?php echo $row['PreferredTime'] ?>" notes="<?php echo $row['Notes']; ?>" services="<?php echo $row['AvailedServices'] ?>" customer="<?php echo $row['FirstName'] . ' ' .  $row['MiddleName'] . ' ' . $row['LastName'] ?>" astatus="<?php echo $row['AppointmentStatus']; ?>" aremarks="<?php echo $row['Remarks']; ?>" adtboooked="<?php echo $row['DateTimeBooked'] ?>" class="edit" title="Edit" data-toggle="modal" data-target="#edit_modal"><?php echo $row['Appointment_RefNo'] ?></a></td>
                                                <td style="border:0px;"><?php echo $row['PreferredDate'] ?></td>
                                                <td style="border:0px;">
                                                    <?php echo date('h:i A', strtotime($row['PreferredTime'])) ?></td>
                                                <td style="border:0px;"><?php echo $row['AvailedServices'] ?></td>
                                                <td style="border:0px;">
                                                    <?php echo $row['FirstName'] . ' ' .  $row['MiddleName'] . ' ' . $row['LastName'] ?>
                                                </td>
                                                <td style="border:0px;">
                                                    <?php echo $row['DateTimeBooked'] ?>
                                                </td>
                                                <td style="border:0px;">
                                                    <?php $status = $row['AppointmentStatus'];
                                                    if ($status === 'Processing') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 5px; border-radius:10px; background-color:#F4BB44;"><?php echo $row['AppointmentStatus']; ?></a>
                                                    <?php }
                                                    if ($status === 'Confirmed') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 7px; border-radius:10px; background-color:#228B22;"><?php echo $row['AppointmentStatus']; ?></a>
                                                    <?php }
                                                    if ($status === 'Denied' || $status === 'Cancelled') { ?>
                                                        <a style="color:white; font-size:12px; padding: 5px 15px;  border-radius:10px; background-color:#A52A2A;"><?php echo $row['AppointmentStatus']; ?></a>
                                                    <?php }
                                                    if ($status === 'Completed') { ?>
                                                    <?php echo $row['AppointmentStatus'];
                                                    } ?>
                                                </td>


                                                <td style="border:0px; text-align:center; display: none;">
                                                    <a appid="<?php echo $row['AppointmentID'] ?>" refno="<?php echo $row['Appointment_RefNo'] ?>" pdate="<?php echo $row['PreferredDate'] ?>" ptime="<?php echo $row['PreferredTime'] ?>" notes="<?php echo $row['Notes']; ?>" services="<?php echo $row['AvailedServices'] ?>" customer="<?php echo $row['FirstName'] . ' ' .  $row['MiddleName'] . ' ' . $row['LastName'] ?>" astatus="<?php echo $row['AppointmentStatus']; ?>" aremarks="<?php echo $row['Remarks']; ?>" class="edit" title="Edit" data-toggle="modal" data-target="#edit_modal"><i class="fa fa-edit"></i></a>
                                                    <a href="inventory_management.php?delid=<?php echo ($row['SupplyID']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Delete item?');"><i class="fa fa-trash" style="color:red;"></i></a>
                                                </td>


                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                    } else { ?>
                                        <tr style="border:0px;">
                                            <td style="text-align:center; color:red; border:0px;" colspan="9">No Record Found</td>
                                            <td style="text-align:center; color:red; border:0px;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px;" colspan="0"></td>
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

        <!-- START OF MODAL FOR EDIT BOOKING -->
        <div class="modal fade" id="edit_modal" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-xl">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST" runat="server" id="form_edit_booking">
                        <div class="modal-header modal-header-success">
                            <h3 class="modal-title">Update Appointment</h3>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group" style="display: none;">
                                    <label>ID</label>
                                    <input type="text" name="AppointmentID" id="AppointmentID" class="form-control" />
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Reference Number</label>
                                            <input type="text" name="ReferenceNo" id="ReferenceNo" class="form-control" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label>Preferred Date</label>
                                            <input type="date" name="PDate" id="PDate" class="form-control" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label>Preferred Time</label>
                                            <input type="time" name="PTime" id="PTime" class="form-control" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label>Services</label>
                                            <textarea name="Services" id="Services" class="form-control" style=" width: 100%;" rows="3" readonly></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Notes</label>
                                            <textarea name="Notes" id="Notes" class="form-control" style=" width: 100%;" rows="4" readonly></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Customer</label>
                                            <input type="text" name="Customer" id="Customer" class="form-control" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label>Date & Time Booked</label>
                                            <input type="text" name="DTBooked" id="DTBooked" class="form-control" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="row">
                                                <div class="col-4">
                                                    <input type="text" name="Status" id="Status" class="form-control" style="height: 100%;" readonly />
                                                </div>
                                                <div class="col-8">
                                                    <select name="Status2" id="Status2" style="border-radius: 5px; width: 100%;" class="bg-light border-0 px-4 py-3">
                                                        <option selected disabled>-- Update Status --</option>
                                                        <option value="Processing">Processing</option>
                                                        <option value="Confirmed">Confirmed</option>
                                                        <option value="Denied">Denied</option>
                                                        <option value="Completed">Completed</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="form-group">
                                            <label>Remarks</label>
                                            <textarea name="Remarks" id="Remarks" class="form-control" style=" width: 100%; height: 150px;"></textarea>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button name="update_booking" style="border-radius: 15px;" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span>
                                Update
                            </button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- END OF MODAL FOR EDIT BOOKING -->

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

                var appid = $(opener).attr('appid');
                var refno = $(opener).attr('refno');
                var pdate = $(opener).attr('pdate');
                var ptime = $(opener).attr('ptime');
                var notes = $(opener).attr('notes');
                var services = $(opener).attr('services');
                var customer = $(opener).attr('customer');
                var astatus = $(opener).attr('astatus');
                var aremarks = $(opener).attr('aremarks');
                var adtboooked = $(opener).attr('adtboooked');

                $('#form_edit_booking').find('[name="AppointmentID"]').val(appid);
                $('#form_edit_booking').find('[name="ReferenceNo"]').val(refno);
                $('#form_edit_booking').find('[name="PDate"]').val(pdate);
                $('#form_edit_booking').find('[name="PTime"]').val(ptime);
                $('#form_edit_booking').find('[name="Notes"]').val(notes);
                $('#form_edit_booking').find('[name="Services"]').val(services);
                $('#form_edit_booking').find('[name="Customer"]').val(customer);
                $('#form_edit_booking').find('[name="Status"]').val(astatus);
                $('#form_edit_booking').find('[name="Remarks"]').val(aremarks);
                $('#form_edit_booking').find('[name="DTBooked"]').val(adtboooked);

                endResize();
            });

            function endResize() {
                $(window).off("resize", resizer);
            }
        </script>

</body>

</html>