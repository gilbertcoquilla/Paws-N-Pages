<?php

session_start();
include('config.php');
include('connection.php');

$supply_id = $_GET['productid'];
$clinic_id = $_SESSION['clinic_id'];
$userID = $_SESSION["id"];

// To check if the item is added to the cart
$ret_a = mysqli_query($con, "SELECT * FROM orderdetails WHERE UserID='$userID' AND ClinicID='$clinic_id'");
$cnt_a = 1;
$row_a = mysqli_num_rows($ret_a);

// To get sum of quantity
$ret_q = mysqli_query($con, "SELECT SUM(orderdetails.Quantity) AS total_items FROM orderdetails, users WHERE orderdetails.UserID='$userID' AND orderdetails.UserID = users.UserID AND orderdetails.ClinicID='$clinic_id'");
$row_q = mysqli_fetch_assoc($ret_q);
$sum_q = $row_q['total_items'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | Checkout</title>
    <link rel="icon" href="https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png" type="image/x-icon">
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

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <style>
        body {
            background: url(https://wallpapercave.com/wp/wp2514316.jpg) no-repeat center center fixed;
            background-size: cover;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            $("#different").click(function() {
                if ($(this).is(":checked")) {
                    $("#other").show();
                    $("#address").hide();
                } else {
                    $("#other").hide();
                    $("#address").show();
                }
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

    <!-- Orders Start -->
    <br>
    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
        <h1 class="text-primary text-uppercase">CHECKOUT</h1>
    </div>

    <!-- Start of form -->
    <form method="post" enctype="multipart/form-data" runat="server">
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0 container" style="background-color:white; border-radius: 15px;">
                        <div class="card-body text-center">

                            <!-- To save ordered products to db -->
                            <input type="hidden" name="od_product" value="<?php
                                                                            $ret_t = mysqli_query($con, "SELECT CONCAT('(', orderdetails.Quantity, 'x) ', petsupplies.SupplyName) AS orderedProduct FROM orderdetails, petsupplies WHERE orderdetails.SupplyID = petsupplies.SupplyID AND petsupplies.ClinicID = orderdetails.ClinicID AND orderdetails.UserID='$userID' AND orderdetails.ClinicID='$clinic_id'");
                                                                            $cnt_t = 1;
                                                                            $row_t = mysqli_num_rows($ret_t);
                                                                            if ($row_t > 0) {
                                                                                while ($row_t = mysqli_fetch_array($ret_t)) {

                                                                                    $od_product = $row_t['orderedProduct'] . ', ';
                                                                                    $_SESSION['od_product'] = $od_product;
                                                                                    echo $od_product;
                                                                                    $cnt_t = $cnt_t + 1;
                                                                                }
                                                                            }
                                                                            ?>">

                            <div class="col-12" style="padding-bottom: 5px;">
                                <h6 class="display-5  text-uppercase mb-0 text-center" style="color:white; background-color:#80b434; font-size:30px; border-radius: 15px; padding-bottom: 5px; padding-top: 5px;">
                                    order summary</h6>
                            </div>
                            <div class="row" style="padding-top:10px; font-size: 14px; font-weight: bold;">
                                <div class="col-4">
                                    <p>QTY</p>
                                </div>
                                <div class="col-4">
                                    <p>ITEM</p>
                                </div>
                                <div class="col-4">
                                    <p>SUBTOTAL</p>
                                </div>
                            </div>
                            <?php
                            $ret = mysqli_query($con, "SELECT * FROM orderdetails, petsupplies WHERE orderdetails.SupplyID = petsupplies.SupplyID AND orderdetails.UserID='$userID' AND petsupplies.ClinicID='$clinic_id'");
                            $cnt = 1;
                            $row = mysqli_num_rows($ret);
                            if ($row > 0) {
                                while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                    <div class="card mb-3" style="padding-top:10px; border-radius: 15px;">

                                        <div class="row" style="font-size: 17px;">
                                            <div class="col-4">
                                                <p>
                                                    <?php echo $row['Quantity'] ?>
                                                </p>
                                            </div>
                                            <div class="col-4">
                                                <p>
                                                    <?php echo $row['SupplyName'] ?>
                                                </p>
                                            </div>
                                            <div class="col-4">
                                                <p>₱
                                                    <?php echo $row['Price'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                    $cnt = $cnt + 1;
                                }
                            } ?>

                            <?php
                            $ret = mysqli_query($con, "SELECT SUM(orderdetails.Price) AS total_price FROM orderdetails, users WHERE orderdetails.UserID='$userID' AND orderdetails.UserID = users.UserID AND orderdetails.ClinicID='$clinic_id'");
                            $row = mysqli_fetch_assoc($ret);
                            $sum = $row['total_price'];
                            ?>
                            <?php if ($sum != 0) { ?>
                                <div>
                                    <hr />
                                    <b>

                                        <p style="float: left;  padding: 0px 0px 0px 30px;">ORDER TOTAL</p>
                                        <p style="float: right;   padding: 0px 30px 0px 0px;"> ₱
                                            <?php echo $sum ?>
                                        </p>
                                        <input type="hidden" name="totalprice" value="<?php echo $sum ?>">
                                    </b>

                                    <br />
                                    <br />
                                    <br />

                                </div>

                            <?php } ?>
                            <div class="col-12">
                                <h6 class="display-5  text-uppercase mb-0 text-center" style="color:white; background-color:#80b434; font-size:30px; border-radius: 15px; padding-bottom: 5px; padding-top: 5px;">
                                    SCAN TO PAY</h6><BR />
                            </div>

                            <?php
                            $sql_cb = mysqli_query($con, "SELECT * FROM clinic_billing WHERE ClinicID='$clinic_id'");
                            $row_cb = mysqli_fetch_array($sql_cb);
                            ?>

<?php if ($row_cb['BillingImage'] != "") { ?>
    <img src="image_upload/<?php echo $row_cb['BillingImage'] ?>" alt="Italian Trulli" style="max-width: 300px; ">
<?php } ?>

                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0 container" style="background-color:#FFFFFF; border-radius: 15px;">

                        <div class="card-body text-center">
                            <div class=" userProfile">
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM users, address WHERE users.UserID = address.UserID AND users.UserID='$userID' LIMIT 1");
                                $cnt = 1;
                                $row = mysqli_num_rows($ret);
                                if ($row > 0) {
                                    while ($row = mysqli_fetch_array($ret)) {
                                ?>

                                        <div class="row g-3" style="background-color:#FFFFFF;">
                                            <div class="col-12">
                                                <h6 class="display-5  text-uppercase mb-0 text-center" style="color:white; background-color:#80b434; font-size:30px; border-radius: 15px; padding-bottom: 5px; padding-top: 5px;">
                                                    Details</h6>
                                            </div>
                                            <div class="col-6 ">
                                                <input type="text" style="border-radius: 15px;" name="name" class="form-control  bg-light border-0 px-4 py-3" placeholder="Name" value="<?php echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'] ?>" readonly>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" style="border-radius: 15px;" name="phone" class="form-control  bg-light border-0 px-4 py-3" placeholder="Contact Number" value="<?php echo $row['ContactNo'] ?>" readonly>
                                            </div>

                                            <div style="display: none;">
                                                <div class="col-6 ">
                                                    <input type="text" name="lotno_street" class="form-control  bg-light border-0 px-4 py-3" placeholder="House/Lot No. & Street" value="<?php echo $row['LotNo_Street'] ?>" readonly>
                                                </div>

                                                <div class="col-6">
                                                    <input type="text" name="province" class="form-control  bg-light border-0 px-4 py-3" value="NCR" readonly>
                                                </div>

                                                <div class="col-6">
                                                    <input type="text" name="city" class="form-control  bg-light border-0 px-4 py-3" value="Quezon City" readonly>
                                                </div>
                                            </div>

                                            <div class="col-6" style="display: none;">
                                                <?php
                                                $sql = mysqli_query($con, "SELECT BarangayName FROM Barangay");
                                                $data = $sql->fetch_all(MYSQLI_ASSOC);
                                                ?>
                                                <select id="barangay" class="form-control  bg-light border-0 px-4 py-3" name="barangay" placeholder="Barangay" readonly>
                                                    <option value="<?php echo $row['Barangay'] ?>" selected hidden><?php echo $row['Barangay'] ?></option>
                                                    <?php foreach ($data as $row1) : ?>
                                                        <option value="<?= htmlspecialchars($row1['BarangayName']) ?>">
                                                            <?= htmlspecialchars($row1['BarangayName']) ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                    <!-- <option value="'.htmlspecialchars($barangay).'"></option>' -->
                                                </select>
                                            </div>


                                            <!-- Address selection -->
                                            <div class="col-12">
                                                <?php
                                                $sql = mysqli_query($con, "SELECT CONCAT(LotNo_Street, ', ' , Barangay, ', ', City, ', ', Province, ', ', ZIPCode) AS CurrentAddress FROM address WHERE UserID='$userID'");
                                                $data = $sql->fetch_all(MYSQLI_ASSOC);
                                                ?>

                                                <select id="address" style="border-radius: 15px; width: 100%;" class="bg-light border-0 px-4 py-3" name="address" placeholder="Address" required>
                                                    <?php foreach ($data as $row2) : ?>
                                                        <option value="<?= htmlspecialchars($row2['CurrentAddress']) ?>" selected>
                                                            <?= htmlspecialchars($row2['CurrentAddress']) ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <!-- End of Address selection -->

                                            <div class="col-6" style="display: none;">
                                                <input type="text" name="zipcode" class="form-control  bg-light border-0 px-4 py-3" placeholder="Zip Code" value="<?php echo $row['ZIPCode'] ?>" readonly>
                                            </div>

                                            <div class="col-6" style="text-align: left; padding-top:20px; padding-bottom: 10px;">
                                                <input type="checkbox" name="different" id="different" value="Ship to a different address"> Ship to a different address
                                            </div>

                                            <!-- START OF HIDDEN DIV IF SHIP TO OTHER ADDRESS -->

                                            <div id="other" style="display:none;">
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <h6 class="display-5 text-uppercase mb-0 text-center" style="color:white; background-color:#80b434; font-size:30px; border-radius: 15px; padding-bottom: 5px; padding-top: 5px;">
                                                            Other Address</h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="text" style="border-radius: 15px; width: 100%;" name="lotno_street_1" id="lotno_street_1" class="form-control bg-light border-1 px-4 py-3" placeholder="House/Lot No. & Street">
                                                    </div>

                                                    <div class="col-6">
                                                        <input type="text" style="border-radius: 15px;" name="province_1" class="form-control bg-light border-0 px-4 py-3" value="NCR" readonly>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" style="border-radius: 15px;" name="city_1" class="form-control bg-light border-0 px-4 py-3" value="Quezon City" readonly>
                                                    </div>

                                                    <div class="col-6">
                                                        <?php
                                                        $sql = mysqli_query($con, "SELECT BarangayName FROM Barangay");
                                                        $data = $sql->fetch_all(MYSQLI_ASSOC);
                                                        ?>
                                                        <select id="barangay" style="border-radius: 15px; width: 100%" class="bg-light border-0 px-4 py-3" name="barangay_1" placeholder="Barangay">
                                                            <option value="" selected disabled>-- Please choose a barangay --
                                                            </option>
                                                            <?php foreach ($data as $row) : ?>
                                                                <option value="<?= htmlspecialchars($row['BarangayName']) ?>">
                                                                    <?= htmlspecialchars($row['BarangayName']) ?>
                                                                </option>
                                                            <?php endforeach ?>
                                                            <!-- <option value="'.htmlspecialchars($barangay).'"></option>' -->
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" style="border-radius: 15px;" name="zipcode_1" id="zipcode_1" class="form-control bg-light border-0 px-4 py-3" placeholder="ZIP Code">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END OF HIDDEN DIV IF SHIP TO OTHER ADDRESS -->
                                            <div class="col-12">
                                                <h6 class="display-5  text-uppercase mb-0 text-center" style="color:white; background-color:#80b434; font-size:30px; border-radius: 15px; padding-bottom: 5px; padding-top: 5px;">
                                                    PROOF OF PAYMENT</h6>
                                            </div>

                                            <div class="col-6">
                                                <label for="proof" style="float:left; padding-bottom:15px; padding-left:23px;">Upload Proof of Payment</label>
                                                <input type="file" style="border-radius: 15px;" name="proofOfPayment" class="form-control bg-light border-1 px-4 py-3" required>
                                            </div>

                                            <div class="col-6" style="padding-top: 15px;">
                                                <label style="padding-bottom:20px;"></label>
                                                <input type="text" name="refno" style="border-radius: 15px;" class="form-control bg-light border-1 px-4 py-3" placeholder="Reference No." required>
                                            </div>

                                            <div class="col-12">
                                                <label for="proof" style="float:left; padding-bottom:15px; padding-left:23px;">Upload Prescription</label>
                                                <input type="file" style="border-radius: 15px;" name="orderPrescription" class="form-control bg-light border-1 px-4 py-3">
                                            </div>

                                            <br />

                                            <div class="col-6">
                                                <br><br>
                                                <a class="btn btn-danger py-3" style="float:left; width:50%; border-radius: 15px;" href="cart.php?clinicid='<?php echo htmlentities($clinic_id); ?>">Go
                                                    Back</a>
                                            </div>

                                            <div class="col-6">
                                                <br><br>

                                                <?php if ($row_a > 0) { ?>
                                                    <button type="submit" name="order" class="btn btn-primary py-3" style="float:right; width:50%; border-radius: 15px;">Place Order</button>
                                                <?php } ?>

                                            </div>

                                            <div></div>

                                        </div>

                                <?php
                                    }
                                } ?>
    </form>
    <!-- End of form -->

    <!-- START OF INSERTING DATA -->
    <?php


    // Details
    $totalPrice = $_POST['totalprice'];
    $od_products = $_POST['od_product'];
    date_default_timezone_set("Asia/Hong_Kong");
    $currentDateTime = date('y-m-d h:i:sa');
    $ship_to_address = $_POST['address'];
    $orderStatus = 'Pending';

    // For proof of payment
    $file = $_FILES['proofOfPayment']['name'];
    $tempfile = $_FILES['proofOfPayment']['tmp_name'];
    $folder = "image_upload/" . $file;
    move_uploaded_file($tempfile, $folder);

    $reference_no = $_POST['refno'];

    // For proof of payment
    $file1 = $_FILES['orderPrescription']['name'];
    $tempfile1 = $_FILES['orderPrescription']['tmp_name'];
    $folder1 = "image_upload/" . $file1;
    move_uploaded_file($tempfile1, $folder1);

    // For Order Reference No
    $code = 'ODRN';
    $ymd = date('ymd');
    $sequence = rand(00000, 99999);
    $order_refno = $code . $ymd . $sequence;

    $shipToOtherAddress = $_POST['different'];

    // Still lacking:
    // 1) decrease number of stocks depending on the number of items ordered
    // 2) delete items in cart after placing order

    // Insert data to DB
    if ($row_a > 0) {
        if ($shipToOtherAddress == "") {
            if (isset($_POST['order'])) {

                // Insert to orders table
                $query = mysqli_query($con, "INSERT INTO orders (Order_RefNo, OrderedProducts, UserID, TotalPrice, DateTimeCheckedOut, ShippingTo, ProofOfPayment, Proof_RefNo, OrderPrescription, OrderStatus, ClinicID) VALUES ('$order_refno', '$od_products', $userID, '$totalPrice', '$currentDateTime', '$ship_to_address', '$file', '$reference_no' , '$file1', '$orderStatus', '$clinic_id')");

                // To update stocks
                $stocks_query = mysqli_query($con, "SELECT SupplyID FROM orderdetails WHERE UserID='$userID' AND ClinicID='$clinic_id'");
                $data = $stocks_query->fetch_all(MYSQLI_ASSOC);
                foreach ($data as $stock) {
                    $conv_stock = implode($stock);
                    $a = mysqli_query($con, "SELECT Stocks - (SELECT Quantity FROM orderdetails WHERE SupplyID='$conv_stock' AND UserID='$userID') AS UpdatedStock FROM petsupplies WHERE SupplyID='$conv_stock'");
                    $a_row = mysqli_fetch_array($a);

                    $updatedStock = $a_row['UpdatedStock'];
                    $b = mysqli_query($con, "UPDATE petsupplies SET Stocks='$updatedStock' WHERE SupplyID='$conv_stock'");
                }

                // To remove item from cart
                $del_query = mysqli_query($con, "DELETE FROM orderdetails WHERE UserID='$userID' AND ClinicID='$clinic_id'");

                // if ($query && $stocks_query && $del_query) {
                if ($query) {
                    // if ($query) {  

                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                    echo '<script>';
                    echo 'swal({
                                            title: "Success",
                                            text: "Your order was placed!",
                                            icon: "success",
                                            html: true,
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
        } else {

            $lotno_street_1 = $_POST['lotno_street_1'];
            $province_1 = $_POST['province_1'];
            $city_1 = $_POST['city_1'];
            $barangay_1 = $_POST['barangay_1'];
            $zipcode_1 = $_POST['zipcode_1'];

            $address_1 = $lotno_street_1 . ', ' . $province_1 . ', ' . $city_1 . ', ' . $barangay_1 . ', ' . $zipcode_1;

            if (isset($_POST['order'])) {

                // Insert to address table
                $a_query = mysqli_query($con, "INSERT INTO address (LotNo_Street, Barangay, City, Province, ZIPCode, UserID) VALUES ('$lotno_street_1', '$province_1', '$city_1', '$barangay_1', '$zipcode_1', '$userID')");

                // Insert to orders table
                $query = mysqli_query($con, "INSERT INTO orders (Order_RefNo, OrderedProducts, UserID, TotalPrice, DateTimeCheckedOut, ShippingTo, ProofOfPayment, Proof_RefNo, OrderPrescription, OrderStatus, ClinicID) VALUES ('$order_refno', '$od_products', $userID, '$totalPrice', '$currentDateTime', '$address_1', '$file', '$reference_no', '$file1', '$orderStatus', '$clinic_id')");

                // To update stocks
                $stocks_query = mysqli_query($con, "SELECT SupplyID FROM orderdetails WHERE UserID='$userID' AND ClinicID='$clinic_id'");
                $data = $stocks_query->fetch_all(MYSQLI_ASSOC);
                foreach ($data as $stock) {
                    $conv_stock = implode($stock);
                    $a = mysqli_query($con, "SELECT Stocks - (SELECT Quantity FROM orderdetails WHERE SupplyID='$conv_stock' AND UserID='$userID') AS UpdatedStock FROM petsupplies WHERE SupplyID='$conv_stock'");
                    $a_row = mysqli_fetch_array($a);

                    $updatedStock = $a_row['UpdatedStock'];
                    $b = mysqli_query($con, "UPDATE petsupplies SET Stocks='$updatedStock' WHERE SupplyID='$conv_stock'");
                }

                // To remove item from cart
                $del_query = mysqli_query($con, "DELETE FROM orderdetails WHERE UserID='$userID' AND ClinicID='$clinic_id'");

                // if ($a_query && $query && $stocks_query && $del_query) {
                if ($query) {
                    // if ($query) {    
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                    echo '<script>';
                    echo 'swal({
                                            title: "Success",
                                            text: "Your order was placed!",
                                            icon: "success",
                                            html: true,
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
        }
    } else {
        echo "<script>alert('Please add a product first to continue');</script>";
    }
    ?>
    <!-- END OF INSERTING DATA -->

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Orders End -->

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


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        $(function() {
            var checkbox = $("#different");
            var hidden = $("#other");
            hidden.hide();
            checkbox.change(function() {
                if (checkbox.is(':checked')) {
                    hidden.show();
                    $('#lotno_street_1').prop('required', true); //to add required
                    $('#zipcode_1').prop('required', true);
                } else {
                    hidden.hide();
                    $("#lotno_street_1").val("");
                    $("#zipcode_1").val("");
                    $('#lotno_street_1').prop('required', false); //to remove required
                    $('#zipcode_1').prop('required', false);
                }
            });
        });
    </script>
</body>

</html>