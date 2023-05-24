    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
    #nav-bar{
        width: 100%;
        height: 8vh;
        background-color: #796EFF;
        display: grid;
        grid-template-columns: 1.2% 28.8% 70%;
        align-items: center;
        position: fixed;
        z-index: 20;
        top: 0;
    }
    #logo{
        width: 12.5%;
        grid-column-start: 2;
        cursor: pointer;
    }
    #right-part > *{
        display: inline-block;
    }
    #right-part{
        width: 100%;
        height: 8vh;
        display: flex;
        justify-content: end;
        align-items: center;
    }
    .icones{
        color: white;
        font-size: 1.7vw;
    }
    #heartIC{
        font-size: 1.8vw;
    }
    #heartButt{
        position: relative;
        padding: 2.2vh 2.5% 2.1vh 2%;
    }
    #cartButt{
        position: relative;
        padding: 2.2vh 2.5% 2.2vh 2%;
    }
    #heartButt:hover, #cartButt:hover, #userButt:hover{
        background-color: #6e61ff;
        transition: 1s;
        cursor: pointer;
    }
    #downArrowIC{
        font-size: 1.1vw;
    }
    #userButt{
        padding: 2.2vh 2% 2.2vh 2.5%;
    }
    #dropDown{
        position: fixed;
    top: 8vh;
    right: 0;
    display: none;
    opacity: 0;
    width: 9%;
    transition: 1s;
    z-index: 10;
    }
    #logoutForm{
        width: 100%;
    } 
    #logout{
        background-color: transparent;
        border-style: none;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;    
    }
    .dropDownItems{
        background-color: #6e61ff;
        display: flex;
        justify-content: center;
        align-items: center;
        border-bottom: 1px solid #8f84ff;
    }
    #drp4{
        border-bottom-left-radius: 10px;

    }
    .dropDownItems:hover{
        background-color: #5141ff;
        transition: 1s;
        cursor: pointer;
    }
    #login{
        border-bottom-left-radius: 10px;
    }
    @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');
    .drpText{
        font-family: 'Source Sans Pro', sans-serif;
        color: white;
        font-weight: 500;
        font-size: 1.2vw;
        display: inline-block;
    }
    .divCount{
        width: 1.3vw;
        height: 1.3vw;
        border-radius: 50%;
        background-color: #ff2828;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: 14%;
        right: 20%;
    }
    .count{
        font-family: 'Source Sans Pro', sans-serif;
        color: white;
        font-weight: bold;
        font-size: 1vw;
    }
    #category{
        width: 30%;
        height: 4vh;
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
        outline-color: #5868ff;
        border: 3px solid #9d94ff;
        border-right-style: none;
        font-size: 1.1vw;
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: bold;
        color: #4f4f4f;
        -webkit-appearance: none;
        appearance: none;
        background-size: 20px 20px;
        background-repeat: no-repeat;
        background-position: right center;
        padding-right: 4px;
        padding-left: 4px;
        float: right;
        background-image: url("caret.svg");
        display: none;
    }

    #searchInp{
        width: 55%;
        height: 4vh;
        border-style: none;
        outline-color: #5868ff;
        border: 3px solid #9d94ff;
        padding-left: 20px;
        font-size: 1.2vw;
        font-weight: bold;
        font-family: 'Source Sans Pro', sans-serif;
        color: #4f4f4f;
        float: right;
        display: none;
    }
    form{
        width: 40%;
    }
    #searchInp::-webkit-search-cancel-button {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        background-size: cover;
        background-image: url("X.png");
    }
    #searchButt{
        width: 10%;
        height: 4vh;
        border-radius: 8px;
        background-color: #9d94ff;
        border-style: none;
        cursor: pointer;
        float: right;
        margin-right: 2%;
        transition: 1s;
    }
    #searchButt:hover{
        background-color: #8b80ff;
        transition: 1s;
    }
    #searchIC{
        font-size: 1.3vw;
        color: white;
    }
    #search-results{
    width: 15.3%;
    background-color: white;
    position: fixed;
    top: 6vh;
    right: 19.3%;
    display: none;
    z-index: 100;
    min-height: 2vh;
    }
    .search-result{
        width: 100%;
        border-bottom: 1px solid gray;
        cursor: pointer;
    }
    .search-par{
        font-family: 'Source Sans Pro', sans-serif;
        font-weight: 500;
        font-size: 1.05vw;
        color: #2a2a2a;
        padding-left: 10%;
    }
    </style>
