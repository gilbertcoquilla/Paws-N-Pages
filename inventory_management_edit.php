<?php

session_start();
include('config.php');

$userID = $_SESSION["id"];

include('connection.php');

if (isset($_POST['submit'])) {

    $eid = $_GET['editid'];

    $file = $_FILES['image']['name'];
    $tempfile = $_FILES['image']['tmp_name'];
    $oldfile = $_POST['old'] ?? "";
    $folder = "image_upload/" . $file;

    move_uploaded_file($tempfile, $folder);

    // For Pet Supplies
    $supplyName = $_POST['supplyName'];
    $supplyDescription = $_POST['supplyDescription'];
    $supplyPrice = $_POST['supplyPrice'];
    $stocks = $_POST['stocks'];
    $needPrescription = $_POST['needPrescription'];

    //$_SESSION["needPrescription"] = $needPrescription;

    // For Clinic ID
    $clinicID = $_POST['clinicID'];

    // Query for updating data
    if ($file != "") {
        $query = mysqli_query($con, "UPDATE petsupplies SET SupplyImage='$file', SupplyName='$supplyName', SupplyDescription='$supplyDescription', SupplyPrice='$supplyPrice', Stocks='$stocks', NeedPrescription='$needPrescription' WHERE SupplyID='$eid'");

        if ($query) {
            echo "<script>alert('You have successfully updated an item');</script>";
            echo "<script> document.location ='inventory_management.php'; </script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
    } else {
        $query = mysqli_query($con, "UPDATE petsupplies SET SupplyName='$supplyName', SupplyDescription='$supplyDescription', SupplyPrice='$supplyPrice', Stocks='$stocks', NeedPrescription='$needPrescription' WHERE SupplyID='$eid'");

        if ($query) {
            echo "<script>alert('You have successfully updated an item');</script>";
            echo "<script> document.location ='inventory_management.php'; </script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<!--Template from: https://colorlib.com/wp/template/login-form-v4/ -->
<!--Insert image from: https://www.geeksforgeeks.org/how-to-upload-image-into-database-and-display-it-using-php/-->
<!--Scripts from: https://www.tutorialrepublic.com/faq/how-to-preview-an-image-before-it-is-uploaded-using-jquery.php-->


<head>
    <title>Edit Pet Supply</title>
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
                    <b>Add Item</b>
                </h4>
                <br>
                <form method="POST" enctype="multipart/form-data" runat="server">

                    <?php

                    $sql = mysqli_query($con, "SELECT * FROM clinics where UserID = '$userID'");
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>

                        <!--1-->
                        <div class="wrap-input100 validate-input m-b-23" style="display: none;">
                            <p>Clinic</p>
                            <input type="text" id="clinicID" name="clinicID" value="<?php echo $row['ClinicID']; ?>" required />
                            <br>
                        </div>

                    <?php } ?>

                    <?php
                    $eid = $_GET['editid'];
                    $ret = mysqli_query($con, "SELECT * FROM petsupplies WHERE SupplyID='$eid'");
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                        <!--Product Image-->
                        <div class="wrap-input100 validate-input m-b-23">
                            <p>Product Image</p>

                            <img id="image" src="<?php echo 'image_upload/' . $row['SupplyImage']; ?>" height=150px; width="100px;" />
                            <input type="file" id="image" name="image" onload="preview();" onchange="previewFile(this);" />
                            <span name="old" value="<?php echo $row['SupplyImage']; ?>">Current:
                                <?php echo $row['SupplyImage']; ?></span>
                        </div>

                        <!--2-->
                        <div class="wrap-input100 validate-input m-b-23">
                            <p>Supply Name</p>
                            <input type="text" id="supplyName" name="supplyName" value="<?php echo $row['SupplyName'] ?>" required />
                            <br>
                        </div>

                        <!--3-->
                        <div class="wrap-input100 validate-input m-b-23">
                            <p>Description</p>
                            <input type="text" id="supplyDescription" name="supplyDescription" value="<?php echo $row['SupplyDescription'] ?>" />
                            <br>
                        </div>

                        <br>

                        <!--4-->
                        <div class="wrap-input100 validate-input m-b-23">
                            <p>Price</p>
                            <input type="text" id="supplyPrice" name="supplyPrice" value="<?php echo $row['SupplyPrice'] ?>" required />
                            <br>
                        </div>

                        <!--5-->
                        <div class="wrap-input100 validate-input m-b-23">
                            <p>Stocks</p>
                            <input type="text" id="stocks" name="stocks" value="<?php echo $row['Stocks'] ?>" required />
                            <br>
                        </div>

                        <!--6-->
                        <div class="wrap-input100 validate-input m-b-23">
                            <p>Needs Prescription</p>

                            <input type="text" value="<?php echo $row['needPrescription'] ?>" />

                            <!-- Yes -->
                            <input <?php if ($needPrescription == 'Yes') {
                                        echo 'checked="checked"';
                                    } ?> type="radio" id="needPrescription" name="needPrescription" value="Yes" />
                            <label for="needPrescription">Yes</label>

                            <!-- No -->
                            <input <?php if ($needPrescription == 'No') {
                                        echo 'checked="checked"';
                                    } ?> type="radio" id="needPrescription" name="needPrescription" value="No" />
                            <label for="needPrescription">No</label>

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
                    <form action="inventory_management.php">
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