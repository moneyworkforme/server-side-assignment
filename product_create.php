<?php
include("auth.php");
require('database.php');
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $product_name =$_REQUEST['product_name'];
    $price = $_REQUEST['price'];
    $quantity = $_REQUEST['quantity'];
    $date_record = date("Y-m-d H:i:s");
    $submittedby = $_SESSION["username"];
    $ins_query="INSERT into products
    (`product_name`,`price`,`quntity`,`date_record`,`submittedby`)values
    ('$product_name','$price','$quantity','$date_record','$submittedby')";
    mysqli_query($con,$ins_query) or die(mysqli_error($con));
    $status = "New Product Inserted Successfully.
    </br></br><a href='view.php'>View Product Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Insert New Product</title>
    <link rel="stylesheet" href="css/product_create.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> <!--to use boxicons icons-->
</head>

<body>
<div class="container">
    <div class="header">
        <p>account name</p>
        <nav>
            <a href="dashboard.php">User Dashboard</a> |
            <a href="view.php">View Product Records</a> |
            <a href="logout.php">Logout</a>
        </nav>
    </div>
    <div class="child">
        <div class="wrapper">
            <form enctype="multipart/form-data" action="" method="post" name="form">
                <h1>Insert New Product</h1>
                <!-- Specify this form as a new submission -->
                <input type="hidden" name="new" value="1" /> 
                <!-- product_name -->
                <div class="input-box">
                    <input type="text" name="product_name" placeholder="Enter Product Name" required/>
                    <i class='bx bx-devices'></i>
                </div>
                <!-- product_description -->
                <div class="input-box">
                    <input type="text" name="product_desc" placeholder="Enter Product Description" required/>
                    <i class='bx bx-message-square-detail'></i>
                </div>
                <!-- product_price -->
                <div class="input-box">
                    <input type="number" name="price" step="0.01" min="0" placeholder="Enter Product Price (RM)" required/>
                    <i class='bx bx-purchase-tag'></i>
                </div>
                <!-- product_quantity -->
                <div class="input-box">
                    <input type="number" name="quantity" placeholder="Enter Product Quantity" required/>
                    <i class='bx bx-list-check'></i>
                </div>
                <!-- product_picture -->
                <!-- <input type="file" name="file" id="fileInput" required/>
                <label for="fileInput">Upload Product Image<i class='bx bx-upload' ></i></label> -->

                <label>Upload Product Image<i class='bx bx-upload' ></i></label>
                <input type="file" class="uploadbtn" name="file" required/>

                
                <div class="registerbtn">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
            
            <p style="color:#008000;"><?php echo $status; ?></p>   
        </div>
    </div>
</div>

</body>
</html>