</head>
<body>
<?php
                include("notification code.php");
                include("connexion.php");
                
                if(isset($_SESSION) && !empty($_SESSION)){
                $sql="SELECT COUNT(*) FROM wishlist WHERE id_client={$_SESSION['id_client']}";
                $query=mysqli_query($conn, $sql);
                $tab=mysqli_fetch_assoc($query);
                $heartCount=$tab["COUNT(*)"]; 

                $sql2="SELECT COUNT(*) FROM cart WHERE id_client={$_SESSION['id_client']}";
                $query2=mysqli_query($conn, $sql2);
                $tab2=mysqli_fetch_assoc($query2);
                $cartCount=$tab2["COUNT(*)"]; 
            }
            ?>
    <div id="nav-bar">
        <img id="logo" src="logo image.png" onclick="window.open('http://localhost/Login/Nirvana/home.php', '_self')" alt="Logo">
        
        <div id="right-part">
            <form method="POST" action="">
                <button type="button" id="searchButt" name="searchButt" onclick="searchDisplay()"><i id="searchIC" class="fa-solid fa-magnifying-glass"></i></button>
                <input id="searchInp" type="search" name="search" placeholder="Search..." oninput="displaySearchResults()">
                <select name="category" id="category">
                    <option id="All Categories" value="All Categories">All Categories</option>
                    <option id="Electronics" value="Electronics">Electronics</option>
                    <option id="Video Games"  value="Video Games">Video Games</option>
                    <option id="Sports Equipment" value="Sports Equipment">Sports Equipment</option>
                    <option id="Home Appliances" value="Home Appliances">Home Appliances</option>
                    <option id="Outfits" value="Outfits">Outfits</option>
                </select>
            </form>
            <?php
            if(isset($_POST['searchButt']) && $_POST['search']!=""){
                    $search = trim(mysqli_escape_string($conn, htmlspecialchars($_POST['search'])));
                    $search = str_replace("'", "\'", $search);
                    $sql="SELECT * FROM articles WHERE name_article='$search'";
                    $query=mysqli_query($conn, $sql);
                    if(mysqli_num_rows($query)>0){
                        $tab=mysqli_fetch_assoc($query);
                        echo "<script style='display:none;'>window.open('http://localhost/Login/Nirvana/product.php?id_article={$tab['id_article']}', '_self');</script>";
                    }else{
                        $sql="SELECT * FROM articles WHERE name_article LIKE '%$search%' OR name_article LIKE '%$search' OR name_article LIKE '$search%'";
                        $query=mysqli_query($conn, $sql); 
                        $url="http://localhost/Login/Nirvana/searched-articles.php?";  
                        $i=1;
                        while($tab=mysqli_fetch_assoc($query)){
                            $url.="id_article$i=".$tab['id_article']."&";
                            $i++;   
                        }
                        $url=substr($url, 0, strlen($url)-1);
                        echo "<script style='display:none;'>window.open('$url', '_self')</script>";  
                    }
                }
            ?>
            <div id="heartButt" <?php if(isset($_SESSION) && !empty($_SESSION)) echo "onclick=\"window.open('http://localhost/Login/Nirvana/wishlist.php', '_self')\"" ?>>
                <i id="heartIC" class="fa-solid fa-heart icones"></i>
                <?php
                if(isset($_SESSION) && !empty($_SESSION)) 
                    echo "<div class='divCount' id='heartCount'><p class='count' id='heartCountNum'> $heartCount</p></div>";
                ?>
            </div>
            <div id="cartButt" <?php if(isset($_SESSION) && !empty($_SESSION)) echo "onclick=\"window.open('http://localhost/Login/Nirvana/cart.php', '_self')\"" ?>>
                <i id="cartIC" class="fa-solid fa-cart-shopping icones"></i>
                <?php
                if(isset($_SESSION) && !empty($_SESSION)) 
                        echo"<div class='divCount' id='cartCount'><p class='count' id='cartCountNum'> $cartCount</p></div>";
                ?>
            </div>
            <div id="userButt" onmouseover="dropDownMenuDisplay()" onmouseleave="dropDownMenuHide()">
                <i id="userIC" class="fa-solid fa-user icones user"></i>
                <i id="downArrowIC" class="fa-sharp fa-solid fa-angle-down icones user"></i>
            </div>
        </div>
    </div>  

    <div id="search-results"></div>

        <div id="dropDown" onmouseover="dropDownMenuDisplay()" onmouseleave="dropDownMenuHide()">
        <?php 
            if(isset($_SESSION) && !empty($_SESSION)) {
                echo "
                    <div class='dropDownItems' id='drp1' onclick=\"window.open('http://localhost/Login/Nirvana/account.php', '_self')\"><i class='fa-solid fa-user-pen icones'></i><p class='drpText'>&ensp;Account</p></div>
                    <div class='dropDownItems' id='drp2' onclick=\"window.open('http://localhost/Login/Nirvana/shipping.php', '_self')\"><i class='fa-solid fa-truck icones'></i><p class='drpText'>&ensp;Shipping</p></div>
                    <div class='dropDownItems' id='drp3' onclick=\"window.open('http://localhost/Login/Nirvana/order%20cancellation.php', '_self')\"><i class='fa-solid fa-ban icones'></i><p class='drpText'>&ensp;Cancel</p></div>
                    <div class='dropDownItems' id='drp4'>
                        <form action='' method='POST' id='logoutForm'>
                            <button name='logout' value='disconnect' id='logout'><i class='fa-solid fa-arrow-right-from-bracket icones'></i><p class='drpText'>&ensp;Log out</p></button>
                        </form>
                    </div>    
                ";
            }else{
                echo "
                <div class='dropDownItems' id='login' onclick=\"window.open('http://localhost/Login/Nirvana/login.php', '_self')\"><i class='fa-solid fa-right-to-bracket icones'></i><p class='drpText'>&ensp;Log in</p></div>
                <script>
                document.getElementById('heartButt').addEventListener('click', function(){
                    notify('Please log in to view your wishlist.');
                });
                document.getElementById('cartButt').addEventListener('click', function(){
                    notify('Please log in to view your cart.');
                });
                </script>
                ";

            }
        ?>
        </div>  
        <?php
            // if(isset($_POST['logout']) && !empty($_POST['logout'])){
            //     unset($_COOKIE);
            //     session_destroy();
            //     unset($_SESSION);
            //     header("Location: http://localhost/Login/Nirvana/home.php");
            // }
            if(isset($_POST['logout']) && !empty($_POST['logout'])){
                unset($_COOKIE['token']);
                session_destroy();
                echo "<script>window.open('http://localhost/Login/Nirvana/home.php', '_self')</script>";
            }
        ?>
        <script>
            
            function dropDownMenuDisplay(){
                document.getElementById('userButt').style.backgroundColor='#6e61ff';
                document.getElementById('dropDown').style.display="block";
                setTimeout(function(){
                    document.getElementById('dropDown').style.opacity="1";
                    document.getElementById('dropDown').style.transition="1s";
                }, 100) 
            }
            function dropDownMenuHide(){
                document.getElementById('userButt').style.backgroundColor='#796EFF';
                setTimeout(function(){
                    document.getElementById('dropDown').style.opacity="0";
                    document.getElementById('dropDown').style.transition="1s";
                }, 100)
                document.getElementById('dropDown').style.display="none"; 
            }
            let loadedCategoryValue;
