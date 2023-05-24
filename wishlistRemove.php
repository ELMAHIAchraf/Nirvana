<?php
    session_start();
    include("connexion.php");

    if(isset($_POST['id_article'])){
        $id_article=$_POST['id_article'];
        $sql="DELETE FROM wishlist WHERE id_client={$_SESSION['id_client']} AND id_article='$id_article'";
        mysqli_query($conn, $sql);
        
        $sql2="SELECT COUNT(*) FROM wishlist WHERE id_client={$_SESSION['id_client']}";
        $query2=mysqli_query($conn, $sql2);
        $tab=mysqli_fetch_assoc($query2);
        echo $tab["COUNT(*)"];
    }

?>