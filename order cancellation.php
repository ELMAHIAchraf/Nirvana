<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="logo image.png" type="image/x-icon">
    <link rel="stylesheet" href="order cancellation.css">
    <title>order cancellation </title>
</head>
<body>
    <?php 
        include('NavBar.php');
        include('notification code.php');
    ?>
    <script>
    </script>
     <div id="container">
        <img src="login image.jpg" id="login-image" alt="login image">
            <br><p id="title">Order Cancellation</p>
            <p id="par">Please enter your order ID to initiate the cancellation process.</p>
                <form action="" method="POST" id="orderForm">
                    <input type="text" name="order_id" id="orderID" placeholder="Enter your order ID">
                    <br><span id="errorMess">Order ID not found</span>
                    <br><button type="submit" name="sub" id="submit"><i class='fa-solid fa-ban'></i>&ensp;Cancel</button>
                </form>
    </div>
    <?php
        if(isset($_POST['sub'])){
            if(isset($_POST['order_id']));
                $order_id=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['order_id'])));
                $sql="SELECT UNIX_TIMESTAMP(date_commande) as time FROM orders WHERE order_token='$order_id'";
                $query=mysqli_query($conn, $sql);
                $tab=mysqli_fetch_assoc($query);
                if(mysqli_num_rows($query)>0){
                    $current_time=time();
                    if($current_time-$tab['time']<24*3600){
                        $sql2="DELETE FROM orders WHERE order_token='$order_id'";
                        mysqli_query($conn, $sql2);
                        echo "<script>notify('Your order has been successfully cancelled, and your refund has been processed.');</script>";
                    }else{
                        echo "<script>notify('Order Cancellation Denied: Orders can only be canceled within 24 hours of purchase.');</script>";
                    }
                }else{
                    echo "<script>document.getElementById('errorMess').style.display='block';</script>";
                }
        }
    ?>
</body>
</html>