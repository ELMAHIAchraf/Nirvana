<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="logo image.png" type="image/x-icon">
    <link rel="stylesheet" href="home.css">
    <script src="home.js" defer></script>
    <title>Home</title>
</head>
<body onload="loadedCategory()" onclick="hideSearchResults()">
            <?php
                include("connexion.php");

                if(isset($_COOKIE['token'])){
                    $current_date=date('Y-m-d');
                    //Cheking if a token with a valid date exists in the token table
                    $sql="SELECT id_client FROM token WHERE token='{$_COOKIE['token']}' AND '$current_date' BETWEEN creation_date AND expiration_date";
                        $query=mysqli_query($conn, $sql);
                        $tab=mysqli_fetch_assoc($query);
                            //if the token exists, get the id of the client to access his name or other infos in the client table
                            if(!empty($tab['id_client'])){
                                $sql2="SELECT * FROM client WHERE id_client='{$tab['id_client']}'";
                                $query2=mysqli_query($conn, $sql2);
                                $tab2=mysqli_fetch_assoc($query2);
                                // $_SESSION['fname']=$tab2['Fname'];
        
                                $_SESSION['name_client']=$tab2['Fname'];
                                $_SESSION['id_client']=$tab2['id_client'];
                                $_SESSION['email_client']=$tab2['email'];
                                
                             }
                }
                include("NavBar.php");

                if(isset($_SESSION) && !empty($_SESSION)){
                    function isInWishlist($id_article){
                        global $conn;
                        $sql="SELECT * FROM wishlist where id_article=$id_article AND id_client={$_SESSION['id_client']}";
                        $query=mysqli_query($conn, $sql);
                        $tab=mysqli_fetch_assoc($query);
                        if(!empty($tab)){
                            return 1;
                        }else{
                            return 0;
                        }
                    }
                }
                
            ?>
    

        <div id="main">
            <i class="fa-solid fa-angle-left img-arrows" id="left-arrow"></i>
            <div id="image-div"></div>
            <i class="fa-solid fa-angle-right img-arrows" id="right-arrow"></i> 
            
            <div id="products-div">
                <script>
                        function redirect(id_article){
                            let url="http\://localhost/Login/Nirvana/product.php?id_article="+id_article;
                            if(event.target.tagName!='BUTTON'){
                                window.open(url, "_self");
                            }
                        }
                </script>
                <?php
                if(isset($_POST['searchButt']) && $_POST['category']!="All Categories"){
                        $category=trim($_POST['category']);  
                        $sql4="SELECT * FROM articles WHERE category='$category'"; 
                        $query4=mysqli_query($conn, $sql4);
                        $i=0;
                        while ($tab4=mysqli_fetch_assoc($query4)) {
                            echo "
                            <div class='product-div' onclick='redirect({$tab4['id_article']})'>
                            <div class='product-category'>
                                <i class='fa-solid fa-list categoryI'></i>
                                &ensp;<p class='categoryN'>{$tab4['category']}</p>
                            </div>
                            <img src='../PFEProduct/products images/product {$tab4['id_article']}/color1/item img1.jpg' alt='Product image' class='product-img'>
                            <p class='product-name'>{$tab4['name_article']}</p>
                            <p class='price'>$"."{$tab4['price']}</p>
                            <form class='heart-form' id='heartForm$i'>
                                <button class='product-heart-butt' type='button'>
                                    <i class='fa-solid fa-heart heart'  onmouseover='brokenHeart($i)' onmouseleave='normalHeart($i)'></i>
                                </button>
                            </form>
                            <input class='id_article' type='hidden' value='{$tab4['id_article']}'>
                        </div>
                            ";
                        if(isset($_SESSION) && !empty($_SESSION)){
                            if(isInWishlist($tab4['id_article'])==1){
                                echo "<script>document.getElementsByClassName('heart')[$i].style.color='rgb(238, 71, 71)';</script>";
                            } 
                                echo "
                                    <script >
                                        document.querySelector('#heartForm$i > button').addEventListener('click', function(){
                                            event.stopPropagation();heartClick($i);addToWishlist($i);
                                        });
                                    </script>";
                        }else{
                            echo "
                            <script style='display:none;'>
                            document.querySelector('#heartForm$i > button').addEventListener('click', function(){
                                event.stopPropagation();notify('Please log in to save this product to your wishlist.');
                            });
                            </script>";
                        }
                        $i++;
                        }
                        echo "<script>document.getElementById('$category').selected='selected'</script>";
                }else{
                    // $randomIds= array();
                    // for ($i=0; $i < 12; $i++) { 
                    //     $randomValue=rand(1,60);
                    //     if(!in_array($randomValue, $randomIds)){
                    //      $randomIds[$i]=$randomValue;
                    //     }else{
                    //         $randomIds[$i]=rand(1,60);
                    //     }
                    // }
                    // for ($j=0; $j < count($randomIds); $j++) { 
                        $sql3="SELECT * FROM articles ORDER BY RAND() LIMIT 12";
                        $query3=mysqli_query($conn, $sql3);
                        $j=0;
                        while($tab3=mysqli_fetch_assoc($query3)){
                        echo "
                        <div class='product-div' onclick='redirect({$tab3['id_article']})'>
                            <div class='product-category'>
                                <i class='fa-solid fa-list categoryI'></i>
                                &ensp;<p class='categoryN'>{$tab3['category']}</p>
                            </div>
                            <img src='../PFEProduct/products images/product {$tab3['id_article']}/color1/item img1.jpg' alt='Product image' class='product-img'>
                            <p class='product-name'>{$tab3['name_article']}</p>
                            <p class='price'>$"."{$tab3['price']}</p>
                            <form class='heart-form' id='heartForm$j'>
                                <button class='product-heart-butt' type='button' >
                                    <i class='fa-solid fa-heart heart'  onmouseover='brokenHeart($j)' onmouseleave='normalHeart($j)'></i>
                                </button>
                            </form>
                            <input class='id_article' type='hidden' value='{$tab3['id_article']}'>
                        </div>
                        ";
                        if(isset($_SESSION) && !empty($_SESSION)){
                            if(isInWishlist($tab3['id_article'])==1){
                                echo "<script>document.getElementsByClassName('heart')[$j].style.color='rgb(238, 71, 71)';</script>";
                            } 
                                echo "
                                    <script >
                                        document.querySelector('#heartForm$j > button').addEventListener('click', function(){
                                            event.stopPropagation();heartClick($j);addToWishlist($j);
                                        });
                                    </script>";
                        }else{
                            echo "
                            <script style='display:none;'>
                            document.querySelector('#heartForm$j > button').addEventListener('click', function(){
                                event.stopPropagation();notify('Please log in to save this product to your wishlist.');
                            });
                            </script>";
                        }
                        $j++;
                    }
                }
                ?>
        </div> 
        <div id="footer">
            <div id="left-footer">
                <div id="company-name">
                    <img id="logo-footer" src="logo image.png" alt="Logo">
                    <p id="logo-par-footer">IRVANA</p>
                </div>
                <div id="social-media">
                    <i class="fa-brands fa-facebook footer-icones"></i>
                    <i class="fa-brands fa-twitter footer-icones"></i>
                    <i class="fa-brands fa-instagram footer-icones"></i>
                </div>
            </div>
            <div id="right-footer">
                <p>Contacts</p>
                <p>+21258852014</p>
                <a href="mailto:nirv4n4.supp0rt@gmail.com">nirv4n4.supp0rt@gmail.com</a>
            </div>
        </div>
                    </div>
</body>
</html>