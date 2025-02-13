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
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-light.css">    <link rel="shortcut icon" href="../Static/logo image.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/product.css">
    <script src="../JS/product.js" defer></script>
    <title>Product</title>
</head>
<?php
include("connexion.php");
$sql = "SELECT AVG(rating) FROM orders WHERE id_article={$_GET['id_article']}";
$query = mysqli_query($conn, $sql);
$tab = mysqli_fetch_assoc($query);
$rate = $tab['AVG(rating)'];
$specificRate = round($rate, 1);
$decimal = $rate - floor($rate);
if ($decimal > 0.5) {
    $rate = ceil($rate);
} elseif ($decimal < 0.5) {
    $rate = floor($rate);
}

function starPercentage($rating)
{
    global $conn;
    $sql2 = "SELECT rating FROM orders WHERE id_article={$_GET['id_article']} AND rating LIKE '$rating%'";
    $query2 = mysqli_query($conn, $sql2);
    $occurences = mysqli_num_rows($query2);

    $sql3 = "SELECT rating FROM orders WHERE id_article={$_GET['id_article']} AND rating BETWEEN 1 AND 5";
    $query3 = mysqli_query($conn, $sql3);
    $all = mysqli_num_rows($query3);

    if ($all > 0) {
        $percentage = round($occurences / $all * 100);
        static $overAllPercentage = 0;
        $overAllPercentage += $percentage / 2;
        if ($overAllPercentage > 100) {
            $percentage -= 1;
        }
    } else {
        $percentage = 0;
    }
    return $percentage;
}
function isInWishlist($id_article)
{
    global $conn;
    $sql = "SELECT * FROM wishlist where id_article=$id_article AND id_client={$_SESSION['id_client']}";
    $query = mysqli_query($conn, $sql);
    $tab = mysqli_fetch_assoc($query);
    if (!empty($tab)) {
        return 1;
    } else {
        return 0;
    }
}

$sql4 = "SELECT COUNT(*) FROM orders WHERE id_article={$_GET['id_article']} AND rating BETWEEN 0.5 AND 5";
$query4 = mysqli_query($conn, $sql4);
$tab4 = mysqli_fetch_assoc($query4);
$ratingsTotal = $tab4['COUNT(*)'];

include("fetch_xml.php");
function isInCart()
{
    global $conn;
    $sql = "SELECT color1 FROM articles WHERE id_article={$_GET['id_article']}";
    $query = mysqli_query($conn, $sql);
    $tab = mysqli_fetch_row($query);

    if ($tab[0] != NULL) {
        $color = fetch($tab[0]);

        $sql3 = "SELECT * FROM cart WHERE id_client={$_SESSION['id_client']} AND id_article={$_GET['id_article']} AND color='$color'";
        $query3 = mysqli_query($conn, $sql3);
        if (mysqli_num_rows($query3)) {
            return 1;
        }
    } else {
        $sql3 = "SELECT * FROM cart WHERE id_client={$_SESSION['id_client']} AND id_article={$_GET['id_article']}";
        $query3 = mysqli_query($conn, $sql3);
        if (mysqli_num_rows($query3)) {
            return 1;
        }
    }
}

if (isset($_GET['id_article'])) {
    $sql6 = "SELECT * FROM articles WHERE id_article={$_GET['id_article']}";
    $query6 = mysqli_query($conn, $sql6);
    $tab6 = mysqli_fetch_assoc($query6);
}

$path = "../products images/product {$tab6['id_article']}/color1";
$colorDirCount = count(scandir($path)) - 2;

echo "<script>
                            let images = [];
                            for (let i = 0; i < $colorDirCount; i++) {
                                images[i]='$path/item img'+(i+1)+'.jpg';
                            }
                    </script>";
?>

