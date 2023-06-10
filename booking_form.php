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
        table   
        { 
        margin-left: auto;
        margin-right: auto;
        }
        table, tr, td {
            border: none;
            text-align-last: center;
        }
    </style>
</head>

<body>
 <!-- Navbar Start -->
 <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <a href="index.php" class="navbar-brand ms-lg-5">
        <img src="https://i.ibb.co/vmrbJ34/logo-black.png" alt="Paws N Pages Logo" width="70" height="70"/>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="index.php" class="nav-item nav-link active">Home</a>
            <a href="clinics.php" class="nav-item nav-link">Clinics</a>
            <a href="contact.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Profile <i class="bi bi-arrow-right"></i></a>
            
        </div>
    </div>
    <button type="button" class="btn" id="openCartBtn"><i class="bi bi-cart"></i></button>
</nav>
<!-- Navbar End -->


<!-- Clinic Profile Start -->
<div class="blog-item mb-5">
    <div class="row g-0 bg-light overflow-hidden">
        <div class="col-12 col-sm-5 h-100">
            <img class="img-fluid h-100" src="https://lh3.googleusercontent.com/p/AF1QipNu4IbaEEZtYkNfglU92mJyrBES4RVcUgqzKIIa=w768-h768-n-o-k-v1" style="object-fit: cover; width: 100%; height: 100%;">
        </div>
        <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">
            <div class="p-4">

                <h5 class="text-uppercase mb-3">Blessed Veterinary Clinic</h5>
                <span>281-C Roosevelt Ave, Quezon City</span></br>
                <span>(02) 8921 9634</span> </br>
                <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> Vaccination </span>&nbsp;
                <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> Surgery </span>&nbsp;
                <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> 24/7 </span><br />
                <a href="https://www.facebook.com/AnimalVeterinaryPetClinicOpen24Hours/" target="_blank"><i class="bi-facebook"></i>View Facebook</a> <br />
                <a class="btn btn-primary m-1" href="">Leave a review<i class="bi bi-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div> 
</div>
</div>

<!-- Clinic Profile End --> 

<!-- Booking Form Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
            
            <h1 class="display-5 text-uppercase mb-0">Booking Form</h1>
            <h6 class="text-primary text-uppercase">NOTE: Booking an appointment is NOT guaranteed, it is still  to be accepted by the Vet Clinic</h6>
        </div>
        <div class="row g-5">
            <form>
                <div class="row g-3" class="">
                    <h5>Select Services to avail</h5>
                        <div class="col-lg-4">
                            <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Wellness Examinations </a></br></br>
                            <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Vaccinations </a></br></br>
                            <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Spaying and Neutering </a></br></br>
                            <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Dental Care </a></br></br>
                            <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Surgery </a></br></br>
                        </div>
                        <div class="col-lg-4">
                            <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Laboratory and Diagnostic Testing </a></br></br>
                            <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;24/7 Emergency and Critical Care </a></br></br>
                            <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Parasite Control </a></br></br>
                            <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Nutrition and Diet Counseling </a></br></br>
                            <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Pet Boarding and Daycare </a></br></br>
                        </div>
                        <div class="col-lg-4">
                            <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Grooming Services </a></br></br>
                            <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Behavior Counseling </a></br></br>
                            <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Microchipping </a></br></br>
                            <a class="h5 bg-light py-2 px-3 mb-2" href="#"><input type="checkbox">&nbsp;Hospice and Palliative Care </a></br></br>
                        </div>
                </div>
                <div class="row g-3" class="">
                    <div class="col-12">
                        <h5>Select Date:</h5>
                        <input type="date" class="form-control  bg-light border-0 px-4 py-3" id="datePicker" name="appointmentDate">
                    </div>
                    <div class="col-12">
                        <h5>Select Time:</h5>
                        <input type="time" class="form-control  bg-light border-0 px-4 py-3" id="timePicker" name="appointmentTime"> 
                    </div>
                    <div class="col-12">
                        <h5>Notes:</h5>
                        <input type="name" name="name" class="form-control  bg-light border-0 px-4 py-3" placeholder="Example: my pet has a fever" required>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary w-100 py-3" />
                    </div>
                </div>                    
                </form>
            </div>
            
        </div>
    </div>
</div>
<!-- Booking Form End -->





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
                <a class="mb-0" href="tel:+6396176261"></br><i class="bi bi-telephone text-primary me-2"></i>+63 961 762 6162</a>
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
</body>

</html>
