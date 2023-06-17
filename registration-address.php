<?php

session_start();
include('config.php');

$userID = $_SESSION["id"];

include('connection.php');

if (isset($_POST['submit'])) {

    // For Address
    $lotno_street = $_POST['lotno_street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];

    $userID = $_POST['userID'];

    // Query for data insertion
    $query = mysqli_query($con, "INSERT INTO address (LotNo_Street, Barangay, City, Province, ZIPCode, UserID) VALUES ('$lotno_street', '$barangay', '$city', '$province', '$zipcode', '$userID')");

    if ($query) {
        echo "<script>alert('You have successfully added an address');</script>";

        // Must be redirected to user profile
        echo "<script> document.location ='inventory_management.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paws N Pages</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
    
    <!-- JavaScript Libraries -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Template Javascript -->
    <!-- <script src="js/main.js"></script> -->
    <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>
    
    <script>
        var my_handlers = {

            fill_cities: function() {

                var province_code = $(this).val();
                $('#city').ph_locations('fetch_list', [{
                    "province_code": province_code
                }]);
            },


            // fill_barangays: function() {

            //     var city_code = $(this).val();
            //     $('#barangay').ph_locations('fetch_list', [{
            //         "city_code": city_code
            //     }]);
            // }
        };

        $(function() {
            // $('#region').on('change', my_handlers.fill_provinces);
            $('#province').on('change', my_handlers.fill_cities);
            $('#city').on('change', my_handlers.fill_barangays);

            $('#region').ph_locations({
                'location_type': 'regions'
            });
            $('#province').ph_locations({
                'location_type': 'provinces'
            });
            $('#city').ph_locations({
                'location_type': 'cities'
            });
            // $('#barangay').ph_locations({
            //     'location_type': 'barangays'
            // });

            //$('#region').ph_locations('fetch_list');

            // $('#province').ph_locations('fetch_list', [{
            //     "region_code": "13"
            // }]);
            // $('#city').ph_locations('fetch_list', [{
            //     "province_code": "1374"
            // }]);

            var city = $('#city').val();

            // if (city == "Quezon City") {

            //     $('#barangay').ph_locations('fetch_list', [{
            //         "city_code": "137404"
            //     }]);
            // }
        });
    </script>
</head>

<body>

    <!-- Registration Start -->
    <div class="container-fluid pt-5">
        <div class="container">

            <div class="row g-5">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6 ">

                    <form method="post" enctype="multipart/form-data" runat="server">
                        <div class="row g-3 bg-dark">
                            <div class="col-6 ">
                                <input type="button" class="btn btn-primary w-100 py-3" onclick="window.location='registration.php'" value="SIGN UP">
                            </div>
                            <div class="col-6">
                                <input type="button" class="btn btn-outline-light w-100 py-3" onclick="window.location='login.php'" value="LOG IN">
                            </div>
                            <div class="col-12">
                                <h5 class="display-5 text-primary text-uppercase mb-0 text-center">Address Details 🏘️</h5>
                            </div>
                            <div class="col-12 ">
                                <input type="text" name="lotno_street" class="form-control  bg-light border-0 px-4 py-3" placeholder="House/Lot No. & Street" required>
                            </div>

                            <div class="col-6">
                                <input type="text" name="province" class="form-control  bg-light border-0 px-4 py-3" value="NCR" readonly>
                            </div>
                            <div class="col-6">
                                <input type="text" name="city" class="form-control  bg-light border-0 px-4 py-3" value="Quezon City" readonly>
                            </div>

                            
                            <div class="col-6">
                                <?php
                                    $sql = mysqli_query($con, "SELECT BarangayName FROM Barangay");
                                    $data = $sql->fetch_all(MYSQLI_ASSOC);
                                ?>
                                <select id="barangay" class="form-control  bg-light border-0 px-4 py-3" name="barangay" placeholder="Barangay" required>
                                    <option value="" selected disabled>-- Please choose a barangay --</option>
                                    <?php foreach ($data as $row): ?>
                                    <option value="<?= htmlspecialchars($row['BarangayName']) ?>">
                                        <?= htmlspecialchars($row['BarangayName']) ?>
                                    </option>
                                    <?php endforeach ?>
                                <!-- <option value="'.htmlspecialchars($barangay).'"></option>' -->
                                </select>
                            </div>
                            

                            <div class="col-6">
                                <input type="text" name="zipcode" class="form-control  bg-light border-0 px-4 py-3" placeholder="Zip Code" required>
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="usertype" class="form-control  bg-light border-0 px-4 py-3" placeholder="User Type" value="Clinic Administrator">
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn btn-primary w-100 py-3">Submit</button>
                            </div>
                            <div class="col-12"></div>
                        </div>
                     </form>
                </div>
            </div>

        </div>
    </div>
    <!-- Registration End -->
</body>

</html>