<!DOCTYPE html>
<html lang="en">
<!--- NO BACKGROUND YET
 PHP NOT YET WORKING
 --->

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | Login </title>
    <link rel="icon" href="https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png"
        type="image/x-icon">
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

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">


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

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form method="post" action="">
                        <div class="row g-3 bg-light" style=" border-radius: 15px; padding:30px 30px;">
                            <center><a href="index.php"><img src="img/logo_black.png"
                                        style="height:150px; width:150px;"></a></center>
                            <?php
                            session_start();
                            $message = "";
                            if (count($_POST) > 0) {
                                $con = mysqli_connect("localhost", "root", "", "pawsnpages_db") or die('Unable to connect');
                                $result = mysqli_query($con, "SELECT * FROM users WHERE Username='" . $_POST["username"] . "' and Password = '" . $_POST["password"] . "'");
                                $row = mysqli_fetch_array($result);

                                if (is_array($row)) {
                                    $_SESSION["id"] = $row['UserID'];
                                    $_SESSION["name"] = $row['Username'];
                                    $_SESSION["usertype"] = $row['UserType'];

                                } else {
                                    echo '<div class="alert alert-danger" style="border-radius:15px;"><i class="fa fa-times-circle"></i>&nbsp; Invalid Username or Password!</div>';
                                }
                            }

                            if (isset($_SESSION["id"])) {
                                if ($_SESSION["usertype"] == "Pet Owner") {
                                    header("Location:index.php"); // redirects the user to the defined page
                                }

                                if ($_SESSION["usertype"] == "Clinic Administrator" || $_SESSION["usertype"] == "Administrator") {
                                    header("Location:dashboard.php"); // redirects the user to the defined page
                                }
                            }
                            ?>
                            <div class="col-12">
                                <input type="text" name="username" id="username"
                                    class="form-control  bg-light border-3 px-4 py-3" style="border-radius:15px;"
                                    placeholder="Username">
                            </div>
                            <div class="col-12">
                                <input type="password" name="password" id="password"
                                    class="form-control  bg-light border-3 px-4 py-3" style="border-radius:15px;"
                                    placeholder="Password">
                            </div>
                            <div class="col-6 ">
                                <a href="forgot_password.php">Forgot Password?</a>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn btn-primary w-100 py-3"
                                    style="border-radius:15px;">Submit</button>
                            </div>
                            <center>
                                <div class="col-12" style="padding-top:30px;">Don't have an account? <a
                                        href="vet-or-pet.php">Sign Up</a></div>
                            </center>

                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>

            <!-- validation for empty field -->
            <!-- <script>
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
                </script> -->

            <div class="col-lg-3">
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