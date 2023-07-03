<?php
session_start();
include('config.php');
include('connection.php');
$userID = $_SESSION["id"];

/////////////////////////////////////// FOR UPDATING USER PROFILE ///////////////////////////////////////
$newpass = $_POST['newpassword'];

if (isset($_POST['update']) && $newpass != "") {

    $userID = $_POST['userID'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $cnum = $_POST['cnum'];
    $username = $_POST['username'];


    $query = mysqli_query($con, "UPDATE users SET FirstName='$fname', MiddleName='$mname', LastName='$lname', ContactNo='$cnum', Username='$username', Password='$newpass' WHERE UserID='$userID'");

    if ($query) {
        echo "<script>alert('You have successfully your information.');</script>";
        echo "<script> document.location ='clinicadmin.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
if (isset($_POST['update']) && $newpass == "") {

    $userID = $_POST['userID'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $cnum = $_POST['cnum'];
    $username = $_POST['username'];


    $query = mysqli_query($con, "UPDATE users SET FirstName='$fname', MiddleName='$mname', LastName='$lname', ContactNo='$cnum', Username='$username' WHERE UserID='$userID'");

    if ($query) {
        echo "<script>alert('You have successfully your information.');</script>";
        echo "<script> document.location ='clinicadmin.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}

///////////////////////////////// FOR UPDATING CLINIC DETAILS //////////////////////////////////////



if (isset($_POST['update_clinic'])) {

    // Clinic Image/Logo
    $file1 = $_FILES['cliniclogo']['name'];
    $tempfile1 = $_FILES['cliniclogo']['tmp_name'];
    $folder1 = "clinic_verification/" . $file1;
    move_uploaded_file($tempfile1, $folder1);

    // Other Fields
    $clinicName = $_POST['clinicname'];
    $subscriptionType = $_POST['subtype'];
    $subscriptionStatus = $_POST['subscriptionstatus'];
    $otime = $_POST['openhours'];
    $ctime = $_POST['closehours'];
    $daysopened = implode(', ', $_REQUEST['opendays']);
    $lotno_street = $_POST['lotno_street'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $zipcode = $_POST['zipcode'];

    // Query for data insertion

    if ($file1 != "") {
        $query = mysqli_query($con, "UPDATE clinics SET ClinicName='$clinicName', ClinicImage='$file1', OpeningTime='$otime', ClosingTime='$ctime', OperatingDays='$daysopened' WHERE UserID='$userID'");
    } else {
        $query = mysqli_query($con, "UPDATE clinics SET ClinicName='$clinicName', OpeningTime='$otime', ClosingTime='$ctime', OperatingDays='$daysopened' WHERE UserID='$userID'");
    }

    $query_address = mysqli_query($con, "UPDATE address SET LotNo_Street='$lotno_street', Barangay='$barangay', City='$city', Province='$province', ZIPCode='$zipcode' WHERE UserID='$userID'");

    if ($query && $query_address) {
        // echo "<script>alert('You have successfully added an item');</script>";
        echo "<script> document.location ='clinicadmin.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png" type="image/x-icon">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta content="Free HTML Templates" name="keywords">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

    <!-- For Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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
        @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;

        }

        body {
            background-color: white;

        }

        .profile {
            border-bottom: 1px solid #e0e4e8;

        }

        .wrapper {
            display: flex;
            position: relative;
            border-right: 1.5px solid rgb(235, 235, 235);
        }

        .wrapper .sidebar {
            width: 250px;
            height: 100%;
            background: white;
            padding: 30px 0px;
            position: fixed;
            border-right: 1px solid #e0e4e8;
        }

        .wrapper .sidebar h2 {
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 30px;
            border-left: 1px solid #e0e4e8;
        }

        .wrapper .sidebar ul li {
            width: 210px;

            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding: 10px;
        }

        .wrapper .sidebar ul li a {
            color: #80b434;
            display: block;
        }

        .wrapper .sidebar ul li a .fas {
            width: 25px;
        }

        .wrapper .sidebar ul li:hover {
            background-color: #80b434;
        }

        .wrapper .sidebar ul li:hover a {
            color: white;
        }

        .wrapper .sidebar .wrapper .sidebar .social_media {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
        }

        .wrapper .sidebar .social_media a {
            display: block;
            width: 40px;
            background: #80b434;
            height: 40px;
            line-height: 45px;
            text-align: center;
            margin: 0 5px;
            color: #bdb8d7;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .wrapper .main_content {
            width: 100%;
            margin-left: 250px;

        }
    </style>
    <script>
        $(document).ready(function() {
            var table = $('#supplies').DataTable({
                order: [
                    [2, 'asc']
                ],
            });
        });
    </script>

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
    <div class="wrapper">
        <div class="sidebar">
            <div class="profile">
                <table class="profile-container" style="padding-bottom:10px;">
                    <tr>
                        <td width="35%">
                            <img src="https://media.istockphoto.com/id/1337144146/vector/default-avatar-profile-icon-vector.jpg?s=612x612&w=0&k=20&c=BIbFwuv7FxTWvh5S3vB6bkT0Qv8Vn8N5Ffseq84ClGI=" alt="" width="100%" style="border-radius:50%">
                        </td>
                        <td width="65%" style="text-align:center; padding-top:10px">
                            <?php
                            $ret = mysqli_query($con, "SELECT * FROM users WHERE UserID='$userID'");
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <a style="text-transform:uppercase; padding:bottom:1px;"><b><?php echo $row['FirstName'] . ' ' . $row['LastName'] ?></b></a>
                                <a><?php echo $row['Username'] ?></a>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
                <br>
            </div>

            <ul class="nav nav-sidebar">
                <li style="text-transform:uppercase;"><a href=""><b>Dashboard</b></a></li>
                <li style="text-transform:uppercase;"><a href="clinicadmin.php"><b>Profile</b></a></li>
                <li style="text-transform:uppercase;"><a href="supplies.php"><b>Products</b></a></li>
                <li style="text-transform:uppercase;"><a href="users.php"><b>Customers</b></a></li>
                <li style="text-transform:uppercase;"><a href="bookings.php"><b>Bookings</b></a></li>
                <li style="text-transform:uppercase;"><a href="orders_admin.php"><b>Orders</b></a></li>
                <li style="text-transform:uppercase;"><a href="feedbacks_admin.php"><b>Feedback</b></a></li>
                <li style="text-transform:uppercase;"><a href="services.php"><b>Services</b></a></li>

            </ul>
            <div style="padding-top:30px;">
                <center><a href="logout.php" class="btn btn-primary" style="border-radius: 15px; width: 50%; height:20%;">Logout</a></center>
            </div>
        </div>

        <div class="main_content">

            <div style="padding-right:30px; padding-left:30px; padding-top:30px;">
                <div class="row">

                    <div class="col-xl-6">
                        <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                            <div class="card-header userProfile-font">👤 User Details &nbsp; <a href="" data-toggle="modal" title="Delete" style="float:right;" data-target="#update_modal<?php echo $row['userID'] ?>"><i class="material-icons" style="color:dodgerblue;">&#xE254;</i></a></div>
                            <div class="card-body text-center">

                                <div class="userProfile">
                                    <center>
                                        <table class="table">
                                            <tbody>
                                                <?php
                                                $ret = mysqli_query($con, "SELECT * FROM users WHERE UserID='$userID'");
                                                while ($row = mysqli_fetch_array($ret)) {
                                                ?>
                                                    <tr>
                                                        <td><b>Name: &nbsp;&nbsp;</b></td>
                                                        <td>
                                                            <?php echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Contact No: &nbsp;&nbsp;</b></td>
                                                        <td>
                                                            <?php echo $row['ContactNo'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Age: &nbsp;&nbsp;</b></td>
                                                        <td>
                                                            <?php echo $row['Age'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Username: &nbsp;&nbsp;</b></td>
                                                        <td>
                                                            <?php echo $row['Username'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Email: &nbsp;&nbsp;</b></td>
                                                        <td>
                                                            <?php echo $row['Email'] ?>
                                                        </td>
                                                    </tr>

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <br />

                        <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                            <div class="card-header userProfile-font">🏥 Clinic Details &nbsp; <a href="" data-toggle="modal" title="Delete" style="float:right;" data-target="#clinic_modal<?php echo $row['userID'] ?>"><i class="material-icons" style="color:dodgerblue;">&#xE254;</i></a></div>
                            <div class="card-body text-center">
                                <div class="userProfile">
                                    <center>
                                        <table class="table">
                                            <tbody>
                                                <?php
                                                $ret = mysqli_query($con, "SELECT * FROM address, clinics, users WHERE address.UserID = users.UserID AND clinics.UserID = users.UserID AND users.UserID='$userID'");
                                                while ($row = mysqli_fetch_array($ret)) {
                                                ?>
                                                    <center>
                                                        <?php if ($row['ClinicImage'] != "") {
                                                            echo '<img class="img-fluid" src=image_upload/' . $row['ClinicImage'] . ' height=200px; width=200px;';
                                                        }
                                                        ?>
                                                    </center>
                                                    <br />
                                                    <br />
                                                    <tr>
                                                        <td><b>Clinic Name: &nbsp;&nbsp;</b></td>
                                                        <td>
                                                            <?php echo $row['ClinicName'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Clinic Address: &nbsp;&nbsp;</b></td>
                                                        <td>
                                                            <?php echo $row['LotNo_Street'] . ', Brgy. ' . $row['Barangay'] . ',  ' . $row['City'] . '<br/>'  . $row['Province'] . ',' . $row['ZIPCode']  ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Operating Hours: &nbsp;&nbsp;</b></td>
                                                        <td>
                                                            <?php echo date('h:i A', strtotime($row['OpeningTime'])) . ' - ' . date('h:i A', strtotime($row['ClosingTime'])) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Operating Days: &nbsp;&nbsp;</b></td>
                                                        <td>
                                                            <?php echo $row['OperatingDays'] ?>
                                                        </td>
                                                    </tr>

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">

                        <?php
                        $ret = mysqli_query($con, "SELECT * FROM address, clinics, users WHERE address.UserID = users.UserID AND clinics.UserID = users.UserID AND users.UserID='$userID'");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                            <div class="card mb-4" style="border-radius: 15px;">
                                <div class="card-header userProfile-font">🔔 Subscription Details &nbsp;</div>
                                <div class="card-body">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td><b>Subscription No.: &nbsp;&nbsp;</b></td>
                                                <td>
                                                    <?php echo $row['subscriptionNo'] ?><br />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Date of Subscription &nbsp;&nbsp;</b></td>
                                                <td>
                                                    <?php echo $row['DateOSubscription'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Expiry Date of Subscription &nbsp;&nbsp;</b></td>
                                                <td>
                                                    <?php echo $row['ExpiryDateOfSub'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Subscription Status: &nbsp;&nbsp;</b></td>
                                                <td>
                                                    <?php echo $row['SubscriptionStatus'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Subscription Type: &nbsp;&nbsp;</b></td>
                                                <td>
                                                    <?php echo $row['SubscriptionType'] ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- END OF PET PROFILE -->
                </div>
            </div>
            <!-- END OF PROFILE -->
        </div>


        <!-- START OF MODAL FOR EDIT USER PROFILE -->
        <div class="modal fade" id="update_modal<?php echo $row['userID'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST">
                        <div class="modal-header modal-header-success">
                            <h3 class="modal-title">Edit Profile</h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-2"></div>
                            <div class="col-md-12">
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM users WHERE UserID='$userID'");
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-4">
                                            <label>First Name</label>
                                            <input type="hidden" name="userID" value="<?php echo $row['UserID'] ?>" />
                                            <input type="text" name="fname" value="<?php echo $row['FirstName'] ?>" class="form-control" />
                                        </div>
                                        <div class="col-md-4">
                                            <label>Middle Name</label>
                                            <input type="text" name="mname" value="<?php echo $row['MiddleName'] ?>" class="form-control" />
                                        </div>
                                        <div class="col-md-4">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" value="<?php echo $row['LastName'] ?>" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label>Contact No.</label>
                                            <input type="text" name="cnum" value="<?php echo $row['ContactNo'] ?>" class="form-control" />
                                        </div>
                                        <div class="col-md-6">
                                            <label>Age</label>
                                            <input type="text" name="age" value="<?php echo $row['Age'] ?>" class="form-control" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" value="<?php echo $row['Username'] ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" value="<?php echo $row['Email'] ?>" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" value="<?php echo $row['Password'] ?>" class="form-control" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="newpassword" class="form-control" />
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button name="update" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-edit"></span>
                                Update</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <!-- END OF MODAL FOR EDIT USER PROFILE -->

        <!-- START OF MODAL FOR EDIT CLINIC DETAILS -->
        <div class="modal fade" id="clinic_modal<?php echo $row['userID'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST" runat="server">
                        <div class="modal-header modal-header-success">
                            <h3 class="modal-title">Edit Profile</h3>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-2"></div>
                            <div class="col-md-12">
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM address, clinics, users WHERE address.UserID = users.UserID AND clinics.UserID = users.UserID AND users.UserID='$userID'");
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                    <div class="row gx-3 mb-3">
                                        <label>Clinic Logo</label>
                                    </div>
                                    <center>
                                        <img id="ciniclogo" src="<?php echo 'image_upload/' . $row['ClinicImage']; ?>" height="100px" ; width="100px;" /><br /><br />
                                        <input type="file" id="cliniclogo" name="cliniclogo" />
                                        <span name="old" value="<?php echo $row['ClinicImage']; ?>">Current:
                                            <?php echo $row['ClinicImage']; ?>
                                        </span>
                                    </center>

                                    <div class="row gx-3 mb-3">
                                        <label>Clinic Name</label>
                                        <input type="text" name="clinicname" value="<?php echo $row['ClinicName'] ?>" class="form-control" />
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-12">
                                            <label>Clinic Address</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label>House/Lot No. & Street</label>
                                            <input type="text" name="lotno_street" class="form-control" value="<?php echo $row['LotNo_Street'] ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Province</label>
                                            <input type="text" name="province" class="form-control" value="NCR" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>City</label>
                                            <input type="text" name="city" class="form-control" value="Quezon City" readonly>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-4">
                                            <label>Barangay</label>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT BarangayName FROM Barangay");
                                            $data = $sql->fetch_all(MYSQLI_ASSOC);
                                            ?>
                                            <select id="barangay" style="height: 60%; width: 100%; border-radius: 5px;" class="bg-light border-0 px-4 py-3" name="barangay" placeholder="Barangay" required>
                                                <option value="<?php echo $row['Barangay'] ?>" selected hidden><?php echo $row['Barangay'] ?></option>
                                                <?php foreach ($data as $row1) : ?>
                                                    <option value="<?= htmlspecialchars($row1['BarangayName']) ?>">
                                                        <?= htmlspecialchars($row1['BarangayName']) ?>
                                                    </option>
                                                <?php endforeach ?>
                                                <!-- <option value="'.htmlspecialchars($barangay).'"></option>' -->
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>ZIP Code</label>
                                            <input type="text" name="zipcode" style="height: 60%;" class="form-control" value="<?php echo $row['ZIPCode'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label>Opening Hours</label>
                                            <input type="time" name="openhours" value="<?php echo $row['OpeningTime'] ?>" class="form-control" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Closing Hours</label>
                                            <input type="time" name="closehours" value="<?php echo $row['ClosingTime'] ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-12">
                                            <label>Operating Days</label><br>
                                            <?php
                                            $interest = array(); // initializing  
                                            while ($row = mysqli_fetch_array($ret)) {
                                                $interest[] = $row['OperatingDays']; // store in an array
                                            }


                                            ?>


                                            <input type="checkbox" name="opendays[]" value="<?php echo $operatingdays; ?>" size="17" <?php if ($interest == 'Sunday') echo "checked='checked'"; ?> />Sunday




                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                                <div class="modal-footer">
                                    <button name="update_clinic" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-edit"></span>
                                        Update</button>
                                    <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
            <!-- END OF MODAL FOR EDIT CLINIC DETAILS -->

</body>

</html>