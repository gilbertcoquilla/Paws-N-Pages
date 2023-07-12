<?php
include('connection.php');

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
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6 ">

                    <form method="post" action="">
                        <div class="row g-3 bg-light" style="border-radius: 15px; padding:30px 30px;">
                            <div class="col-12">
                                <h5 class="display-5 text-primary text-uppercase mb-0 text-center">Change Password</h5>
                                <br>
                            </div>
                            <div class="col-12" style="padding-bottom: 10px;">
                                <input type="text" name="username" id="username" class="form-control  bg-light border-3 px-4 py-3" style="border-radius:15px;" placeholder="Username" required>
                            </div>
                            <div class="col-12" style="padding-bottom: 10px;">
                                <input type="password" name="newpass" id="newpass" class="form-control  bg-light border-3 px-4 py-3" style="border-radius:15px;" placeholder="New Password" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn btn-primary w-100 py-3" style="border-radius:15px;">Submit</button>
                            </div>
                            <div class="col-12"></div>
                        </div>
                    </form>
                </div>

                <!-- validation for empty field -->
                <script>
                    function validation() {
                        var id = document.f1.username.value;
                        var ps = document.f1.password.value;
                        if (id.length == "" && ps.length == "") {
                            alert("Username and Password fields are empty");
                            return false;
                        } else {
                            if (id.length == "") {
                                alert("Username is empty");
                                return false;
                            }
                            if (ps.length == "") {
                                alert("Password field is empty");
                                return false;
                            }
                        }
                    }
                </script>

                <div class="col-lg-3">
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <?php
    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['newpass'];

        // Hashed password
        $h_pword = password_hash($password, PASSWORD_DEFAULT);

        date_default_timezone_set("Asia/Hong_Kong");
        $dateupdated = date_create('now')->format('Y-m-d H:i:s');

        // Query for updating data
        $query = mysqli_query($con, "UPDATE users SET DateTimeModified = '$dateupdated', Password='$h_pword' WHERE Username='$username'");

        if ($query) {
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script>';
            echo 'swal({
                                                title: "Success",
                                                text: "You have successfully updated your password",
                                                icon: "success",
                                                html: true,
                                                showCancelButton: true,
                                                })
                                                    .then((willDelete) => {
                                                        if (willDelete) {
                                                        
                                                            document.location ="login.php";
                                                        }
                                                    })';
            echo '</script>';
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
    }
    ?>



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