<?php
include('config.php');
include('connection.php');

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
    <title>Paws N Pages | Contact Us</title>
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
                <a href="clinics.php" class="nav-item nav-link">Clinics</a>
                <a href="contact.php" class="nav-item nav-link active">Contact Us</a>
                <a href="about.php" class="nav-item nav-link">About Us</a>

                <?php if ($_SESSION["id"] > 0) { ?>
                    <a href="userProfile.php" class="nav-item nav-link">Profile</a>
                    <a href="logout.php" class="nav-item nav-link">Logout
                        <i class="bi bi-arrow-right"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </a>


                <?php } else { ?>

                    <a href="login.php" class="nav-item nav-link">Login</a>
                    <a href="vet-or-pet.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">JOIN US
                        <i class="bi bi-arrow-right"></i>
                    </a>

                <?php } ?>


            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="col-12">
                <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 100%;">
                    <h6 class="text-primary text-uppercase">Contact Us</h6>
                    <h1 class="display-5 text-uppercase mb-0">Feel Free To Contact Us</h1>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-7">

                    <form method="POST" enctype="multipart/form-data">

                        <div class="row g-3">
                            <div class="col-12">
                                <input type="text" style="border-radius: 10px;" name="name" class="form-control  bg-light border-3 px-4 py-3" placeholder="Your Name" required>
                            </div>
                            <div class="col-12">
                                <input type="email" style="border-radius: 10px;" name="email" class="form-control  bg-light border-3 px-4 py-3" placeholder="Your Email" required>
                            </div>
                            <div class="col-12">
                                <input type="text" style="border-radius: 10px;" name="subject" class="form-control  bg-light border-3 px-4 py-3" placeholder="Subject" required>
                            </div>
                            <div class="col-12">
                                <textarea name="message" style="border-radius: 10px;" class="form-control bg-light border-3 px-4 py-3" rows="6" placeholder="Message" required></textarea>
                            </div>
                            <div class="col-12">
                                <!-- <button type="submit" name="submit" class="btn btn-primary w-100 py-3">Send
                                    Message</button> -->

                                <input type="submit" name="submit" value="Send Message" class="btn btn-primary w-100 py-3" style="border-radius: 15px;" />
                            </div>
                        </div>
                    </form>
                    <?php if (!empty($message)) : ?>
                        <br>
                        <?php if (strpos($message, 'Error') !== false) : ?>
                            <div class="alert alert-danger">
                                <?php echo $message; ?>
                            </div>
                        <?php else : ?>
                            <div class="alert alert-success">
                                <?php echo $message; ?>
                            </div>
                        <?php endif; ?>
                        <br>
                    <?php endif; ?>

                </div>
                <div class="col-lg-5">
                    <div class="bg-light mb-5 p-1" style="border-radius: 15px;">
                        <div class="d-flex align-items-center mb-2" style="padding-top: 20px; padding-left: 20px;">
                            <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h6 class="text-uppercase mb-1">Our Location</h6>
                                <span>Manila, Philippines</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2" style="padding-top: 20px; padding-left: 20px;">
                            <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h6 class="text-uppercase mb-1">Email Us</h6>
                                <span>pawsnpages.site@gmail.com</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4" style="padding-top: 20px; padding-left: 20px;">
                            <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h6 class="text-uppercase mb-1">Call Us</h6>
                                <span>+63 961 762 6162</span>
                            </div>
                        </div>
                        <div>
                            <iframe class="position-relative w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123504.11646190527!2d120.97961697226576!3d14.684087222501244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ba0942ef7375%3A0x4a9a32d9fe083d40!2sQuezon%20City%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1685214080447!5m2!1sen!2sph" frameborder="0" style="height: 205px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Vet clinics</h6>
                <h1 class="display-5 text-uppercase mb-0">Want to showcase your clinic?</h1><br>
                <div class="col-6">
                    <a href="clinics_registration.php"><button type="button" name="submit" class="btn btn-primary py-3" style="border-radius: 15px; width: 80%;">Sign Me Up!</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


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
                        <a class="text-body mb-2" href="index.php#services"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                        <a class="text-body mb-2" href="index.php#founders"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
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

    <?php
    if (isset($_POST['submit'])) {
        $mail = new PHPMailer(true);
        try {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            date_default_timezone_set("Asia/Hong_Kong");
            $dateupdated = date('y-m-d h:i:sa');
            $datetime = date('Y-m-d h:i A');

            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'pawsnpages.site@gmail.com';                     //SMTP username
            $mail->Password   = 'zbytxxyfahbtjojr';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('pawsnpages.site@gmail.com', 'Paws N Pages');
            $mail->addAddress($email, $name);     //Add a recipient

            //Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = 'Dear ' . $name . ',

                            <br/>Thank you for reaching out to us at Paws N Pages. We have received your message, and our team is actively reviewing your inquiry. We appreciate your patience and assure you that we will respond to your inquiry as soon as possible.

                            <br/><br/>Inquiry Details:

                            <br/><b>Name: </b>' . $name .
                '<br/> <b>Email: </b>' . $email .
                '<br/> <b>Subject: </b>' . $subject .
                '<br/> <b>Message: </b>' . $message .
                '<br/> <b>Date and Time of Contact: </b>' . $datetime .

                '<br/><br/>Please retain this information for your reference. If you need to provide any additional details or have further questions, please reply to this email.

                            <br/><br/>Our dedicated support team is committed to providing you with the assistance you need. We strive to address all inquiries promptly and with the utmost care.

                            <br/><br/>Once again, thank you for contacting us. We look forward to resolving your inquiry and providing you with the best possible support.

                            <br/><br/><br/>Best regards,

                            <br/>Paws N Pages';


            $query = mysqli_query($con, "INSERT INTO reports (Sender, Email, Title, Message, DateTimeReported) VALUES ('$name', '$email', '$subject', '$message', '$dateupdated')");
            if ($query) {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>';
                echo 'swal({
                                                    title: "Success",
                                                    text: "Message has been sent & will get back to you as soon as poosible",
                                                    icon: "success",
                                                    html: true,
                                                    showCancelButton: true,
                                                    })
                                                        .then((willDelete) => {
                                                            if (willDelete) {
                                                            
                                                                document.location ="contact.php";
                                                            }
                                                        })';
                echo '</script>';
                $mail->send();
            } else {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
            }
        } catch (Exception $e) {
            // Set error message
            $message = "<span style='color: red'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</span>";
        }
    }
    ?>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>