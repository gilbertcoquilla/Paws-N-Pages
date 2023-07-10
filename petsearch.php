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

if (isset($_POST['save_pet'])) {

    $file = $_FILES['image']['name'];
    $tempfile = $_FILES['image']['tmp_name'];
    $folder = "image_upload/" . $file;

    move_uploaded_file($tempfile, $folder);

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stocks = $_POST['stocks'];
    $prescription = $_POST['prescription'];

    $query = mysqli_query($con, "INSERT INTO petsupplies (SupplyImage, SupplyName, SupplyDescription, SupplyPrice, Stocks, NeedPrescription, ClinicID) VALUES ('$file', '$name', '$description', '$price', '$stocks', '$prescription', '$clinicID')");

    if ($query) {
        echo "<script>alert('You have successfully added a new product');</script>";
        echo "<script> document.location ='supplies.php'; </script>";
    } else {
        echo "<script>alert('Error adding new pet.');</script>";
    }
}

if (isset($_POST['update'])) {

    $eid = $_POST['SupplyID'];

    $file1 = $_FILES['SupplyImage']['name'];
    $tempfile1 = $_FILES['SupplyImage']['tmp_name'];
    $folder1 = "image_upload/" . $file1;

    move_uploaded_file($tempfile1, $folder1);

    $Uname = $_POST['SupplyName'];
    $Udescription = $_POST['SupplyDescription'];
    $Uprice = $_POST['SupplyPrice'];
    $Ustocks = $_POST['Stocks'];
    $Uprescription = $_POST['NeedPrescription'];

    if ($file1 != "") {
        $query = mysqli_query($con, "UPDATE petsupplies SET SupplyImage='$file1', SupplyName='$Uname', SupplyDescription='$Udescription', SupplyPrice='$Uprice', Stocks='$Ustocks', NeedPrescription='$Uprescription' WHERE SupplyID='$eid'");

        if ($query) {
            echo "<script>alert('You have successfully updated a product');</script>";
            echo "<script> document.location ='supplies.php'; </script>";
        } else {
            echo "<script>alert('Error updating data.');</script>";
        }
    } else {
        $e_query = mysqli_query($con, "UPDATE petsupplies SET SupplyName='$Uname', SupplyDescription='$Udescription', SupplyPrice='$Uprice', Stocks='$Ustocks', NeedPrescription='$Uprescription' WHERE SupplyID='$eid'");

        if ($e_query) {
            echo "<script>alert('You have successfully updated a product');</script>";
            echo "<script> document.location ='supplies.php'; </script>";
        } else {
            echo "<script>alert('Error updating data.');</script>";
        }
    }
}



