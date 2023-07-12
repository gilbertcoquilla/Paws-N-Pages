<?php
include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<!--- NO BACKGROUND YET
 PHP NOT YET WORKING
 --->

<head>
    <meta charset="utf-8">
    <title>Paws N Pages | Registration</title>
    <link rel="icon" href="https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Newly added -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

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


        .nav-link {
            display: inline-block;
            border: none;
            margin: 0 20px;
            border-bottom: 4px solid transparent;
            outline: none;
            cursor: pointer;
            color: #80b434;
        }

        .nav-link.active {
            border-bottom-color: #80b434;
            color: #80b434;
        }

        .samples {
            display: none;
        }

        .fa-eye {
            position: absolute;
            top: 23px;
            right: 4%;
            cursor: pointer;
            color: lightgray;
        }

        /* For password validation (below) */

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -3px;
            content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -3px;
            content: "✖";
        }
    </style>
</head>

<body>

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="row g-3 bg-light" style=" border-radius: 15px; width: 100%; ">
                        <form id="regForm" method="POST" runat="server" enctype="multipart/form-data">
                            <br>

                            <!-- Content 1 -->
                            <div class="samples row g-3 bg-light" id="content1" style=" border-radius: 15px;  padding-left:30px; padding-right:10px;">
                                <ul id="tabs" role="tablist" class="nav nav-underline nav-fill " style="padding-bottom:30px;">
                                    <li class="nav-link active"><b><i class="fa fa-user"></i>&nbsp;&nbsp;Personal
                                            Infromation</b></li>
                                    <li class="nav-link" disabled><b><i class="fa fa-map-pin"></i>&nbsp;&nbsp;Address</b></li>
                                </ul>
                                <div class="row" style="padding-bottom:10px;">
                                    <div class="col-4 ">
                                        <p>&nbsp;&nbsp;First Name</p>
                                        <input type="text" name="fname" class="form-control  bg-light border-3 px-4 py-3" style="border-radius:15px;" placeholder="Enter First Name" required>
                                    </div>
                                    <div class="col-4 ">
                                        <p>&nbsp;&nbsp;Middle Name</p>
                                        <input type="text" name="mname" class="form-control  bg-light border-3 px-4 py-3" style="border-radius:15px;" placeholder="Enter Middle Name" required>
                                    </div>
                                    <div class="col-4">
                                        <p>&nbsp;&nbsp;Last Name</p>
                                        <input type="text" name="lname" class="form-control  bg-light border-3 px-4 py-3" style="border-radius:15px;" placeholder="Enter Last Name" required>
                                    </div>
                                </div>
                                <div class="row" style="padding-bottom:10px;">
                                    <div class="col-6">
                                        <p>&nbsp;&nbsp;Phone No.</p>
                                        <input type="text" name="phone" pattern="^(09|\+639)\d{9}$" minlength="11" maxlength="11" class="form-control  bg-light border-3 px-4 py-3" style="border-radius:15px;" placeholder="09XX XXX XXXX" required>
                                    </div>
                                    <div class="col-6">
                                        <p>&nbsp;&nbsp;Birthdate</p>
                                        <input type="date" name="birthdate" class="form-control  bg-light border-3 px-4 py-3" style="border-radius:15px;" placeholder="Birthdate" required>
                                    </div>
                                </div>
                                <div class="row" style="padding-bottom:10px;">
                                    <div class="col-5">
                                        <p>&nbsp;&nbsp;Username</p>
                                        <input type="text" name="username" class="form-control  bg-light border-3 px-4 py-3" style="border-radius:15px;" placeholder="Enter Username" required>
                                    </div>
                                    <div class="col-7">
                                        <p>&nbsp;&nbsp;Email</p>
                                        <input type="email" name="email" class="form-control  bg-light border-3 px-4 py-3" style="border-radius:15px;" placeholder="Enter Email" required>
                                    </div>
                                </div>
                                <div class="col-12" style="display: none;">
                                    <select name="usertype" class="form-control  bg-light border-3 px-4 py-3" style="border-radius:15px;" placeholder="User Type" required>
                                        <option value="Pet Owner" selected>Pet Owner</option>
                                    </select>
                                </div>
                                <div class="row" style="padding-bottom:10px;">
                                    <p>&nbsp;&nbsp;Password</p>
                                    <div class="col-12">
                                        <!-- Minimum eight characters, at least one uppercase letter, one lowercase letter and one number: -->
                                        <div class="password-container">
                                            <input type="password" name="password" id="pword" minlength="8" maxlength="16" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" class="form-control  bg-light border-3 px-4 py-3" style="border-radius:15px;" placeholder="Enter Password" required>
                                            <i class="fa-solid fa-eye" id="eye"></i>
                                        </div>
                                        <p id="message" style="display: none;font-style: italic; font-size: 15px; padding-top: 10px;">
                                            &nbsp;&nbsp;&nbsp;&nbsp;<span id="length" class="invalid">*Minimum of (8)
                                                characters</span>, <span id="capital" class="invalid">at least (1)
                                                uppercase letter</span>, <span id="letter" class="invalid">(1) lowercase
                                                letter</span> and <span id="number" class="invalid">(1) number</span>
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <div class="row" style="padding-top: 20px; padding-bottom: 30px; padding-left: 10px;">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <button type="button" class="bts btn btn-primary" onclick="showContent('content2')" style="border-radius: 10px; width:100%; height: 60px; float: right;" id="nextbtn">Next&nbsp;&nbsp;<i class="bi bi-chevron-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!-- Content 2 -->
                            <div class="samples row g-3 bg-light" id="content2" style="border-radius: 15px; padding-left:30px; padding-right:10px;">
                                <ul id="tabs" role="tablist" class="nav nav-underline nav-fill " style="padding-bottom:30px;">
                                    <li class="nav-link" disabled><b><i class="fa fa-user"></i>&nbsp;&nbsp;Personal
                                            Infromation</b></li>
                                    <li class="nav-link active" disabled><b><i class="fa fa-map-pin"></i>&nbsp;&nbsp;Address</b></li>
                                </ul>
                                <div class="row" style="padding-bottom:10px;">
                                    <div class="col-12">
                                        <p>&nbsp;&nbsp;House/Lot No. & Street</p>
                                        <input type="text" name="lotno_street" class="form-control  bg-light border-3 px-4 py-3" style="border-radius:15px;" placeholder="Enter House/Lot No. & Street" required>
                                    </div>
                                </div>

                                <div class="row" style="padding-bottom:10px;">
                                    <div class="col-6">
                                        <p>&nbsp;&nbsp;Barangay</p>
                                        <?php
                                        $sql = mysqli_query($con, "SELECT BarangayName FROM Barangay");
                                        $data = $sql->fetch_all(MYSQLI_ASSOC);
                                        ?>
                                        <select id="barangay" class="bg-light border-3 px-4 py-3" style="border-radius:15px; border-color:#ced4da; height:60%; width: 100%;" name="barangay" placeholder="Barangay" required>
                                            <option selected disabled>Please choose a barangay</option>
                                            <?php foreach ($data as $row) : ?>
                                                <option value="<?= htmlspecialchars($row['BarangayName']) ?>">
                                                    <?= htmlspecialchars($row['BarangayName']) ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <p>&nbsp;&nbsp;City</p>
                                        <input type="text" name="city" class="form-control bg-light border-3 px-4 py-3" style="border-radius:15px;" value="Quezon City" readonly>
                                    </div>
                                </div>
                                <div class="row" style="padding-bottom:30px;">
                                    <div class="col-6">
                                        <p>&nbsp;&nbsp;Province</p>
                                        <input type="text" name="province" class="form-control bg-light border-3 px-4 py-3" style="border-radius:15px;" value="NCR" readonly>
                                    </div>
                                    <div class="col-6">
                                        <p>&nbsp;&nbsp;ZIP Code</p>
                                        <input type="text" name="zipcode" class="form-control bg-light border-3 px-4 py-3" style="border-radius:15px;" placeholder="Enter ZIP Code" required>
                                    </div>
                                </div>

                                <div class="row" style="padding-bottom:30px; padding-left:10px; padding-right:10px;">
                                    <div class="col-md-4">
                                        <button type="button" onclick="showContent('content1')" class="btss btn btn-primary" style="border-radius: 10px; width:100%; height: 60px;" id="nextbtn"><i class="bi bi-chevron-left"></i>&nbsp;&nbsp;Previous</button>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary" style="border-radius: 10px; width:100%; height:60px;" id="submitbtn" name="submitbtn">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>


    <script>
        function showContent(contentId) {
            // Hide all content elements
            var contentElements = document.getElementsByClassName('samples');
            for (var i = 0; i < contentElements.length; i++) {
                contentElements[i].style.display = 'none';
            }
            // Show the selected content element
            var selectedContent = document.getElementById(contentId);
            if (selectedContent) {
                selectedContent.style.display = 'block';
                selectedContent.add('active');
            }
            // Add active class to the clicked tab
            tabElement.classList.add('active');
        }

        document.getElementById('content1').style.display = 'block';



        // Show password
        const passwordInput = document.querySelector("#pword");
        const eye = document.querySelector("#eye");

        eye.addEventListener("click", function() {
            this.classList.toggle("fa-eye-slash")
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
            passwordInput.setAttribute("type", type)
        });

        // Password Validation
        var myInput = document.getElementById("pword");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }
    </script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>

    <?php
    if (isset($_POST['submitbtn'])) {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $contactno = $_POST['phone'];
        $bdate = $_POST['birthdate'];
        $uname = $_POST['username'];
        $utype = $_POST['usertype'];
        $email = $_POST['email'];
        $pword = $_POST['password'];

        // Hashed password
        $h_pword = password_hash($pword, PASSWORD_DEFAULT);

        // For address
        $lotno_street = $_POST['lotno_street'];
        $barangay = $_POST['barangay'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $zipcode = $_POST['zipcode'];

        $con->begin_Transaction();

        $sqlTable1 = "INSERT INTO users (FirstName, MiddleName, LastName, ContactNo, Birth_Date, UserType, Username, Email, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtTable1 = $con->prepare($sqlTable1);
        $stmtTable1->bind_param("sssssssss", $fname, $mname, $lname, $contactno, $bdate, $utype, $uname, $email, $h_pword);
        $stmtTable1->execute();

        $primaryKey = $con->insert_id;

        $sqlTable2 = "INSERT INTO address (LotNo_Street, Barangay, City, Province, ZIPCode, UserID) VALUES (?, ?, ?, ?, ?, ?)";
        $stmtTable2 = $con->prepare($sqlTable2);
        $stmtTable2->bind_param("sssssi", $lotno_street, $barangay, $city, $province, $zipcode, $primaryKey);
        $stmtTable2->execute();

        if ($stmtTable1->error || $stmtTable2->error) {
            $con->rollback();
        } else {
            $con->commit();
        }

        $con->close();

        echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
        echo '<script>';
        echo 'swal({
                                            title: "Success",
                                            text: "Registration successful",
                                            icon: "success",
                                            html: true,
                                            showCancelButton: true,
                                            })
                                                .then((willDelete) => {
                                                    if (willDelete) {

                                                        document.location ="login.php";
                                                    }
                                                })';
        echo '</script>';
    }
    ?>

</body>

</html>