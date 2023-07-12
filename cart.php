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
  <title>Paws N Pages | Cart</title>
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <h1 class="text-primary text-uppercase">Cart</h1>
  </div>


  <!-- START OF ITEM -->

  <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">

      <div class="card" style="border-radius: 15px;">
        <div class="card-body p-4">

          <div class="col-lg-12">
            <h5 class="mb-3" style="float:left;"><a href="clinic_profile.php?clinicid=<?php echo $clinic_id ?>" style="color: rgb(102, 176, 50);"><i class="bi bi-chevron-left"></i>&nbsp;Continue shopping</a></h5>

            <?php if ($sum_q != 0) { ?>
              <p style="float:right;">You have <b>
                  <?php echo $sum_q ?>
                </b> item(s) in your cart</p><br />
            <?php } else { ?>
              <p style="float:right;">You have <b>0</b> item(s) in your cart</p><br />
            <?php } ?>
            <br>
            <div class="card mb-3" style="border-radius: 15px;">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <div class="d-flex flex-row align-items-center">
                    <div>


                    </div>
                    <div class="ms-3">
                      <h6 class="fw-normal mb-0">ITEM</h6>

                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center" style="padding-right: 110px;">
                    <div style="width: 50%;">
                      <h6 class="fw-normal mb-0">QTY</h6>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div style="width: 100%;">
                      <h6 class="fw-normal mb-0">SUBTOTAL</h6>
                    </div>
                    <a href="#!" style="color: red;"><i class="fas fa-trash-alt"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <?php
            $ret = mysqli_query($con, "SELECT * FROM orderdetails, petsupplies WHERE orderdetails.SupplyID = petsupplies.SupplyID AND orderdetails.UserID='$userID' AND petsupplies.ClinicID='$clinic_id'");
            $cnt = 1;
            $row = mysqli_num_rows($ret);
            if ($row > 0) {
              while ($row = mysqli_fetch_array($ret)) {

            ?>
                <div class="card mb-3" style="border-radius: 15px;">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>

                          <?php if ($row['SupplyImage'] != "") {
                            echo '<img class=" rounded-3" width="100" height="100" src="image_upload/' . $row['SupplyImage'] . '">';
                          } ?>
                        </div>
                        <div class="ms-3">
                          <h5><a style="color: black;" href="product.php?productid=<?php echo $row['SupplyID'] ?>"><?php echo $row['SupplyName'] ?></a></h5>
                          <p class="normal mb-0">₱
                            <?php echo $row['SupplyPrice'] ?>
                          </p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center" style="padding-right: 45px;">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0">
                            <?php echo $row['Quantity'] ?>
                          </h5>
                        </div>
                        &nbsp;&nbsp;
                        <div style="width: 100px;">
                          <h5 class="mb-0">₱
                            <?php echo $row['Price'] ?>
                          </h5>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <div style="float: right;">
                          <a href="cart.php?delid=<?php echo $row['OrderDetailsID'] ?>" style="color: red;"><i class="fa fa-trash"></i></a>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              <?php
                $cnt = $cnt + 1;
              }
            } else { ?>
              <tr>
                <p style="text-align:center; color:red;" colspan="100">There are no items in your cart.</p>
              </tr>
            <?php } ?>
          </div>

          <?php

          if (isset($_GET['delid'])) {
            $rid = intval($_GET['delid']);
            $sql = mysqli_query($con, "DELETE FROM orderdetails WHERE OrderDetailsID=$rid");
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script>';
            echo 'swal({
                      title: "Success",
                      text: "Item is removed from cart",
                      icon: "success",
                      showCancelButton: true,
                      })
                          .then((willDelete) => {
                              if (willDelete) {
                                
                                  window.location.href = "cart.php";
                              }
                          })';
            echo '</script>';
          } ?>

          <?php
          $ret = mysqli_query($con, "SELECT SUM(orderdetails.Price) AS total_price FROM orderdetails, users WHERE orderdetails.UserID='$userID' AND orderdetails.UserID = users.UserID AND orderdetails.ClinicID='$clinic_id'");
          $row = mysqli_fetch_assoc($ret);
          $sum = $row['total_price'];
          ?>
          <?php if ($sum != 0) { ?>
            <div>
              <b>
                <h5 style="float: left; color:black; font-size:25px; padding: 0px 0px 0px 30px;">ORDER TOTAL</h5>
                <h5 style="float: right; color: black; font-size:25px; padding: 0px 30px 0px 0px;"> ₱
                  <?php echo $sum ?>
                </h5>
              </b>
              <br>
              <p></p>
              <p style="float: left; font-size: 18px; font-style: italic; padding-left: 28px;">*Shipping fee is not
                included</p><br>
              <a class="btn btn-primary py-3" href="checkout.php?clinicid=<?php echo $clinic_id ?>" style="float: right; width: 18%; border-radius: 15px;">CHECKOUT</a>
            </div>

          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  </div>

  <!-- END OF ITEM -->

  <!-- Footer Start -->
  <div class="container-fluid bg-light mt-5 py-5">
    <div class="container pt-5">
      <div class="row g-5">
        <div class="col-lg-4 col-md-6">
          <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Get In Touch</h5>
          <p class="mb-4">If you have inquiries feel free to contact us below</p>
          <a class="mb-2" href="https://goo.gl/maps/nGdbiDamK7MP9L5z5"><i class="bi bi-geo-alt text-primary me-2"></i>Manila, PH</br></a>
          <a class="mb-2" href="mailto:pawsnpages.site@gmail.com"><i class="bi bi-envelope-open text-primary me-2"></i>pawsnpages.site@gmail.com</a>
          <a class="mb-0" href="tel:+6396176261"></br><i class="bi bi-telephone text-primary me-2"></i>+63 961 762
            6162</a>
        </div>
        <div class="col-lg-4 col-md-6">
          <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Quick Links</h5>
          <div class="d-flex flex-column justify-content-start">
            <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
            <a class="text-body mb-2" href="clinics.php"><i class="bi bi-arrow-right text-primary me-2"></i>Vet
              Clinics</a>
            <a class="text-body mb-2" href="#services"><i class="bi bi-arrow-right text-primary me-2"></i>Our
              Services</a>
            <a class="text-body mb-2" href="#founders"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The
              Team</a>
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