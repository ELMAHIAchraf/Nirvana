<?php 
    include("connexion.php");
    
    $sql="SELECT * FROM colors";
    $query=mysqli_query($conn, $sql);

    $xml="<?xml version='1.0' encoding='UTF-8'?><colors>";
    
    while($tab=mysqli_fetch_assoc($query)){
        $xml.="<color><id_color>{$tab['id_color']}</id_color><color_code>{$tab['color']}</color_code></color>";
    }
    $xml.="</colors>";
    file_put_contents("colors.xml", $xml);
?>