<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset='utf-8'>
    <title>User Login </title>
</head>
<body>
<?php
require('database.php');

if(isset($_POST['customer_name']))
{
    $customer_name = stripslashes($_REQUEST['customer_name']);
    $customer_name = mysqli_real_escape_string($con,$customer_name);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);

    $query = "SELECT *
    FROM `customer`
    WHERE customer_name='$customer_name'
    AND password='".md5($password)."'"
    ;

    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);

    if ($rows == 1){
        $userData = mysqli_fetch_assoc($result);
        $_SESSION['customer_name'] = $customer_name;
        $_SESSION['customer_ID'] = $userData['customer_ID'];
        $_SESSION['last_timestamp'] = time();

        if (isset($_POST['remember_me'])) {
            $cookie_name = "user";
            $cookie_value = $customer_name;
            $expiration_time = time() + 60 * 60 * 24 * 30;
            setcookie($cookie_name, $cookie_value, $expiration_time, "/");
        }
        header("Location: index.php");
        exit();
    }
    else {
        echo "<div class='form'>
        <h3>Username/password is incorrect.</h3>
        <br/>Click here to <a href='login.php'>Login</a></div>";
    }

    if (isset($_GET['session_expired']) && $_GET['session_expired'] == 1) {
        echo "<script>alert('Your session has expired. Please log in again.');</script>";
        session_destroy();
    }
}
?>

    <div class="form">
        <h1>User Log In</h1>
        <form action="" method="post" name="login">
            <input type="text" name="customer_name" placeholder="Username" required /><br>
            <input type="password" name="password" placeholder="Password" required /><br>
            <input name="submit" type="submit" value="Login" />

            <p>
                <label>Remember Me</label>
                <input type="checkbox" name="remember_me" id="remember_me">
            </p>
        </form>
        <p>Not registered yet? <a href='registration.php'>Register Here</a></p>
    </div>

</body>
</html>