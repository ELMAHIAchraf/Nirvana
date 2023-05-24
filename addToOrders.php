<?php
    session_start();
        include("connexion.php");
        $order_date=date("Y-m-d h:i:s");
        $delivery_date=date("Y-m-d", time()+5*24*3600);
        $order_token=bin2hex(random_bytes(8));
        $sql="SELECT * FROM cart WHERE id_client={$_SESSION['id_client']}";
        $query=mysqli_query($conn, $sql);
        while($tab=mysqli_fetch_assoc($query)){
            $sql2="INSERT INTO orders VALUES('', {$_SESSION['id_client']}, {$tab['id_article']}, '$order_date', '$delivery_date', '{$tab['color']}', {$tab['quantity']}, '', '', '', 0, '{$tab['id_color']}', '$order_token')";
            mysqli_query($conn, $sql2);
            $sql3="DELETE FROM cart WHERE id_client={$_SESSION['id_client']} AND id_article={$tab['id_article']}";
            mysqli_query($conn, $sql3);
        }
        echo $order_token;       
?>