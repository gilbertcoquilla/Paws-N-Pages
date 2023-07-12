<?php

session_start();
include('config.php');
include('connection.php');

$supply_id = $_GET['productid'];
$clinic_id = $_SESSION['clinic_id'];
$userID = $_SESSION["id"];

// To get the stocks left of the product
$ret_c = mysqli_query($con, "SELECT Stocks FROM petsupplies WHERE SupplyID='$supply_id'");
$cnt_c = 1;
$row_c = mysqli_fetch_array($ret_c);

// To check if the item is added to the cart
$ret_a = mysqli_query($con, "SELECT * FROM orderdetails WHERE SupplyID='$supply_id' AND UserID='$userID'");
$cnt_a = 1;
$row_a = mysqli_num_rows($ret_a);

// if ($row_a > 0) {
//     if (isset($_POST['submit'])) {
//         if ($userID != "") {
//             $quantity = $_POST['quantity'];
//             $price = $_POST['price'] * $quantity;

//             $query = mysqli_query($con, "UPDATE orderdetails SET Quantity='$quantity', Price='$price' WHERE SupplyID='$supply_id' AND UserID='$userID'");

//             if ($query) {
//                 echo "<script>alert('Item is updated successfully');</script>";
//                 echo "<script> document.location ='clinic_profile.php?clinicid=$clinic_id';</script>";
//             } else {
//                 echo "<script>alert('Something went wrong. Please try again');</script>";
//             }
//         } else {
//             echo "<script>alert('Please login first to continue');</script>";
//         }
//     }
// } else {
//     if (isset($_POST['submit'])) {
//         if ($userID != "") {
//             $quantity = $_POST['quantity'];
//             $price = $_POST['price'] * $quantity;

//             $query = mysqli_query($con, "INSERT INTO orderdetails (SupplyID, UserID, Quantity, Price, ClinicID) VALUES ('$supply_id', '$userID', '$quantity', '$price', '$clinic_id')");

