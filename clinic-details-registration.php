<?php

session_start();
include('config.php');
include('connection.php');

$email = $_SESSION['email'];

if (isset($_POST['submit'])) {

    // Clinic Image/Logo
    $file1 = $_FILES['cliniclogo']['name'];
    $tempfile1 = $_FILES['cliniclogo']['tmp_name'];
    $folder1 = "clinic_verification/" . $file1;

    move_uploaded_file($tempfile1, $folder1);

    // DTI Certificate of Registration
    $file2 = $_FILES['dticert']['name'];
    $tempfile2 = $_FILES['dticert']['tmp_name'];
    $folder2 = "clinic_verification/" . $file2;

    move_uploaded_file($tempfile2, $folder2);

    // Business Permit
    $file3 = $_FILES['businesspermit']['name'];
    $tempfile3 = $_FILES['businesspermit']['tmp_name'];
    $folder3 = "clinic_verification/" . $file3;

    move_uploaded_file($tempfile3, $folder3);

    // DTI Registered Business Name
    $file4 = $_FILES['businessname']['name'];
    $tempfile4 = $_FILES['businessname']['tmp_name'];
    $folder4 = "clinic_verification/" . $file4;

    move_uploaded_file($tempfile4, $folder4);

    // Other Fields
    $clinicName = $_POST['clinicname'];
    $subscriptionType = $_POST['subtype'];
    $subscriptionStatus = $_POST['subscriptionstatus'];
    $otime = $_POST['openhours'];
    $ctime = $_POST['closehours'];
    $daysopened = implode(', ', $_REQUEST['opendays']);

    $userID = $_POST['userID'];
    $_SESSION['userID_reg'] = $userID;

    // Query for data insertion
    $query = mysqli_query($con, "INSERT INTO clinics (ClinicName, ClinicImage, BusinessPermit, BusinessNameReg, CertificateOfReg, SubscriptionType, SubscriptionStatus, UserID, OpeningTime, ClosingTime, OperatingDays) 
    VALUES ('$clinicName', '$file1', '$file3', '$file4', '$file2', '$subscriptionType', '$subscriptionStatus', '$userID', '$otime', '$ctime', '$daysopened')");

    if ($query) {
        // echo "<script>alert('You have successfully added an item');</script>";
        echo "<script> document.location ='registration-address.php'; </script>";
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
    <link rel="icon" href="https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png"
        type="image/x-icon">
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
    <script>
        function preview() {
            image.src = URL.createObjectURL(event.target.files[0]);
        }

        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function () {
                    $("#cliniclogo").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
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


                            <div class="col-12">
                                <h5 class="display-5 text-primary text-uppercase mb-0 text-center">Clinic Details 🏥
                                </h5>
                            </div>

                            <!-- For getting userID -->
                            <?php
                            $ret = mysqli_query($con, "SELECT * FROM users WHERE Email='$email'");
                            $cnt = 1;
                            $row = mysqli_num_rows($ret);
                            if ($row > 0) {
                                while ($row = mysqli_fetch_array($ret)) {

                                    ?>
                                    <div class="col-12" style="display: none;">
                                        <input type="text" name="userID" class="form-control  bg-light border-0 px-4 py-3"
                                            value="<?php echo $row['UserID'] ?>">
                                    </div>

                                    <?php
                                    $cnt = $cnt + 1;
                                }
                            }
                            ?>

                            <div class="col-12">
                                <input type="text" name="clinicname" class="form-control  bg-light border-0 px-4 py-3"
                                    placeholder="Clinic Name" required>
                            </div>
                            <div class="col-6">
                                <p>Opening Hours</p>
                                <input type="time" name="openhours" class="form-control  bg-light border-0 px-4 py-3"
                                    required>
                            </div>
                            <div class="col-6">
                                <p>Closing Hours</p>
                                <input type="time" name="closehours" class="form-control  bg-light border-0 px-4 py-3"
                                    required>
                            </div>
                            <div class="col-`1`">
                                <p>Operating Days</p>
                                <input type="checkbox" name="opendays[]" value="Sunday"> Sunday &nbsp;&nbsp;
                                <input type="checkbox" name="opendays[]" value="Monday"> Monday &nbsp;&nbsp;
                                <input type="checkbox" name="opendays[]" value="Tuesday"> Tuesday &nbsp;&nbsp;
                                <input type="checkbox" name="opendays[]" value="Wednesday"> Wednesday &nbsp;&nbsp;
                                <input type="checkbox" name="opendays[]" value="Thursday"> Thursday &nbsp;&nbsp;
                                <input type="checkbox" name="opendays[]" value="Friday"> Friday &nbsp;&nbsp;
                                <input type="checkbox" name="opendays[]" value="Saturday"> Saturday
                            </div>
                            <div class="col-6">
                                <p> Clinic Logo </p>
                                <!-- <img id="cliniclogo" src="" width="100px" /> -->
                                <input type="file" name="cliniclogo" class="form-control  bg-light border-0 px-4 py-3"
                                    onchange="previewFile(this);" />
                            </div>
                            <div class="col-6">
                                <p> Upload DTI Certificate of Registration </p>
                                <input type="file" name="dticert" class="form-control  bg-light border-0 px-4 py-3"
                                    placeholder="DTI Certificate of Registration" required>
                            </div>
                            <div class="col-6">
                                <p>Upload Business Permit</p>
                                <input type="file" name="businesspermit"
                                    class="form-control  bg-light border-0 px-4 py-3" placeholder="Business Permit"
                                    required>
                            </div>
                            <div class="col-6">
                                <p>Upload DTI Registered Business Name</p>
                                <input type="file" name="businessname" class="form-control  bg-light border-0 px-4 py-3"
                                    placeholder="Business Name" required>
                            </div>
                            <div class="col-6">
                                <p>Subscription Type</p>
                                <select name="subtype" id="subtype" class="form-control  bg-light border-0 px-4 py-3">
                                    <option value="selectoption" disabled selected>-- Select an option --</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="annually">Annually</option>
                                </select>
                            </div>
                            <div class="col-12" style="display: none;">
                                <input type="text" name="subscriptionstatus"
                                    class="form-control  bg-light border-0 px-4 py-3" placeholder="Subscription Status"
                                    value="Inactive">
                            </div>

                            <div class="col-12"></div>
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn btn-primary w-100 py-3">Submit</button>
                            </div>
                            <div class="col-12"></div>
                        </div>

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