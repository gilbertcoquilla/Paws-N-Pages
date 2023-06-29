<?php

session_start();
include('config.php');
include('connection.php');

$userID = $_SESSION["id"];

include('connection.php');

///////////////////// FOR UPDATING PET OWNER PROFILE ////////////////////////////

if (isset($_POST['update'])) {

    $userID = $_POST['userID'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $cnum = $_POST['cnum'];
    $username = $_POST['username'];

    $query = mysqli_query($con, "UPDATE users SET FirstName='$fname', MiddleName='$mname', LastName='$lname', ContactNo='$cnum', Username='$username' WHERE UserID='$userID'");

    if ($query) {
        echo "<script>alert('You have successfully your information.');</script>";
        echo "<script> document.location ='userprofile.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}

///////////////////// FOR ADDING NEW PET ////////////////////////////  

if (isset($_POST['save_pet'])) {

    $file = $_FILES['image']['name'];
    $tempfile = $_FILES['image']['tmp_name'];
    $folder = "image_upload/" . $file;

    move_uploaded_file($tempfile, $folder);

    $userID = $_POST['userID'];
    $petname = $_POST['petname'];
    $species = $_POST['species'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $color = $_POST['color'];

    $query = mysqli_query($con, "INSERT INTO pets (PetImage, PetName, Species, Breed, Age, Color, UserID) VALUES ('$file', '$petname', '$species', '$breed', '$age', '$color', '$userID')");

    if ($query) {
        echo "<script>alert('You have successfully added a new Pet');</script>";
        echo "<script> document.location ='userprofile.php'; </script>";
    } else {
        echo "<script>alert('Error adding new pet.');</script>";
    }
}

///////////////////// FOR DELETING PET ////////////////////////////  
if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = mysqli_query($con, "DELETE FROM pets WHERE PetID=$rid");
    echo "<script>alert('You have successfully deleted a record.');</script>";
    echo "<script>window.location.href = 'userprofile.php'</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | User Profile</title>
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
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="clinics.php" class="nav-item nav-link">Clinics</a>
                <a href="inventory_management.php" class="nav-item nav-link">Inventory</a>
                <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                <a href="logout.php" class="nav-item nav-link">Logout</a>
                <a href="vet-or-pet.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">JOIN
                    US
                    <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- START OF PROFILE -->
    <br>
    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
        <h1 class="text-primary text-uppercase">Appointments</h1>
    </div>

    <div style="padding-right:30px; padding-left:30px;">
        <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
            <div class="card-header userProfile-font"><b>⏳ Appointments</b></div>
            <div class="card-body text-center">
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

                        ?>
                                <!--Fetch the Records -->
                                <tr>
                                    <td style="border:0px;">
                                        <?php echo $row1['Appointment_RefNo'] ?>
                                    </td>
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
                                        <?php echo $row1['AppointmentStatus']; ?>

                                    </td>
                                    <td style="border:0px;">
                                        <?php echo $row1['Remarks']; ?>
                                    </td>
                                    <td style="border:0px;">
                                        <?php echo $row1['DateTimeBooked']; ?>
                                    </td>
                                </tr>
                            <?php
                                $cnt = $cnt + 1;
                            }
                        } else { ?>
                            <tr>
                                <th style="text-align:center; color:red; border:0px;" colspan="9">No Record Found</th>
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


    <!-- END OF MODAL FOR ORDER HISTORY -->


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


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>



</body>

</html>