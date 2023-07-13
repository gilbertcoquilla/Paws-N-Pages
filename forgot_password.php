<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

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
                        <div class="row g-3 bg-light" style="border-radius: 15px; padding: 30px 30px;">
                            <div class="col-12">
                                <h5 class="display-5 text-primary text-uppercase mb-0 text-center">Password Reset</h5>
                                <br>
                            </div>

                            <div class="col-8">
                                <input type="email" name="email" id="email" class="form-control  bg-light border-3 px-4" style="border-radius: 15px; height: 60px;" placeholder="Email Address" required>
                            </div>
                            <div class="col-4">
                                <button type="submit" style="border-radius: 15px; height: 60px;" name="reset" class="btn btn-primary w-100 ">Reset</button>
                            </div>
                            <div class="col-12"></div>
                        </div>
                    </form>
                </div>


                <div class="col-lg-3">
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <?php
    if (isset($_POST['reset'])) {
        $email = $_POST['email'];

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP(); // Send using SMTP
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'pawsnpages.site@gmail.com'; // SMTP username
            $mail->Password = 'zbytxxyfahbtjojr'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 465; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('pawsnpages.site@gmail.com', 'Paws N Pages');
            $mail->addAddress($email); // Add a recipient
            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Password Reset';
            $mail->Body = 'Dear ' . $email . ',
                            <br/><br/>We have received a request to reset the password for your account on Paws N Pages. To proceed with the password reset, please follow the instructions below:

                            <br/><br/>1. Click the  <a href="http://localhost:1234/PawsNPages/change_password.php">link</a> 
                            <br/>2. You will be redirected to a secure page where you can create a new password.
                            <br/>3. Enter your new password in the designated fields. 
                            <br/>4. Once you have entered your new password, click on the <b>Submit</b> button.

                            <br/><br/>If you did not request a password reset, please disregard this email. Your account remains secure, and no changes have been made.

                            <br/><br/>If you require any further assistance or have any questions, please contact our team at <b>pawsnpages.site@gmail.com.</b>  
                            <br>We are available to help you.

                            <br/><br/><BR/>Best regards,
                            Paws N Pages';
            $conn = mysqli_connect("localhost", "root", "", "pawsnpages_db") or die('Unable to connect');
            $verifyQuery = $conn->query("SELECT * FROM users WHERE Email = '$email'");
            if ($verifyQuery->num_rows) {
                $mail->send();
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                                title: "Success",
                                                text: "Message has been sent. Please check your email",
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
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                                title: "Error",
                                                text: "Account not found",
                                                icon: "error",
                                                html: true,
                                                showCancelButton: true,
                                                })
                                                    .then((willDelete) => {
                                                        if (willDelete) {
                                                        
                                                            document.location ="forgot_password.php";
                                                        }
                                                    })';
                echo '</script>';
            }
            $conn->close();
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
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