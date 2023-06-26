<?php

session_start();
include('config.php');
include('connection.php');

$userID = $_SESSION["id"];

include('connection.php');

///////////////////// FOR UPDATING PET OWNER PROFILE ////////////////////////////

if (isset($_POST['update'])) {

    $userID = $_POST['userID'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $cnum = $_POST['cnum'];
    $username = $_POST['username'];

    $query = mysqli_query($con, "UPDATE users SET FirstName='$fname', MiddleName='$mname', LastName='$lname', ContactNo='$cnum', Username='$username' WHERE UserID='$userID'");

    if ($query) {
        echo "<script>alert('You have successfully your information.');</script>";
        echo "<script> document.location ='userprofile.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}

///////////////////// FOR ADDING NEW PET ////////////////////////////  

if (isset($_POST['save_pet'])) {

    $file = $_FILES['image']['name'];
    $tempfile = $_FILES['image']['tmp_name'];
    $folder = "image_upload/" . $file;

    move_uploaded_file($tempfile, $folder);

    $userID = $_POST['userID'];
    $petname = $_POST['petname'];
    $species = $_POST['species'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $color = $_POST['color'];

    $query = mysqli_query($con, "INSERT INTO pets (PetImage, PetName, Species, Breed, Age, Color, UserID) VALUES ('$file', '$petname', '$species', '$breed', '$age', '$color', '$userID')");

    if ($query) {
        echo "<script>alert('You have successfully added a new Pet');</script>";
        echo "<script> document.location ='userprofile.php'; </script>";
    } else {
        echo "<script>alert('Error adding new pet.');</script>";
    }
}

///////////////////// FOR DELETING PET ////////////////////////////  
if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = mysqli_query($con, "DELETE FROM pets WHERE PetID=$rid");
    echo "<script>alert('You have successfully deleted a record.');</script>";
    echo "<script>window.location.href = 'userprofile.php'</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | User Profile</title>
    <link rel="icon" href="https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png" type="image/x-icon">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
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



    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

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
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="clinics.php" class="nav-item nav-link">Clinics</a>
                <a href="inventory_management.php" class="nav-item nav-link">Inventory</a>
                <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                <a href="logout.php" class="nav-item nav-link">Logout</a>
                <a href="vet-or-pet.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">JOIN
                    US
                    <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- START OF PROFILE -->
    <br>
    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
        <h1 class="text-primary text-uppercase">User Profile</h1>
    </div>
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <!-- START OF PET OWNER PROFILE -->
            <div class="col-xl-5">
                <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                    <div class="card-header userProfile-font">👤 Pet Owner Profile &nbsp; <a href="" data-toggle="modal" title="Delete" style="float:right;" data-target="#update_modal<?php echo $row['userID'] ?>"><i class="material-icons" style="color:dodgerblue;">&#xE254;</i></a></div>
                    <div class="card-body text-center">
                        <!-- Profile picture help block-->
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
            </div>
            <!-- END OF PET OWNER PROFILE -->

            <!-- START OF PET PROFILE -->
            <div class="col-xl-7">
                <!-- ADD PET BUTTON -->
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#form_modal" style="float:right; width:100%; border-radius: 15px;"><span class="glyphicon glyphicon-plus"></span>Add Pet</button>
                <br>
                <br>
                <?php
                $ret = mysqli_query($con, "SELECT * FROM pets WHERE UserID='$userID'");
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                    <div class="card mb-4" style="border-radius: 15px;">
                        <div class="card-header userProfile-font">🐾 Pet Profile &nbsp;<a href="userprofile.php?delid=<?php echo ($row['PetID']); ?>" style="float:right;" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Delete item?');"><i class="material-icons" style="color:firebrick;">&#xE872;</i></a></div>
                        <div class="card-body">
                            <div style="display: none;">
                                <?php
                                // $_SESSION['petid'] = $row['PetID'];
                                // $petid = $_SESSION['petid'];
                                ?>
                            </div>
                            <center>
                                <?php if ($row['PetImage'] != "") {
                                    echo '<img src=image_upload/' . $row['PetImage'] . ' height=100px; width=100px;';
                                }
                                ?>
                            </center>
                            <br />
                            <br />
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><b>Pet Name: &nbsp;&nbsp;</b></td>
                                        <td>
                                            <?php echo $row['PetName'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Species: &nbsp;&nbsp;</b></td>
                                        <td>
                                            <?php echo $row['Species'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Breed: &nbsp;&nbsp;</b></td>
                                        <td>
                                            <?php echo $row['Breed'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Age: &nbsp;&nbsp;</b></td>
                                        <td>
                                            <?php echo $row['Age'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Color: &nbsp;&nbsp;</b></td>
                                        <td>
                                            <?php echo $row['Color'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- START OF BUTTON FOR VIEWING OF HEALTH RECORD -->
                            <a href="petHealthRecord.php?petid=<?php echo ($row['PetID']); ?>" class="btn btn-primary" type="button" style="float:left; border-radius: 15px;"><span class="glyphicon glyphicon-plus"></span>VIEW HEALTH
                                RECORD</a>

                            <!-- END OF BUTTON FOR VIEWING OF HEALTH RECORD -->
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- END OF PET PROFILE -->
        </div>
    </div>
    <!-- END OF PROFILE -->

    <!-- START OF MODAL FOR EDIT PET OWNER PROFILE -->
    <div class="modal fade" id="update_modal<?php echo $row['userID'] ?>" aria-hidden="true">
        <div class="modal-dialog">
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
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input type="hidden" name="userID" value="<?php echo $row['UserID'] ?>" />
                                        <input type="text" name="fname" value="<?php echo $row['FirstName'] ?>" class="form-control" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Middle Name</label>
                                        <input type="text" name="mname" value="<?php echo $row['MiddleName'] ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="lname" value="<?php echo $row['LastName'] ?>" class="form-control" />
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
    <!-- END OF MODAL FOR EDIT PET OWNER PROFILE -->

    <!-- START OF MODAL FOR ADDING NEW PET -->
    <div class="modal fade" id="form_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" enctype="multipart/form-data" runat="server">
                    <div class="modal-header">
                        <h3 class="modal-title">Add New Pet</h3>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label>Pet Image</label>
                                <img id="image" src="" width="100px" />
                                <input type="file" name="image" onchange="previewFile(this);" />
                            </div>
                            <div class="form-group">
                                <label>Pet Name</label>
                                <input type="text" name="petname" style="border-radius: 15px;" class="form-control" required="required" />
                            </div>
                            <div class="form-group">
                                <label>Species</label>
                                <input type="text" name="species" style="border-radius: 15px;" class="form-control" required="required" />
                            </div>
                            <div class="form-group">
                                <label>Breed</label>
                                <input type="text" name="breed" style="border-radius: 15px;" class="form-control" required="required" />
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <input type="text" name="age" style="border-radius: 15px;" class="form-control" required="required" />
                            </div>
                            <div class="form-group">
                                <label>Color</label>
                                <input type="text" name="color" style="border-radius: 15px;" class="form-control" required="required" />
                                <input type="hidden" name="userID" value="<?php echo $userID ?>" />
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="modal-footer">
                        <button name="save_pet" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-save"></span>
                            Save</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END OF MODAL FOR ADDING NEW PET -->

    <!-- Footer Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Get In Touch</h5>
                    <p class="mb-4">If you have inquiries feel free to contact us below</p>
                    <a class="mb-2" href="https://goo.gl/maps/nGdbiDamK7MP9L5z5"><i class="bi bi-geo-alt text-primary me-2"></i>Manila, PH</br></a>
                    <a class="mb-2" href="mailto:pawsnpages.site@gmail.com"><i class="bi bi-envelope-open text-primary me-2"></i>pawsnpages.site@gmail.com</a>
                    <a class="mb-0" href="tel:+6396176261"></br><i class="bi bi-telephone text-primary me-2"></i>+63 961
                        762 6162</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-body mb-2" href="clinics.php"><i class="bi bi-arrow-right text-primary me-2"></i>Vet Clinics</a>
                        <a class="text-body mb-2" href="#services"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                        <a class="text-body mb-2" href="#founders"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
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


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


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