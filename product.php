<?php
require('database.php');
require('main_header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Product Records</title>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <div class="container">
        <div>
            <div class="techkle_big_img">
                <img src="css/techkle banner.jpeg">
                <button id="scrollDownBtn">Let's get started!</button>
            </div>
            <div id="content">
                <div class="Charging_Accessories">
                    <p>Charging Accessories</p>
                    <div class="line"></div>
                </div>
            </div>
        </div>
        

    </div>
    <script>
        //navigate user with slide down animation to content below
        document.getElementById("scrollDownBtn").addEventListener("click", function() {
            document.getElementById("content").scrollIntoView({ behavior: "smooth", block: "start" });
        });

    </script>
</body>

</html>