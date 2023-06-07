<?php
include("connection.php");
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $username = $_POST['username'];
    $usertype = $_POST['usertype'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //$name = $_POST['cpassword'];
    
    $sqlquery = mysqli_query($con, "INSERT INTO users(FirstName, MiddleName, LastName, ContactNo, Age, UserType, Username, Email, Password) VALUES('$fname','$mname','$lname', '$phone', '$age', '$usertype', '$username', '$email', '$password')");
    if ($sqlquery) {
        echo "<script>
            alert('New record was created successfully');
        </script>";
        echo "<script>
            document.location = 'login.php';      
        </script>";
    } else {
        echo "<script>
            alert('Failed to create record.');      
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<!--- NO BACKGROUND YET
 PHP NOT YET WORKING
 --->
<head>
    <meta charset="utf-8">
    <title>Paws N Pages</title>
    <link rel = "icon" href = 
        "https://media.discordapp.net/attachments/1112075552669581332/1113455947420024832/icon.png" 
        type = "image/x-icon">
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
</head>

<body>

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
        
            <div class="row g-5">
            <div class="col-lg-3">
                </div>
                <div class="col-lg-6 ">

                    <form method="post">
                        <div class="row g-3 bg-dark">
                            <div class="col-6 ">
                                <input type="button" class="btn btn-primary w-100 py-3" onclick="window.location='registration.php'" value="SIGN UP">                      
                            </div>
                            <div class="col-6">
                                <input type="button" class="btn btn-outline-light w-100 py-3" onclick="window.location='login.php'" value="LOG IN">
                            </div>
                            <div class="col-12">
                            <h5 class="display-5 text-primary text-uppercase mb-0 text-center">Register Now! 🐾</h5>
                            </div>
                            <div class="col-6 ">
                                <input type="text" name="fname" class="form-control  bg-light border-0 px-4 py-3" placeholder="First Name" required>
                            </div>
                            <div class="col-6 ">
                                <input type="text" name="mname" class="form-control  bg-light border-0 px-4 py-3" placeholder="Middle Name" required>
                            </div>                                
                            <div class="col-12">
                                <input type="text" name="lname" class="form-control  bg-light border-0 px-4 py-3" placeholder="Last Name" required>
                            </div> 
                            <div class="col-6">
                                <input type="text" name="phone" class="form-control  bg-light border-0 px-4 py-3" placeholder="Contact Number" required>
                            </div>
                            <div class="col-6">
                                <input type="text" name="age" class="form-control  bg-light border-0 px-4 py-3" placeholder="Age" required>
                            </div>
                            <div class="col-12">
                                <input type="text" name="username" class="form-control  bg-light border-0 px-4 py-3" placeholder="Username" required>
                            </div>
                            <div class="col-12" style="display: none;">
                                <select name="usertype" class="form-control  bg-light border-0 px-4 py-3" placeholder="User Type" required>
                                    <option value ="Pet Owner" selected>Pet Owner</option> 
                                </select>
                            </div>
                            <div class="col-12">
                                <input type="email" name="email" class="form-control  bg-light border-0 px-4 py-3" placeholder="E-mail" required>
                            </div>
                            <div class="col-12">
                                <input type="password" name="password" class="form-control  bg-light border-0 px-4 py-3" placeholder="Password" required>
                            </div>
                            <!-- <div class="col-12">
                                <input type="password" name="cpassword" class="form-control  bg-light border-0 px-4 py-3" placeholder="Confirm Password" required>
                            </div> -->
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn btn-primary w-100 py-3">Submit</button>
                            </div>  
                            <div class="col-12"></div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3">
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->





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