<?php

//database connection  file
include('connection.php');
//Code for deletion
if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = mysqli_query($con, "DELETE FROM appointments WHERE AppointmentID=$rid");
    echo "<script>alert('Appointment is deleted successfully');</script>";
    echo "<script>window.location.href = 'appointment.php'</script>";
}
?>

<!DOCTYPE html>
<html>

<!--Template from: https://colorlib.com/wp/template/login-form-v4/ -->

<head>
    <title>Appointments</title>
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
                <a href="inventory_management.php" class="nav-item nav-link">Inventory</a>
                <a href="appointment.php" class="nav-item nav-link active">Appointments</a>
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
                        Paws N Pages Appointments
                    </h1>
                </div>
                <!-- <div>
                    <form action="appointment_insert.php">
                        <button class="btn btn-success" style="background-color: green;">
                            Add Appointment
                        </button>
                    </form>

                </div> -->
                <br><br><br>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Appointment ID</th>
                            <th class="column1">Date</th>
                            <th class="column1">Time</th>
                            <th class="column1">Availed Services</th>
                            <th class="column1">Notes</th>
                            <th class="column1">Clinic</th>
                            <th class="column1">Client</th>
                            <th class="column1">Status</th>
                            <th class="column1">Remarks</th>
                            <th class="column1">Edit/Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // $ret = mysqli_query($con, "SELECT appointments.AppointmentID, appointments.Notes, appointments.PreferredDate, appointments.PreferredTime, appointments.AppointmentStatus, appointments.Remarks, services.ServiceName, clinics.ClinicName, users.FirstName, users.MiddleName, users.LastName FROM appointments INNER JOIN services ON appointments.ServiceID = services.ServiceID INNER JOIN clinics ON services.ClinicID = clinics.ClinicID INNER JOIN users ON appointments.UserID = users.UserID ORDER BY AppointmentID ASC");
                        $ret = mysqli_query($con, "SELECT * FROM appointments, clinics, users WHERE appointments.UserID = users.UserID AND appointments.ClinicID = clinics.ClinicID ORDER BY AppointmentID ASC");

                        $cnt = 1;
                        $row = mysqli_num_rows($ret);
                        if ($row > 0) {
                            while ($row = mysqli_fetch_array($ret)) {

                        ?>
                                <!--Fetch the Records -->
                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row['PreferredDate'] ?></td>
                                    <td><?php echo $row['PreferredTime'] ?></td>
                                    <td><?php echo $row['AvailedServices']; ?></td>
                                    <td><?php echo $row['Notes']; ?></td>
                                    <td><?php echo $row['ClinicName']; ?></td>
                                    <td><?php echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName']; ?></td>
                                    <td><?php echo $row['AppointmentStatus']; ?></td>
                                    <td><?php echo $row['Remarks']; ?></td>
                                    <td>
                                        <a href="appointment_edit.php?editid=<?php echo htmlentities($row['AppointmentID']); ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons" style="color:dodgerblue;">&#xE254;</i></a>
                                        <a href="appointment.php?delid=<?php echo ($row['AppointmentID']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Delete appointment?');"><i class="material-icons" style="color:firebrick;">&#xE872;</i></a>
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