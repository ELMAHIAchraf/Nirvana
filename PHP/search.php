<?php

    if(isset($_GET['search']) && isset($_GET['category'])){
        include("connexion.php");

        $search=$_GET['search'];
        $search =str_replace("'", "\'", $search);
        $sql="SELECT name_article FROM articles WHERE name_article='$search' OR name_article LIKE '%$search%' OR name_article LIKE '%$search' OR name_article LIKE '$search%' LIMIT 5";
        if($_GET['category']!="All Categories"){
            $sql="SELECT name_article FROM articles WHERE (name_article='$search' OR name_article LIKE '%$search%' OR name_article LIKE '%$search' OR name_article LIKE '$search%') AND category='{$_GET['category']}' LIMIT 5";
        }
        $query=mysqli_query($conn, $sql);
            if(mysqli_num_rows($query)>0){
                while($tab=mysqli_fetch_assoc($query)){
                    $result[]=$tab;
                }
                echo json_encode($result);
            }
        }
?>