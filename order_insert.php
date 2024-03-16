<?php
require("header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>Insert new Order</title>
</head>

<body>
    <h2>Insert new order</h2>

    <form name ="form" method="post" action="">
        <input type = "hidden" name = "new" value = "1"/>
        <p><input type="text" name="product_name" placeholder="Enter Product Name" required/></p>
    </form>
</body>
</html>