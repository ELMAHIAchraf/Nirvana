<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo image.png" type="image/x-icon">
    <link rel="stylesheet" href="order cancellation.css">
    <title>order cancellation </title>
</head>
<body onload="document.getElementById('orderID').focus()" onclick="hideSearchResults()">
    <?php 
        include('NavBar.php');
        include('notification code.php');
    ?>
     <div id="container">
        <img src="checkout image.jpg" id="login-image" alt="login image">
            <br><p id="title">Order Cancellation</p>
            <p id="par">Please enter your order ID to initiate the cancellation process.</p>
                <form action="" method="POST" id="orderForm">
                    <input type="text" name="order_id" id="orderID" placeholder="Enter your order ID">
                    <br><span id="errorMess">Order ID not found</span>
                    <br><button type="button" name="sub" id="submitBtn" onclick="confirmCancellation()"><i class='fa-solid fa-ban' ></i>&ensp;Cancel</button>
                </form>
    </div>
    <script>
        function confirmCancellation(){
            let order_id=document.getElementById('orderID').value;
                if(order_id.length==16){
                document.getElementById('ok').innerHTML='Yes';
                notify(`Are you sure you want to cancel order #${order_id}`);
                document.getElementById('ok').addEventListener('click', function(){
                    document.getElementById('submitBtn').type='submit';
                    document.getElementById('submitBtn').click();      
                });
            }else{
                notify('Please enter your order ID in the provided input and double-check before submitting.');
            }
        }
    </script>
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

                        $sql2="SELECT transaction_id FROM orders WHERE order_token='$order_id'";
                        $query2=mysqli_query($conn, $sql2);
                        $tab2=mysqli_fetch_assoc($query2);
                        
                        include('vendor/autoload.php');
                        $stripe = new \Stripe\StripeClient('sk_test_51N1GKxK4PQO9ioldzVmCEQzQTX9OeMRuNOqfhfg4bdh9XDatDJYddSzawd6291y0REhmdCRoQzxheJUVWfUdZoNU00s5GV2JxI');
                        $stripe->refunds->create(['payment_intent' => "{$tab2['transaction_id']}"]);

                        $sql3="DELETE FROM orders WHERE order_token='$order_id'";
                        mysqli_query($conn, $sql3);

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