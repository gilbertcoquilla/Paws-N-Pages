<?php

session_start();
include('config.php');
include('connection.php');

$userID = $_SESSION["id"];
$clinic_id = $_SESSION['clinic_id'];

if (isset($_POST['submit'])) {

    // For booking an appointment
    $userID = $_POST['userID'];
    //$services = $_POST['service'];
    $listofservices = implode(', ', $_REQUEST['service']);
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];
    $notes = $_POST['notes'];
    $status = $_POST['status'];
    $code = 'PNP';
    $ymd = date('ymd');

    $squence = rand(00000, 99999);
    $brefno = $code . $ymd . $squence;

    $clinicid = $_POST['clinicID'];

    // foreach ($services as $listofservices) {
    // Query for data insertion
    $query = mysqli_query($con, "INSERT INTO appointments (Notes, PreferredDate, PreferredTime, AppointmentStatus, AvailedServices, UserID, Appointment_RefNo, ClinicID) VALUES ('$notes', '$appointmentDate', '$appointmentTime', '$status', '$listofservices', '$userID', '$brefno', '$clinicid')");
    if ($query) {
        echo "<script>alert('You have successfully booked an appointment!');</script>";
        echo "<script> document.location ='booking_form.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
    // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | Booking</title>
    <link rel="icon" href="https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
        .modal-content {
            border: none;
            border-radius: 0;
        }

        .modal-dialog {
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-body {
            display: flex;
            justify-content: flex-end;
        }

        .modal-footer {
            border: none;
        }

        .cart-item {
            display: grid;
            grid-template-columns: auto 1fr auto;
            align-items: center;
        }

        .cart-item-name {
            text-align: left;
        }

        .cart-item-quantity {

            align-items: center;
        }

        .quantity-btn {
            padding: 10px;
            margin: 10px;
            border: none;
        }

        .cart-item-remove {
            flex-grow: 0;
        }

        .remove-btn {
            background: none;
            border: none;
            padding: 5px;
            margin: 5px;
            border: none;
            cursor: pointer;
        }

        table {
            margin-left: auto;
            margin-right: auto;
        }

        table,
        tr,
        td {
            border: none;
            text-align-last: center;
        }

        /* input[type="time"]::-webkit-calendar-picker-indicator {
    display: none;
  }

  input[type="time"]::-webkit-inner-spin-button,
  input[type="time"]::-webkit-clear-button {
    display: none;
  } */
    </style>
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
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="clinics.php" class="nav-item nav-link">Clinics</a>
                <a href="contact.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Profile
                    <i class="bi bi-arrow-right"></i></a>

            </div>
        </div>
        <button type="button" class="btn" id="openCartBtn"><i class="bi bi-cart"></i></button>
    </nav>
    <!-- Navbar End -->
    <br />
    <!-- Blog Start -->
    <div class="container ">
        <div class="row g-5">
            <div class="col-lg-3 bg-light" style="border-radius: 15px;">
                <!-- CLINIC PROFILE START -->
                <div class="mb-5">
                    <div class="col-12">
                        <img class="img-fluid h-100" src="https://lh3.googleusercontent.com/p/AF1QipNu4IbaEEZtYkNfglU92mJyrBES4RVcUgqzKIIa=w768-h768-n-o-k-v1" style="width: 100%; height: 100%;">
                    </div>
                    <?php
                    echo $clinic_id; // for testing purposes (if the clinic id was really retrieved properly. update: successful) 
                    $_SESSION['clinic_id'] = $clinic_id;
                    ?>

                    <?php
                    $ret = mysqli_query($con, "SELECT * FROM clinics WHERE ClinicID = '$clinic_id'");
                    $cnt = 1;
                    $row = mysqli_num_rows($ret);
                    if ($row > 0) {
                        while ($row = mysqli_fetch_array($ret)) {

                    ?>
                            <p class="text-uppercase mb-3" style="font-size:20px; color:black;"><b>
                                    <?php echo $row['ClinicName'] ?>
                                </b></br>

                                <?php
                                $ret1 = mysqli_query($con, "SELECT address.LotNo_Street, address.Barangay, address.City, users.UserID, users.ContactNo, clinics.OpeningTime, clinics.ClosingTime, clinics.OperatingDays ,clinics.ClinicID FROM address, users, clinics WHERE address.UserID = users.UserID AND users.UserID = clinics.UserID AND clinics.ClinicID = '$clinic_id' LIMIT 1");
                                $cnt1 = 1;
                                $row1 = mysqli_num_rows($ret1);
                                if ($row1 > 0) {
                                    while ($row1 = mysqli_fetch_array($ret1)) {
                                ?>
                            <p>
                                <?php echo $row1['LotNo_Street'] . '<br/> Brgy. ' . $row1['Barangay'] . ',  ' . $row1['City'] ?><br />
                                <?php echo '<b>Opening Hours: </b>' . date('h:i A', strtotime($row['OpeningTime'])) . ' - ' . date('h:i A', strtotime($row['ClosingTime'])) ?><br />
                                <?php echo '<b>Opening Days: </b>' . $row1['OperatingDays'] ?>
                            </p>
                    <?php
                                    }
                                } ?>


                    <?php
                            $ret2 = mysqli_query($con, "SELECT * FROM services WHERE ClinicID='$clinic_id'");
                            $cnt2 = 1;
                            $row2 = mysqli_num_rows($ret2);
                            if ($row2 > 0) {
                                while ($row2 = mysqli_fetch_array($ret2)) {
                    ?>
                            <span style="background-color: rgb(102, 176, 50); border-radius: 6px; color:white; padding-top: 2px; padding-bottom: 3px;">
                                &nbsp; <?php echo ' ' . $row2['ServiceName'] . ' ' ?> &nbsp;
                            </span>&nbsp;
                    <?php
                                }
                            } ?>
                    <!-- <br /><br /><a href="https://www.facebook.com/AnimalVeterinaryPetClinicOpen24Hours/" target="_blank" style="padding-left: 5px;"><i class="bi-facebook"></i> View Facebook</a> <br /><br> -->
                    <br><br>
                    <a class="btn btn-primary m-1" href="feedback.php" style="border-radius: 15px; width: 95%;">Leave a review</a>
            <?php }
                    } ?>

                </div>
            </div>
            <!-- CLINIC PROFILE END -->

            <!-- BOOKING FORM START -->
            <div class="col-lg-9">
                <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                    <h2 class="display-6 text-uppercase mb-0">Booking Form</h2>
                    <h6 class="text-primary text-uppercase" style="font-size: 18px;">NOTE: Booking an appointment is NOT guaranteed, it is yet
                        to be approved by the Veterinary Clinic</h6>
                </div>


                <form method="POST" action="">
                    <div class="col-12">
                        <h5>Services to avail</h5>

                        <?php
                        $ret = mysqli_query($con, "SELECT * FROM services WHERE ClinicID='$clinic_id' LIMIT 4");
                        $cnt = 1;
                        $row = mysqli_num_rows($ret);
                        if ($row > 0) {
                            while ($row = mysqli_fetch_array($ret)) {
                        ?>

                                <input type="checkbox" id="service" name="service[]" value="<?php echo $row['ServiceName'] ?>">&nbsp; <?php echo $row['ServiceName'] ?>
                                &nbsp;


                        <?php

                                $cnt = $cnt + 1;
                            }
                        } ?>
                    </div>
                    <br />
                    <div class="col-12">
                        <h5>Preferred date:</h5>
                        <input type="date" class="form-control bg-light border-0 px-4 py-3" style="border-radius: 15px;" id="datePicker" name="appointmentDate" required>
                    </div>
                    <br />
                    <div class="col-12">
                        <h5>Preferred time:</h5>
                        <input type="time" class="form-control bg-light border-0 px-4 py-3" style="border-radius: 15px;" id="timePicker" name="appointmentTime" required step="3600" oninvalid="this.setCustomValidity('Please choose a time by hour and double check the operating days and hours of the clinic')" oninput="this.setCustomValidity('')">
                        <span style="color:red; font-style:italic;">*Please choose a time by hour and double check the operating days
                            and hours of the clinic</span>
                    </div>
                    <br />
                    <div class="col-12">
                        <h5>Notes:</h5>
                        <input type="name" name="notes" style="border-radius: 15px;" class="form-control bg-light border-0 px-4 py-3" placeholder="For example: my pet has a fever">
                    </div>
                    <br />
                    <div class="col-12" style="display: none;">
                        <h5>Status:</h5>
                        <input type="name" name="status" class="form-control  bg-light border-0 px-4 py-3" value="Processing">
                    </div>

                    <div class="col-12" style="display: none;">
                        <h5>User ID:</h5>
                        <input type="text" name="userID" class="form-control  bg-light border-0 px-4 py-3" value="<?php echo $userID ?>" required>
                    </div>

                    <div class="col-12" style="display: none;">
                        <h5>Clinic ID:</h5>
                        <input type="text" name="clinicID" class="form-control  bg-light border-0 px-4 py-3" value="<?php echo $clinic_id ?>" required>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="submit" value="Submit" style="border-radius: 15px;" class="btn btn-primary w-100 py-3" />
                    </div>
                </form>
            </div>
        </div>
        <!-- BOOKING FORM END -->
    </div>



    <!-- Testimonial Start -->
    <div class="container-fluid bg-testimonial py-5" style="margin: 90px 0;">
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
            <h1 class="text-dark text-uppercase">Feedbacks</h1>
        </div>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel bg-white p-5">
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-4">
                            </div>
                            <p>The clinic is very responsive and clean.</p>
                            <hr class="w-25 mx-auto">
                            <h5 class="text-uppercase">5/5</h5>
                            <span>- Joseph</span>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-4">
                            </div>
                            <p>It was okay</p>
                            <hr class="w-25 mx-auto">
                            <h5 class="text-uppercase">4/5</h5>
                            <span>- Mary</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->



    <!-- Modal Start -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="cartTable" class="table">
                        <thead>
                        </thead>
                        <tbody id="cartItems">
                            <!-- Cart items will be inserted here -->
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="checkoutBtn">Checkout</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->


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
                        <a class="text-body mb-2" href="index.php#services"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                        <a class="text-body mb-2" href="index.php#founders"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
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


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var minDate = year + '-' + month + '-' + day;

            $('#datePicker').attr('min', minDate);
        });
    </script>
</body>

</html>