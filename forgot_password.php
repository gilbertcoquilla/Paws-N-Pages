<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';

    if(isset($_POST['reset'])) {
        $email = $_POST['email'];
    
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'pawsnpages.site@gmail.com';                     // SMTP username
        $mail->Password   = 'zbytxxyfahbtjojr';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('pawsnpages.site@gmail.com', 'Admin');
        $mail->addAddress($email);     // Add a recipient
        $dateupdated = date_create('now')->format('Y-m-d H:i:s');
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Password Reset';
        $mail->Body    = 'To reset your password click <a href="http://localhost:1234/PawsNPages/change_password.php"> here </a> . ';
        $conn = mysqli_connect("localhost", "root", "", "pawsnpages_db") or die('Unable to connect');
        $verifyQuery = $conn->query("SELECT * FROM users WHERE email = '$email'");
        if($verifyQuery->num_rows) {
            $codeQuery = $conn->query("UPDATE users SET date_updated = '$dateupdated' WHERE email = '$email'");
                
            $mail->send();
            echo "<script>alert('Message has been sent, check your email');</script>";
            echo "<script>window.location.href = 'login.php'</script>";
        }else{
            echo "<script>alert('Message has been sent, check your email');</script>";
        }
        $conn->close();
    
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
    }    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages</title>
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
                        <div class="row g-3 bg-dark">
                            <div class="col-6 ">
                                <input type="button" class="btn btn-primary w-100 py-3" onclick="window.location='registration.php'" value="SIGN UP">                      
                            </div>
                            <div class="col-6">
                                <input type="button" class="btn btn-outline-light w-100 py-3" onclick="window.location='login.php'" value="LOG IN">
                            </div>
                            <div class="col-12">
                                <h5 class="display-5 text-primary text-uppercase mb-0 text-center">Password Reset</h5>
                            </div>
                            <div class="col-6">
                                <input type="text" name="email" id="email" class="form-control  bg-light border-0 px-4 py-3" placeholder="Email Address" required>
                            </div>
                            <div class="col-6">
                                <button type="submit" name="reset" class="btn btn-primary w-100 py-3">Reset</button>                            
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