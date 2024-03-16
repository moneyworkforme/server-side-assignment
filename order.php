<?php
require("header.php");

$currencySymbol = "RM";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>Orders</title>
</head>

<body>
    <h2>Order History</h2>
        <p><strong>User ID: <?php echo $_SESSION['customer_ID']; ?> 
        | Username: <?php echo $_SESSION['customer_name']; ?></strong></p>
    <p>
        <a href = "order_create.php">Create new order</a>
    </p>

    <table width="100%" border="1" style="border-collapse:collapse;">
        <thead>
            <tr>
                <th><strong>Order ID</strong></th>
                <th><strong>Date and Time</strong></th>
                <th><strong>Total Price</strong></th>
                <th><strong>Status</strong></th>
                <th><strong></strong></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sel_query = "SELECT * FROM `order` WHERE user_ID = '{$_SESSION['customer_ID']}' ORDER BY order_ID DESC;";
            $result = mysqli_query($con,$sel_query);
            while($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td align="center"><?php echo $row['order_ID']; ?></td>
                <td align="center"><?php echo $row['created_at']; ?></td>
                <td align="center"><?php echo $currencySymbol . $row['total_price']; ?></td>
                <td align="center"><?php echo $row['status']; ?></td>
                <td align="center">
                    <a href="order_view.php">View</a>
                    <a href="order_update.php?order_ID=<?php echo $row['order_ID']; ?>">Update</a>
                    <a href="order_delete.php">Delete</a>
                </td>
                <td align="center">
                    <a href="order_confirm.php">Confirm</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>

</html>