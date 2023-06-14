<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo image.png" type="image/x-icon">
    <link rel="stylesheet" href="shipping.css">
    <script src="shipping.js" defer></script>
    <title>Shipping</title>
</head>
<body onload="isShippingEmpty()" onclick="hideSearchResults()">
    <script>
        function redirect(id_article){
            let url="http\://localhost/Login/Nirvana/product.php?id_article="+id_article;
            if(event.target.tagName!='BUTTON'){
                window.open(url, "_self");
            }
        }
    </script>
    <?php 
        include("NavBar.php");
        
        if(isset($_POST['sub'])){
            if(isset($_POST['deliveryConf']) && !empty($_POST['deliveryConf'])){

                $deliveryConf=$_POST['deliveryConf'];
                $rating=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['rating'])));
                $brief_review=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['brief_review'])));
                $review=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['review'])));
                $id_order=$_POST['id_order'];


                $sql="UPDATE orders SET delivery=$deliveryConf,  rating=$rating, brief_review='$brief_review',  review='$review' WHERE id_order=$id_order";
                mysqli_query($conn, $sql);
            }
        }

        $sql="SELECT * FROM orders NATURAL JOIN articles WHERE id_client={$_SESSION['id_client']} AND delivery=0";
        $query=mysqli_query($conn, $sql);
        $i=0;
        while($tab=mysqli_fetch_assoc($query)){

            $default="";
            if($tab['color']==""){
                echo "<script>document.getElementsByClassName('color')[$i].style.display='none'</script>";
                $default="Default";
            }

            $delivryRangeValue=floor((time()-strtotime($tab['date_commande']))/3600/24);
            echo "
                <div class='product-div' onclick='redirect({$tab['id_article']})'>
                    <img class='product-img' src='../PFEProduct/products images/product {$tab['id_article']}/{$tab['id_color']}/item img1.jpg' alt='product image'>
                    <p class='product-name'>{$tab['name_article']}</p>
                    <div class='colorDiv'>
                        <p class='colorPar'>Color:&ensp;</p>
                        <div class='color' style='background-color:{$tab['color']};'></div>
                        <p class='default'>$default</p>
                    </div>
                    <div class='quantityDiv'>
                        <p class='quantityPar'>Quantity:&ensp;</p>
                        <input class='quantity-input' type='texte' value='{$tab['quantity']}' disabled>
                    </div>
                    <div class='shipping-details'>
                    <i class='fa-solid fa-shop company-icon'></i>
                        <input type='range' class='tracking-range' value='$delivryRangeValue' min='0' max='5'>
                        <i class='fa-solid fa-house house-icon'></i>
                    </div>
                    <button class='confirm-butt' onclick='displayDetails($i)'>Confirm delivery & review product&ensp;<i class='fa-solid fa-angle-down down-arrow'></i></button>
                </div>
                <div class='product-conf-div'>
                    <form action='' method='POST' class='conf-form'>
                        <input type='checkbox' name='deliveryConf' value='1' class='check'>
                        <label for='deliveryComf' class='conf-text'>Confirm delivery</label>
                        <br><input type='number' id='rating-inp' name='rating' oninput='starsRating($i ,$i)'  placeholder='Rate' class='inputs rating' min='0' max='5' step='0.5'>
                        <div id='rating' class='stars-div product$i' onmouseover='displayRatingsDetails()' onmouseout='hideRatingsDetails()'>
                            <i class='fa-regular fa-star' id='star1'></i>
                            <i class='fa-regular fa-star' id='star2'></i>
                            <i class='fa-regular fa-star' id='star3'></i>
                            <i class='fa-regular fa-star' id='star4'></i>
                            <i class='fa-regular fa-star' id='star5'></i>
                        </div>
                        <br><input type='text' name='brief_review' placeholder='Brief review' class='inputs brief-review'>
                        <br><input type='text' name='review' placeholder='review' class='inputs review'>
                        <input type='hidden' name='id_order' value='{$tab['id_order']}'>
                        <br><input class='sub' type='submit' name='sub' value='Submit'>
                    </form>
                </div>
                <script>document.getElementsByClassName('product-div')[0].style.marginTop='6%'</script>
            ";
            $i++;
        }
    ?>
    <div id='empty-shipping-div'>
        <i class='fa-solid fa-truck-fast fa-beat' id='shippingIcon'></i>
        <p id='header'>Your shipping cart is empty!</p>
        <p id='par'>Your shipping cart is currently empty. Start buying products to add items to your shipping cart!</p>
    </div>
    <div id="margin-div"></div>
</body>
</html>