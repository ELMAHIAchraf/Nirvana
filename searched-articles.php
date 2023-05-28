<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo image.png" type="image/x-icon">
    <title>Search</title>
    <style>
        html{
            scroll-behavior: smooth;
        }
            ::-webkit-scrollbar{
            width: 0.7vw;
        }
            ::-webkit-scrollbar-track{
            background-color: #a69eff;
        }
            ::-webkit-scrollbar-thumb{
            background-color: #6c5fff;
        }
        body{
            background-color: #DDDDDD;
            margin: 0;
        }
        #main{
            position: absolute;
            width: 100%;
            padding-bottom: 30px;
        }
        .product-div{
            background-color: white;
            width: 38%;
            height: 15vw;
            border-radius: 20px;
            margin-top: 5%;
            display: grid;
            grid-template-columns: 4% 40% 49% 7%;
            grid-template-rows: 5% 30% 30% 30% 5%;
            align-items: center;
            margin: auto;
            margin-top: 2%;
            cursor: pointer;
        }
        .product-image{
            width: 70%;
            height: 100%;
            grid-column-start: 2;
            grid-row: 2/5;
            justify-self: center;
        }
        p{
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: bolder;
            font-size: 1.25vw;
            color: #2a2a2a;
            display: inline-block;
        }
        .product-name{
            grid-column-start: 3;
            grid-row-start: 2;
            margin-top: 15%;
        }
        .product-price{
            grid-column-start: 3;
            grid-row-start: 4;
            margin-top: -10%;
        }
        #rating{
            cursor: pointer;
            display: inline-block;
            background-color: transparent;
            }
        #rating-info{
            grid-column-start: 3;
            grid-row-start: 3;
        }
        #numRating{
            font-size: 1.1vw;
        }
        #ratingCount{
            font-size: 1.1vw;
            color: #636363;
        }
        .stars-div > i{
            color: #ffbb00;
            font-size: 1.1vw;
        }
        #not-found{
            margin: auto;
            background-color: white;
            width: 70%;
            height: 250px;
            border-radius: 25px;
            margin-top: 14%;
            display: grid;
            grid-template-rows: repeat(3, 33%);
        }
        #errorIcon{
            color: #ee4747;
            font-size: 4vw;
            justify-self: center;
            align-self: center;
            margin-top: 5%;
        }
        #header, #par{
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 500;
            color: #2a2a2a;
            justify-self: center;

        }
        #header{
            font-size: 1.7vw;
        }
        #par{
            font-size: 1.2vw;
        }
    </style>
</head>
<body>
    <script>
        let stars=['star1', 'star2', 'star3', 'star4', 'star5'];
        function ratingStars(rating, divClass){
            let i;
            let intRating=Math.floor(rating);
            let selector=``;
            for(i=0;i<intRating;i++){
                selector = `.${divClass} > #${stars[i]}`;
                document.querySelector(selector).setAttribute('class', 'fa-solid fa-star');
            }
            if(!Number.isInteger(rating)){
                selector = `.${divClass} > #${stars[i]}`;
                document.querySelector(selector).setAttribute('class', 'fa-solid fa-star-half-stroke');
            }        
        }

        function redirect(id_article){
            let url="http\://localhost/Login/Nirvana/product.php?id_article="+id_article;
                window.open(url, "_self");
        }
    </script>
    <?php 
        include('NavBar.php');
        echo "<div id='main'>";
        if(isset($_GET) && !empty($_GET)){  
            $i=1;
            foreach ($_GET as $key => $value) {
                $sql="SELECT id_article,name_article, price, AVG(rating), count(*) FROM articles NATURAL JOIN orders where id_article=$value";
                $query=mysqli_query($conn, $sql);
                $tab=mysqli_fetch_assoc($query);
                $rate=$tab['AVG(rating)'];
                
                $specificRate=round($rate, 1);
                $decimal=$rate-floor($rate);
                if($decimal>0.5){
                    $rate=ceil($rate);
                }elseif($decimal<0.5){
                    $rate=floor($rate);
                }elseif(empty($rate)){
                    $rate=0;
                }
                
                echo "
                    <div class='product-div' onclick='redirect({$tab['id_article']})'>
                    <img src='../PFEProduct/products images/product {$tab['id_article']}/color1/item img1.jpg' alt='product image' class='product-image'>
                    <p class='product-name'>{$tab['name_article']}</p>
                    <div id='rating-info'>
                    <p id='numRating'>($rate)</p>
                    <div id='rating' class='stars-div product$i' onmouseover='displayRatingsDetails()' onmouseout='hideRatingsDetails()'>
                            <i class='fa-regular fa-star' id='star1'></i>
                            <i class='fa-regular fa-star' id='star2'></i>
                            <i class='fa-regular fa-star' id='star3'></i>
                            <i class='fa-regular fa-star' id='star4'></i>
                            <i class='fa-regular fa-star' id='star5'></i>
                    </div>
                    <p id='ratingCount'>{$tab['count(*)']} ratings</p>
                    </div>
                    <p class='product-price'>$ {$tab['price']}</p>
                </div>
                <script>
                    ratingStars($rate, 'product$i');
                    document.getElementsByClassName('product-div')[0].style.marginTop='6%';
                </script>
                ";
                $i++;
            }
        }else{
            echo "
                <div id='not-found'>
                    <i class='fa-solid fa-circle-exclamation fa-beat' id='errorIcon'></i>
                    <p id='header'>Search not found</p>
                    <p id='par'>Sorry, we could not find any results matching your search. Please try again with a different keyword or search phrase.</p>
                </div>
                
            ";
        }
        echo "<div>";
    ?>
    
            
</body>
</html>