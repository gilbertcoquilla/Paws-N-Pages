<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | Edit User Profile</title>
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
    <!-- <div class="userProfile-font"> -->
        <br>
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
            <h1 class="text-primary text-uppercase">Edit User Profile</h1>
        </div>
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-8">
                    <!-- Pet Owner Profile-->
                    <div class="card mb-4">
                        <div class="card-header userProfile-font">Pet Owner Profile</div>
                        <div class="card-body">
                            <form>
                                <!-- Profile picture image-->
                                <img class="img-account-profile rounded-circle mb-2" src="img/team-1.jpg" alt="">
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputUsername">Name:</label>
                                        <input class="form-control" id="inputUsername" type="text" placeholder="Enter your name" value="Shante Cruz">
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Address:</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your address" value="Mendoza Building, 102-D Kamuning Rd, Quezon City">
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputOrgName">Contact No:</label>
                                        <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your contact number" value="09217545152">
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                <div></div>
                                <button class="btn btn-primary" type="button">Save</button>
                                <a href="index.php">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                </a>
                            </form>
                        </div>
                    </div>
                    <!-- Pet Profile 1-->
                    <div class="card mb-4">
                        <div class="card-header userProfile-font">🐾 Pet Profile 1</div>
                        <div class="card-body">
                            <form>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputUsername">Pet Name:</label>
                                        <input class="form-control" id="inputUsername" type="text" placeholder="Enter your pet's name" value="Creamy Jo">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputUsername">Vaccination:</label>
                                        <input class="form-control" id="inputUsername" type="text" placeholder="Place the type of vaccine" value="2/4 5-in-1 Vaccine">
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Species:</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your pet's specie" value="Dog">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Rabies:</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Place the type of rabies" value="N/A">
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputOrgName">Breed:</label>
                                        <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your pet's breed" value="Yorkie">
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">Heartworm Prevention & Anti-Parasitic:</label>
                                        <input class="form-control" id="inputLocation" type="text" placeholder="Place the type of antibiotic/s" value="N/A">
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (email address)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputEmailAddress">Color/Markings:</label>
                                        <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your pet's colors/markings" value="Blonde & Black">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputEmailAddress">Medical History:</label>
                                        <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your pet's medical history" value="N/A">
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">Sex:</label>
                                        <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your pet's sex" value="Female">
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                <div></div>
                                <button class="btn btn-primary" type="button">Save</button>
                                <a href="index.php">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                </a>                            
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
                                        <label class="small mb-1" for="inputUsername">Pet Name:</label>
                                        <input class="form-control" id="inputUsername" type="text" placeholder="Enter your pet's name" value="Thullah Paz">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputUsername">Vaccination:</label>
                                        <input class="form-control" id="inputUsername" type="text" placeholder="Place the type of vaccine" value="2/4 5-in-1 Vaccine">
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Species:</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your pet's specie" value="Dog">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Rabies:</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Place the type of rabies" value="N/A">
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputOrgName">Breed:</label>
                                        <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your pet's breed" value="Beagle Aspin">
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">Heartworm Prevention & Anti-Parasitic:</label>
                                        <input class="form-control" id="inputLocation" type="text" placeholder="Place the type of antibiotic/s" value="N/A">
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (email address)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputEmailAddress">Color/Markings:</label>
                                        <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your pet's colors/markings" value="Tan & White">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputEmailAddress">Medical History:</label>
                                        <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your pet's medical history" value="N/A">
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">Sex:</label>
                                        <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your pet's sex" value="Female">
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                <div></div>
                                <button class="btn btn-primary" type="button">Save</button>
                                <a href="index.php">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                </a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- </div> -->
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