<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo image.png" type="image/x-icon">
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Default" href="/css/app-af6a05f42b013986b481566363f0186f.css?vsn=d">
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome" href="/css/app-wa-cc491567b46eab1188c6538ebc462e7d.css?vsn=d">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-light.css">
    <link rel="stylesheet" href="login.css">
    <script src="login.js" defer></script>
    <title>Login</title>
</head>
<body>
    <div id="container">
        <img id="login-image" src="login image.jpg" alt="Login image">
        <a href="home.php"><img id="logo" src="logo image.png" alt="Logo"></a>

        <button class="switch-form-butt" id="login-butt" onclick="loginAppear()">Login</button>
        <button class="switch-form-butt" id="signup-butt" onclick="signupAppear()">Sign up</button><br>

        <form id="loginPanel" action="" method="POST">
            <input class="login-inputs" id="email" type="email" name="email"  placeholder="&ensp;&ensp;Enter your email">
            <br><div id="password">
            <input class="login-inputs" id="pwd" type="password" name="pwd"  placeholder="&ensp;&ensp;Enter your password">
            <button type="button" id="show-password" onclick="showPassword()"><i id="eyeIcon" class="fa-solid fa-eye-slash"></i></button>
            </div>
            <br><input id="check" type="checkbox" name="check" value="checked"><label for="check">Remember me</label>
            <a href="password_recovery.php" target="_blank">Forgot you password?</a>
            <br><span id="loginFail">Incorrect email or password</span>
            <br><input id="log" type="submit" name="log" value="Login">
        </form>

        <form id="signupPanel" action="" method="POST" style="display: none;">
                <input class="signup-inputs" id="fname" type="text" name="fname" oninput="signupCheck()" placeholder="&ensp;Enter your Fname">
                <input class="signup-inputs" id="lname" type="text" name="lname" oninput="signupCheck()" placeholder="&ensp;Enter your Lname">
                <br><input class="signup-inputs" type="email" id="Semail" name="email" oninput="signupCheck()" placeholder="&ensp;&ensp;Enter your email">
                <br><input class="signup-inputs" type="password" id="Spwd" name="pwd" oninput="signupCheck()" placeholder="&ensp;&ensp;Enter your password">
                <br><input class="signup-inputs" type="password" id="SCpwd" name="Cpwd" oninput="signupCheck()" placeholder="&ensp;&ensp;Confirm your password">
                <br><input id="sign" type="submit" name="sign" value="Sign up" disabled>
        </form>
    </div>
    <script>
         function signUpRedirection(){
            if(getComputedStyle(document.getElementById('transparent-bg')).display=="none"){
                window.location.href='home.php';
            }else {
                setTimeout(signUpRedirection, 100);
            }
        }
    </script>
    <?php
        include("connexion.php");
        if(isset($_POST['sign'])){
            if(isset($_POST['fname']) && !empty($_POST['fname']) and
                isset($_POST['lname']) && !empty($_POST['lname']) and
                isset($_POST['email']) && !empty($_POST['email']) and
                isset($_POST['pwd']) && !empty($_POST['pwd'])){  

                $email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $email=filter_var($email, FILTER_VALIDATE_EMAIL);

                $sql="SELECT * FROM client WHERE email='$email'";
                $query=mysqli_query($conn, $sql);
                $tab=mysqli_fetch_assoc($query);

                require "notification code.php";
                if(empty($tab)){
                    $fname=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['fname'])));
                    $lname=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['lname'])));
                    $pwd=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['pwd'])));
                    $pwd=password_hash($pwd, PASSWORD_DEFAULT);
                    $sql2="INSERT INTO client VALUES('', '$fname', '$lname', '$email', '$pwd')";
                    if(mysqli_query($conn, $sql2)){
                        echo "<script>
                                notify('You signed up!');
                                signUpRedirection();
                               </script>";
                        $_SESSION['Fname']=$tab['Fname'];
                        $_SESSION['id']=$tab['id_client'];
                    }else{
                        echo "<script>
                                notify('An error occured');
                              </script>";
                    }
                }else{
                    echo "
                        <script>
                            notify('Sorry, the email address you have entered is already associated with an existing account. Please use a different email address or log in to your existing account.');
                        </script>";
                    
                }
            } 
        }
        if(isset($_POST['log'])){
            if(isset($_POST['email']) && !empty($_POST['email']) and
               isset($_POST['pwd']) && !empty($_POST['pwd'])){
                $email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $email=filter_var($email, FILTER_VALIDATE_EMAIL);
                $pwd=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['pwd'])));
                $sql="SELECT * FROM client WHERE email='$email'";
                $query=mysqli_query($conn, $sql);
                $tab=mysqli_fetch_assoc($query);
                    if(password_verify($pwd, $tab['password_client'])){
                        if(isset($_POST['check'])){
                            $token=bin2hex(random_bytes(32));
                            $creation_date=date('Y-m-d');
                            $expiration_date=date('Y-m-d', time()+7*24*3600);
                            $sql2="INSERT INTO token VALUES('$token', '$creation_date', '$expiration_date', '{$tab['id_client']}')";

                            $sql3="SELECT * FROM token WHERE id_client='{$tab['id_client']}'";
                            $query3=mysqli_query($conn, $sql3);
                            $tab3=mysqli_fetch_assoc($query3);
                            if(!empty($tab3)){
                                $sql2="UPDATE token SET token='$token', creation_date='$creation_date', expiration_date='$expiration_date' WHERE id_client='{$tab['id_client']}'";
                            }
                            if(mysqli_query($conn, $sql2)){
                                setcookie("token", $token, time()+3*24*3600, "/");
                            }
                        }
                        $_SESSION['name_client']=$tab['Fname'];
                        $_SESSION['id_client']=$tab['id_client'];
                        $_SESSION['email_client']=$tab['email'];
                        header('Location: http://localhost/Login/Nirvana/home.php');
                    }else{
                        echo "<script>
                              document.getElementById('loginFail').style.display='block';
                              </script>";
                    }
        }
        }
        
        ?>

</body>
</html>