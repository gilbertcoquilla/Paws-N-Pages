
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

if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = mysqli_query($con, "DELETE FROM orderdetails WHERE OrderDetailsID=$rid");
    echo "<script>alert('Item is removed from cart');</script>";
    echo "<script>window.location.href = 'cart.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | Order Summary</title>
    <link rel = "icon" href = 
        "https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png" 
        type = "image/x-icon">
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
        body
{
    background:  url(https://wallpapercave.com/wp/wp2514316.jpg) no-repeat center center fixed; 
    background-size: cover;
}
    </style>

    <script type="text/javascript">
    $(function () {
        $("#different").click(function () {
            if ($(this).is(":checked")) {
                $("#other").show();
            } else {
                $("#other").hide();
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

    <!-- Orders Start -->
        <br>
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
            <h1 class="text-primary text-uppercase" >CHECKOUT</h1>
        </div>
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0 container" style="background-color:white;">
                        <div class="card-body text-center">
                        
                        
                         
                            <div class="col-12">
                                <h6 class="display-5  text-uppercase mb-0 text-center" style="color:white; background-color:#80b434; font-size:30px;">order summary</h6>
                            </div>

                        <div class="row" style="padding-top:10px;">
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
                                <div class="card mb-3" style="padding-top:10px;">
                                    
                                       
                                            <div class="row ">
                                                <div class="col-4">
                                                <p><?php echo $row['Quantity'] ?></p>
                                                    
                                                </div>
                                                <div class="col-4">
                                                    <p><?php echo $row['SupplyName'] ?></p>
                                                   
                                                </div>
                                                <div class="col-4">
                                                    <p>₱ <?php echo $row['Price'] ?></p>
                                                   
                                                </div>
                                            </div>
                                       
                                    </div>
                                
                            <?php
                                $cnt = $cnt + 1;
                            }
                        }  ?>

                          <?php
                    $ret = mysqli_query($con, "SELECT SUM(orderdetails.Price) AS total_price FROM orderdetails, users WHERE orderdetails.UserID='$userID' AND orderdetails.UserID = users.UserID AND orderdetails.ClinicID='$clinic_id'");
                    $row = mysqli_fetch_assoc($ret);
                    $sum = $row['total_price'];
                    ?>
                    <?php if ($sum != 0) { ?>
                        <div>
                            <hr/>
                            <b>
                                
                                <p style="float: left;  padding: 0px 0px 0px 30px;">ORDER TOTAL</p>
                                <p style="float: right;   padding: 0px 30px 0px 0px;"> ₱ <?php echo $sum ?></p>
                                
                            </b>
                            
                            <br/>
                            <br/>
                            <br/>
                            
                        </div>

                    <?php }  ?>
                            <div class="col-12">
                                <h6 class="display-5  text-uppercase mb-0 text-center" style="color:white; background-color:#80b434; font-size:30px;">SCAN TO PAY</h6><BR/>
                            </div>
                    <img src="https://help.gcash.com/hc/article_attachments/9396039095961/3rd.png" alt="Italian Trulli" width=300; height=300;>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0 container">

                        <div class="card-body text-center">
                            <div class="userProfile">
                                <form method="post">
                        <div class="row g-3 bg-light">
                         
                            <div class="col-12">
                                <h6 class="display-5  text-uppercase mb-0 text-center" style="color:white; background-color:#80b434; font-size:30px;">Details</h6>
                            </div>
                            <div class="col-6 ">
                                <input type="text" name="name" class="form-control  bg-light border-0 px-4 py-3"
                                    placeholder="Name" required>
                            </div>
                            <div class="col-6">
                                <input type="text" name="phone" class="form-control  bg-light border-0 px-4 py-3"
                                    placeholder="Contact Number" required>
                            </div>

                             <div class="col-6 ">
                                <input type="text" name="lotno_street" class="form-control  bg-light border-0 px-4 py-3" placeholder="House/Lot No. & Street" required>
                            </div>

                            <div class="col-6">
                                <input type="text" name="province" class="form-control  bg-light border-0 px-4 py-3" value="NCR" readonly>
                            </div>
                            <div class="col-6">
                                <input type="text" name="city" class="form-control  bg-light border-0 px-4 py-3" value="Quezon City" readonly>
                            </div>


                            <div class="col-6">
                                <?php
                                $sql = mysqli_query($con, "SELECT BarangayName FROM Barangay");
                                $data = $sql->fetch_all(MYSQLI_ASSOC);
                                ?>
                                <select id="barangay" class="form-control  bg-light border-0 px-4 py-3" name="barangay" placeholder="Barangay" required>
                                    <option value="" selected disabled>-- Please choose a barangay --</option>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= htmlspecialchars($row['BarangayName']) ?>">
                                            <?= htmlspecialchars($row['BarangayName']) ?>
                                        </option>
                                    <?php endforeach ?>
                                    <!-- <option value="'.htmlspecialchars($barangay).'"></option>' -->
                                </select>
                            </div>

                            <div class="col-6">
                                <input type="text" name="zipcode" class="form-control  bg-light border-0 px-4 py-3" placeholder="Zip Code" required>
                            </div>
                            <div class="col-6" style="text-align: left; padding-top:20px;">
                                <input type="checkbox" name="different" id="different" value="Ship to a different address" style="padding-left: 20%;"> Ship to a different address
                            </div>
                            
                            <!-- START OF HIDDEN DIV IF SHIP TO OTHER ADDRESS -->
                            
                            <div id="other" style="display:none;">
                            <div class="row g-3 bg-light">
                                <div class="col-12">
                                    <h6 class="display-5  text-uppercase mb-0 text-center" style="color:white; background-color:#80b434; font-size:30px;">Other Address</h6>
                                </div>
                                <div class="col-6 ">
                                    <input type="text" name="lotno_street" class="form-control  bg-light border-0 px-4 py-3" placeholder="House/Lot No. & Street" required>
                                </div>

                                <div class="col-6">
                                    <input type="text" name="province" class="form-control  bg-light border-0 px-4 py-3" value="NCR" readonly>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="city" class="form-control  bg-light border-0 px-4 py-3" value="Quezon City" readonly>
                                </div>

                                <div class="col-6">
                                    <?php
                                    $sql = mysqli_query($con, "SELECT BarangayName FROM Barangay");
                                    $data = $sql->fetch_all(MYSQLI_ASSOC);
                                    ?>
                                    <select id="barangay" class="form-control  bg-light border-0 px-4 py-3" name="barangay" placeholder="Barangay" required>
                                        <option value="" selected disabled>-- Please choose a barangay --</option>
                                        <?php foreach ($data as $row) : ?>
                                            <option value="<?= htmlspecialchars($row['BarangayName']) ?>">
                                                <?= htmlspecialchars($row['BarangayName']) ?>
                                            </option>
                                        <?php endforeach ?>
                                        <!-- <option value="'.htmlspecialchars($barangay).'"></option>' -->
                                    </select>
                                </div>
                            </div>
                            </div>
                            <!-- END OF HIDDEN DIV IF SHIP TO OTHER ADDRESS -->
                                <div class="col-12">
                                    
                                    <h6 class="display-5  text-uppercase mb-0 text-center" style="color:white; background-color:#80b434; font-size:30px;">PROOF OF PAYMENT</h6>
                                </div>
                            <div class="col-6">
                                <label for="files" style="float:left; padding-bottom:10px; padding-left:23px;">Upload proof of payment</label>
                                    <input type="file" name="proof" class="form-control  bg-light border-0 px-4 py-3" value="proof" readonly>
                                </div>
                                 
                                <div class="col-6">
                                    <label style="padding-bottom:10px;"></label>
                                    <input type="text" name="refno" class="form-control  bg-light border-0 px-4 py-3" value="Reference No." readonly>
                                </div>

                            <br/>
                                <button type="submit" name="submit" class="btn btn-primary  py-3" style="float:right; width:20%;">Place Order</button>
                            
                            <div class="col-12"></div>
                        </div>
                    </form>
                            
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