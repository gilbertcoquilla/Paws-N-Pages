<?php

//database connection  file
include('connection.php');
//Code for deletion
if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = mysqli_query($con, "DELETE FROM petsupplies WHERE SupplyID=$rid");
    echo "<script>alert('Item is deleted successfully');</script>";
    echo "<script>window.location.href = 'inventory_management.php'</script>";
}
?>

<!DOCTYPE html>
<html>

<!--Template from: https://colorlib.com/wp/template/login-form-v4/ -->

<head>
    <title>Paws N Pages Inventory</title>
    <meta charset="utf-8">
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

    <!-- css -->
    <style>
        h1 {
            font-size: 31px;
            color: #000;
            text-transform: uppercase;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }

        .btn {
            float: right;
            background-color: dodgerblue;
        }

        table {
            width: auto;
            display: flexbox;
            overflow-x: auto;
            white-space: nowrap;
        }

        .table-container {
            padding: 90px 90px;
        }


        .tbl-header {
            background-color: rgba(0, 0, 0);
        }

        .tbl-content {
            height: 300px;
            overflow-x: auto;
            margin-top: 0px;
            border: 1px solid black;
        }

        th {
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 20px;
            color: #000;
            text-transform: uppercase;
            background-color: black;
        }

        td {
            padding: 15px;
            text-align: left;
            vertical-align: middle;
            font-weight: 300;
            font-size: 20px;
            color: #000;
            border-bottom: solid 1px rgba(255, 255, 255, 0.1);
            background-color: #fff;
            border: 1px solid black;
        }

        .column1 {
            font-weight: bold;
        }


        /* demo styles */

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

        body {

            font-family: 'Roboto', sans-serif;
            background-image: url('images/portfolio-1.png');
        }

        section {
            margin: 50px;
        }


        /* follow me template */
        .made-with-love {
            margin-top: 40px;
            padding: 10px;
            clear: left;
            text-align: center;
            font-size: 10px;
            font-family: arial;
            color: #fff;
        }

        .made-with-love i {
            font-style: normal;
            color: #F50057;
            font-size: 14px;
            position: relative;
            top: 2px;
        }

        .made-with-love a {
            color: #fff;
            text-decoration: none;
        }

        .made-with-love a:hover {
            text-decoration: underline;
        }

        .student {
            float: left;
        }

        .img {
            width: 50px;
            height: 50px;
        }
    </style>

    <!-- script -->
    <script>
        // '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
        $(window).on("load resize ", function() {
            var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
            $('.tbl-header').css({
                'padding-right': scrollWidth
            });
        }).resize();
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
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="clinics.php" class="nav-item nav-link">Clinics</a>
                <a href="inventory_management.php" class="nav-item nav-link active">Inventory</a>
                <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                <a href="logout.php" class="nav-item nav-link">Logout</a>
                <a href="#" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Profile
                    <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="bgbody">
        <div class="container-fluid">
            <div class="table-container">
                <div class="student">
                    <h1>
                        Paws N Pages Inventory
                    </h1>
                </div>
                <div>
                    <form action="inventory_management_insert.php">
                        <button class="btn btn-success" style="background-color: green;">
                            Add Item
                        </button>
                    </form>

                </div>
                <br><br><br>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Supply ID</th>
                            <th class="column1">Product Image</th>
                            <th class="column1">Clinic Name</th>
                            <th class="column1">Supply Name</th>
                            <th class="column1">Description</th>
                            <th class="column1">Price</th>
                            <th class="column1">Stocks</th>
                            <th class="column1">Needs Prescription</th>
                            <th class="column1">Edit/Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ret = mysqli_query($con, "SELECT petsupplies.SupplyID, petsupplies.SupplyImage, clinics.ClinicName, petsupplies.SupplyName, petsupplies.SupplyDescription, petsupplies.SupplyPrice, petsupplies.Stocks, petsupplies.NeedPrescription FROM petsupplies INNER JOIN clinics ON petsupplies.ClinicID = clinics.ClinicID");
                        $cnt = 1;
                        $row = mysqli_num_rows($ret);
                        if ($row > 0) {
                            while ($row = mysqli_fetch_array($ret)) {

                        ?>
                                <!--Fetch the Records -->
                                <tr>
                                    <td style="text-align: center;"><?php echo $cnt; ?></td>
                                    <td style="text-align: center;"><?php if ($row['SupplyImage'] != "") {
                                                                        echo '<img src=image_upload/' . $row['SupplyImage'] . ' height=100px; width=100px;';
                                                                    }
                                                                    ?>
                                    </td>
                                    <td><?php echo $row['ClinicName'] ?></td>
                                    <td><?php echo $row['SupplyName']; ?></td>
                                    <td><?php echo $row['SupplyDescription']; ?></td>
                                    <td><?php echo $row['SupplyPrice']; ?></td>
                                    <td><?php echo $row['Stocks']; ?></td>
                                    <td><?php echo $row['NeedPrescription']; ?></td>
                                    <td style="text-align: center;">
                                        <a href="inventory_management_edit.php?editid=<?php echo htmlentities($row['SupplyID']); ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons" style="color:dodgerblue;">&#xE254;</i></a>
                                        <a href="inventory_management.php?delid=<?php echo ($row['SupplyID']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Delete item?');"><i class="material-icons" style="color:firebrick;">&#xE872;</i></a>
                                    </td>
                                </tr>
                            <?php
                                $cnt = $cnt + 1;
                            }
                        } else { ?>
                            <tr>
                                <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

</html>