<?php
session_start();
include('config.php');
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | Home</title>
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
                <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                <a href="about.php" class="nav-item nav-link">About Us</a>

                <?php if ($_SESSION["id"] > 0) { ?>
                    <a href="userProfile.php" class="nav-item nav-link">Profile</a>
                    <a href="logout.php" class="nav-item nav-link">Logout
                        <i class="bi bi-arrow-right"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </a>


                <?php } else { ?>
                    <a href="login.php" class="nav-item nav-link">Login</a>
                    <a href="vet-or-pet.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">JOIN US
                        <i class="bi bi-arrow-right"></i>
                    </a>

                <?php } ?>


            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-2 text-uppercase text-white bg-primary mb-lg-4" style="border-radius: 15px;">&nbsp;Paws N Pages</h1>
                    <h3 class="text-uppercase text-dark bg-white mb-lg-4" style="border-radius: 15px;">&nbsp;&nbsp;&nbsp;Find the right vet clinic for you</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Services Start -->
    <div class="container-fluid py-5" id="services">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Services</h6>
                <h1 class="display-5 text-uppercase mb-0">Our Services</h1>
            </div>
            <div class="row g-5">
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                        <i class="flaticon-location display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Browse Veterinary Clinics </h5>
                            <p>Find the best clinic for your pets, book an appointment, or purchase pet supplies</p>
                            <img src="https://i.ibb.co/6Pmq9Bc/1.png" style="max-width: 100%; height: auto; padding-bottom: 25px;" />
                            <a class="text-primary text-uppercase" href="clinics.php">View Nearby Clinics<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                        <i class="display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Contact Us</h5>
                            <p>Click here to report your concerns
                            </p>
                            <img src="https://i.ibb.co/TgT3HxN/2.png" style="max-width: 100%; height: auto; padding-bottom: 25px;" />
                            <br>
                            <br>
                            <a class="text-primary text-uppercase" href="contact.php">Contact Us<i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                <?php if ($_SESSION["id"] > 0) { ?>

                    <div class="col-md-6">
                        <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                            <i class="display-1 text-primary me-4"></i>
                            <div>
                                <h5 class="text-uppercase mb-3">Appointments</h5>
                                <p>Click here to view your booked appointments</p>
                                <img src="https://i.ibb.co/jZxWwSW/3.png" style="max-width: 100%; height: auto; padding-bottom: 25px;" href="#" />

                                <a class="text-primary text-uppercase" href="appointments.php">View Appointments<i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="service-item bg-light d-flex p-4" style="border-radius: 15px;">
                            <i class="display-1 text-primary me-4"></i>
                            <div>
                                <h5 class="text-uppercase mb-3">Orders</h5>
                                <p>Click here to view your orders and to track its delivery</p>
                                <img src="https://i.ibb.co/S5CJjnD/4.png" style="max-width: 100%; height: auto; padding-bottom: 25px;" />

                                <a class="text-primary text-uppercase" href="orders.php">View Orders<i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
    <!-- Services End -->



    <!-- Team Start -->
    <div class="container-fluid py-5" id="founders">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Team behind</h6>
                <h1 class="display-5 text-uppercase mb-0">founders</h1>
            </div>
            <div class="owl-carousel team-carousel position-relative" style="padding-right: 25px;">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100  h-100" style="width:200px;height:200px;overflow:hidden; border-radius: 15px 15px 0px 0px;" src="https://media.discordapp.net/attachments/1112075552669581332/1113440500536582234/1.png" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square mx-1" href="https://www.linkedin.com/in/gilbert-coquilla-63529a210" target=”_blank”><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4" style="height: 160px; border-radius: 0px 0px 15px 15px;">
                        <h5 class="text-uppercase">John Gilbert Coquilla</h5>
                        <p class="m-0">Back-end Developer</p>
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100 h-100" style="width:200px;height:200px;overflow:hidden; border-radius: 15px 15px 0px 0px;" src="https://media.discordapp.net/attachments/1112075552669581332/1113440500796620810/2.png" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square mx-1" href="https://www.linkedin.com/in/bianca-ongkingco-557727262" target=”_blank”><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4" style="height: 160px; border-radius: 0px 0px 15px 15px;">
                        <h5 class="text-uppercase">Czarina Bianca Ongkingco</h5>
                        <p class="m-0">Back-end Developer</p>
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100  h-100" style="width:200px;height:200px;overflow:hidden; border-radius: 15px 15px 0px 0px;" src="https://media.discordapp.net/attachments/1112075552669581332/1113440501060878397/3.png" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square mx-1" href="https://guillemanzano.my.canva.site/gm-portfolio" target=”_blank”><i class="bi bi-globe"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4" style="height: 160px; border-radius: 0px 0px 15px 15px;">
                        <h5 class="text-uppercase">Guilianna Manzano</h5>
                        <p class="m-0">Front-end Developer</p>
                    </div>
                </div>
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100  h-100" style="width:200px;height:200px;overflow:hidden; border-radius: 15px 15px 0px 0px;" src="https://media.discordapp.net/attachments/1112075552669581332/1113440501308334110/4.png" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square mx-1" href="https://shirpaz.xyz"><i class="bi bi-globe" target=”_blank”></i></a>
                                <a class="btn btn-light btn-square mx-1" href="https://www.linkedin.com/in/shirley-paz-9069b91aa/" target=”_blank”><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light text-center p-4" style="height: 160px; border-radius: 0px 0px 15px 15px;">
                        <h5 class="text-uppercase">Shirley May Paz</h5>
                        <p class="m-0">Front-end Developer</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- FINAL Footer Start -->
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
                        <a class="text-body mb-2" href="index.php"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-body mb-2" href="clinics.php"><i class="bi bi-arrow-right text-primary me-2"></i>Vet Clinics</a>
                        <a class="text-body mb-2" href="index.php#services"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                        <a class="text-body mb-2" href="pricing.php"><i class="bi bi-arrow-right text-primary me-2"></i>Pricing</a>
                        <a class="text-body mb-2" href="about.php"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
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
    <!-- FINAL Footer End -->

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