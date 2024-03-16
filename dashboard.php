<?php
include("auth.php");
require('database.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Dashboard - Secured Page</title>
</head>
<body>
    <div class = "form">
    <p>Access Granted - This page is protected.</p>
    <p><a href="index.php">Home</a></p>
    <p><a href="order.php">Order</a></p>
    <a href="logout.php">Logout</a>
</body>
</html>