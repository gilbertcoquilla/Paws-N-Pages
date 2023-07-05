<?php
session_start();
include('config.php');
include('connection.php');

$userID = $_SESSION["id"];
$usertype = $_SESSION['usertype'];

$ret_ca = mysqli_query($con, "SELECT * FROM users, clinics WHERE users.UserID = clinics.UserID AND clinics.UserID='$userID'");
$cnt_ca = 1;
$row_ca = mysqli_fetch_array($ret_ca);

$clinicID = $row_ca['ClinicID'];

$petid = $_GET['petid'];
$_SESSION['petid'] = $petid;

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

        /* Style the tab */
        .tab {
            overflow: auto;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            border-radius: 15px 15px 0px 0px;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #80b434;
            color: white;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
          .card-body {
            display: none;
        }
    </style>
    <script>
        $(document).ready(function() {
            var table = $('#vaccine').DataTable({
                order: [
                    [2, 'asc']
                ],
            });
        });

        $(document).ready(function() {
            var table = $('#assessment').DataTable({
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

        <?php if ($usertype == 'Administrator') { ?>

            <div class="main_content">
                <div style="padding:30px 30px 30px 30px;">
                    <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                        <div class="card-header userProfile-font">
                            <b style="padding-top:10px;">🏷️ Products</b>
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#form_modal" style="float:right; width:5%; height: 35px; border-radius: 15px; padding: 0;">ADD</button>
                        </div>
                        <div class="card-body text-center">
                            <table class="table table-striped table-hover" style="border:0px;">
                                <thead>
                                    <tr class="table100-head">
                                        <th class="column1" style="border:0px;">Clinic</th>
                                        <th class="column1" style="border:0px;">Product Image</th>
                                        <th class="column1" style="border:0px;">Supply Name</th>
                                        <th class="column1" style="border:0px;">Description</th>
                                        <th class="column1" style="border:0px;">Price</th>
                                        <th class="column1" style="border:0px;">Stocks</th>
                                        <th class="column1" style="border:0px;">Needs Prescription</th>
                                    </tr>
                                </thead>

                                <tbody style="border:0px;">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM petsupplies INNER JOIN clinics ON petsupplies.ClinicID = clinics.ClinicID");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {

                                    ?>
                                            <!--Fetch the Records -->
                                            <tr border:0px;>
                                                <td style="text-align: center; border:0px;"><?php echo $row['ClinicName']; ?></td>
                                                <td style="text-align: center; border:0px;"><?php if ($row['SupplyImage'] != "") {
                                                                                                echo '<img src=image_upload/' . $row['SupplyImage'] . ' height=100px; width=100px;';
                                                                                            }
                                                                                            ?>
                                                </td>
                                                <td style="border:0px;"><?php echo $row['SupplyName']; ?></td>
                                                <td style="border:0px;"><?php echo $row['SupplyDescription']; ?></td>
                                                <td style="border:0px;">₱ <?php echo $row['SupplyPrice']; ?></td>
                                                <td style="border:0px;"><?php echo $row['Stocks']; ?></td>
                                                <td style="border:0px;"><?php echo $row['NeedPrescription']; ?></td>
                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                    } else { ?>
                                        <tr style="border:0px;">
                                            <td style="text-align:center; color:red; border:0px;" colspan="8">No Record Found</td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                            <td style="text-align:center; color:red; border:0px; display:none;" colspan="0"></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <?php if ($usertype == 'Clinic Administrator') { ?>

            <!-- START OF PET HEALTH RECORD -->
            <br>
            <div class="main_content" style="padding:30px 30px 30px 30px;">

                <div class="row">
                    <div class="col-xl-12">

                        <!-- START OF VACCINE RECORD -->
                        <div class="card mb-4 mb-xl-0" style="border-radius: 15px;" id="vaccine_tab" name="tab">
                            <!-- <div class="card-header userProfile-font"><b>💉 Vaccine Record</b>
                            </div> -->
                            <div class="tab">
                                <button id="v_tab" class="tablinks active" onclick="showContent('content1', this)">Vaccine</button>
                                <button id="ha_tab" class="tablinks" onclick="showContent('content2', this)">Health Assessment</button>
                            </div>
                            <div class="card-body text-center" id="content1">
                                
                                <div style="padding-bottom:70px;"><button class="btn" type="button" data-toggle="modal" data-target="#vaccine_modal" style="float:right; background-color: #80b434; color: white;">Add</button></div>
                                <table class="table table-striped table-hover" id="vaccine" style="text-align: left; border: 0;">
                                    <thead>
                                        <tr class="table100-head">
                                            <th class="column1" style="border:0px;">Vaccine Name</th>
                                            <th class="column1" style="border:0px;">Brand</th>
                                            <th class="column1" style="border:0px;">Description</th>
                                            <th class="column1" style="border:0px;">Dosage</th>
                                            <th class="column1" style="border:0px;">Lot #</th>
                                            <th class="column1" style="border:0px;">Date Vaccinated</th>
                                            <th class="column1" style="border:0px;">Expiration Date</th>
                                            <th class="column1" style="border:0px;">Vaccinator</th>
                                            <th class="column1" style="border:0px;">Clinic</th>
                                            <th class="column1" style="border:0px;">Action</th>
                                            <!-- <th class="column1">Edit/Delete</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM petvaccine WHERE PetID='$petid'");
                                        $cnt = 1;
                                        $row = mysqli_num_rows($ret);
                                        if ($row > 0) {
                                            while ($row = mysqli_fetch_array($ret)) {

                                        ?>
                                                <!--Fetch the Records -->
                                                <tr>
                                                    <td style="border:0px;">
                                                        <?php echo $row['VaccineName'] ?>
                                                    </td>
                                                    <td style="border:0px;">
                                                        <?php echo $row['Brand']; ?>
                                                    </td>
                                                    <td style="border:0px;">
                                                        <?php echo $row['Description']; ?>
                                                    </td>
                                                    <td style="border:0px;">
                                                        <?php echo $row['Dosage']; ?>
                                                    </td>
                                                    <td style="border:0px;">
                                                        <?php echo $row['LotNo']; ?>
                                                    </td>
                                                    <td style="border:0px;">
                                                        <?php echo $row['DateVaccinated']; ?>
                                                    </td>
                                                    <td style="border:0px;">
                                                        <?php echo $row['ExpirationDate']; ?>
                                                    </td>
                                                    <td style="border:0px;">
                                                        <?php echo $row['Vaccinator']; ?>
                                                    </td>


                                                    <?php
                                                    $clinic = $row['ClinicID'];
                                                    $ret1 = mysqli_query($con, "SELECT * FROM clinics WHERE ClinicID='$clinic'");
                                                    $cnt1 = 1;
                                                    $row1 = mysqli_num_rows($ret1);
                                                    if ($row1 > 0) {
                                                        while ($row1 = mysqli_fetch_array($ret1)) {

                                                    ?>

                                                            <td style="border:0px;">
                                                                <?php echo $row1['ClinicName']; ?>
                                                            </td>


                                                    <?php }
                                                    } ?>

                                                    <td style="border:0px;">
                                                        <a href="" vacc_id="<?php echo $row['VaccineID'] ?>" vacc_name="<?php echo $row['VaccineName'] ?>" vacc_brand="<?php echo $row['Brand'] ?>" vacc_desc="<?php echo $row['Description'] ?>" vacc_dos="<?php echo $row['Dosage'] ?>" vacc_lot="<?php echo $row['LotNo'] ?>" vacc_date="<?php echo $row['DateVaccinated'] ?>" vacc_expiry="<?php echo $row['ExpirationDate'] ?>" vacc_by="<?php echo $row['Vaccinator'] ?>" class="edit" data-toggle="modal" data-target="#edit_vaccine"><i class="fa fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $cnt = $cnt + 1;
                                            }
                                        } else { ?>
                                            <tr>
                                                <th style="text-align:center; border:0; color:red;" colspan="10">No Record Found</th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- END OF VACCINE RECORD -->

                            <!-- START OF HEALTH ASSESSMENT RECORD -->
                        <div class="card-body text-center" id="content2">
                                <div style="padding-bottom:50px;"><button class="btn" type="button" data-toggle="modal" data-target="#assess_modal" style="float:right; background-color: #80b434; color: white;">Add</button></div>
                                <table class="table table-striped table-hover" id="assessment" style="text-align: left; border: 0px;">
                                    <thead>
                                        <tr class="table100-head">
                                            <th class="column1" style="border:0px;">Remarks</th>
                                            <th class="column1" style="border:0px;">Date Assessed</th>
                                            <th class="column1" style="border:0px;">Assessed By</th>
                                            <th class="column1" style="border:0px;">Prescription</th>
                                            <th class="column1" style="border:0px;">Clinic</th>
                                            <th class="column1" style="border:0px;">Action</th>
                                            <!-- <th class="column1">Edit/Delete</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ret = mysqli_query($con, "SELECT * FROM petassessment WHERE PetID='$petid'");
                                        $cnt = 1;
                                        $row = mysqli_num_rows($ret);
                                        if ($row > 0) {
                                            while ($row = mysqli_fetch_array($ret)) {

                                        ?>
                                                <!--Fetch the Records -->
                                                <tr>
                                                    <td style="border:0px;">
                                                        <?php echo $row['Remarks'] ?>
                                                    </td>
                                                    <td style="border:0px;">
                                                        <?php echo $row['DateAssessed']; ?>
                                                    </td>
                                                    <td style="border:0px;">
                                                        <?php echo $row['AssessedBy']; ?>
                                                    </td>
                                                    <td style="border:0px;">
                                                        <?php echo $row['Prescription']; ?>
                                                    </td>

                                                    <?php
                                                    $clinic = $row['ClinicID'];
                                                    $ret1 = mysqli_query($con, "SELECT * FROM clinics WHERE ClinicID='$clinic'");
                                                    $cnt1 = 1;
                                                    $row1 = mysqli_num_rows($ret1);
                                                    if ($row1 > 0) {
                                                        while ($row1 = mysqli_fetch_array($ret1)) {

                                                    ?>

                                                            <td style="border:0px;">
                                                                <?php echo $row1['ClinicName']; ?>
                                                            </td>


                                                    <?php }
                                                    } ?>
                                                     <td style="text-align: center; border:0px;">
                                                        <a href="" ass_id="<?php echo $row['AssessmentID'] ?>" ass_remarks="<?php echo $row['Remarks'] ?>" ass_date="<?php echo $row['DateAssessed'] ?>" ass_by="<?php echo $row['AssessedBy'] ?>" ass_prescription="<?php echo $row['Prescription'] ?>" class="edit" data-toggle="modal" data-target="#edit_assessment"><i class="fa fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $cnt = $cnt + 1;
                                            }
                                        } else { ?>
                                            <tr>
                                                <th style="text-align:center; border:0; color:red;" colspan="6">No Record Found</th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                                <th style="text-align:center; border:0; display:none;"></th>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        <!-- END OF HEALTH ASSESSMENT RECORD -->

                        </div>
                        

                    </div>
                </div>
                <br>
                <a class="btn btn-primary py-2" style="width:10%; border-radius: 15px;" href="petsearch.php">Go Back</a>
            </div>
            <!-- END OF PET HEALTH RECORD -->

        <?php } ?>

        <!-- START OF MODAL FOR ADDING NEW VACCINE RECORD -->
        <div class="modal fade" id="vaccine_modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST" enctype="multipart/form-data" runat="server">
                        <div class="modal-header">
                            <h3 class="modal-title">Add Vaccine Record</h3>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Vaccine Name</label>
                                            <input type="text" name="vname" class="form-control" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label>Brand</label>
                                            <input type="text" name="brand" class="form-control" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="desc" class="form-control" style=" width: 100%;" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Dosage</label>
                                            <input type="text" name="dosage" class="form-control" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label>Lot #</label>
                                            <input type="text" name="lotno" class="form-control" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Date Vaccinated</label>
                                            <input type="date" name="datevacc" class="form-control" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label>Expiry Date</label>
                                            <input type="date" name="expdate" class="form-control" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label>Vaccinator</label>
                                            <input type="text" name="vaccinator" class="form-control" required="required" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button name="add_vaccine" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-save"></span>
                                Add
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END OF MODAL FOR ADDING NEW VACCINE RECORD -->


        <!-- START OF MODAL FOR ADDING NEW PET ASSESSMENT -->
        <div class="modal fade" id="assess_modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST" enctype="multipart/form-data" runat="server">
                        <div class="modal-header">
                            <h3 class="modal-title">Add Health Assessment Record</h3>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea name="remarks" class="form-control" style=" width: 100%;" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Date Assessed</label>
                                    <input type="date" name="date_assessed" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Assessed By</label>
                                    <input type="text" name="assessed_by" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Prescription</label>
                                    <input type="file" name="prescription" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button name="add_assessment" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-save"></span>
                                Add
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END OF MODAL FOR ADDING NEW PET ASSESSMENT -->

        <!-- START OF MODAL FOR EDIT PET ASSESSMENT -->
    <div class="modal fade" id="edit_assessment" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" enctype="multipart/form-data" runat="server" id="form_edit_assess">
                    <div class="modal-header modal-header-success">
                        <h3 class="modal-title">Edit Health Assessment Record</h3>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group" style="display:none;">
                                    <label>Assessment ID</label>
                                    <input type="text" name="AssessmentID" id="AssessmentID" class="form-control" required >
                                </div>
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea name="Remarks" id="Remarks" class="form-control" style=" width: 100%;" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Date Assessed</label>
                                    <input type="date" name="DateAssessed" id="DateAssessed" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Assessed By</label>
                                    <input type="text" name="AssessedBy" id="AssessedBy" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Current Prescription</label>
                                    <div class="row" style="width: 100%;">
                                        <div class="col-8">
                                            <a href="" id="DL_Prescription" target="_blank">
                                                <span id="prescription"></span>
                                            </a>
                                        </div>
                                        <div class="col-4" style="text-align: right;">
                                            <a href="" id="DL_Prescription" target="_blank" download>
                                                Download
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Update Prescription</label>
                                    <input type="file" name="Prescription" id="Prescription" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button name="save_assessment" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-save"></span>Save</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END OF MODAL FOR EDIT ASSESSMENT -->

    <!-- START OF MODAL FOR VACCINE RECORD -->
    <div class="modal fade" id="edit_vaccine" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" enctype="multipart/form-data" runat="server" id="form_edit_vaccine">
                    <div class="modal-header modal-header-success">
                        <h3 class="modal-title">Edit Vaccine Record</h3>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group" style="display:none;">
                                            <label>Vaccine ID</label>
                                            <input type="text" name="VaccineID" id="VaccineID" class="form-control" required="required" />
                                        </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Vaccine Name</label>
                                            <input type="text" name="VaccineName" id="VaccineName" class="form-control" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label>Brand</label>
                                            <input type="text" name="VaccineBrand" id="VaccineBrand" class="form-control" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="VaccineDescription" id="VaccineDescription" class="form-control" style=" width: 100%;" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Dosage</label>
                                            <input type="text" name="VaccineDosage" id="VaccineDosage" class="form-control" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label>Lot #</label>
                                            <input type="text" name="VaccineLotNo" id="VaccineLotNo" class="form-control" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Date Vaccinated</label>
                                            <input type="date" name="DateVaccinated" id="DateVaccinated" class="form-control" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label>Expiry Date</label>
                                            <input type="date" name="ExpirationDate" id="ExpirationDate" class="form-control" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <label>Vaccinator</label>
                                            <input type="text" name="Vaccinator" id="Vaccinator" class="form-control" required="required" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button name="save_vaccine" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-save"></span>Save</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END OF MODAL FOR EDIT VACCINE RECORD -->

    </div>



    <?php
    if (isset($_POST['add_vaccine'])) {
        $vname = $_POST['vname'];
        $brand = $_POST['brand'];
        $desc = $_POST['desc'];
        $dosage = $_POST['dosage'];
        $lotno = $_POST['lotno'];
        $datevacc = $_POST['datevacc'];
        $expdate = $_POST['expdate'];
        $vaccinator = $_POST['vaccinator'];

        $query = mysqli_query($con, "INSERT INTO petvaccine (VaccineName, Brand, Description, Dosage, LotNo, DateVaccinated, ExpirationDate, Vaccinator, PetID, ClinicID) VALUES ('$vname', '$brand', '$desc', '$dosage', '$lotno', '$datevacc', '$expdate', '$vaccinator', '$petid', '$clinicID')");

        if ($query) {
            echo "<script>alert('You have successfully added a vaccine record');</script>";
            echo "<script>event.preventDefault();</script>";
            echo "<script> document.location ='petHealthRecord_admin.php?petid=$petid'; </script>";
        } else {
            echo "<script>alert('Error adding new record.');</script>";
        }
    }

    if (isset($_POST['add_assessment'])) {
        $remarks = $_POST['remarks'];
        $date_assessed = $_POST['date_assessed'];
        $assessed_by = $_POST['assessed_by'];

        // For Prescription
        $file = $_FILES['prescription']['name'];
        $tempfile = $_FILES['prescription']['tmp_name'];
        $folder = "image_upload/" . $file;

        move_uploaded_file($tempfile, $folder);

        $query = mysqli_query($con, "INSERT INTO petassessment (Remarks, DateAssessed, AssessedBy, Prescription, PetID, ClinicID) VALUES ('$remarks', '$date_assessed', '$assessed_by', '$file', '$petid', '$clinicID')");

        if ($query) {
            echo "<script>alert('You have successfully added an assessment');</script>";
            echo "<script>event.preventDefault();</script>";
            echo "<script> document.location ='petHealthRecord_admin.php?petid=$petid'; </script>";
        } else {
            echo "<script>alert('Error adding new record.');</script>";
        }
    }

    if (isset($_POST['save_assessment'])) {
        $assessmentID = $_POST['AssessmentID'];

        $remarks1 = $_POST['Remarks'];
        $d_assessed1 = $_POST['DateAssessed'];
        $assessed_by1 = $_POST['AssessedBy'];

        // For Prescription
        $file1 = $_FILES['Prescription']['name'];
        $tempfile1 = $_FILES['Prescription']['tmp_name'];
        $folder1 = "image_upload/" . $file1;

        move_uploaded_file($tempfile1, $folder1);

        if ($file1 != "") {
            $query = mysqli_query($con, "UPDATE petassessment SET Remarks='$remarks1', DateAssessed='$d_assessed1', AssessedBy='$assessed_by1', Prescription='$file1' WHERE AssessmentID='$assessmentID'");
            
            if ($query) {
                echo "<script>alert('You have successfully updated an assessment');</script>";
                echo "<script>event.preventDefault();</script>";
                echo "<script> document.location ='petHealthRecord_admin.php?petid=$petid'; </script>";
            } else {
                echo "<script>alert('Error updating a record.');</script>";
            }
        } else {
            $query = mysqli_query($con, "UPDATE petassessment SET Remarks='$remarks1', DateAssessed='$d_assessed1', AssessedBy='$assessed_by1' WHERE AssessmentID='$assessmentID'");
            
            if ($query) {
                echo "<script>alert('You have successfully updated an assessment');</script>";
                echo "<script>event.preventDefault();</script>";
                echo "<script> document.location ='petHealthRecord_admin.php?petid=$petid'; </script>";
            } else {
                echo "<script>alert('Error updating a record.');</script>";
            }
        }
        
    }

    if (isset($_POST['save_vaccine'])) {
        $vaccineID = $_POST['VaccineID'];

        $vname1 = $_POST['VaccineName'];
        $brand1 = $_POST['VaccineBrand'];
        $desc1 = $_POST['VaccineDescription'];
        $dosage1 = $_POST['VaccineDosage'];
        $lot_no1 = $_POST['VaccineLotNo'];
        $d_vacc1 = $_POST['DateVaccinated'];
        $exp_date1 = $_POST['ExpirationDate'];
        $vaccinator1 = $_POST['Vaccinator'];

        $query = mysqli_query($con, "UPDATE petvaccine SET VaccineName='$vname1', Brand='$brand1', Description='$desc1', Dosage='$dosage1', LotNo='$lot_no1', DateVaccinated='$d_vacc1', ExpirationDate='$exp_date1', Vaccinator='$vaccinator1' WHERE VaccineID='$vaccineID'");

        if ($query) {
            echo "<script>alert('You have successfully updated a vaccine record');</script>";
            echo "<script>event.preventDefault();</script>";
            echo "<script> document.location ='petHealthRecord_admin.php?petid=$petid'; </script>";
        } else {
            echo "<script>alert('Error updating a record.');</script>";
        }
    }
    ?>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- For Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- Latest compiled and minified JavaScript (needed for editing details on a tabled list of data) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- To show details when editing -->
    <script>
        $('#edit_assessment').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;

            var ass_id = $(opener).attr('ass_id');
            var ass_remarks = $(opener).attr('ass_remarks');
            var ass_date = $(opener).attr('ass_date');
            var ass_by = $(opener).attr('ass_by');
            var ass_prescription = $(opener).attr('ass_prescription');

            $('#form_edit_assess').find('[name="AssessmentID"]').val(ass_id);
            $('#form_edit_assess').find('[name="Remarks"]').val(ass_remarks);
            $('#form_edit_assess').find('[name="DateAssessed"]').val(ass_date);
            $('#form_edit_assess').find('[id="prescription"]').html(ass_prescription);
            $('#form_edit_assess').find('[id="DL_Prescription"]').prop('href', 'image_upload/' + ass_prescription);
            $('#form_edit_assess').find('[name="AssessedBy"]').val(ass_by);

            endResize();
        });

        $('#edit_vaccine').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;

            var vacc_id = $(opener).attr('vacc_id');
            var vacc_name = $(opener).attr('vacc_name');
            var vacc_brand = $(opener).attr('vacc_brand');
            var vacc_desc = $(opener).attr('vacc_desc');
            var vacc_dos = $(opener).attr('vacc_dos');
            var vacc_lot = $(opener).attr('vacc_lot');
            var vacc_date = $(opener).attr('vacc_date');
            var vacc_expiry = $(opener).attr('vacc_expiry');
            var vacc_by = $(opener).attr('vacc_by');
          
            $('#form_edit_vaccine').find('[name="VaccineID"]').val(vacc_id);
            $('#form_edit_vaccine').find('[name="VaccineName"]').val(vacc_name);
            $('#form_edit_vaccine').find('[name="VaccineBrand"]').val(vacc_brand);
            $('#form_edit_vaccine').find('[name="VaccineDescription"]').val(vacc_desc);
            $('#form_edit_vaccine').find('[name="VaccineDosage"]').val(vacc_dos);
            $('#form_edit_vaccine').find('[name="VaccineLotNo"]').val(vacc_lot);
            $('#form_edit_vaccine').find('[name="DateVaccinated"]').val(vacc_date);
            $('#form_edit_vaccine').find('[name="ExpirationDate"]').val(vacc_expiry);
            $('#form_edit_vaccine').find('[name="Vaccinator"]').val(vacc_by);

            endResize();
        });

        function endResize() {
            $(window).off("resize", resizer);
        }

        function displayImg() {
            var img = document.getElementById("Prescription").src;
            window.open(img, '_blank');
        }
    </script>
    <script>

    // FOR TAB LINKS
    function showContent(contentId) {
        // Hide all content elements
        var contentElements = document.getElementsByClassName('card-body');
        for (var i = 0; i < contentElements.length; i++) {
        contentElements[i].style.display = 'none';
        }
        // Show the selected content element
        var selectedContent = document.getElementById(contentId);
        if (selectedContent) {
        selectedContent.style.display = 'block';
        selectedContent.add('active');
        }
        // Add active class to the clicked tab
        tabElement.classList.add('active');
    }

    document.getElementById('content1').style.display = 'block';

    $(document).ready(function(){
        $('.tablinks').on('click', function(){
            $('.tablinks').removeClass('active');
            $(this).addClass('active');
        })
    });
    </script>


</body>

</html>