<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1\.0">
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Default" href="/css/app-af6a05f42b013986b481566363f0186f.css?vsn=d">
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome" href="/css/app-wa-cc491567b46eab1188c6538ebc462e7d.css?vsn=d">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-light.css">
    <link rel="shortcut icon" href="../Static/logo image.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/cart.css">
    <script src="../JS/cart.js" defer></script>
    <title>Cart</title>
</head>

<body onload="totalAmount()" onclick="hideSearchResults()">
    <script>
        function redirect(id_article) {
            let url = "http\://localhost/Login/Nirvana/PHP/product.php?id_article=" + id_article;
            if (event.target.tagName != 'INPUT' && event.target.tagName != 'I') {
                window.open(url, "_self");
            }
        }
    </script>
    <?php
    include('NavBar.php');
    include('notification code.php');
    $sql = "SELECT * FROM cart NATURAL JOIN articles WHERE id_client={$_SESSION['id_client']}";
    $query = mysqli_query($conn, $sql);

    echo "<div id='main'>";

    if (mysqli_num_rows($query) >= 1) {
        $i = 0;
        $amount = 0;
        while ($tab = mysqli_fetch_assoc($query)) {
            $default = "";
            if ($tab['color'] == "") {
                $default = "Default";
            }
            echo "<div class='product-div' onclick='redirect({$tab['id_article']})'>
                    <input type='hidden' class='check' id='$i' value='{$tab['id_article']}'>
                    <img src='../PFEProduct/../products images/product {$tab['id_article']}/{$tab['id_color']}/item img1.jpg' alt='product image' class='product-image'>
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
                    <p class='product-price'>$" . $tab['price'] * $tab['quantity'] . "</p>
                    <form class='cartForm'>
                        <button type='button' class='cartButt' id='$i' onclick=\"resetIndexes('cartButt', 'inpColor');removeNotify('Are you sure you want to remove this item from your cart?', this.id);totalAmount()\"><i class='fa-solid fa-cart-xmark cart'></i></button>
                        <input type='hidden' class='inpColor' id='inp$i' value=\"{$tab['color']}\">
                    </form>
                </div>
                ";
            if ($default == "Default") {
                echo "<script>document.getElementsByClassName('color')[$i].style.display='none'</script>";
            }
            $amount += $tab['price'] * $tab['quantity'];
            $i++;
        }
    }


    $sql2 = "SELECT address FROM client WHERE id_client={$_SESSION['id_client']}";
    $query2 = mysqli_query($conn, $sql2);
    $tab2 = mysqli_fetch_assoc($query2);
    $isAllowed = 0;
    if ($tab2['address'] != "") {
        $isAllowed = 1;
    }
    ?>

    <script>
        let divId = 0;
        let color = '';

        function removeNotify(messageContent, id) {
            document.getElementById('ok').innerHTML = 'Yes';
            color = document.getElementById('inp' + id).value;
            document.getElementById('message').innerHTML = messageContent;
            document.getElementById('transparent-bgd').style.display = "flex";
            divId = id;
            document.getElementById('ok').addEventListener('click', removeProduct);
            document.getElementById('transparent-bgd').addEventListener('click', function() {
                if (event.target.id == 'transparent-bgd') {
                    document.getElementById('ok').innerHTML = 'OK'
                    document.getElementById('ok').removeEventListener('click', removeProduct);
                }
            });
        }

        function removeProduct() {
            removeFromCart(divId, color);
            isCartEmpty();
            document.getElementById('ok').innerHTML = 'OK';
            document.getElementById('ok').removeEventListener('click', removeProduct);
        }
    </script>

    <div id="amount"></div>


    <center>
        <button type="button" <?php
                                if ($isAllowed == 0) {
                                    echo "onclick=\"notify('Please update your account with your address to complete purchases.')\"";
                                } else {
                                    echo "onclick=\"window.open('http\://localhost/Login/Nirvana/PHP/checkout.php', '_self');\"";
                                }
                                ?> id="purchase">
            <i class="fa-regular fa-credit-card fa-shake"></i>&ensp;Purchase All Items
        </button>
    </center>
    <div id='empty-cart-div'>
        <i class="fa-regular fa-cart-xmark fa-beat" id="cartIcon"></i>
        <p id='header'>Your cart is empty!</p>
        <p id='par'>Your cart is currently empty. Start browsing our selection of products to add items to your cart!</p>
    </div>
    <?php
    if (mysqli_num_rows($query) < 1) {
        echo "
           <script>
                document.getElementById('purchase').style.display='none';
                document.getElementById('amount').style.display='none';
                document.getElementById('empty-cart-div').style.display='grid';
           </script>
           ";
    }
    ?>
</body>

</html>