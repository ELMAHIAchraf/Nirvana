<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        body{
            margin: 0;
            background-color: #DDDDDD;
        }
#nav-bar{
    width: 100%;
    height: 8vh;
    background-color: #796EFF;
    display: grid;
    grid-template-columns: 1.2% 28.8% 70%;
    align-items: center;
}
#logo{
    width: 12.7%;
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
    position: absolute;
    right: 0;
    display: none;
    opacity: 0;
    width: 9%;
    transition: 1s;
    z-index: 10;
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
@import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');
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
#searchInp{
    width: 45%;
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
#search-results{
    width: 12.4%;
    background-color: white;
    position: absolute;
    top: 6vh;
    right: 19.3%;
    display: none;

}
.search-result{
    width: 100%;
    margin-top: -9%;
    min-height: 4vh;
    border-bottom: 1px solid gray;
    cursor: pointer;
}
.search-par{
    font-family: 'Source Sans Pro', sans-serif;
    font-weight: 500;
    font-size: 1.05vw;
    color: #2a2a2a;
    padding-left: 12%;
}
    </style>
</head>
<body>
<?php
                $conn=mysqli_connect("localhost", "root", "", "log")or die("Error: ".mysqli_connect_error());
                $sql="SELECT COUNT(*) FROM wishlist WHERE id_client=7";
                $query=mysqli_query($conn, $sql);
                $tab=mysqli_fetch_assoc($query);
                $heartCount=$tab["COUNT(*)"]; 

                $sql2="SELECT COUNT(*) FROM cart WHERE id_client=7";
                $query2=mysqli_query($conn, $sql2);
                $tab2=mysqli_fetch_assoc($query2);
                $cartCount=$tab2["COUNT(*)"]; 

                function isInWishlist($id_article){
                    global $conn;
                    $sql="SELECT * FROM wishlist where id_article=$id_article";
                    $query=mysqli_query($conn, $sql);
                    $tab=mysqli_fetch_assoc($query);
                    if(!empty($tab)){
                        return 1;
                    }else{
                        return 0;
                    }
                }
?>
<div id="nav-bar">
        <img id="logo" src="logo image.png" onclick="window.open('http://localhost/Login/Nirvana/home.php', '_self')" alt="Logo">
        
        <div id="right-part">
            <form method="POST" action="">
                <button type="button" id="searchButt" name="searchButt" onclick="searchDisplay()"><i id="searchIC" class="fa-solid fa-magnifying-glass"></i></button>
                <input id="searchInp" type="search" name="search" placeholder="Search..." oninput="displaySearchResults()">
            <select name="category" id="category">
                <option value="All categories">All Categories</option>
                <option value="Electronic devices">Electronics</option>
                <option value="Video games">Video Games</option>
                <option value="Sports equipments">Sports Equipment</option>
                <option value="Home appliances">Home Appliances</option>
                <option value="Outfits">Outfits</option>
            </select>
        </form>
        <?php
            if(isset($_POST['searchButt'])){
                if(isset($_POST['search'])){
                    $sql="SELECT * FROM articles WHERE name_article='{$_POST['search']}'";
                    $query=mysqli_query($conn, $sql);
                    $tab=mysqli_fetch_assoc($query);
                    echo "<script>window.open('http://localhost/Login/Nirvana/product.php?id_article={$tab['id_article']}', '_self')</script>";
                }
            }
        ?>
            <div id="heartButt" onclick="window.open('http://localhost/Login/Nirvana/wishlist.php', '_self')">
                <i id="heartIC" class="fa-solid fa-heart icones"></i>
                <div class="divCount" id="heartCount"><p class="count" id="heartCountNum"><?php echo $heartCount ?></p></div>
            </div>
            <div id="cartButt" onclick="window.open('http://localhost/Login/Nirvana/cart.php', '_self')">
                <i id="cartIC" class="fa-solid fa-cart-shopping icones"></i>
                <div class="divCount" id="cartCount"><p class="count" id="cartCountNum"><?php echo $cartCount ?></p></div>
            </div>
            <div id="userButt" onmouseover="dropDownMenuDisplay()" onmouseleave="dropDownMenuHide()">
                <i id="userIC" class="fa-solid fa-user icones user"></i>
                <i id="downArrowIC" class="fa-sharp fa-solid fa-angle-down icones user"></i>
            </div>
        </div>
    </div>  
                                                <!--HERE-->
    <div id="search-results"></div>
        <div id="dropDown" onmouseover="dropDownMenuDisplay()" onmouseleave="dropDownMenuHide()">
            <div class="dropDownItems" id="drp1"><i class="fa-solid fa-user-pen icones"></i><p class="drpText">&ensp;Account</p></div>
            <div class="dropDownItems" id="drp2"><i class="fa-solid fa-truck icones"></i><p class="drpText">&ensp;Shipping</p></div>
            <div class="dropDownItems" id="drp3"><i class="fa-solid fa-headset icones"></i><p class="drpText">&ensp;Support</p></div>
            <div class="dropDownItems" id="drp4"><i class="fa-solid fa-arrow-right-from-bracket icones"></i><p class="drpText">&ensp;Log out</p></div>
        </div>  
        <script>
            function displaySearchResults(){
                document.getElementById('search-results').innerHTML="";
                let searchInput=document.getElementById('searchInp').value;
                let xhr = new XMLHttpRequest();
                xhr.onload=function(){
                    if(xhr.status==200){
                        for(let i=0; i<JSON.parse(xhr.responseText).length; i++){
                            document.getElementById('search-results').style.display="block";
                            document.getElementById('search-results').innerHTML+=
                            "<div class='search-result' onclick='fillSearchInput("+i+")'><p class='search-par'>"+JSON.parse(xhr.responseText)[i].name_article+"</p></div>";
                        }
                    }
                }
                xhr.open("GET", "search.php?search="+searchInput, true);
                xhr.send();
            }
            function fillSearchInput(index){
                document.getElementById('searchInp').value=document.getElementsByClassName('search-par')[index].innerHTML;
            }
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
            let i=0;
            function searchDisplay(){
                if(document.getElementById('searchInp').value!="" && i!=0){
                    document.getElementById('searchButt').type="submit";
                }
                if(i%2==0){
                document.getElementById('searchButt').style.borderTopLeftRadius='0px';
                document.getElementById('searchButt').style.borderBottomLeftRadius='0px';
                document.getElementById('searchInp').style.display="block"; 
                document.getElementById('category').style.display="block"
                }else{
                    document.getElementById('searchButt').style.borderTopLeftRadius='8px';
                    document.getElementById('searchButt').style.borderBottomLeftRadius='8px';
                    document.getElementById('searchInp').style.display="none"; 
                    document.getElementById('category').style.display="none"
                }
                i++;
            }
        </script>
</body>
</html>