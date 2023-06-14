<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo image.png" type="image/x-icon">
    <title>Account</title>
    <style>
        body{
            background-color: #DDDDDD;
            margin: 0;
        }
        #container{
            background-color: white;
            width: 60%;
            height: 70vh;
            border-radius: 25px;
            margin: auto;
            margin-top: 8%;
        }
        #form{
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
        }
        #form-info{
            width: 75%;
        }
        #sideImage{
            width: 50%;
            height: 100%;
            float: right;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
        }
        #user-icon{
            color: #5C4EFF;
            font-size: 7vw;
            margin-bottom: 1%;
        }
        .name, .logins, .address, .save{
            width: 100%;
            display: flex;
            flex-wrap: nowrap;
            gap: 4%;
        }
        .name-inp, .login-inp, .address-inp{
            width: 50%;
            height: 7.5vh;
            border-radius: 25px;
            border-color: #5C4EFF;
            border-width: 2px;
            box-shadow: 0px 2px 2px #7e7e7e;
            margin-top: 3%;
            outline-color: #5868ff;
            font-size: 1vw;
            padding-left: 10px;
            transition: transform 0.5s;
        }
        #address::placeholder{
            color: #A49DFF;
        }
        .save{
            display: flex;
            justify-content: center;
        }
        .save-inp{
            width: 80%;
            height: 7vh;
            margin-top: 4%;
            border-radius: 25px;
            background-color: #5C4EFF;
            color: white;
            border-style: none;
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 1.4vw;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0px 2px 2px #7e7e7e;
            transition: transform 0.5s;
        }
        div > input:hover, button:hover{
            transform: scale(1.03);
            transition: transform 0.5s;
        }
        #address{
            width: 100%; 
        }
        #save{
            font-size: 1.7vw;
        }
        
    </style>
</head>
<body onclick="hideSearchResults()">  
    <?php 
        include('NavBar.php');

        if(isset($_POST['sub']) && !empty($_POST['sub'])){
            if(isset($_POST['fname']) and !empty($_POST['fname']) &&
                isset($_POST['lname']) and !empty($_POST['lname']) &&
                isset($_POST['email']) and !empty($_POST['email']) &&
                isset($_POST['address']) and !empty($_POST['address'])){
                    
                    $fname=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['fname'])));

                    $lname=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['lname'])));

                    $email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                    $email=filter_var($email, FILTER_VALIDATE_EMAIL);

                    $address=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['address'])));

                    $sql2="UPDATE client SET Fname='$fname', Lname='$lname', email='$email', address='$address' WHERE id_client={$_SESSION['id_client']}";

                    if(isset($_POST['pwd']) and !empty($_POST['pwd'])){
                        $password=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['pwd'])));;
                        $password=password_hash($password, PASSWORD_DEFAULT);
                        $sql2="UPDATE client SET Fname='$fname', Lname='$lname', email='$email', password_client='$password', address='$address' WHERE id_client={$_SESSION['id_client']}";
                    }
                    mysqli_query($conn, $sql2);
            }
        }

        $sql="SELECT * FROM client WHERE id_client={$_SESSION['id_client']}";
        $query=mysqli_query($conn, $sql);
        $tab=mysqli_fetch_assoc($query);
    ?>
    <div id="container">
        <img id="sideImage" src="account.jpg" alt="account image">
        <div id="form">
        <i class="fa-solid fa-circle-user fa-flip" id="user-icon"></i>
        <form action="" method="POST" id="form-info">
            <div class="name">
                <input type="text" name="fname" class="input name-inp" id="Fname" value="<?php echo $tab['Fname'] ?>">
                <input type="text" name="lname" class="input name-inp" id="Lname" value="<?php echo $tab['Lname'] ?>">
            </div>
            <div class="logins">
                <input type="email" name="email" class="input login-inp" id="email" value="<?php echo $tab['email'] ?>">
                <input type="password" name="pwd" class="input login-inp" id="pwd" placeholder="**********">
            </div>
            <div class="address">
                <input type="text" name="address" class="input address-inp" id="address" value="<?php echo $tab['address'] ?>" placeholder="123 Main St, New York, 10001, USA">
            </div>
            <div class="save">
                <input type="submit" name="sub" class="save-inp" value="Save" id="save">
            </div>
        </form>
        </div>
    </div>
</body>
</html>