<body onload="slide();starsRating(<?php echo $rate ?>);" onclick="hideSearchResults()">
    <?php
    include("NavBar.php");
    ?>
    <div id="transparent-bg" onclick="hideImage()">
        <i class="fa-solid fa-angle-left" id="left-arrow" onclick="slideLeft()" onmouseover="arrowHover(this.id)" onmouseleave="arrowMouseLeave(this.id)"></i>
        <div id="image-div">
            <img id="displayed-img" src="color1/item img1.jpg">
        </div>
        <i class="fa-solid fa-angle-right" id="right-arrow" onclick="slideRight()" onmouseover="arrowHover(this.id)" onmouseleave="arrowMouseLeave(this.id)"></i>
    </div>
    <div id="main">

        <div id="wishlist" onclick="heartClick();addToWishlist()">
            <?php
            if (isset($_SESSION) && !empty($_SESSION)) {
                $isInWish = isInWishlist($tab6['id_article']);
                if ($isInWish == 1) {
                    echo "<i class='fa-solid fa-heart-crack heart'></i>&nbsp; Remove";
                } else {
                    echo "<i class='fa-solid fa-heart heart'></i>&nbsp; Add to wishlist";
                }
            } else {
                echo "<i class='fa-solid fa-heart heart'></i>&nbsp; Add to wishlist";
            }
            ?>
        </div>
        <?php
        if (isset($_SESSION) && !empty($_SESSION)) {
            $isInWish = isInWishlist($tab6['id_article']);
            if ($isInWish == 1) {
                echo "<script>document.getElementById('wishlist').style.backgroundColor='#ff4444';</script>";
            } else {
                echo "<script>document.getElementById('wishlist').style.backgroundColor='#ff8b8b';</script>";
            }
        } else {
            echo "<script>
                            document.getElementById('wishlist').onclick='';
                            document.getElementById('wishlist').addEventListener('click', function(){
                                notify('Please log in to save this product to your wishlist.')
                            });
                        </script>";
        }
        ?>
        <div id="container">
            <div id="product-imgs">
                <img id="product-img" src="" alt="Article images" onclick="imageDisplay()">
                <div id="circles-div">
                    <?php
                    echo "<script>
                            let circles = [];
                            for (let i = 0; i < $colorDirCount; i++) {
                                circles[i]='circle'+(i+1);
                            }
                        </script>";
                    for ($i = 0; $i < $colorDirCount; $i++) {
                        echo "<i class='fa-solid fa-circle circles' id='circle" . ($i + 1) . "' onclick='displayImage($i, this.id)'></i>";
                    }
                    ?>
                </div>
            </div>

            <div id="product-infos">
                <input type="hidden" id="product_id" value="<?php echo $tab6['id_article'] ?>">
                <p id="product-name"><?php echo $tab6['name_article'] ?></p>
                <!-- number_format take the value then the decimal number then a string to represent the decimal poiny the a string to separate thousands -->
                <p id="product-price"><?php echo "$" . number_format($tab6['price'], 2, ",", ".") ?></p>
                <div id="rating" onmouseover="displayRatingsDetails()" onmouseout="hideRatingsDetails()">
                    <center>
                        <i class="fa-regular fa-star" id="star1"></i>
                        <i class="fa-regular fa-star" id="star2"></i>
                        <i class="fa-regular fa-star" id="star3"></i>
                        <i class="fa-regular fa-star" id="star4"></i>
                        <i class="fa-regular fa-star" id="star5"></i>
                        <i class="fa-sharp fa-solid fa-angle-down" id="down-arrow"></i>
                    </center>
                    <div id="ratings-detail-cont">
                        <div id="triangle"></div>
                        <p id="precise-rate"><?php echo $specificRate . " out of 5" ?></p>
                        <label for="star5">5 star</label>&ensp;
                        <progress name="star5" min="0" max="100" value="<?php echo starPercentage(5) ?>"></progress>
                        <p class="rating-percentage">&ensp;<?php echo starPercentage(5) . "%" ?></p>
                        <br><label for="star4">4 star</label>&ensp;
                        <progress name="star4" min="0" max="100" value="<?php echo starPercentage(4) ?>"></progress>
                        <p class="rating-percentage">&ensp;<?php echo starPercentage(4) . "%" ?></p>
                        <br><label for="star3">3 star</label>&ensp;
                        <progress name="star3" min="0" max="100" value="<?php echo starPercentage(3) ?>"></progress>
                        <p class="rating-percentage">&ensp;<?php echo starPercentage(3) . "%" ?></p>
                        <br><label for="star2">2 star</label>&ensp;
                        <progress name="star2" min="0" max="100" value="<?php echo starPercentage(2) ?>"></progress>
                        <p class="rating-percentage">&ensp;<?php echo starPercentage(2) . "%" ?></p>
                        <br><label for="star1">1 star</label>&ensp;
                        <progress name="star1" min="0" max="100" value="<?php echo starPercentage(1) ?>"></progress>
                        <p class="rating-percentage">&ensp;<?php echo starPercentage(1) . "%" ?></p>
                        <hr id="rating-div-hr">
                        <button id="reviews-display" onclick="displayReviews()">See all customers reviews<i class="fa-sharp fa-solid fa-angle-down" id="down-arrow-reviews"></i></button>
                    </div>
                </div>
                <p id="ratings-count"><?php echo $ratingsTotal . " ratings"; ?></p>
                <hr><br><br>
                <ul>
                    <?php
                    echo "<li>" . str_replace("<br>", "</li><li>", $tab6['description_article']);
                    ?>
                </ul>
                <?php
                function numberOfColors()
                {
                    global $tab6;
                    $colorsNumber = 0;
                    for ($i = 1; $i <= 3; $i++) {
                        if ($tab6["color$i"] != "") {
                            $colorsNumber += 1;
                        }
                    }
                    return $colorsNumber;
                }
                ?>
                <p id="colorPar"><?php if (numberOfColors() > 1) echo "Color" ?></p>
                <div id="clrCo">
                    <div id="colorCont">
                        <?php
                        if (numberOfColors() > 1) {
                            $number = numberOfColors();
                            echo "<script>
                            let colors=[];
                            for (let i = 0; i < $number; i++) {
                                colors[i]='check-icon'+(i+1);
                            }
                            </script>";
                            for ($k = 1; $k <= numberOfColors(); $k++) {
                                $color = fetch($tab6["color$k"]);

                                echo "<div class='colors' id='color$k' style='background-color:$color;' onclick=\"isInCart({$_GET['id_article']}, '$color');addCheck('check-icon$k');switchItemColor(this.id);colorDivId(this.id);\"><img class='check-icons' id='check-icon$k' src='../Static/check mark.png' alt='check icon'></div>";
                                echo "<input type='hidden' id='colorInp$k' value='$color'>";
                            }
                        }
                        if (numberOfColors() <= 1) {
                            echo "<script>
                                        document.getElementById('colorPar').style.display='none';
                                        document.getElementById('clrCo').style.display='none';
                                    </script>";
                        }
                        ?>
                    </div>
                </div>
                <br>
                <p id="quantityPar">Quantity</p>
                <input id="quantity-input" type="number" value="1" min="1">
                <?php
                if (numberOfColors() <= 1) {
                    echo "<script>
                                    document.getElementById('quantityPar').style.marginTop='-2%';
                                    document.getElementById('quantity-input').style.marginTop='-2%';
                                </script>";
                }
                $consiseName = "";
                $name = explode(" ", $tab6['name_article']);
                if (count($name) > 4) {
                    for ($k = 0; $k < 5; $k++) {
                        $consiseName .= $name[$k] . " ";
                    }
                } else {
                    $consiseName .= $tab6['name_article'];
                }
                $description = $consiseName . "(...)";
                $description = str_replace("'", "\'", $description);

                if (isset($_SESSION) && !empty($_SESSION)) {
                    $sql = "SELECT address FROM client WHERE id_client={$_SESSION['id_client']}";
                    $query = mysqli_query($conn, $sql);
                    $tab = mysqli_fetch_assoc($query);
                    $isAllowed = 0;
                    if ($tab['address'] != "") {
                        $isAllowed = 1;
                    }
                }
                ?>
                <br><button id="buy-butt" <?php
                                            if (isset($_SESSION) && !empty($_SESSION)) {
                                                if ($isAllowed == 0) {
                                                    echo "onclick=\"notify('Please update your account with your address to complete purchases.')\"";
                                                } else {
                                                    echo "onclick=\"parmsPrep();window.open('http://localhost/Login/Nirvana/PHP/Dcheckout.php?id_article=" . $tab6['id_article'] . "&description=" . $description . "&id_color='+clrDivId+'&color='+color+'&quantity='+quantity, '_self');\"";
                                                }
                                            }
                                            ?>><i class="fa-regular fa-credit-card"></i>&ensp;Buy now</button>
                <form id="addToCart-form">
                    <button type="button" id="addToCart-butt">
                        <?php
                        if (isset($_SESSION) && !empty($_SESSION)) {
                            if (isInCart() == 1) {
                                echo "<i class='fa-solid fa-cart-arrow-up' id='cart-icon'></i>&ensp;Remove";
                            } else {
                                echo "<i class='fa-solid fa-cart-arrow-down' id='cart-icon'></i>&ensp;Add to cart";
                            }
                            echo "<script>
                                document.getElementById('addToCart-butt').addEventListener('click', function(){
                                    addToCart();
                                });
                            </script>";
                        } else {
                            echo "<i class='fa-solid fa-cart-arrow-down' id='cart-icon'></i>&ensp;Add to cart";
                            echo "<script>
                                document.getElementById('addToCart-butt').addEventListener('click', function(){
                                    notify('Please log in to save this product to your cart.');
                                });
                                document.getElementById('buy-butt').onclick='';
                                document.getElementById('buy-butt').addEventListener('click', function(){
                                    notify('Please log in to buy this product.');
                                });
                            </script>";
                        }
                        ?>
                    </button>
                </form>
            </div>
        </div>

        <script>
            let reviewStars = ['Rstar1', 'Rstar2', 'Rstar3', 'Rstar4', 'Rstar5'];

            function reviewsStarsRating(rating, reviewDivClass) {
                let i;
                let intRating = Math.floor(rating);
                let selector = ``;
                for (i = 0; i < intRating; i++) {
                    selector = `.${reviewDivClass} > #${reviewStars[i]}`;
                    document.querySelector(selector).setAttribute('class', 'fa-solid fa-star');
                }
                if (!Number.isInteger(rating)) {
                    selector = `.${reviewDivClass} > #${reviewStars[i]}`;
                    document.querySelector(selector).setAttribute('class', 'fa-solid fa-star-half-stroke');
                }
            }
        </script>
        <div id="reviews-section">
            <?php
            $i = 1;
            $sql = "SELECT id_client, brief_review, review, rating FROM orders WHERE id_article={$_GET['id_article']} AND review!=''";
            $query = mysqli_query($conn, $sql);
            if (mysqli_num_rows($query) > 0) {
                while ($tab = mysqli_fetch_assoc($query)) {

                    $sql2 = "SELECT Fname FROM client WHERE id_client={$tab['id_client']}";
                    $query2 = mysqli_query($conn, $sql2);
                    $tab2 = mysqli_fetch_assoc($query2);

                    echo
                    "<div class='review-div review$i'>
                    <i class='fa-solid fa-circle-user user-logo'></i>
                    <span class='user-name'>&ensp;{$tab2['Fname']}</span>
                    <br>
                    <i class='fa-regular fa-star' id='Rstar1'></i>
                    <i class='fa-regular fa-star' id='Rstar2'></i>
                    <i class='fa-regular fa-star' id='Rstar3'></i>
                    <i class='fa-regular fa-star' id='Rstar4'></i>
                    <i class='fa-regular fa-star' id='Rstar5'></i>
                    <span class='brief-review'>{$tab['brief_review']}</span>
                    <br><p class='long-review'>{$tab['review']}</p>
                    <br><br><br><br><hr class='reviews-separator'>
                </div>";
                    echo "<script>reviewsStarsRating({$tab['rating']}, 'review$i');</script>";
                    $i++;
                }
            } else {
                echo "<script>
                    document.getElementById('reviews-display').style.display='none';
                    document.getElementById('ratings-detail-cont').style.height='27vh';
                    document.getElementById('rating-div-hr').style.display='none';
                </script>";
            }
            ?>
        </div>

        <div id="goUpContainer">
            <a href="#"><i id="goUp" class="fa-solid fa-angle-up"></i></a>
        </div>
    </div>

    <script>
        let stars = ['star1', 'star2', 'star3', 'star4', 'star5'];

        function starsRating(rating) {
            let i;
            let intRating = Math.floor(rating);
            for (i = 0; i < intRating; i++) {
                document.getElementById(stars[i]).setAttribute('class', 'fa-solid fa-star');
            }
            if (!Number.isInteger(rating)) {
                document.getElementById(stars[i]).setAttribute('class', 'fa-solid fa-star-half-stroke');
            }
        }
    </script>
</body>

</html>