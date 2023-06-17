<?php

session_start();
include('config.php');

$userID = $_SESSION["id"];

include('connection.php');

if (isset($_POST['submit'])) {

    $petName = $_POST['petName'];
    $species = $_POST['species'];
    $breed = $_POST['breed'];
    $birthdate = $_POST['birthdate'];
    $color = $_POST['color'];

    // Query for data insertion
    $query = mysqli_query($con, "INSERT INTO pets (PetName, Species, Breed, BirthDate, Color, UserID) VALUES ('$petName', '$species', '$breed', '$birthdate', '$color', '$userID')");

    if ($query) {
        echo "<script>alert('You have successfully added an item');</script>";
        echo "<script> document.location ='list_of_pets.php'; </script>";
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
    <title>Add Pet Supply</title>
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

                    <!--1-->
                    <div class="wrap-input100 validate-input m-b-23" style="display: none;">
                        <p>Owner</p>
                        <input type="text" id="clinicID" name="clinicID" value="<?php echo $userID; ?>" required />
                        <br>
                    </div>

                    <!--2-->
                    <div class="wrap-input100 validate-input m-b-23">
                        <p>Pet Name</p>
                        <input type="text" id="petName" name="petName" required />
                        <br>
                    </div>

                    <!--3-->
                    <div class="wrap-input100 validate-input m-b-23">
                        <p>Species</p>
                        <input type="text" id="species" name="species" />
                        <br>
                    </div>

                    <br>

                    <!--4-->
                    <div class="wrap-input100 validate-input m-b-23">
                        <p>Breed</p>
                        <input type="text" id="breed" name="breed" required />
                        <br>
                    </div>

                    <!--5-->
                    <div class="wrap-input100 validate-input m-b-23">
                        <p>Birth Date</p>
                        <input type="date" class="form-control  bg-light border-0 px-4 py-3" id="datePicker" name="birthdate">
                        <br>
                    </div>

                    <!--6-->
                    <div class="wrap-input100 validate-input m-b-23">
                        <p>Color</p>
                        <input type="text" id="color" name="color" required />
                        <br>
                    </div>

                    <br>
                    <div class="btnsub">
                        <button name="submit" class="btn btn-success">
                            Submit
                        </button>
                    </div>
                </form>
                <div>
                    <form action="list_of_pets.php">
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