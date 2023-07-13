<?php
include('connection.php');

?>
<!DOCTYPE html>
<html lang="en">

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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Newly added -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

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

        .fa-eye {
            position: absolute;
            top: 28px;
            right: 5%;
            cursor: pointer;
            color: lightgray;
        }

        /* For password validation (below) */

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -3px;
            content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -3px;
            content: "✖";
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
                                <input type="password" name="newpass" id="newpass" minlength="8" maxlength="16" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" class="form-control bg-light border-3 px-4 py-3" style="border-radius:15px;" placeholder="New Password" required>
                                <i class="fa-solid fa-eye" id="eye"></i>
                            </div>
                            <p id="message" style="display: none;font-style: italic; font-size: 15px; padding-top: 10px;">
                                &nbsp;&nbsp;&nbsp;&nbsp;<span id="length" class="invalid">*Minimum of (8)
                                    characters</span>, <span id="capital" class="invalid">at least (1)
                                    uppercase letter</span>, <span id="letter" class="invalid">(1) lowercase
                                    letter</span> and <span id="number" class="invalid">(1) number</span>
                            </p>
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
    <script>
        // Show password
        const passwordInput = document.querySelector("#newpass");
        const eye = document.querySelector("#eye");

        eye.addEventListener("click", function() {
            this.classList.toggle("fa-eye-slash")
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
            passwordInput.setAttribute("type", type)
        });

        // Password Validation
        var myInput = document.getElementById("newpass");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }
    </script>
</body>

</html>