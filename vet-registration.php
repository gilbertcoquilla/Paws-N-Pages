<?php

session_start();
include('config.php');
include('connection.php');

if (isset($_POST['submit'])) {

    $firstname = $_POST['fname'];
    $middlename = $_POST['mname'];
    $lastname = $_POST['lname'];
    $contactNo = $_POST['phone'];
    $age = $_POST['age'];
    $username = $_POST['username'];
    $usertype = $_POST['usertype'];
    $email = $_POST['email'];
    $password = $_POST['password']; // please include validation for password, something like regular expressions (must be alphanumeric with at least 1 capital letter)

    $_SESSION['email'] = $email;

    // Query for data insertion
    $query = mysqli_query($con, "INSERT INTO users (FirstName, MiddleName, LastName, ContactNo, Age, UserType, Username, Email, Password) VALUES ('$firstname', '$middlename', '$lastname', '$contactNo', '$age', '$usertype', '$username', '$email', '$password')");

    if ($query) {
        // echo "<script>alert('You have successfully added an item');</script>";
        echo "<script> document.location ='clinic-details-registration.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<!--- NO BACKGROUND YET
 PHP NOT YET WORKING
 --->

<head>
    <meta charset="utf-8">
    <title>Paws N Pages</title>
    <link rel="icon" href="https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
        body {
            background-image: url("https://i.ibb.co/tHRKhTK/bg1.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">

            <div class="row g-5">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8 ">
                    <form method="post" enctype="multipart/form-data" runat="server">
                        <div class="row g-3 bg-dark">

                            <div class="col-6 ">
                                <a href="registration.php"><button type="button" name="signup" class="btn btn-secondary text-white w-100 py-3">SIGN UP</button></a>
                            </div>
                            <div class="col-6">
                                <a href="login.php"><button type="button" name="login" class="btn btn-outline-light w-100 py-3">LOG IN</button></a>
                            </div>

                            <div class="col-12">
                                <h5 class="display-5 text-primary text-uppercase mb-0 text-center">Register Now! 🩺</h5>
                            </div>
                            <div class="col-6 ">
                                <input type="text" name="fname" class="form-control  bg-light border-0 px-4 py-3" placeholder="First Name" required>
                            </div>
                            <div class="col-6 ">
                                <input type="text" name="mname" class="form-control  bg-light border-0 px-4 py-3" placeholder="Middle Name" required>
                            </div>
                            <div class="col-12">
                                <input type="text" name="lname" class="form-control  bg-light border-0 px-4 py-3" placeholder="Last Name" required>
                            </div>
                            <div class="col-6">
                                <input type="text" name="phone" class="form-control  bg-light border-0 px-4 py-3" placeholder="Contact Number" required>
                            </div>
                            <div class="col-6">
                                <input type="text" name="age" class="form-control  bg-light border-0 px-4 py-3" placeholder="Age" required>
                            </div>
                            <div class="col-12">
                                <input type="text" name="username" class="form-control  bg-light border-0 px-4 py-3" placeholder="Username" required>
                            </div>
                            <div class="col-12" style="display: none;">
                                <input type="text" name="usertype" class="form-control  bg-light border-0 px-4 py-3" placeholder="User Type" value="Clinic Administrator">
                            </div>
                            <div class="col-12">
                                <input type="email" name="email" class="form-control  bg-light border-0 px-4 py-3" placeholder="E-mail" required>
                            </div>
                            <div class="col-12">
                                <input type="password" name="password" class="form-control  bg-light border-0 px-4 py-3" placeholder="Password" required>
                            </div>
                            <!-- <div class="col-12">
                                <input type="password" name="cpassword" class="form-control  bg-light border-0 px-4 py-3" placeholder="Confirm Password" required>
                            </div> -->
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn btn-primary w-100 py-3">Next</button>
                            </div>
                            <div class="col-12"></div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->





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