//             if ($query) {
//                 echo "<script>alert('Item is added successfully');</script>";
//                 echo "<script> document.location ='clinic_profile.php?clinicid=$clinic_id';</script>";
//             } else {
//                 echo "<script>alert('Something went wrong. Please try adding again');</script>";
//             }
//         } else {
//             echo "<script>alert('Please login first to continue');</script>";
//         }
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | Product</title>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

        @media (min-width: 900px) {
            .pcards {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .product-container {
            display: flex;
            align-items: center;
        }

        .product-image {
            width: 100%;
            height: 100%;
        }

        .product-details {
            margin-left: 20px;
            width: 50%;
            height: 50%;
        }

        .product-description {
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 20px;
            margin-bottom: 10px;
            color: black;
        }

        .quantity-label {
            margin-right: 10px;
            font-size: 16px;
        }

        .quantity-container {
            display: flex;
            align-items: center;
            padding-top: 10px;
            color: black;
        }

        .quantity-input {
            width: 50px;
            font-size: 16px;
            text-align: center;
        }

        .quantity-button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .counter {
            width: 150px;
        }

        .counter input {
            width: 50px;
            border: solid;
            line-height: 20px;
            font-size: 15px;
            text-align: center;
            background: white;
            color: black;
            border-width: thin;
            border-color: black;
        }

        .counter span {

            font-size: 15px;
            padding: 0 10px;
            cursor: pointer;
            color: black;
            user-select: none;
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
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="clinics.php" class="nav-item nav-link active">Clinics</a>
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
                    <a href="vet-or-pet.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">JOIN
                        US
                        <i class="bi bi-arrow-right"></i>
                    </a>

                <?php } ?>


            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <br />
    <div style="padding-left: 30px;">
        <h3 class="text-primary text-uppercase">
            <a href="clinic_profile.php?clinicid=<?php echo $clinic_id ?>"><i class="bi bi-chevron-left"></i> GO
                BACK</a>
            <?php if ($row_c['Stocks'] > 0 && $userID != 0) { ?>
                <a style="float: right; padding-right: 50px;"
                    href="cart.php?clinicid='<?php echo htmlentities($clinic_id); ?>"><i
                        class="fa fa-shopping-cart"></i></a>
            </h3>
        <?php } ?>
    </div>

    <br><br>
    <!-- Products Start -->

    <div style="width: 95%; padding-left: 5%;">

        <?php
        $ret = mysqli_query($con, "SELECT * FROM petsupplies WHERE SupplyID='$supply_id'");
        $cnt = 1;
        $row = mysqli_num_rows($ret);
        if ($row > 0) {
            while ($row = mysqli_fetch_array($ret)) {
                ?>
                <div class="product-container">
                    <?php if ($row['SupplyImage'] != "") {
                        echo '<img width="60%" src="image_upload/' . $row['SupplyImage'] . '">';
                    } ?>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <div class="product-details">
                        <form method="POST" enctype="multipart/form-data" runat="server">
                            <h1 class="text-uppercase" style="padding-bottom: 2px;">
                                <b>
                                    <?php echo $row['SupplyName'] ?>
                                </b>
                            </h1>

                            <h3>
                                <b style="color:rgb(102, 176, 50);">
                                    PHP
                                    <?php echo $row['SupplyPrice'] ?>
                                </b>
                            </h3>

                            <br>

                            <p style="font-size: 20px; text-align:justify;">
                                <?php echo $row['SupplyDescription'] ?>
                            </p>
                            <hr>

                            <input type="hidden" name="price" value="<?php echo $row['SupplyPrice'] ?>">
                            <br>

                            <!-- Show quantity only if the stock is above 0 -->
                            <?php if ($row_c['Stocks'] > 0) { ?>
                                <div class="quantity-container" style="padding-top: 10px; padding-bottom: 15px;">
                                    <span class="quantity-label" style="font-size: 20px;">QUANTITY</span>&nbsp;
                                    <?php
                                    $ret1 = mysqli_query($con, "SELECT * FROM orderdetails WHERE SupplyID='$supply_id' AND UserID='$userID'");
                                    $cnt1 = 1;
                                    $row1 = mysqli_num_rows($ret1);
                                    if ($row1 > 0) {
                                        while ($row1 = mysqli_fetch_array($ret1)) {
                                            ?>
                                            <select name="quantity" class="bg-light border-0 px-4 py-3"
                                                style="width: 20%; border-radius: 15px;">
                                                <?php
                                                for ($i = 1; $i <= $row_c['Stocks']; $i++) {
                                                    ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                    <option value="<?php echo $row1['Quantity']; ?>" selected hidden><?php echo $row1['Quantity']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>

                                            <?php
                                            $cnt1 = $cnt1 + 1;
                                        }
                                    } else {
                                        ?>

                                    <select name="quantity" class="bg-light border-0 px-4 py-3"
                                        style="width: 20%; border-radius: 15px;">
                                        <?php
                                        for ($i = 1; $i <= $row_c['Stocks']; $i++) {
                                            ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                <?php } ?>

                                </div>
                            <?php } ?>



                            <!-- To display status of stocks -->
                            <?php if ($row_c['Stocks'] >= 15) { ?>
                                <p style="font-size: 18px; font-style: italic;">In stock</p>
                            <?php } ?>

                            <?php if ($row_c['Stocks'] < 15 && $row_c['Stocks'] > 0) { ?>
                                <p style="font-size: 18px; font-style: italic; color: red;">Low stock</p>
                            <?php } ?>

                            <?php if ($row_c['Stocks'] == 0) { ?>
                                <p style="font-size: 18px; font-style: italic; color: red;">Sold out</p>
                            <?php } ?>
                            <!-- To display status of stocks -->

                            <br>

                            <?php
                            $ret_b = mysqli_query($con, "SELECT * FROM orderdetails WHERE SupplyID='$supply_id' AND UserID='$userID'");
                            $cnt_b = 1;
                            $row_b = mysqli_num_rows($ret_b);
                            ?>

                            <?php if ($row_b > 0) { ?>
                                <button name="submit" class="btn btn-primary" id="addToCart"
                                    style="width: 100%; border-radius: 15px;">Update Cart</button>
                            <?php } else {
                                if ($row_c['Stocks'] > 0 && $userID != 0) { ?>

                                    <button name="submit" class="btn btn-primary" id="addToCart"
                                        style="width: 100%; border-radius: 15px;">Add to Cart</button>
                                <?php }
                            } ?>

                            <?php
                            if ($row_a > 0) {
                                if (isset($_POST['submit'])) {
                                    if ($userID != "") {
                                        $quantity = $_POST['quantity'];
                                        $price = $_POST['price'] * $quantity;

                                        $query = mysqli_query($con, "UPDATE orderdetails SET Quantity='$quantity', Price='$price' WHERE SupplyID='$supply_id' AND UserID='$userID'");

                                        if ($query) {

                                            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                                            echo '<script>';
                                            echo 'swal({
                                            title: "Success",
                                            text: "Your cart has been updated",
                                            icon: "success",
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="product.php?productid=' . $supply_id . ' ";
                                                    }
                                                })';
                                            echo '</script>';
                                            // echo "<script>alert('Item is updated successfully');</script>";
                                            // echo "<script> document.location ='clinic_profile.php?clinicid=$clinic_id';</script>";
                                        } else {
                                            echo "<script>alert('Something went wrong. Please try again');</script>";
                                        }
                                    } else {
                                        echo "<script>alert('Please login first to continue');</script>";
                                    }
                                }
                            } else {
                                if (isset($_POST['submit'])) {
                                    if ($userID != "") {
                                        $quantity = $_POST['quantity'];
                                        $price = $_POST['price'] * $quantity;

                                        $query = mysqli_query($con, "INSERT INTO orderdetails (SupplyID, UserID, Quantity, Price, ClinicID) VALUES ('$supply_id', '$userID', '$quantity', '$price', '$clinic_id')");

                                        if ($query) {
                                            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                                            echo '<script>';
                                            echo 'swal({
                                            title: "Success",
                                            text: "Item has been added to your cart",
                                            icon: "success",
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {
                                                    
                                                        document.location ="product.php?productid=' . $supply_id . ' ";
                                                    }
                                                })';
                                            echo '</script>';
                                        } else {
                                            echo "<script>alert('Something went wrong. Please try adding again');</script>";
                                        }
                                    } else {
                                        echo "<script>alert('Please login first to continue');</script>";
                                    }
                                }
                            }
                            ?>

                        </form>
                    </div>
                </div>
                <?php
                $cnt = $cnt + 1;
            }
        }
        ?>



    </div>
    <!-- Products End -->


    <!-- Modal Start -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel"
        aria-hidden="true">
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


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Form JavaScript File -->
    <!-- <script src="contactform/contactform.js"></script> -->

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function () {
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

            $(document).on("click", ".remove-btn", function () {
                var index = $(this).data("index");
                cartItems.splice(index, 1);
                updateCart();
            });

            // Rest of the JavaScript code remains the same

            function addToCart(name) {
                var index = cartItems.findIndex(function (item) {
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

            $(document).on("click", "#openCartBtn", function () {
                updateCart();
                $("#cartModal").modal("show");
            });

            $(document).on("click", "#addToCart", function () {
                var productName = $(this).closest(".product-item").find("h6").text();
                addToCart(productName);
            });

            $(document).on("click", ".quantity-btn", function () {
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

            $(document).on("click", "#checkoutBtn", function () {
                // Handle checkout logic here
                console.log("Checkout button clicked");
            });
        });
    </script>
    <!-- Add the JavaScript code at the bottom of your HTML file -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Close button click event
            $('#cartModal .close').click(function () {
                $('#cartModal').modal('hide');
            });

            // Checkout button click event
            $('#checkoutBtn').click(function () {
                // Perform the checkout action here
                // You can add your own code to handle the checkout process
                alert('Checkout button clicked!');
            });
        });
    </script>

    <!-- FOR COUNTER -->
    <script type="text/javascript">
        // var stocks = document.getElementById('stocks').value;
        // var qty = document.getElementById('quantity').value;

        $('#add').on('click', function () {
            var input = $('#quantity');
            var stocks = $('#stocks');
            if (input < stocks) {
                input.val(parseFloat(input.val()) + 1);
            }

        });

        // function increaseCount(a, b) {
        //     var input = b.previousElementSibling;
        //     var value = parseInt(input.value, 10);
        //     value = isNaN(value) ? 0 : value;
        //     if (input < stocks) {
        //         value++;
        //         input.value = value;
        //     }
        // }

        function decreaseCount(a, b) {
            var input = b.nextElementSibling;
            var value = parseInt(input.value, 10);
            if (value > 1) {
                value = isNaN(value) ? 0 : value;
                value--;
                input.value = value;
            }
        }
    </script>

</body>

</html>