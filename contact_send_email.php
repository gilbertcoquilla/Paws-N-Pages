<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);

if (isset($_POST['submit'])) {

    $sender = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    //Server settings
    //$mail->SMTPDebug = 1;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'b.admuser0822@gmail.com';
    $mail->Password = 'Benilde0822';
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    //Recipients
    $mail->setFrom('b.admuser0822@gmail.com', 'Manager');
    $mail->addAddress($email, $sender);

    //Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = '<p>Greetings, <b>' . $sender . '</b>! The management has received
                    your concern. Here is your message: <br/><br/>"<b>' . $message . '</b>"<br/><br/>
                    Thank you for sending your concern to us! <br/>
                    Regards, <br/>
                    <b>The Management</b></p>';

    echo "<script>alert('Email successfully sent.');</script>";
    echo "<script>window.location.href = 'index.php'</script>";
} else {
    echo "<script>alert('Please check the form if you missed anything and try again.');</script>";
    echo "<script>window.location.href = 'index.php'</script>";
}

$mail->smtpClose();
