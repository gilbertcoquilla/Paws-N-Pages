<?php

session_start();
include('config.php');

$userID = $_SESSION["id"];

include('connection.php');

if (isset($_POST['submit'])) {

    // For Address
    $house_lotno = $_POST['house_lotno'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $country = $_POST['country'];

    $userID = $_POST['userID'];

    // Query for data insertion
    $query = mysqli_query($con, "INSERT INTO address (House_LotNo, Street, Barangay, City, Province, ZIPCode, Country, UserID) VALUES ('$house_lotno', '$street', '$barangay', '$city', '$province', '$zipcode', '$country', '$userID')");

    if ($query) {
        echo "<script>alert('You have successfully added an address');</script>";

        // Must be redirected to user profile
        echo "<script> document.location ='inventory_management.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<!--Template from: https://colorlib.com/wp/template/login-form-v4/ -->
<!--Insert image from: https://www.geeksforgeeks.org/how-to-upload-image-into-database-and-display-it-using-php/-->
<!--Scripts from: https://www.tutorialrepublic.com/faq/how-to-preview-an-image-before-it-is-uploaded-using-jquery.php-->


<head>
    <title>BigSky Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <style>
        .btn-success {
            background-color: #006400;
        }
    </style>

</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/gm1.jpg')">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

                <h4>
                    <b>Add Address</b>
                </h4>
                <br>
                <form method="POST" enctype="multipart/form-data" runat="server">

                    <!--2-->
                    <div class="wrap-input100 validate-input m-b-23">
                        <p>House & Lot No.</p>
                        <input type="text" id="house_lotno" name="house_lotno" required />
                        <br>
                    </div>

                    <!--3-->
                    <div class="wrap-input100 validate-input m-b-23">
                        <p>Street</p>
                        <input type="text" id="street" name="street" />
                        <br>
                    </div>

                    <br>

                    <!--4-->
                    <div class="wrap-input100 validate-input m-b-23">
                        <p>Barangay</p>
                        <input type="text" id="barangay" name="barangay" required />
                        <br>
                    </div>

                    <!--5-->
                    <div class="wrap-input100 validate-input m-b-23">
                        <p>City</p>
                        <input type="text" id="city" name="city" required />
                        <br>
                    </div>

                    <!--6-->
                    <div class="wrap-input100 validate-input m-b-23">
                        <p>Province</p>
                        <input type="text" id="province" name="province" required />
                        <br>
                    </div>

                    <!--7-->
                    <div class="wrap-input100 validate-input m-b-23">
                        <p>ZIP Code</p>
                        <input type="text" id="zipcode" name="zipcode" required />
                        <br>
                    </div>

                    <!--8-->
                    <div class="wrap-input100 validate-input m-b-23">
                        <p>Country</p>
                        <input type="text" id="country" name="country" required />
                        <br>
                    </div>

                    <!--9-->
                    <div class="wrap-input100 validate-input m-b-23" style="display: none;">
                        <p>User ID</p>
                        <input type="text" id="userID" name="userID" value="<?php echo $userID; ?>" required />
                        <br>
                    </div>

                    <br>
                    <div class="btnsub">
                        <button name="submit" class="btn btn-success">
                            Submit
                        </button>
                    </div>
                </form>
                <div>
                    <form action="inventory_management.php">
                        <div class="btncancel">
                            <button class="btn btn-danger">
                                Cancel
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>


</html>