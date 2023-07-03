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

if (isset($_POST['edit_user'])) {
    $userid = $_POST['userid'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];
    $bdate = $_POST['bdate'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $utype = $_POST['utype'];

    $query = mysqli_query($con, "UPDATE users SET FirstName='$fname', MiddleName='$mname', LastName='$lname', ContactNo='$contactno', Birth_Date='$bdate', UserType='$utype', Email='$email', Password='$pword' WHERE UserID='$userid'");

    if ($query) {
        echo "<script>alert('You have successfully updated a user!');</script>";
        echo "<script> document.location ='users.php'; </script>";
    } else {
        echo "<script> alert('Error updating a user.'); </script>";
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
            var table = $('#users').DataTable({
                order: [
                    [2, 'asc']
                ],

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


        <!-- START OF ADMINISTRATOR -->
        <?php if ($usertype == 'Clinic Administrator') { ?>

            <div class="main_content">
                <div style="padding-right:30px; padding-left:30px; padding-top:30px;">
                    <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                        <div class="card-header userProfile-font"><b>👤 Users</b></div>
                        <div class="card-body text-center">
                            <table class="table table-striped table-hover" style="border:0px;  text-align:left;" id="users">
                                <thead style="border:0px;">
                                    <tr class="table100-head" style="border:0px;">
                                        <th class="column1" style="border:0px;">Name</th>
                                        <th class="column1" style="border:0px;">Username</th>
                                        <th class="column1" style="border:0px;">User Type</th>
                                        <th class="column1" style="border:0px;">Email</th>
                                        <th class="column1" style="border:0px; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="border:0px;">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM users");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {

                                    ?>
                                            <!--Fetch the Records -->
                                            <tr style="border:0px;">
                                                <td style="border:0px;"><?php echo $row['FirstName'] . ' ' .  $row['MiddleName'] . ' ' . $row['LastName'] ?></td>
                                                <td style="border:0px;"><?php echo $row['Username']; ?></td>
                                                <td style="border:0px;"><?php echo $row['UserType'] ?></td>
                                                <td style="border:0px;"><?php echo $row['Email'] ?></td>
                                                <td style="border:0px; text-align: center;">
                                                    <a href="" data-toggle="modal" data-target="#view_user" userid="<?php echo $row['UserID'] ?>" fname="<?php echo $row['FirstName'] ?>" mname="<?php echo $row['MiddleName'] ?>" lname="<?php echo $row['LastName'] ?>" contactno="<?php echo $row['ContactNo'] ?>" bdate="<?php echo $row['Birth_Date'] ?>" utype="<?php echo $row['UserType'] ?>" uname="<?php echo $row['Username'] ?>" email="<?php echo $row['Email'] ?>" pword="<?php echo $row['Password'] ?>" dtmod="<?php echo $row['DateTimeModified'] ?>"><i class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                    } else { ?>
                                        <tr style="border:0px;">
                                            <td style="text-align:center; color:red; border:0px;" colspan="5">No Record Found
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
        <!-- END OF ADMINISTRATOR -->

    </div>

    <!-- START OF MODAL FOR VIEWING USER DETAILS -->
    <div class="modal fade" id="view_user" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="border-radius: 15px;">
                <form method="POST" runat="server" enctype="multipart/form-data" id="view_user_form">
                    <div class="modal-header modal-header-success">
                        <h3 class="modal-title">User Details</h3>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group" style="display: none;">
                                <label>ID</label>
                                <input type="text" name="userid" id="userid" class="form-control" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="fname" id="fname" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text" name="mname" id="mname" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lname" id="lname" class="form-control" />
                                    </div>

                                    <hr />

                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="uname" id="uname" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="pword" id="pword" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Last Modified By User</label>
                                        <input type="text" name="dtmod" id="dtmod" class="form-control" readonly />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Birthdate</label>
                                        <input type="date" name="bdate" id="bdate" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="text" name="contactno" id="contactno" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" class="form-control" />
                                    </div>

                                    <hr />

                                    <div class="form-group">
                                        <label>User Type</label>
                                        <select name="utype" id="utype" style="border-radius: 5px; width: 100%; height: 60%;" class="bg-light border-0 px-4 py-3">
                                            <option value="Pet Owner">Pet Owner</option>
                                            <option value="Clinic Administrator">Clinic Administrator</option>
                                            <option value="Administrator">Administrator</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div style="clear:both;"></div>
                    <div class="modal-footer">
                        <button name="edit_user" class="btn btn-primary" style="border-radius: 15px;"><span class="glyphicon glyphicon-edit"></span>
                            Update
                        </button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    </div>
                </form>
            </div>
            <!--  END OF MODAL FOR VIEWING USER DETAILS -->


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
                function endResize() {
                    $(window).off("resize", resizer);
                }

                $('#view_user').on('show.bs.modal', function(e) {
                    var opener = e.relatedTarget;

                    var userid = $(opener).attr('userid');
                    var fname = $(opener).attr('fname');
                    var mname = $(opener).attr('mname');
                    var lname = $(opener).attr('lname');
                    var contactno = $(opener).attr('contactno');
                    var bdate = $(opener).attr('bdate');
                    var utype = $(opener).attr('utype');
                    var uname = $(opener).attr('uname');
                    var email = $(opener).attr('email');
                    var pword = $(opener).attr('pword');
                    var dtmod = $(opener).attr('dtmod');

                    $('#view_user_form').find('[name="userid"]').val(userid);
                    $('#view_user_form').find('[name="fname"]').val(fname);
                    $('#view_user_form').find('[name="mname"]').val(mname);
                    $('#view_user_form').find('[name="lname"]').val(lname);
                    $('#view_user_form').find('[name="contactno"]').val(contactno);
                    $('#view_user_form').find('[name="bdate"]').val(bdate);
                    $('#view_user_form').find('[name="utype"]').val(utype);
                    $('#view_user_form').find('[name="uname"]').val(uname);
                    $('#view_user_form').find('[name="email"]').val(email);
                    $('#view_user_form').find('[name="pword"]').val(pword);
                    $('#view_user_form').find('[name="dtmod"]').val(dtmod);


                    endResize();
                });

                function displayImg() {
                    var img = document.getElementById("ProofOfPayment").src;
                    window.open(img, '_blank');
                }
            </script>

</body>

</html>