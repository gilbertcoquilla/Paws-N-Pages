<?php

session_start();
include('config.php');
include('connection.php');

$clinic_id = $_GET['clinicid'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | Clinic</title>
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

        /* test */
        .pcard {
            padding: 1rem;
            height: 4rem;
        }

        .pcards {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            gap: 1rem;
        }

        @media (min-width: 600px) {
            .pcards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 900px) {
            .pcards {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .image-container {
            width: 350px;
            /* Set the desired width */
            height: 350px;
            /* Set the desired height */
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .image-container img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
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

                            <h5 class="text-uppercase mb-3"><?php echo $row['ClinicName'] ?></h5>

                            <?php
                            $ret1 = mysqli_query($con, "SELECT address.LotNo_Street, address.Barangay, address.City, users.UserID, users.ContactNo, clinics.ClinicID FROM address, users, clinics WHERE address.UserID = users.UserID AND users.UserID = clinics.UserID AND clinics.ClinicID = '$clinic_id'");
                            $cnt1 = 1;
                            $row1 = mysqli_num_rows($ret1);
                            if ($row1 > 0) {
                                while ($row1 = mysqli_fetch_array($ret1)) {
                            ?>
                                    <span><?php echo $row1['LotNo_Street'] . ' ' . $row1['Barangay'] . ' ' . $row1['City'] ?></span></br>
                                    <span><?php echo $row1['ContactNo'] ?></span> </br>
                            <?php
                                }
                            } ?>



                            <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> Vaccination </span>&nbsp;
                            <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> Surgery </span>&nbsp;
                            <span style="background-color: rgb(255, 137, 137); border-radius: 2px; color:black"> 24/7 </span><br />

                    <?php }
                    } ?>
                    <a href="https://www.facebook.com/AnimalVeterinaryPetClinicOpen24Hours/" target="_blank"><i class="bi-facebook"></i>View Facebook</a> <br />

                    <!-- Need to store clinic ID in session in this page and then close it on the next one after booking an appointment -->
                    <a class="btn btn-primary m-1" href="booking_form.php?clinicid=<?php echo htmlentities($clinic_id); ?>">Book an appointment<i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Clinic Profile End -->

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h1 class="text-primary text-uppercase">Products</h1>
            </div>

            <div class="pcards">
                <?php
                $ret = mysqli_query($con, "SELECT * FROM petsupplies WHERE ClinicID='$clinic_id'");
                $cnt = 1;
                $row = mysqli_num_rows($ret);
                if ($row > 0) {
                    while ($row = mysqli_fetch_array($ret)) {
                ?>
                        <div class="bg-light d-flex flex-column text-center">
                            <div class="image-container">
                                <?php if ($row['SupplyImage'] != "") {
                                    echo '<img class="img-fluid mb-4" src="image_upload/' . $row['SupplyImage'] . '">';
                                } ?>
                            </div>
                            <div class="product-info">
                                <h6 class="text-uppercase"><b><?php echo $row['SupplyName']; ?></b></h6>
                                <p><?php echo $row['SupplyDescription']; ?><br /></p>
                                Stocks: <?php echo $row['Stocks'] ?></br>
                                <h5 class="text-primary mb-0">₱ <?php echo $row['SupplyPrice']; ?></h5>
                                <div class="btn-action d-flex justify-content-center">
                                    <button type="button" id="addToCart" class="btn btn-primary py-2 px-3"><i class="bi bi-cart"></i></button>
                                    <button type="button" id="itemInfo" class="btn btn-primary py-2 px-3"><i class="bi bi-eye"></i></button>
                                </div>
                            </div>
                        </div>
                <?php
                        $cnt = $cnt + 1;
                    }
                }
                ?>
            </div>
        </div>
    </div>


    <!-- Products End -->





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
    <script>
        $(document).ready(function() {
            var cartItems = [];

            function updateCart() {
                var cartContent = "";
                for (var i = 0; i < cartItems.length; i++) {
                    var item = cartItems[i];
                    cartContent += '<tr>' +
                        '<td>' + item.name + '</td>' +
                        '<td>' +
                        '<div class="cart-item-quantity">' +
                        '<button class="quantity-btn py-2 px-3" data-index="' + i + '" data-action="decrease">-</button>' +
                        '<span>' + item.quantity + '</span>' +
                        '<button class="quantity-btn py-2 px-3" data-index="' + i + '" data-action="increase">+</button>' +
                        '</div>' +
                        '</td>' +
                        '<td>' +
                        '<button class="remove-btn" data-index="' + i + '">&times;</button>' +
                        '</td>' +
                        '</tr>';
                }
                $("#cartItems").html(cartContent);
            }

            $(document).on("click", ".remove-btn", function() {
                var index = $(this).data("index");
                cartItems.splice(index, 1);
                updateCart();
            });

            // Rest of the JavaScript code remains the same




            function addToCart(name) {
                var index = cartItems.findIndex(function(item) {
                    return item.name === name;
                });
                if (index === -1) {
                    cartItems.push({
                        name: name,
                        quantity: 1
                    });
                } else {
                    cartItems[index].quantity++;
                }
                updateCart();
            }

            $(document).on("click", "#openCartBtn", function() {
                updateCart();
                $("#cartModal").modal("show");
            });

            $(document).on("click", "#addToCart", function() {
                var productName = $(this).closest(".product-item").find("h6").text();
                addToCart(productName);
            });

            $(document).on("click", ".quantity-btn", function() {
                var index = $(this).data("index");
                var action = $(this).data("action");
                if (action === "increase") {
                    cartItems[index].quantity++;
                } else if (action === "decrease") {
                    cartItems[index].quantity--;
                    if (cartItems[index].quantity === 0) {
                        cartItems.splice(index, 1);
                    }
                }
                updateCart();
            });

            $(document).on("click", "#checkoutBtn", function() {
                // Handle checkout logic here
                console.log("Checkout button clicked");
            });
        });
    </script>
    <!-- Add the JavaScript code at the bottom of your HTML file -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Close button click event
            $('#cartModal .close').click(function() {
                $('#cartModal').modal('hide');
            });

            // Checkout button click event
            $('#checkoutBtn').click(function() {
                // Perform the checkout action here
                // You can add your own code to handle the checkout process
                alert('Checkout button clicked!');
            });
        });
    </script>
</body>

</html>