function loadedCategory(){
    loadedCategoryValue = document.getElementById('category').value;
}
            let x=0;
function searchDisplay(){
    if((document.getElementById('searchInp').value!="" || document.getElementById('category').value!=loadedCategoryValue) && x!=0){
            document.getElementById('searchButt').type="submit";
    }
    if(x%2==0){
        document.getElementById('searchButt').style.borderTopLeftRadius='0px';
        document.getElementById('searchButt').style.borderBottomLeftRadius='0px';
        document.getElementById('searchInp').style.display="block"; 
        document.getElementById('category').style.display="block";
        document.getElementById('searchInp').focus();
    }else{
        document.getElementById('searchButt').style.borderTopLeftRadius='8px';
        document.getElementById('searchButt').style.borderBottomLeftRadius='8px';
        document.getElementById('searchInp').style.display="none"; 
        document.getElementById('category').style.display="none"
    }
    x++;
}
            function displaySearchResults(){
                document.getElementById('search-results').innerHTML="";
                let searchInput=document.getElementById('searchInp').value;
                let category=document.getElementById('category').value;
                let xhr = new XMLHttpRequest();
                xhr.onload=function(){
                    if(xhr.status==200){
                        if(xhr.responseText.length>0){
                            for(let i=0; i<JSON.parse(xhr.responseText).length; i++){
                                document.getElementById('search-results').style.display="block";
                                document.getElementById('search-results').innerHTML+=
                                "<div class='search-result' onclick='fillSearchInput("+i+")'><p class='search-par'>"+JSON.parse(xhr.responseText)[i].name_article+"</p></div>";
                            }
                        }else{
                            document.getElementById('search-results').style.display="none";
                        }
                    }
                }
                xhr.open("GET", "search.php?search="+searchInput+"&category="+category, true);
                xhr.send();
            }
            function fillSearchInput(index){
                document.getElementById('searchInp').value=document.getElementsByClassName('search-par')[index].innerHTML;
                document.getElementById('search-results').style.display="none";
                document.getElementById('searchButt').click();/*Auto search*/
            }
            function hideSearchResults(){
                if(event.target.id!="search-results"){
                    document.getElementById('search-results').style.display="none";
                }
            }
        </script>
</body>
</html>