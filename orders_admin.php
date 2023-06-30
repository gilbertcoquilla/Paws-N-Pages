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

if (isset($_POST['update_booking'])) {
    $a_status = $_POST['Status2'];
    $a_remarks = $_POST['Remarks'];
    $a_id = $_POST['AppointmentID'];

    if ($a_status != "") {
        $query = mysqli_query($con, "UPDATE appointments SET AppointmentStatus='$a_status', Remarks='$a_remarks' WHERE AppointmentID='$a_id' AND UserID='$userID'");

        if ($query) {
            echo "<script>alert('You have successfully updated an appointment.');</script>";
            echo "<script> document.location ='bookings.php'; </script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
    } else {
        $query = mysqli_query($con, "UPDATE appointments SET Remarks='$a_remarks' WHERE AppointmentID='$a_id' AND UserID='$userID'");

        if ($query) {
            echo "<script>alert('You have successfully updated an appointment.');</script>";
            echo "<script> document.location ='bookings.php'; </script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
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
            var table = $('#orders').DataTable({
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
                <li style="text-transform:uppercase;"><a href=""><b>Dashboard</b></a></li>
                <li style="text-transform:uppercase;"><a href="clinicadmin.php"><b>Profile</b></a></li>
                <li style="text-transform:uppercase;"><a href="supplies.php"><b>Products</b></a></li>
                <li style="text-transform:uppercase;"><a href="users.php"><b>Customers</b></a></li>
                <li style="text-transform:uppercase;"><a href="bookings.php"><b>Bookings</b></a></li>
                <li style="text-transform:uppercase;"><a href="orders_admin.php"><b>Orders</b></a></li>
                <li style="text-transform:uppercase;"><a href="feedbacks_admin.php"><b>Feedbacks</b></a></li>

            </ul>
            <div class="social_media">

            </div>
        </div>


        <!-- START OF CLINIC ADMINISTRATOR -->
        <?php if ($usertype == 'Clinic Administrator') { ?>

            <div class="main_content">
                <div style="padding-right:30px; padding-left:30px; padding-top:30px;">
                    <div class="card mb-4 mb-xl-0" style="border-radius: 15px;">
                        <div class="card-header userProfile-font"><b>📦 Orders</b></div>
                        <div class="card-body text-center">
                            <table class="table table-striped table-hover" style="border:0px;" id="orders">
                                <thead style="border:0px;">
                                    <tr class="table100-head" style="border:0px; text-align:center;">
                                        <th class="column1" style="border:0px;  text-align:center;"></th>
                                        <th class="column1" style="border:0px; text-align:center;">Reference No.</th>
                                        <th class="column1" style="border:0px; text-align:center;">Total Price</th>
                                        <th class="column1" style="border:0px; text-align:center;">Customer</th>
                                        <th class="column1" style="border:0px; text-align:center;">Date & Time Checked Out</th>
                                        <th class="column1" style="border:0px; text-align:center;">Status</th>
                                        <th class="column1" style="border:0px; text-align:center;">Remarks</th>
                                        <th class="column1" style="border:0px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="border:0px; text-align:center;">
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM orders, users, clinics WHERE orders.UserID = users.UserID AND orders.ClinicID = clinics.ClinicID AND orders.ClinicID = '$clinicID'");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {

                                    ?>
                                            <!--Fetch the Records -->
                                            <tr style="border:0px;">
                                                <td style="border:0px;"></td>
                                                <td style="border:0px;"><?php echo $row['Order_RefNo'] ?></td>
                                                <td style="border:0px;"><?php echo $row['TotalPrice'] ?></td>
                                                <td style="border:0px;"><?php echo $row['FirstName'] . ' ' .  $row['MiddleName'] . ' ' . $row['LastName'] ?></td>
                                                <td style="border:0px;"><?php echo $row['DateTimeCheckedOut']; ?></td>
                                                <td style="border:0px;"><?php echo $row['OrderStatus'] ?></td>
                                                <td style="border:0px;"><?php echo $row['OrderRemarks']; ?></td>
                                                <td style="border:0px;">
                                                    <a orderid="<?php echo $row['OrderID'] ?>" refno="<?php echo $row['Order_RefNo'] ?>" products="<?php $prod = $row['OrderedProducts'];
                                                                                                                                                    $explodedArray = explode(', ', $prod);
                                                                                                                                                    foreach ($explodedArray as $element) {
                                                                                                                                                        echo  $element;
                                                                                                                                                    } ?>" user="<?php echo $row['FirstName'] . ' ' .  $row['MiddleName'] . ' ' . $row['LastName'] ?>" totalprice="<?php echo $row['TotalPrice']; ?>" dtcout="<?php echo $row['DateTimeCheckedOut'] ?>" address="<?php echo $row['ShippingTo'] ?>" proofpayment="<?php echo $row['ProofOfPayment']; ?>" proofrefno="<?php echo $row['Proof_RefNo']; ?>" orderstatus="<?php echo $row['OrderStatus']; ?>" odremarks="<?php echo $row['OrderRemarks']; ?>" class="edit" title="View" data-toggle="modal" data-target="#view_order"><i class="fa fa-eye"></i></a> <a href="inventory_management.php?delid=<?php echo ($row['SupplyID']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Delete item?');"><i class="fa fa-trash" style="color:red;"></i></a>
                                                </td>


                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        }
                                    } else { ?>
                                        <tr style="border:0px;">
                                            <td style="text-align:center; color:red; border:0px;" colspan="8">No Record Found
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><?php } ?>
        <!-- END OF CLINIC ADMINISTRATOR -->



        <!-- START OF MODAL FOR VIEWING ORDER DETAILS -->
        <div class="modal fade" id="view_order" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="border-radius: 15px;">
                    <form method="POST" runat="server" id="view_order_form">
                        <div class="modal-header modal-header-success">
                            <h3 class="modal-title">Order Details</h3>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group" style="display: none;">
                                    <label>ID</label>
                                    <input type="text" name="OrderID" id="OrderID" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Order Reference No.</label>
                                <input type="text" name="Order_RefNo" id="Order_RefNo" class="form-control" readonly />
                            </div>
                            <div class="form-group">
                                <label>Customer</label>
                                <input type="text" name="Customer" id="Customer" class="form-control" readonly />
                            </div>
                            <div class="form-group">
                                <label>Ordered Products</label>
                                <!-- <input type="textarea" name="Orders" id="Orders" class="form-control" readonly /> -->
                                <textarea name="OrderedProducts" id="OrderedProducts" class="form-control" style="width: 100%; height: 150px;" readonly></textarea>
                            </div>
                            <div class="form-group">
                                <label>Total Price</label>
                                <input type="text" name="TotalPrice" id="TotalPrice" class="form-control" readonly />
                            </div>
                            <div class="form-group">
                                <label>Date & Time Checked Out</label>
                                <input type="text" name="DTimeCO" id="DTimeCO" class="form-control" readonly />
                            </div>
                            <div class="form-group">
                                <label>Shipping To</label>
                                <textarea name="ShippingTo" id="ShippingTo" class="form-control" style=" width: 100%; height: 150px;" readonly></textarea>
                            </div>
                            <div class="form-group">
                                <label>Proof Of Payment</label>
                                <!-- <input type="text" name="ProofOfPayment" id="ProofOfPayment" class="form-control" readonly /> -->
                                <img src="" name="ProofOfPayment" id="ProofOfPayment" width="100%">
                                <!-- insert download link for proof of payment here -->
                            </div>
                            <div class="form-group">
                                <label>Reference No. (For Proof of Payment)</label>
                                <input type="text" name="Proof_RefNo" id="Proof_RefNo" class="form-control" readonly />
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" name="OrderStatus" id="OrderStatus" class="form-control" style="height: 100%;" readonly />
                                    </div>
                                    <div class="col-8">
                                        <select name="OrderStatus2" id="OrderStatus2" style="border-radius: 5px; width: 100%;" class="bg-light border-0 px-4 py-3">
                                            <option selected disabled>-- Update Status --</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Denied">Denied</option>
                                            <option value="Order Received">Order Received</option>
                                            <option value="To Ship">To Ship</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="form-group">
                                <label>Remarks</label>
                                <textarea name="OrderRemarks" id="OrderRemarks" class="form-control" style=" width: 100%; height: 150px;"></textarea>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal" style="border-radius: 15px;"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--  START OF MODAL FOR VIEWING ORDER DETAILS -->

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
        $('#view_order').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;

            var orderid = $(opener).attr('orderid');
            var refno = $(opener).attr('refno');
            var user = $(opener).attr('user');
            var products = $(opener).attr('products');
            var totalprice = $(opener).attr('totalprice');
            var dtcout = $(opener).attr('dtcout');
            var address = $(opener).attr('address');
            var proofpayment = $(opener).attr('proofpayment');
            var proofrefno = $(opener).attr('proofrefno');
            var orderstatus = $(opener).attr('orderstatus');
            var odremarks = $(opener).attr('odremarks');


            $('#view_order_form').find('[name="OrderID"]').val(orderid);
            $('#view_order_form').find('[name="Order_RefNo"]').val(refno);
            $('#view_order_form').find('[name="Customer"]').val(user);
            $('#view_order_form').find('[name="OrderedProducts"]').val(products);
            $('#view_order_form').find('[name="TotalPrice"]').val(totalprice);
            $('#view_order_form').find('[name="DTimeCO"]').val(dtcout);
            $('#view_order_form').find('[name="ShippingTo"]').val(address);
            // $('#view_order_form').find('[name="ProofOfPayment"]').val(proofpayment);
            $('#view_order_form').find('[name="ProofOfPayment"]').prop('src', 'image_upload/' + proofpayment);
            $('#view_order_form').find('[name="Proof_RefNo"]').val(proofrefno);
            $('#view_order_form').find('[name="OrderStatus"]').val(orderstatus);
            $('#view_order_form').find('[name="OrderRemarks"]').val(odremarks);

            endResize();
        });

        function endResize() {
            $(window).off("resize", resizer);
        }
    </script>

</body>

</html>