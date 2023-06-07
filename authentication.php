<?php
include('connection.php');
$username = $_POST['username'];
$password = $_POST['password'];

//to prevent from mysqli injection  
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

$sql = "SELECT * FROM users WHERE Username = '$username' and Password = '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {
    // echo "<h1><center> Login successful </center></h1>";
    // echo "<script>alert('Welcome '" . $username . "!);</script>";
    echo "<script>window.location.href = 'index.php'</script>";
} else {
    echo "<h1> Login failed. Invalid username or password.</h1>";
}