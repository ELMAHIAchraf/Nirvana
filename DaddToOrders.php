<?php
    session_start();
    if(isset($_GET) && !empty($_GET)){
        include("connexion.php");
        $order_date=date("Y-m-d h:i:s");
        $delivery_date=date("Y-m-d", time()+3*24*3600);
        $order_token=bin2hex(random_bytes(8));

            $sql2="INSERT INTO orders VALUES('', {$_SESSION['id_client']}, {$_GET['id_article']}, '$order_date', '$delivery_date', '{$_GET['color']}', {$_GET['quantity']}, '', '', '', 0, '{$_GET['id_color']}', '$order_token')";
            $query=mysqli_query($conn, $sql2);
            echo $order_token;
    }
?>