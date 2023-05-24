<?php
      session_start();
      include("connexion.php");

     if(isset($_POST['color']) && isset($_POST['quantity']) && isset($_POST['id_article']) && isset($_POST['id_color'])){
        $id_article=$_POST['id_article'];
        $color=$_POST['color'];
        $quantity=$_POST['quantity'];
        $id_color=$_POST['id_color'];
        $sql="INSERT INTO cart(id_client, id_article, color, quantity, id_color) VALUES({$_SESSION['id_client']}, $id_article, '$color', '$quantity', '$id_color')";
        mysqli_query($conn, $sql);

        $sql2="SELECT COUNT(*) FROM cart WHERE id_client={$_SESSION['id_client']}";
        $query2=mysqli_query($conn, $sql2);
        $tab=mysqli_fetch_assoc($query2);
        echo $tab["COUNT(*)"];
     }
?>