<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "pawsnpages_db");
if (mysqli_connect_errno()) {
    echo "Connection Failed " . mysqli_connect_error();
}
