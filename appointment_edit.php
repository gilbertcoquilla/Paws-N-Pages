<?php

session_start();
include('config.php');

$userID = $_SESSION["id"];

include('connection.php');

if (isset($_POST['submit'])) {

    $eid = $_GET['editid'];

    // For booking an appointment
    $userID = $_POST['userID'];
    $service = $_POST['service'];
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];
    $notes = $_POST['notes'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];

    // Query for updating data
    $query = mysqli_query($con, "UPDATE appointments SET PreferredDate='$appointmentDate', PreferredTime='$appointmentTime', AppointmentStatus='$status', Remarks='$remarks' WHERE AppointmentID='$eid'");

    if ($query) {
        echo "<script>alert('You have successfully edited an appointment');</script>";
        echo "<script> document.location ='appointment.php'; </script>";
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
    <title>Edit Appointment Details</title>
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

    <script type="text/javascript">
        function preview() {
            image.src = URL.createObjectURL(event.target.files[0]);
        }

        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#image").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>

</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/gm1.jpg')">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

                <h4>
                    <b>Edit Appointment Details</b>
                </h4>
                <br>
                <form method="POST" enctype="multipart/form-data" runat="server">

                    <?php
                    $eid = $_GET['editid'];
                    // $ret = mysqli_query($con, "SELECT appointments.AppointmentID, appointments.Notes, appointments.PreferredDate, appointments.PreferredTime, appointments.AppointmentStatus, appointments.Remarks, services.ServiceName, users.FirstName, users.MiddleName, users.LastName FROM appointments INNER JOIN services ON appointments.ServiceID = services.ServiceID INNER JOIN users ON appointments.UserID = users.UserID WHERE AppointmentID='$eid'");
                    $ret = mysqli_query($con, "SELECT * FROM appointments, clinics, users WHERE appointments.UserID = users.UserID AND clinics.UserID = users.UserID AND AppointmentID='$eid'");
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>

                        <!--2-->
                        <div class="wrap-input100 validate-input m-b-23">
                            <p>Appointment Date</p>
                            <input type="date" id="appointmentDate" name="appointmentDate" value="<?php echo $row['PreferredDate'] ?>" />
                            <br>
                        </div>

                        <!--3-->
                        <div class="wrap-input100 validate-input m-b-23">
                            <p>Appointment Time</p>
                            <input type="time" id="appointmentTime" name="appointmentTime" value="<?php echo $row['PreferredTime'] ?>" />
                            <br>
                        </div>

                        <br>

                        <!--4-->
                        <div class="wrap-input100 validate-input m-b-23">
                            <p>Availed Services</p>
                            <input type="text" id="service" name="service" value="<?php echo $row['AvailedServices'] ?>" readonly />
                            <br>
                        </div>

                        <!--4-->
                        <div class="wrap-input100 validate-input m-b-23">
                            <p>Status</p>
                            <input type="text" id="status" name="status" value="<?php echo $row['AppointmentStatus'] ?>" />
                            <br>
                        </div>

                        <!--4-->
                        <div class="wrap-input100 validate-input m-b-23">
                            <p>Remarks</p>
                            <input type="text" id="remarks" name="remarks" value="<?php echo $row['Remarks'] ?>" />
                            <br>
                        </div>

                        <!--5-->
                        <div class="wrap-input100 validate-input m-b-23">
                            <p>Client</p>
                            <input type="text" id="userID" name="userID" value="<?php echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName']; ?>" readonly />
                            <br>
                        </div>

                    <?php } ?>
                    <br>
                    <div class="btnsub">
                        <button name="submit" class="btn btn-success">
                            Save
                        </button>
                    </div>
                </form>
                <div>
                    <form action="appointment.php">
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