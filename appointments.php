<?php

session_start();
include('config.php');
include('connection.php');

$userID = $_SESSION["id"];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | Appointments</title>
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
            var table = $('#appointments').DataTable({
                order: [
                    [2, 'asc']
                ],
            });
        });
    </script>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.php" class="navbar-brand ms-lg-5">
            <img src="https://i.ibb.co/vmrbJ34/logo-black.png" alt="Paws N Pages Logo" width="70" height="70" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="clinics.php" class="nav-item nav-link">Clinics</a>
                <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                <a href="about.php" class="nav-item nav-link">About Us</a>

                <?php if ($_SESSION["id"] > 0) { ?>
                    <a href="userProfile.php" class="nav-item nav-link active">Profile</a>
                    <a href="logout.php" class="nav-item nav-link">Logout
                        <i class="bi bi-arrow-right"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </a>


                <?php } else { ?>

                    <a href="login.php" class="nav-item nav-link">Login</a>
                    <a href="vet-or-pet.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">JOIN
                        US
                        <i class="bi bi-arrow-right"></i>
                    </a>

                <?php } ?>


            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- START OF APPOINTMENTS -->
    <br>
    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
        <h1 class="text-primary text-uppercase">Appointments</h1>
    </div>

    <div style="padding-right:30px; padding-left:30px;">
        <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
            <div class="card-header userProfile-font"><b>⏳ Appointments</b></div>
            <div class="card-body">
                <table class="table table-striped table-hover" name="appointments" id="appointments" style="border:0px;">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1" style="border:0px;">Reference No.</th>
                            <th class="column1" style="border:0px;">Preferred Date</th>
                            <th class="column1" style="border:0px;">Preferred Time</th>
                            <th class="column1" style="border:0px;">Availed Services</th>
                            <th class="column1" style="border:0px;">Notes</th>
                            <th class="column1" style="border:0px;">Clinic</th>
                            <th class="column1" style="border:0px;">Status</th>
                            <th class="column1" style="border:0px;">Remarks</th>
                            <th class="column1" style="border:0px;">Date and Time Booked</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // $ret = mysqli_query($con, "SELECT appointments.AppointmentID, appointments.Notes, appointments.PreferredDate, appointments.PreferredTime, appointments.AppointmentStatus, appointments.Remarks, services.ServiceName, clinics.ClinicName, users.FirstName, users.MiddleName, users.LastName FROM appointments INNER JOIN services ON appointments.ServiceID = services.ServiceID INNER JOIN clinics ON services.ClinicID = clinics.ClinicID INNER JOIN users ON appointments.UserID = users.UserID ORDER BY AppointmentID ASC");
                        $ret1 = mysqli_query($con, "SELECT * FROM appointments, clinics, users WHERE appointments.UserID = users.UserID AND appointments.ClinicID = clinics.ClinicID AND appointments.UserID = '$userID' ORDER BY appointments.AppointmentID ASC");

                        $cnt1 = 1;
                        $row1 = mysqli_num_rows($ret1);
                        if ($row1 > 0) {
                            while ($row1 = mysqli_fetch_array($ret1)) {
                                $date = new DateTime($row['DateTimeBooked']);
                        ?>
                                <!--Fetch the Records -->
                                <tr>
                                    <td style="border:0px;"><a href="" appid="<?php echo $row1['AppointmentID'] ?>" refno="<?php echo $row1['Appointment_RefNo'] ?>" pdate="<?php echo $row1['PreferredDate'] ?>" ptime="<?php echo $row1['PreferredTime'] ?>" notes="<?php echo $row1['Notes']; ?>" services="<?php echo $row1['AvailedServices'] ?>" customer="<?php echo $row1['FirstName'] . ' ' . $row1['MiddleName'] . ' ' . $row1['LastName'] ?>" astatus="<?php echo $row1['AppointmentStatus']; ?>" aremarks="<?php echo $row1['Remarks']; ?>" adtboooked="<?php echo $date->format('Y-m-d h:i A'); ?>" class="edit" title="Edit" data-toggle="modal" data-target="#edit_modal"><?php echo $row1['Appointment_RefNo'] ?></a></td>
                                    <td style="border:0px;">
                                        <?php echo $row1['PreferredDate'] ?>
                                    </td>
                                    <td style="border:0px;">
                                        <?php echo date('h:i A', strtotime($row1['PreferredTime'])) ?>
                                    </td>
                                    <td style="border:0px;">
                                        <?php echo $row1['AvailedServices']; ?>
                                    </td>
                                    <td style="border:0px;">
                                        <?php echo $row1['Notes']; ?>
                                    </td>
                                    <td style="border:0px;">
                                        <?php echo $row1['ClinicName']; ?>
                                    </td>
                                    <td style="border:0px;">
                                        <?php $status = $row1['AppointmentStatus'];
                                        if ($status === 'Processing') { ?>
                                            <a style="color:white; font-size:12px; padding: 5px 5px; border-radius:10px; background-color:#F4BB44;">
                                                <?php echo $row1['AppointmentStatus']; ?>
                                            </a>
                                        <?php }
                                        if ($status === 'Confirmed') { ?>
                                            <a style="color:white; font-size:12px; padding: 5px 7px; border-radius:10px; background-color:#228B22;">
                                                <?php echo $row1['AppointmentStatus']; ?>
                                            </a>
                                        <?php }
                                        if ($status === 'Denied') { ?>
                                            <a style="color:white; font-size:12px; padding: 5px 15px;  border-radius:10px; background-color:#A52A2A;">
                                                <?php echo $row1['AppointmentStatus']; ?>
                                            </a>
                                        <?php }
                                        if ($status === 'Completed') { ?>
                                            <?php echo $row1['AppointmentStatus']; ?>
                                        <?php }
                                        if ($status === 'Cancelled') { ?>
                                            <a style="color:white; font-size:12px; padding: 5px 7px;  border-radius:10px; background-color:#000000;">
                                                <?php echo $row1['AppointmentStatus']; ?>
                                            </a>
                                        <?php } ?>

                                    </td>
                                    <td style="border:0px;">
                                        <?php echo $row1['Remarks']; ?>
                                    </td>
                                    <td style="border:0px;">
                                        <?php echo $date->format('Y-m-d h:i A'); ?>
                                    </td>
                                </tr>
                            <?php
                                $cnt = $cnt + 1;
                            }
                        } else { ?>
                            <tr>
                                <th style="text-align:center; color:red; border:0px;" colspan="9">No Record Found</th>
                                <th style="text-align:center; color:red; border:0px; display:none;">No Record Found</th>
                                <th style="text-align:center; color:red; border:0px; display:none;">No Record Found</th>
                                <th style="text-align:center; color:red; border:0px; display:none;">No Record Found</th>
                                <th style="text-align:center; color:red; border:0px; display:none;">No Record Found</th>
                                <th style="text-align:center; color:red; border:0px; display:none;">No Record Found</th>
                                <th style="text-align:center; color:red; border:0px; display:none;">No Record Found</th>
                                <th style="text-align:center; color:red; border:0px; display:none;">No Record Found</th>
                                <th style="text-align:center; color:red; border:0px; display:none;">No Record Found</th>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <br>

            </div>
        </div>
        <br />
        <a class="btn btn-primary py-2" style="width:10%; border-radius: 15px;" href="userProfile.php">Go Back</a>
    </div>


    <!-- END OF APPOINTMENTS -->


    <!-- Footer Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Get In Touch</h5>
                    <p class="mb-4">If you have inquiries feel free to contact us below</p>
                    <a class="mb-2" href="https://goo.gl/maps/nGdbiDamK7MP9L5z5"><i class="bi bi-geo-alt text-primary me-2"></i>Manila, PH</br></a>
                    <a class="mb-2" href="mailto:pawsnpages.site@gmail.com"><i class="bi bi-envelope-open text-primary me-2"></i>pawsnpages.site@gmail.com</a>
                    <a class="mb-0" href="tel:+6396176261"></br><i class="bi bi-telephone text-primary me-2"></i>+63 961
                        762 6162</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-body mb-2" href="clinics.php"><i class="bi bi-arrow-right text-primary me-2"></i>Vet Clinics</a>
                        <a class="text-body mb-2" href="#services"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                        <a class="text-body mb-2" href="#founders"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                        <a class="text-body" href="contact.php"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h6 class="text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-linkedin"></i></a>
                        <a class="btn btn-outline-primary btn-square" href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white" href="#">2023 Paws n Pages</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->



    <!-- START OF MODAL FOR EDIT BOOKING -->
    <div class="modal fade" id="edit_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" runat="server" id="form_edit_booking">
                    <div class="modal-header modal-header-success">
                        <h3 class="modal-title">Appointment Details</h3>
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
                                        <input type="text" name="Status" id="Status" class="form-control" style="height: 100%;" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea name="Remarks" id="Remarks" class="form-control" style=" width: 100%; height: 150px;" readonly></textarea>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <a class="btn btn-danger" style="border-radius: 15px; color: white;" data-toggle="modal" data-target="#confirm_cancel" data-dismiss="modal">
                            Cancel Booking
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END OF MODAL FOR EDIT BOOKING -->

    <!-- START OF MODAL FOR CONFIRM CANCELLATION -->
    <div class="modal fade" id="confirm_cancel" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" runat="server" id="form_cancel_booking">
                    <div class="modal-header modal-header-success">
                        <!-- <h3 class="modal-title">Appointment Details</h3>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <div class="form-group" style="display: none;">
                            <label>ID</label>
                            <input type="text" name="AppointmentID_2" id="AppointmentID" class="form-control" />
                        </div>
                        <div class="form-group" style="display: none;">
                            <label>Preferred Date</label>
                            <input type="date" name="PDate_2" id="PDate" class="form-control" readonly />
                        </div>

                        <div class="col-md-12">
                            <h5>Are you sure you want to cancel this booking?</h5>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="cancel" class="btn btn-primary" style="border-radius: 15px; color: white; width: 10%;">
                            OK
                        </button>
                        <a class="btn btn-danger" style="border-radius: 15px; color: white;" data-dismiss="modal">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END OF MODAL FOR CONFIRM CANCELLATION -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


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

            $('#confirm_cancel').on('show.bs.modal', function(e) {
                $('#form_cancel_booking').find('[name="AppointmentID_2"]').val(appid);
                $('#form_cancel_booking').find('[name="PDate_2"]').val(pdate);
            });

            // $('#form_edit_booking').find('[name="cancel"]').prop('href', 'appointments.php?appid=' + appid);

            endResize();
        });

        function endResize() {
            $(window).off("resize", resizer);
        }
    </script>

    <?php

    if (isset($_POST['cancel'])) {
        $app_ID = $_POST['AppointmentID_2'];
        $pref_date = $_POST['PDate_2'];

        date_default_timezone_set("Asia/Hong_Kong");
        $now = date('Y-m-d');

        $dateDifference = (new DateTime($now))->diff(new DateTime($pref_date))->days;

        if ($dateDifference >= 3) {
            $query = mysqli_query($con, "UPDATE appointments SET AppointmentStatus='Cancelled' WHERE AppointmentID='$app_ID'");

            if ($query) {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                                title: "Success",
                                                text: "You have successfully cancelled your appointment",
                                                icon: "success",
                                                html: true,
                                                showCancelButton: true,
                                                })
                                                    .then((willDelete) => {
                                                        if (willDelete) {

                                                            document.location ="appointments.php";
                                                        }
                                                    })';
                echo '</script>';
            } else {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
            }
        } else {
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script>';
            echo 'swal({
                                                title: "Warning",
                                                text: "Please review terms & conditions for cancellations",
                                                icon: "warning",
                                                html: true,
                                                showCancelButton: true,
                                                })
                                                    .then((willDelete) => {
                                                        if (willDelete) {

                                                            document.location ="appointments.php";
                                                        }
                                                    })';
            echo '</script>';
        }
    }

    ?>

</body>

</html>