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
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/../CSS/all.css">
    <title>Document</title>
    <style>
        i {
            font-size: 30px;
            color: rgb(174, 174, 255);
        }
    </style>
</head>
<?php
include("connexion.php");
$sql = "SELECT AVG(rate) FROM commande WHERE id_article='k456'";
$req = mysqli_query($conn, $sql);
$tab = mysqli_fetch_assoc($req);
$rate = $tab['AVG(rate)'];
$decimal = $rate - floor($rate);
if ($decimal > 0.5) {
    $rate = ceil($rate);
} elseif ($decimal < 0.5) {
    $rate = floor($rate);
}
?>

<body onload="starsRating(<?php echo $rate ?>)">
    <i id="star1" class="fa-regular fa-star"></i>
    <i id="star2" class="fa-regular fa-star"></i>
    <i id="star3" class="fa-regular fa-star"></i>
    <i id="star4" class="fa-regular fa-star"></i>
    <i id="star5" class="fa-regular fa-star"></i>
    <script>
        let stars = ['star1', 'star2', 'star3', 'star4', 'star5']

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