<?php
include("auth.php");
require("database.php");
$customer_ID = $_SESSION['customer_ID'];
$status = "Pending";
$created_at = date("Y-m-d H:i:s");

$ins_query = "INSERT INTO `order` (`user_ID`, `status`, `created_at`) 
                VALUES ('$customer_ID', '$status', '$created_at')";

mysqli_query($con,$ins_query) or die(mysqli_error($con));
header("Location: order.php");
exit();
?>