///////////////////// FOR DELETING PET ////////////////////////////  
if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = mysqli_query($con, "DELETE FROM petsupplies WHERE SupplyID=$rid");
    echo "<script>alert('You have successfully deleted a record.');</script>";
    echo "<script>window.location.href = 'supplies.php'</script>";
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

    <script>
        $(document).ready(function() {

            $('.edit').on('click', function() {

                $('#edit_modal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[1]);
                $('#SupplyName').val(data[2]);
                $('#SupplyDescription').val(data[3]);
                $('#SupplyPrice').val(data[4]);
                $('#Stocks').val(data[5]);
                $('#NeedPrescription').val(data[6]);
            });
        });
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
                <?php if ($usertype == 'Administrator') { ?>
                    <li style="text-transform:uppercase;"><a href="users.php"><b>Users</b></a></li>
                <?php } ?>
                <li style="text-transform:uppercase;"><a href="bookings.php"><b>Bookings</b></a></li>
                <li style="text-transform:uppercase;"><a href="orders_admin.php"><b>Orders</b></a></li>
                <li style="text-transform:uppercase;"><a href="feedbacks_admin.php"><b>Feedback</b></a></li>
                <li style="text-transform:uppercase;"><a href="services.php"><b>Services</b></a></li>
                <li style="text-transform:uppercase;"><a href="petsearch.php"><b>Pet Records</b></a></li>
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

            <div class="main_content">
                <div style="padding:30px 30px 30px 30px;">
                    <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                        <div class="card-header userProfile-font">
                            <b style="padding-top:10px;">🐾 View Pet Records</b>
                        </div>
                        <div class="card-body text-center">

                            <br>
                            <form method="POST" enctype="multipart/form-data" runat="server">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1" style="padding-top: 8px;">
                                            <label style="text-align: right;">Pet ID</label>
                                        </div>
                                        <div class="col-3">
                                            <input type="text" name="petid" class="form-control" required />
                                        </div>
                                        <div class="col-2" style="text-align: left;">
                                            <button name="search_pet" class="btn btn-primary" style="border-radius: 10px; font-size: 20px;"><span class="glyphicon glyphicon-save"></span>
                                                Search
                                            </button>
                                        </div>
                                        <div class="col-6">

                                        </div>
                                    </div>
                                </div>
                            </form>

                            <br>


                            <?php
                            if (isset($_POST['search_pet'])) {
                                $petid = $_POST['petid'];
                                $query = mysqli_query($con, "SELECT * FROM pets WHERE PetUniqueID='$petid'");
                                $row = mysqli_fetch_array($query);

                                if ($row > 0) {
                            ?>
                                    <table class="table table-striped table-hover" style="border: 0px; text-align: left;">
                                        <thead>
                                            <tr class="table100-head">
                                                <th class="column1" style="border:0px;">Pet ID</th>
                                                <th class="column1" style="border:0px;">Pet Name</th>
                                                <th class="column1" style="border:0px;">Species</th>
                                                <th class="column1" style="border:0px;">Breed</th>
                                                <th class="column1" style="border:0px;">Birthdate</th>
                                                <th class="column1" style="border:0px; text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="border:0px;"><?php echo $row['PetUniqueID'] ?></td>
                                                <td style="border:0px;"><?php echo $row['PetName'] ?></td>
                                                <td style="border:0px;"><?php echo $row['Species'] ?></td>
                                                <td style="border:0px;"><?php echo $row['Breed'] ?></td>
                                                <td style="border:0px;"><?php echo $row['BirthDate'] ?></td>
                                                <td style="border:0px; text-align: center;"><a href="petHealthRecord_admin.php?petid=<?php echo $row['PetID'] ?>">View Health Record</a></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                <?php
                                } else {
                                ?>

                                    <table class="table table-striped table-hover" style="border: 0px; text-align: left;">
                                        <thead>
                                            <tr class="table100-head">
                                                <th class="column1" style="border:0px;">Pet ID</th>
                                                <th class="column1" style="border:0px;">Pet Name</th>
                                                <th class="column1" style="border:0px;">Species</th>
                                                <th class="column1" style="border:0px;">Breed</th>
                                                <th class="column1" style="border:0px;">Birthdate</th>
                                                <th class="column1" style="border:0px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align:center; color:red; border:0px;" colspan="6">No record found</td>
                                            </tr>
                                        </tbody>
                                    </table>

                            <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>



    </div>

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
        $('#edit_modal').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;

            var supply_id = $(opener).attr('supply-id');
            var supply_image = $(opener).attr('supply-image');
            var supply_name = $(opener).attr('supply-name');
            var supply_desc = $(opener).attr('supply-desc');
            var supply_price = $(opener).attr('supply-price');
            var stocks = $(opener).attr('stocks');
            var need_presc = $(opener).attr('need-presc');

            $('#form_edit_supply').find('[name="SupplyID"]').val(supply_id);
            $('#form_edit_supply').find('[name="SupplyImage_c"]').prop('src', 'image_upload/' + supply_image);
            $('#form_edit_supply').find('[name="SupplyName"]').val(supply_name);
            $('#form_edit_supply').find('[name="SupplyDescription"]').val(supply_desc);
            $('#form_edit_supply').find('[name="SupplyPrice"]').val(supply_price);
            $('#form_edit_supply').find('[name="Stocks"]').val(stocks);
            $('#form_edit_supply').find('[name="NeedPrescription"]').val(need_presc);

            endResize();
        });

        function endResize() {
            $(window).off("resize", resizer);
        }
    </script>

</body>

</html>