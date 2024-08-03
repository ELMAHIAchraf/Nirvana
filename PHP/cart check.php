<?php
      session_start();
      include("connexion.php");
     if(isset($_GET['color']) && isset($_GET['id_article'])){
        $sql="SELECT * FROM cart WHERE id_client={$_SESSION['id_client']} AND id_article={$_GET['id_article']} AND color='#{$_GET['color']}'";
        $query=mysqli_query($conn, $sql);
        if(mysqli_num_rows($query)>0){
            echo 1;
        }else{
            echo 0;
        }
     }
?>