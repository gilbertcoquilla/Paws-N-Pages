<?php
    include('connection.php');
    include('config.php');

    ///////////////////// FOR DELETING PRODUCT ////////////////////////////  
    if (isset($_POST['delete_product'])) {
        $Supply_ID = $_POST['Supply_ID'];
        $dsql = mysqli_query($con, "DELETE FROM petsupplies WHERE SupplyID= '$Supply_ID'");
        if ($dsql) {
            echo 200;
        } else {
            echo "<script>alert('Error deleting data.');</script>";
            echo "<script>document.location = 'supplies.php'</script>";
        }
    }

    ///////////////////// FOR DELETING SERVICES ////////////////////////////  
    if (isset($_POST['delete_service'])) {
        $Service_ID = $_POST['Service_ID'];
        $dsql = mysqli_query($con, "DELETE FROM services WHERE ServiceID= '$Service_ID'");
        if ($dsql) {
            echo 200;
        } else {
            echo "<script>alert('Error deleting data.');</script>";
            echo "<script>document.location = 'supplies.php'</script>";
        }
    } 
    
?>