<?php
session_start();
// error_reporting(0);
include_once 'includes/dbconnection.php';
if (strlen($_SESSION['fosuid'] == 0)) {
    echo "Error";
} else {
    $query = "UPDATE tblorders SET Quantity={$_GET['qty']} WHERE UserId={$_GET['uId']} AND FoodId={$_GET['fId']}";
    $result = mysqli_query($con, $query);
    echo var_dump($result);
}
