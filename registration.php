<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>User registration</title>
</head>

<body>
<?php
require("database.php");

if (isset($_REQUEST['customer_name'])){
    $customer_name = stripslashes($_REQUEST['customer_name']);
    $customer_name = mysqli_real_escape_string($con, $customer_name);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $reg_date = date("Y-m-d H:i:s");

    $query = "INSERT into `customer` (customer_name, password, email, reg_date) VALUES ('$customer_name', '".md5($password)."', '$email', '$reg_date')";
    $result = mysqli_query($con, $query);
    if ($result){
        echo "<div class='form'>
        <h3>You are registered successfully.</h3>
        <br>Click here to <a href='login.php'>Login</a></div>";
    }
}
?>

<div class = 'form'>
    <h1>User registration</h1>
    <form name="registration" acton="" method="post">
        <input type = "text" name="customer_name" placeholder="username" required/><br>
        <input type = "email" name="email" placeholder="email" required/><br>
        <input type = "password" name="password" placeholder="password" required/><br>
        <input type = "submit" name="submit" value="register" required/><br>
    </form>
</div>

</body>

</html>