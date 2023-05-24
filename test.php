<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>product</title>
    <style>
body{
    background-color: #DDDDDD;
    height: 100vh;
}
.product-div{
    background-color: white;
    border-radius: 15px;
    cursor: pointer;
    width: 18%;
    height: 40%;
    display: grid;
    grid-template-columns: 7% 65% 15% 7%;
    grid-template-rows: 3.5% 6% 55% 15.5% 8% 3.5%;
    grid-gap: 1.5%;
} 
.product-img{
    width: 100%;
    height: 100%;
    grid-column: 2/4;
    grid-row-start: 3;
}
.categoryN, .product-name, .price{
    font-family: 'Source Sans Pro', sans-serif;
    font-weight: 500;
    font-size: 1vw;
    color: #2a2a2a;
}
.product-category{
    display: flex;
    align-items: center;
    grid-column: 2/4;
    grid-row-start: 2;
}
.categoryI{
    color: #3d3d3d;
    font-size: 1.5vw;
    
}
.categoryN{
    color: #3d3d3d;
    font-weight: bold;
    font-size: 1.2vw;
    
}
.product-name{
    color: #343434;
    grid-column: 2/4;
    grid-row-start: 4;
}
.price{
    font-weight: bold;
    font-size: 1vw;
    grid-column: 2;
    grid-row-start: 5;
}
.heart{
    color: #ffbfbf;
    font-size: 2.5vw;
    
}
.heart-form{
    float: right;
    width: 18%;
    grid-column: 3;
    grid-row-start: 5;
}
.product-heart-butt{
    background-color: transparent;
    border-style: none;
    cursor: pointer;
}
    </style>
</head>
<body>
                <div class="product-div">
                    <div class="product-category">
                        <i class="fa-solid fa-list categoryI"></i>
                        <p class="categoryN">Accessories</p>
                    </div>
                    <img src="item img1.jpg" alt="Product image" class="product-img">
                    <p class="product-name">THE NORTH FACE Jester School Laptop Backpack</p>
                    <p class="price">$40,00</p>
                    <form class="heart-form">
                        <button class="product-heart-butt" type="button" onclick="event.stopPropagation();heartClick(0);addToWishlist(0);">
                            <i class="fa-solid fa-heart heart"></i>
                        </button>
                    </form>
                    <input class="id_article" type="hidden" value="1">
                </div>
</body>
</html>