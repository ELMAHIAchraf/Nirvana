<?php
     session_start();
     include("connexion.php");

        $sql="SELECT price, quantity FROM articles NATURAL JOIN cart WHERE id_client={$_SESSION['id_client']}";
        $query=mysqli_query($conn, $sql);
        $amount=0;
        while($tab=mysqli_fetch_row($query)){
            $amount+=$tab[0]*$tab[1];
        }
        echo $amount;
?>