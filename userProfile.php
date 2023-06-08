<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | User Profile</title>
    <link rel = "icon" href = 
        "https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png" 
        type = "image/x-icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
                <a href="inventory_management.php" class="nav-item nav-link">Inventory</a>
                <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                <a href="logout.php" class="nav-item nav-link">Logout</a>
                <a href="vet-or-pet.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">JOIN US
                    <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- User Profile Start -->
    <br>
    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
        <h1 class="text-primary text-uppercase">User Profile</h1>
    </div>
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header userProfile-font">Pet Owner Profile</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="img/team-1.jpg" alt="">
                        <!-- Profile picture help block-->
                        <br><br>
                        <div class="userProfile">
                            <div>Name:&nbsp;&nbsp; <b class="userProfile-font"> Shante Cruz </b> </div>
                            <div>Address:&nbsp;&nbsp; <b class="userProfile-font"> Mendoza Building, 102-D Kamuning Rd, Quezon City</b> </div>
                            <div>Contact No:&nbsp;&nbsp; <b class="userProfile-font"> 09217545152 </b> </div>
                            <br>
                            <!-- Profile picture upload button-->
                            <a href="editUserProfile.php">
                                <button class="btn btn-primary" type="button">Edit Profile</button>
                            </a>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Pet Profile 1-->
                <div class="card mb-4">
                    <div class="card-header userProfile-font">🐾 Pet Profile 1</div>
                    <div class="card-body">
                        <form>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputUsername">Pet Name:&nbsp;&nbsp; <b class="userProfile-font"> Creamy Jo </b> </label>
                                    <!-- <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username"> -->
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputUsername">Vaccination:&nbsp;&nbsp; <b class="userProfile-font"> 2/4 5-in-1 Vaccine </b> </label>
                                    <!-- <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username"> -->
                                </div>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Species:&nbsp;&nbsp; <b class="userProfile-font"> Dog </b> </label>
                                    <!-- <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="Valerie"> -->
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Rabies:&nbsp;&nbsp; <b class="userProfile-font">  N/A </b> </label>
                                    <!-- <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="Luna"> -->
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Breed:&nbsp;&nbsp; <b class="userProfile-font"> Yorkie </b> </label>
                                    <!-- <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Start Bootstrap"> -->
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Heartworm Prevention & Anti-Parasitic:&nbsp;&nbsp; <b class="userProfile-font">  N/A </b> </label>
                                    <!-- <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA"> -->
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                 <!-- Form Group (email address)-->
                                 <div class="col-md-6">
                                    <label class="small mb-1" for="inputEmailAddress">Color/Markings:&nbsp;&nbsp; <b class="userProfile-font"> Blonde & Black </b> </label>
                                    <!-- <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com"> -->
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputEmailAddress">Medical History:&nbsp;&nbsp;  <b class="userProfile-font"> N/A </b> </label>
                                    <!-- <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com"> -->
                                </div>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Sex:&nbsp;&nbsp; <b class="userProfile-font"> Female </b> </label>
                                    <!-- <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567"> -->
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <div></div>
                            <a href="editUserProfile.php">
                                <button class="btn btn-primary" type="button">Edit</button>
                            </a>
                            <button class="btn btn-primary" type="button">Delete</button>
                        </form>
                    </div>
                </div>
                <!-- Pet Profile 2-->
                <div class="card mb-4">
                    <div class="card-header userProfile-font">🐾 Pet Profile 2</div>
                    <div class="card-body">
                        <form>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputUsername">Pet Name:&nbsp;&nbsp; <b class="userProfile-font"> Thullah Paz</b></label>
                                    <!-- <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username"> -->
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputUsername">Vaccination:&nbsp;&nbsp; <b class="userProfile-font"> 2/4 5-in-1 Vaccine</b></label>
                                    <!-- <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username"> -->
                                </div>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Species:&nbsp;&nbsp; <b class="userProfile-font"> Dog</b></label>
                                    <!-- <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="Valerie"> -->
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Rabies:&nbsp;&nbsp; <b class="userProfile-font"> N/A</b></label>
                                    <!-- <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="Luna"> -->
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Breed:&nbsp;&nbsp;<b class="userProfile-font">Beagle Aspin</b></label>
                                    <!-- <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Start Bootstrap"> -->
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Heartworm Prevention & Anti-Parasitic:&nbsp;&nbsp; <b class="userProfile-font"> N/A</b></label>
                                    <!-- <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA"> -->
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                 <!-- Form Group (email address)-->
                                 <div class="col-md-6">
                                    <label class="small mb-1" for="inputEmailAddress">Color/Markings:&nbsp;&nbsp; <b class="userProfile-font"> Tan & White</b></label>
                                    <!-- <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com"> -->
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputEmailAddress">Medical History:&nbsp;&nbsp; <b class="userProfile-font"> N/A</b></label>
                                    <!-- <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com"> -->
                                </div>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Sex:&nbsp;&nbsp; <b class="userProfile-font"> Female</b></label>
                                    <!-- <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567"> -->
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <div></div>
                            <a href="editUserProfile.php">
                                <button class="btn btn-primary" type="button">Edit</button>
                            </a>                           
                            <button class="btn btn-primary" type="button">Delete</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- User Profile End -->

     <!-- Footer Start -->
     <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Get In Touch</h5>
                    <p class="mb-4">If you have inquiries feel free to contact us below</p>
                    <a class="mb-2" href="https://goo.gl/maps/nGdbiDamK7MP9L5z5"><i class="bi bi-geo-alt text-primary me-2"></i>Manila, PH</br></a>
                    <a class="mb-2" href="mailto:pawsnpages.site@gmail.com"><i class="bi bi-envelope-open text-primary me-2"></i>pawsnpages.site@gmail.com</a>
                    <a class="mb-0" href="tel:+6396176261"></br><i class="bi bi-telephone text-primary me-2"></i>+63 961 762 6162</a>
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