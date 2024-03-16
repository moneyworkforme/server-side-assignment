<?php
require("header.php");

$currencySymbol = "RM";

if (isset($_POST['new']) && $_POST['new'] == 1) {
    $order_ID = $_REQUEST['order_ID'];
    $product_ID = $_REQUEST['product_ID'];
    $quantity = $_REQUEST['quantity'];
    $unit_price = $_REQUEST['unit_price'];

    $ins_query="INSERT into order_product (`order_ID`,`product_ID`,`quantity`,`unit_price`)
                VALUES ('$order_ID','$product_ID','$quantity','$unit_price')";
    mysqli_query($con,$ins_query) or die(mysqli_error($con));
}

if (isset($_POST['Update'])) {
    $order_product_ID = $_POST['order_product_ID'];
    $quantity = $_POST['quantity'];

    $upd_query="UPDATE order_product SET quantity = '".$quantity."' WHERE order_product_ID='".$order_product_ID."';";
    mysqli_query($con, $upd_query) or die(mysqli_error($con));
    echo "Product Record Updated Successfully.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>Update order</title>
</head>

<body>
    <h2>Order ID: <?php echo $_REQUEST['order_ID'] ?></h2>

    <table width="100%" border="1" style="border-collapse:collapse;">
        <thead>
            <tr>
                <th><strong>No.</strong></th>
                <th><strong>Product ID</strong></th>
                <th><strong>Quantity</strong></th>
                <th><strong>Unit Price</strong></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
            if(isset($_GET['order_ID'])) {
                $count = 1;
                $order_ID = $_GET['order_ID'];
                $sel_query = "SELECT * FROM order_product WHERE order_ID ='". $order_ID . "';";
                $result = mysqli_query($con, $sel_query) or die ( mysqli_error($con));

                while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <form name="form" method="post" action="">
                        <td align="center"><?php echo $count; ?></td>
                        <td align="center"><?php echo $row['order_product_ID']; ?></td>
                        <td align="center"><input type = "number" name = "quantity" placeholder = "Update Quantity" required value = "<?php echo $row['quantity'];?>"></td>
                        <td align="center"><?php echo $currencySymbol . $row['unit_price']; ?></td>
                        <td align="center">
                        <input type="hidden" name="order_product_ID" value="<?php echo $row['order_product_ID']; ?>">
                        <input type="submit" name="Update" value="Update">
                        </form>
                        </td>
                    </tr>
                <?php $count++; } }?>
            </tbody>
    </table>

    <?php
        $display_style = "none"; // Initial display style
        if (isset($_POST['toggle'])) {
            // Toggle the display style
            $display_style = ($_POST['toggle'] == 'hide') ? 'none' : 'block';
        }
    ?>
    <p><strong>Insert new product</strong></p>
    <form method="post">
        <button type="submit" name="toggle" value="<?php echo ($display_style == 'block') ? 'hide' : 'show'; ?>">
            <?php echo ($display_style == 'block') ? 'Hide' : 'Show'; ?>: Insert new product
        </button>
    </form>
    <div id="myDIV" style="display: <?php echo $display_style; ?>">
        <form name ="form" method="post" action="">
            <input type = "hidden" name = "new" value = "1"/>
            <p>Product ID: <input type="text" name="product_ID" placeholder="Enter product ID" required/></p>
            <p>Quantity: <input type="text" name="quantity" placeholder="Enter quantity" required/></p>
            <p>Unit Price: RM<input type="text" name="unit_price" placeholder="Enter unit price" required/></p>
            <p><input name="submit" type="submit" value="Submit" />
                <input name="reset" type="reset" value="Reset" /></p>
        </form>
    </div>
</body>
</html>