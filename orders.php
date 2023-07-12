<?php

session_start();
include('config.php');
include('connection.php');

$userID = $_SESSION["id"];

$clinicID = $_GET['clinicid'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | Orders</title>
    <link rel="icon" href="https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png" type="image/x-icon">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="Free HTML Templates" name="keywords">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        .rating {
            display: inline-block;
            font-size: 55px;
            cursor: pointer;
        }

        .rating-star {
            color: #ddd;
        }

        .rating-star:hover,
        .rating-star:hover~.rating-star {
            color: orange;
        }

        .rating-star.checked {
            color: orange;
        }
    </style>
    <script>
        function handleStarClick(star) {
            const stars = document.querySelectorAll('.rating-star');
            const starValue = star.getAttribute('data-value');

            stars.forEach((s) => {
                if (s.getAttribute('data-value') <= starValue) {
                    s.classList.add('checked');
                } else {
                    s.classList.remove('checked');
                }
            });

            document.getElementById('ratingInput').value = starValue;
        }
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
            var table = $('#order').DataTable({
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

    <!-- START OF ORDER HISTORY -->
    <br>
    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
        <h1 class="text-primary text-uppercase">Orders</h1>
    </div>

    <div style="padding-right:30px; padding-left:30px;">
        <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
            <div class="card-header userProfile-font"><b>📦 Orders</b></div>
            <div class="card-body">
                <table class="table table-striped table-hover" name="order" id="order" style="border:0px;">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1" style="border:0px;">Reference No.</th>
                            <th class="column1" style="border:0px;">Total Price</th>
                            <th class="column1" style="border:0px;">Clinic</th>
                            <th class="column1" style="border:0px;">Checkout Date & Time</th>
                            <th class="column1" style="border:0px;">Status</th>
                            <th class="column1" style="border:0px;">Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // $ret = mysqli_query($con, "SELECT appointments.AppointmentID, appointments.Notes, appointments.PreferredDate, appointments.PreferredTime, appointments.AppointmentStatus, appointments.Remarks, services.ServiceName, clinics.ClinicName, users.FirstName, users.MiddleName, users.LastName FROM appointments INNER JOIN services ON appointments.ServiceID = services.ServiceID INNER JOIN clinics ON services.ClinicID = clinics.ClinicID INNER JOIN users ON appointments.UserID = users.UserID ORDER BY AppointmentID ASC");
                        $ret1 = mysqli_query($con, "SELECT * FROM orders, clinics, users WHERE orders.UserID = users.UserID AND orders.ClinicID = clinics.ClinicID AND orders.UserID = '$userID' ORDER BY orders.OrderID ASC");

                        $cnt1 = 1;
                        $row1 = mysqli_num_rows($ret1);
                        if ($row1 > 0) {
                            while ($row1 = mysqli_fetch_array($ret1)) {

                        ?>
                                <!--Fetch the Records -->
                                <tr>
                                    <td style="border:0px;"><a href="" orderid="<?php echo $row1['OrderID'] ?>" refno="<?php echo $row1['Order_RefNo'] ?>" products="<?php $prod = $row1['OrderedProducts'];
                                                                                                                                                                        $explodedArray = explode(', ', $prod);
                                                                                                                                                                        foreach ($explodedArray as $element) {
                                                                                                                                                                            echo  $element . "\n";
                                                                                                                                                                        } ?>" user="<?php echo $row1['FirstName'] . ' ' .  $row1['MiddleName'] . ' ' . $row1['LastName'] ?>" totalprice="<?php echo "₱ " . $row1['TotalPrice']; ?>" dtcout="<?php echo $row1['DateTimeCheckedOut'] ?>" address="<?php echo $row1['ShippingTo'] ?>" proofpayment="<?php echo $row1['ProofOfPayment']; ?>" proofrefno="<?php echo $row1['Proof_RefNo']; ?>" prescription="<?php echo $row1['OrderPrescription'] ?>" orderstatus="<?php echo $row1['OrderStatus']; ?>" odremarks="<?php echo $row1['OrderRemarks']; ?>" class="edit" title="View" data-toggle="modal" data-target="#view_order"><?php echo $row1['Order_RefNo'] ?></a>
                                    </td>
                                    <td style="border:0px;">
                                        ₱ <?php echo $row1['TotalPrice'] ?>
                                    </td>
                                    <td style="border:0px;">
                                        <?php echo $row1['ClinicName'] ?>
                                    </td>
                                    <td style="border:0px;">
                                        <?php echo date('d/m/y h:i A', strtotime($row1['DateTimeCheckedOut'])) ?>
                                    </td>
                                    <td style="border:0px;">
                                        <?php echo $row1['OrderStatus']; ?>
                                    </td>

                                    <?php
                                    if ($row1['OrderStatus'] != 'Completed') {
                                    ?>
                                        <td style="border:0px;">

                                        </td>

                                    <?php } else { ?>

                                        <?php
                                        $order_id = $row1['OrderID'];
                                        $sql_fb = mysqli_query($con, "SELECT * FROM feedback WHERE UserID='$userID' AND OrderID='$order_id'");
                                        $row_fb = mysqli_num_rows($sql_fb);

                                        if ($row_fb < 1) {
                                        ?>

                                            <td style="border:0px;">
                                                <a href="" data-toggle="modal" onclick="<?php $order_id = $row1['OrderID']; ?>" data-target="#feedback_modal" id="<?php echo $row1['ClinicID'] ?>" orderid="<?php echo $row1['OrderID'] ?>">Leave a Review</a>
                                            </td>

                                        <?php } else { ?>

                                            <td style="border:0px;">
                                                <p>Feedback submitted</p>
                                            </td>

                                        <?php } ?>

                                    <?php } ?>

                                </tr>
                            <?php
                                $cnt = $cnt + 1;
                            }
                        } else { ?>
                            <tr>
                                <th style="text-align:center; color:red; border:0px;" colspan="6">No Record Found</th>
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
    <!-- END OF ORDER HISTORY -->

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
    <!--  END OF MODAL FOR VIEWING ORDER DETAILS -->

    <!-- START OF MODAL FOR FEEDBACK -->
    <div class="modal fade" id="feedback_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" runat="server" enctype="multipart/form-data" id="add_feedback">
                    <div class="modal-header modal-header-success">
                        <h3 class="modal-title">Customer Feedback</h3>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div style="display:none;">
                                <label>ID</label>
                                <input type="text" name="ClinicID" id="ClinicID" class="form-control" />
                            </div>
                            <div class="col-12">

                                <h5>How's your experience?</h5>
                                <div style="text-align: center;">
                                    <span style="font-size: 75px;" class="rating-star" data-value="1" onclick="handleStarClick(this)">☆</span>
                                    <span style="font-size: 75px;" class="rating-star" data-value="2" onclick="handleStarClick(this)">☆</span>
                                    <span style="font-size: 75px;" class="rating-star" data-value="3" onclick="handleStarClick(this)">☆</span>
                                    <span style="font-size: 75px;" class="rating-star" data-value="4" onclick="handleStarClick(this)">☆</span>
                                    <span style="font-size: 75px;" class="rating-star" data-value="5" onclick="handleStarClick(this)">☆</span>
                                    <input type="hidden" id="ratingInput" name="rating" value="">
                                </div>
                            </div>
                            <br><br>
                            <div class="col-12">
                                <h5 style="padding-bottom: 10px;">Comments/Suggestions</h5>
                                <textarea name="feedback" class="form-control bg-light border-3 px-4 py-3" style="border-radius: 15px;" rows="5"></textarea>

                                <input type="hidden" name="orderid" value="">
                            </div>
                            <br />
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <input type="submit" name="submit" value="Submit" style="border-radius: 15px;" class="btn btn-primary" />
                            <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!--  END OF MODAL FOR FEEDBACK -->


    <?php

    if (isset($_POST['submit'])) {

        $clinicID = $_POST['ClinicID'];
        $feedback = $_POST['feedback'];
        $orderID = $_POST['orderid'];
        $rating = $_POST['rating'];

        date_default_timezone_set("Asia/Hong_Kong");
        $currentDateTime = date('y-m-d h:i:s A');

        if ($feedback != null)
            $query = mysqli_query($con, "INSERT INTO feedback (Rating, OverallFeedback, DateTimeRated, ClinicID, UserID, OrderID) VALUES ('$rating', '$feedback', '$currentDateTime', '$clinicID', '$userID', '$orderID')");
        else
            $query = mysqli_query($con, "INSERT INTO feedback (Rating, DateTimeRated, ClinicID, UserID, OrderID) VALUES ('$rating', '$currentDateTime', '$clinicID', '$userID', '$orderID')");


        if ($query) {
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script>';
            echo 'swal({
                                            title: "Success",
                                            text: "You have successfully sent a feedback",
                                            icon: "success",
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="orders.php";
                                                    }
                                                })';
            echo '</script>';
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }

    ?>


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

        $('#feedback_modal').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;

            var id = $(opener).attr('id');
            var orderid = $(opener).attr('orderid');

            $('#add_feedback').find('[name="ClinicID"]').val(id);
            $('#add_feedback').find('[name="orderid"]').val(orderid);

            endResize();
        });
    </script>

</body>

</html>