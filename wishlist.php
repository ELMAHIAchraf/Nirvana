<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo image.png" type="image/x-icon">
    <link rel="stylesheet" href="wishlist.css">
    <script src="wishlist.js" defer></script>
    <title>Wishlist</title>
</head>
<body>
    <script>
        function redirect(id_article){
            let url="http\://localhost/Login/Nirvana/product.php?id_article="+id_article;
            if(event.target.tagName!='INPUT' && event.target.tagName!='I'){
                window.open(url, "_self");
            }
        }
    </script>
    <?php
        include('NavBar.php');
        include('notification code.php');
        
        echo "<div id='main'>";
        $sql="SELECT * FROM wishlist NATURAL JOIN articles WHERE id_client={$_SESSION['id_client']}";
        $query=mysqli_query($conn, $sql);
        if(mysqli_num_rows($query)>=1){
        $i=0;
        while($tab=mysqli_fetch_assoc($query)){
            echo "<div class='product-div' onclick='redirect({$tab['id_article']})'>
                    <input type='checkbox' class='check' id='$i' value='{$tab['id_article']}'>
                    <img src='../PFEProduct/products images/product {$tab['id_article']}/color1/item img1.jpg' alt='product image' class='product-image'>
                    <p class='product-name'>{$tab['name_article']}</p>
                    <p class='product-price'>$".$tab['price']."</p>
                    <form class='heartForm'>
                        <button type='button' class='heartButt' id='$i' onclick=\"resetIndexes('heartButt');
                        notify('Are you sure you want to remove this item from your wishlist?', this.id)\">
                            <i class='fa-solid fa-heart-crack heart'></i>
                        </button>
                    </form>
                </div>
                ";
                $i++;
            }
        }
    ?>
    <script>
        let divId;
        function notify(messageContent, id){
                document.getElementById('ok').innerHTML='yes';

                document.getElementById('message').innerHTML=messageContent;
                document.getElementById('transparent-bgd').style.display="flex";
                divId=id;
        }

        document.getElementById('ok').addEventListener('click', function(){
            removeFromWishlist(divId);
            isWishlistEmpty();
        });

        function removeSelected(){
            notify('Are you sure you want to remove the selected items from your wishlist?');
            document.getElementById('ok').addEventListener('click', function(){
                removeSelectedFromWishlist();
                isWishlistEmpty();
            });
        }

    </script>
    <form id="remove-form" >
        <center><button type="button" id="remove" onclick="resetIndexes('check');removeSelected();isWishlistEmpty()">
            <i class='fa-solid fa-heart-crack fa-beat'></i>&ensp;Remove from wishlist
        </button></center>
    </form>
    </div>
    <div id='empty-wishlist-div'>
        <i class='fa-solid fa-heart-crack fa-beat' id='heartIcon'></i>
        <p id='header'>Your wishlist is empty!</p>
        <p id='par'>Your wishlist is currently empty. Start browsing our selection of products to add items to your wishlist!</p>
    </div>
    <?php
        if(mysqli_num_rows($query)<1){
           echo "
           <script>
                document.getElementById('remove-form').style.display='none';
                document.getElementById('empty-wishlist-div').style.display='grid';
           </script>
           ";   
        }
    ?>
</body>
</html>