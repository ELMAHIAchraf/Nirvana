<?php
     session_start();
     include("connexion.php");
     if(isset($_POST['id_article']) && isset($_POST['color'])){
        $id_article=$_POST['id_article'];
        $sql="DELETE FROM cart WHERE id_client={$_SESSION['id_client']} AND id_article=$id_article AND color='{$_POST['color']}'";
        mysqli_query($conn, $sql);

        $sql2="SELECT COUNT(*) FROM cart WHERE id_client={$_SESSION['id_client']}";
        $query2=mysqli_query($conn, $sql2);
        $tab=mysqli_fetch_assoc($query2);
        echo $tab["COUNT(*)"];
        }
?>