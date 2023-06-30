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

    $eid = $POST['update_id'];

    $file = $_FILES['image']['name'];
    $tempfile = $_FILES['image']['tmp_name'];
    $folder = "image_upload/" . $file;

    move_uploaded_file($tempfile, $folder);

    $Uname = $_POST['SupplyName'];
    $Udescription = $_POST['SupplyDescription'];
    $Uprice = $_POST['SupplyPrice'];
    $Ustocks = $_POST['Stocks'];
    $Uprescription = $_POST['NeedPrescription'];

    $query = mysqli_query($con, "UPDATE petsupplies SET SupplyImage = ' HI ', SupplyName = '$Uname', SupplyDescription = '$Udescription', SupplyPrice = '$Uprice', Stocks = '$Ustocks', NeedPrescription = '$Uprescription' WHERE SupplyID = '$eid' ");

    if ($query) {
        echo "<script>alert('You have successfully updated a new product');</script>";
        echo "<script> document.location ='supplies.php'; </script>";
    } else {
        echo "<script>alert('Error updating data.');</script>";
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
                        <td width="35%" style="padding-left:10px">
                            <img src="img/user.png" alt="" width="100%" style="border-radius:50%">
                        </td>
                        <td width="65%" style="text-align:center; padding-top:10px">
                            <?php
                            $ret = mysqli_query($con, "SELECT * FROM users WHERE UserID='$userID'");
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <p><?php echo $row['FirstName'] . ' ' . $row['LastName'] ?>
                                    <?php echo $row['Username'] ?></p>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
                <br>
            </div>
            <ul class="nav nav-sidebar">
                <li style="text-transform:uppercase;"><a href=""><i class="fa fa-home"></i>&nbsp;<b>Dashboard</b></a></li>
                <li style="text-transform:uppercase;"><a href="clinicadmin.php"><i class="fa fa-user"></i>&nbsp;<b>Profile</b></a></li>
                <li style="text-transform:uppercase;"><a href="supplies.php"><i class="fa fa-address-card"></i>&nbsp;<b>Products</b></a></li>
                <li style="text-transform:uppercase;"><a href="users.php"><i class="fa-solid fa-user"></i>&nbsp;<b>Customers</b></a></li>
                <li style="text-transform:uppercase;"><a href="bookings.php"><i class="fa fa-solid fa-calendar"></i>&nbsp;<b>Bookings</b></a></li>

            </ul>
            <div class="social_media">

            </div>
        </div>

        <!-- START OF ADMINISTRATOR -->
            <div class="main_content">
                <div style="padding:30px 30px 30px 30px;">
                    <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                        <div class="card-header userProfile-font">
                            <b style="padding-top:10px;">👤 Users</b>
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#form_modal" style="float:right; width:5%; height: 35px; border-radius: 15px; padding: 0;">ADD</button>
                        </div>
                        <div class="card-body text-center">
                            <table class="table table-striped table-hover" style="border:0px;" id="supplies">
                                <thead>
                                    <tr class="table100-head">
                                        <th class="column1" style="border:0px;"></th>
                                        <th class="column1" style="border:0px;">Name</th>
                                        <th class="column1" style="border:0px;">Address</th>
                                        <th class="column1" style="border:0px;">Contact No.</th>
                                        <th class="column1" style="border:0px;">Age</th>
                                        <th class="column1" style="border:0px;">UserType</th>
                                        <th class="column1" style="border:0px;">Email</th>
                                        <th class="column1" style="border:0px;">Username</th>
                                        <th class="column1" style="border:0px;">Date Modified</th>
                                        <th class="column1" style="border:0px;">Action</th>
                                    </tr>
                                </thead>

                                <tbody style="border:0px;">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM address, users WHERE address.userID = users.userID AND users.UserType != 'Administrator'");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                            <!--Fetch the Records -->
                                            <tr border:0px;>
                                                <td style="text-align: center; border:0px;"><?php echo $cnt; ?></td>
                                                <td style="text-align: center; border:0px;"> <?php echo $row['FirstName'] . ' ' .  $row['MiddleName'] . ' ' . $row['LastName'] ?></td>
                                                <td style="border:0px;"><?php echo $row['LotNo_Street'] . ', Brgy. ' . $row['Barangay'] . ',  ' . $row['City']  . ',  ' . $row['ZIPCode']?><br /></td>
                                                <td style="border:0px;"><?php echo $row['ContactNo']; ?></td>
                                                <td style="border:0px;">₱ <?php echo $row['Age']; ?></td>
                                                <td style="border:0px;"><?php echo $row['UserType']; ?></td>
                                                <td style="border:0px;"><?php echo $row['Email']; ?></td>
                                                <td style="border:0px;"><?php echo $row['Username']; ?></td>
                                                <td style="border:0px;"><?php echo $row['DateModified']; ?></td>
                                                <td style="text-align: center; border:0px;">
                                                    <a user-id="<?php echo $row['UserID'] ?>" user-fname="<?php echo $row['FirstName'] ?>" user-mname="<?php echo $row['MiddleName'] ?>" user-lname="<?php echo $row['LastName'] ?>" user-lotnostreet="<?php echo $row['LotNo_Street'] ?>" user-province="<?php echo $row['Province'] ?>" user-barangay="<?php echo $row['Barangay'] ?>" user-city="<?php echo $row['City'] ?>" user-zipcode="<?php echo $row['ZIPCode'] ?>" user-cnum="<?php echo $row['ContactNo'] ?>" user-age="<?php echo $row['Age'] ?>" user-utype="<?php echo $row['UserType'] ?>" user-email="<?php echo $row['Email'] ?>" user-username="<?php echo $row['Username'] ?>" class="edit" title="Edit" data-toggle="modal" data-target="#form_edit_user"><i class="fas fa-edit"></i></a>
                                                    <a href="supplies.php?delid=<?php echo ($row['SupplyID']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Delete item?');"><i class="fa fa-trash" style="color:red;"></i></a>
                                                </td>

                                                

                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                    } else { ?>
                                        <tr style="border:0px;">
                                            <td style="text-align:center; color:red; border:0px;" colspan="9">No Record Found</td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- END OF ADMINISTRATOR -->

       


    </div>

    <!-- START OF MODAL FOR EDIT PRODUCT -->
    <div class="modal fade" id="edit_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" runat="server" id="form_edit_user">
                    <div class="modal-header modal-header-success">
                        <h3 class="modal-title">Edit User</h3>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            

                                    <?php

                                    $ret = mysqli_query($con, "SELECT * FROM address, users WHERE address.userID = users.UserID ");
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                    <?php } ?>
                                
                            
                            <div class="form-group" style="display: none;">
                                <label>ID</label>
                                <input type="text" name="userID" id="userID" class="form-control" />
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label>First Name</label>
                                    <input type="text" name="FirstName" id="FirstName" class="form-control" /> 
                                </div>
                                <div class="col-md-4">
                                    <label>Middle Name</label>
                                    <input type="text" name="MiddleName" id="MiddleName" class="form-control" /> 
                                </div>
                                <div class="col-md-4">
                                    <label>Last Name</label>
                                    <input type="text" name="LastName" id="LastName" class="form-control" /> 
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-12">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-4">
                                    <label>House/Lot No. Street</label>
                                    <input type="text" name="HouseLotNo" id="HouseLotNo" class="form-control" /> 
                                </div>
                                <div class="col-md-4">
                                    <label>Barangay</label>
                                        <input type="text" name="Barangay" id="Barangay" class="form-control" readonly/>
                                </div>
                                <div class="col-md-4">
                                    <label></label>
                                    <?php
                                        $sql = mysqli_query($con, "SELECT BarangayName FROM Barangay");
                                        $data = $sql->fetch_all(MYSQLI_ASSOC);
                                    ?>
                                    <select style="border-radius: 5px; width: 100%;" class="bg-light border-0 px-4 py-3" name="Barangay2" id="Barangay2">
                                        <option selected disabled>-- Update Barangay --</option>
                                        <?php foreach ($data as $row) : ?>
                                            <option value="<?= htmlspecialchars($row['BarangayName']) ?>">
                                                <?= htmlspecialchars($row['BarangayName']) ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label>City</label>
                                    <input type="text" name="City" id="City" class="form-control"  value="Quezon City" readonly/> 
                                </div>
                                <div class="col-md-4">
                                    <label>Province</label>
                                    <input type="text" name="Province" id="Province" class="form-control"  value="NCR" readonly/> 
                                </div>
                                <div class="col-md-4">
                                    <label>ZIP Code</label>
                                    <input type="text" name="ZIPCode" id="ZIPCode" class="form-control"/> 
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-3">
                                    <label>Phone No.</label>
                                    <input type="text" name="ContactNo" id="ContactNo" class="form-control"/> 
                                </div>
                                <div class="col-md-1">
                                    <label>Age</label>
                                    <input type="text" name="Age" id="" class="form-control"/> 
                                </div>
                                <div class="col-md-4">
                                    <label>User Type</label>
                                    <input type="text" name="UserType" id="UserType" class="form-control" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label></label>
                                    <select name="UserType2" id="UserType2" style="border-radius: 5px; width: 100%;" class="bg-light border-0 px-4 py-3">
                                        <option selected disabled>-- Update User Type --</option>
                                        <option value="Pet Owner">Pet Owner</option>
                                        <option value="Clinic Adminstrator">Clinic Adminstrator</option>
                                    </select> 
                                </div>
                            </div>
                            
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label>Username</label>
                                    <input type="text" name="Username" id="Username" class="form-control"  /> 
                                </div>
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input type="text" name="Email" id="Email" class="form-control"  /> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button name="update" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-edit"></span>
                            Update</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END OF MODAL FOR EDIT PRODUCT -->

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
        $('#form_edit_user').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;

            var user_id = $(opener).attr('user-id');
            var user_fname = $(opener).attr('user-fname');
            var user_mname = $(opener).attr('user-mname');
            var user_lname = $(opener).attr('user-lname');
            var user_lotnostreet = $(opener).attr('user-lotnostreet');
            var user_province = $(opener).attr('user-province');
            var user_barangay = $(opener).attr('user-barangay');
            var user_city = $(opener).attr('user-city');
            var user_zipcode = $(opener).attr('user-zipcode');
            var user_cnum = $(opener).attr('user-cnum');
            var user_age = $(opener).attr('user-age');
            var user_utype = $(opener).attr('user-utype');
            var user_email = $(opener).attr('user-email');
            var user_username = $(opener).attr('user-username');
            

            $('#form_edit_user').find('[name="userID"]').val(user_id);
            $('#form_edit_user').find('[name="FirstName"]').val(user_fname);
            $('#form_edit_user').find('[name="MiddleName"]').val(user_mname);
            $('#form_edit_user').find('[name="LastName"]').val(user_lname);
            $('#form_edit_user').find('[name="HouseLotNo"]').val(user_lotnostreet);
            $('#form_edit_user').find('[name="Barangay"]').val(user_barangay);
            $('#form_edit_user').find('[name="City"]').val(user_city);
            $('#form_edit_user').find('[name="ZIPCode"]').val(user_zipcode);
            $('#form_edit_user').find('[name="Province"]').val(user_province);
            $('#form_edit_user').find('[name="ContactNo"]').val(user_cnum);
            $('#form_edit_user').find('[name="Age"]').val(user_age);
            $('#form_edit_user').find('[name="UserType"]').val(user_utype);
            $('#form_edit_user').find('[name="Email"]').val(user_email);
            $('#form_edit_user').find('[name="Username"]').val(user_username);


            endResize();
        });

        function endResize() {
            $(window).off("resize", resizer);
        }
    </script>

</body>

</html>