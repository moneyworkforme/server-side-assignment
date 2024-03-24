<?php
include("header.php");
require('database.php');
$id=$_REQUEST['id'];
$query = "SELECT * FROM products where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error($con));
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Product Record</title>
    <link rel="stylesheet" href="css/product_update.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> <!--to use boxicons icons-->
</head>
</head>
<body>
    <h1>Update Product Record</h1> 
    <?php
        $status = "";
        if(isset($_POST['new']) && $_POST['new']==1){
            $allowedExtensions=['png','jpeg','jpg'];
            $uploadedFileName = $_FILES['image']['name'];
            $fileExtension=strtolower(pathinfo($uploadedFileName, PATHINFO_EXTENSION));
        
            if(in_array($fileExtension, $allowedExtensions)){
                $targetDirectory = "product_image/";
                $targetFilePath = $targetDirectory . $uploadedFileName;
        
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                    $product_name =$_REQUEST['product_name'];
                    $product_desc =$_REQUEST['product_desc'];
                    $product_price =$_REQUEST['product_price'];
                    $product_cat =$_REQUEST['product_category'];
                    $product_quantity = $_REQUEST['product_quantity'];
                    $date_record = date("Y-m-d H:i:s");
                    $submittedby = $_SESSION["customer_ID"];
                    $ins_query="INSERT into product (`product_name`,`product_desc`,`product_price`,`product_cat`,`product_quantity`,`product_image`,`product_reg_date`,`submittedby`)values
                    ('$product_name','$product_desc','$product_price','$product_cat','$product_quantity','$uploadedFileName','$date_record','$submittedby')";
                    mysqli_query($con,$ins_query) or die(mysqli_error($con));
                    $status = "New product inserted successfully.";
                    header("Location: product_record.php");
                }else{
                    $status = "Product update failed.";
                }
            }else{
                $status = "Invalid file type.";
            }
        }else{
    ?>
    <form name="form" method="post" action=""> 
    <input type="hidden" name="new" value="1" /> <!-- form handling -->
    <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
    <p><input type="text" name="product_name" placeholder="Update Product Name" 
    required value="<?php echo $row['product_name'];?>" /></p>
    <p><input type="text" name="price" placeholder="Update Product Price" 
    required value="RM <?php echo $row['price'];?>" /></p>
    <p><input type="text" name="quantity" placeholder="Update Product Quantity" 
    required value="<?php echo $row['quntity'];?>" /></p>
    <p><input name="submit" type="submit" value="Update" /></p>
    </form>
    <?php } ?>
</body>
</html>