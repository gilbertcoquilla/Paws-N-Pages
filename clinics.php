<?php

//database connection  file
include('connection.php');
//Code for deletion
// if (isset($_GET['delid'])) {
//     $rid = intval($_GET['delid']);
//     $sql = mysqli_query($con, "DELETE FROM petsupplies WHERE SupplyID=$rid");
//     echo "<script>alert('Item is deleted successfully');</script>";
//     echo "<script>window.location.href = 'inventory_management.php'</script>";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | Clinic Directory</title>
    <link rel="icon" href="https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png"
        type="image/x-icon">
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
                <a href="clinics.php" class="nav-item nav-link active">Clinics</a>
                <a href="contact.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Profile
                    <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Blog Start -->
    <div class="container py-5">
        <!-- Loc Test Start -->
        <h1>Nearby Veterinary Clinics</h1>
        <br>
        <script src="script.js"></script>
        <div class="row g-5">
            <!-- Sidebar Start -->
            <div class="col-lg-4">
                <!-- Search Form Start -->
                <div class="mb-5">
                    <div class="input-group">
                        <input type="text" class="form-control p-3" placeholder="Search">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
                <!-- Search Form End -->

                <!-- Services Start -->
                <div class="mb-5">
                    <h3 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Services</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Wellness
                            Examinations </a>
                        <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Vaccinations </a>
                        <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Spaying and
                            Neutering </a>
                        <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Dental Care </a>
                        <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Surgery </a>
                        <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Laboratory and
                            Diagnostic Testing </a>
                        <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;24/7 Emergency and
                            Critical Care </a>
                        <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Parasite Control
                        </a>
                        <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Nutrition and Diet
                            Counseling </a>
                        <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Pet Boarding and
                            Daycare </a>
                        <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Grooming Services
                        </a>
                        <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Behavior Counseling
                        </a>
                        <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Microchipping </a>
                        <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Hospice and
                            Palliative Care </a>
                    </div>
                </div>
                <!-- Services End -->

            </div>
            <!-- Sidebar End -->
            <!-- Blog list Start -->

            <div class="col-lg-8">
                <?php
                $ret = mysqli_query($con, "SELECT * FROM clinics");
                $cnt = 1;
                $row = mysqli_num_rows($ret);
                if ($row > 0) {
                    while ($row = mysqli_fetch_array($ret)) {
                        ?>
                        <div class="blog-item mb-5">
                            <div class="row g-0 bg-light overflow-hidden">

                                <div class="col-12 col-sm-5 h-100">
                                    <img class="img-fluid h-100"
                                        src="https://lh3.googleusercontent.com/p/AF1QipNu4IbaEEZtYkNfglU92mJyrBES4RVcUgqzKIIa=w768-h768-n-o-k-v1"
                                        style="object-fit: cover; width: 100%; height: 100%;">
                                </div>
                                <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">

                                    <div class="p-4">
                                        <h5 style="display: none;" class="text-uppercase mb-3" name="cname">
                                        </h5>
                                        <h5 class="text-uppercase mb-3" name="cname">
                                            <?php echo $row['ClinicName'] ?>
                                        </h5>

                                        <!-- For address -->

                                        <?php
                                        $clinic_id = $row['ClinicID'];
                                        $ret1 = mysqli_query($con, "SELECT address.LotNo_Street, address.Barangay, address.City, users.UserID, clinics.ClinicID, clinics.OpeningTime, clinics.ClosingTime, clinics.OperatingDays FROM address, users, clinics WHERE address.UserID = users.UserID AND users.UserID = clinics.UserID AND clinics.ClinicID = '$clinic_id'");
                                        $cnt1 = 1;
                                        $row1 = mysqli_num_rows($ret1);
                                        if ($row1 > 0) {
                                            while ($row1 = mysqli_fetch_array($ret1)) {
                                                ?>

                                                <p name="caddress">
                                                    <?php echo $row1['LotNo_Street'] . ' ' . $row1['Barangay'] . ' ' . $row1['City'] ?>
                                                </p>
                                                <p name="operatinghours">
                                                    <?php echo date('h:i A', strtotime($row['OpeningTime'])) . ' - ' . date('h:i A', strtotime($row['ClosingTime'])) ?>
                                                </p>
                                                <p name="operatingdays">
                                                    <?php echo $row1['OperatingDays'] ?></span>
                                                </p>

                                                <?php
                                            }
                                        } ?>

                                        <!-- For address -->

                                        <br /><br /><a class="text-primary text-uppercase"
                                            href="clinic_profile.php?clinicid=<?php echo htmlentities($row['ClinicID']); ?>">View
                                            Clinic<i class="bi bi-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $cnt = $cnt + 1;
                    }
                } ?>
                <!-- <div class="blog-item mb-5">
                    <div class="row g-0 bg-light overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="https://www.businesslist.ph/img/ph/e/1317541690_61200.jpg" style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">
                            <div class="p-4">
                                <h5 class="text-uppercase mb-3">Celebrity Pet Vet Clinic </h5>
                                <p>691 Tandang Sora Ave, Matandang Balara, Quezon City</p>
                                <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> Check-up </span>&nbsp;
                                <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> Surgery </span>
                                <br /><br /><a class="text-primary text-uppercase" href="">View Clinic<i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-item mb-5">
                    <div class="row g-0 bg-light overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="https://cdn.phonebooky.com/blog/wp-content/uploads/2020/03/26163731/pendragon.jpg" style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">
                            <div class="p-4">
                                <h5 class="text-uppercase mb-3">Pendragon Veterinary </h5>
                                <p>Ground Floor Amaremca Bldg. 107A Kalayaan avenue, Diliman, Quezon City </p>
                                <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> Laboratory and Diagnostic Testing </span>&nbsp;
                                <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> Microchipping </span>
                                <br /><br /><a class="text-primary text-uppercase" href="">View Clinic<i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-item mb-5">
                    <div class="row g-0 bg-light overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="https://s3-ap-southeast-1.amazonaws.com/practo-fabric/holy-spirit-animal-clinic-metro-manila-1487669582-58ac094ef2450.jpg" style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">
                            <div class="p-4">
                                <h5 class="text-uppercase mb-3">Holy Spirit Animal Clinic </h5>
                                <p>62 Holy Spirit Dr, Don Antonio, Quezon City</p>
                                <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> Check-up </span>&nbsp;
                                <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> Surgery </span>
                                <br /><br /><a class="text-primary text-uppercase" href="">View Clinic<i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-item mb-5">
                    <div class="row g-0 bg-light overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="https://www.businesslist.ph/img/ph/e/1317541690_61200.jpg" style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">
                            <div class="p-4">
                                <h5 class="text-uppercase mb-3">Celebrity Pet Vet Clinic </h5>
                                <p>691 Tandang Sora Ave, Matandang Balara, Quezon City</p>
                                <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> Check-up </span>&nbsp;
                                <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> Surgery </span>
                                <br /><br /><a class="text-primary text-uppercase" href="">View Clinic<i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-item mb-5">
                    <div class="row g-0 bg-light overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="https://www.businesslist.ph/img/ph/e/1317541690_61200.jpg" style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">
                            <div class="p-4">
                                <h5 class="text-uppercase mb-3">Celebrity Pet Vet Clinic </h5>
                                <p>691 Tandang Sora Ave, Matandang Balara, Quezon City</p>
                                <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> Check-up </span>&nbsp;
                                <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> Surgery </span>
                                <br /><br /><a class="text-primary text-uppercase" href="">View Clinic<i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-lg m-0">
                            <li class="page-item disabled">
                                <a class="page-link rounded-0" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link rounded-0" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Blog list End -->


        </div>
    </div>
    <!-- Blog End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Get In Touch</h5>
                    <p class="mb-4">If you have inquiries feel free to contact us below</p>
                    <a class="mb-2" href="https://goo.gl/maps/nGdbiDamK7MP9L5z5"><i
                            class="bi bi-geo-alt text-primary me-2"></i>Manila, PH</br></a>
                    <a class="mb-2" href="mailto:pawsnpages.site@gmail.com"><i
                            class="bi bi-envelope-open text-primary me-2"></i>pawsnpages.site@gmail.com</a>
                    <a class="mb-0" href="tel:+6396176261"></br><i class="bi bi-telephone text-primary me-2"></i>+63 961
                        762 6162</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-body mb-2" href="clinics.php"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Vet Clinics</a>
                        <a class="text-body mb-2" href="index.php#services"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                        <a class="text-body mb-2" href="index.php#founders"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                        <a class="text-body" href="contact.php"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
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


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>