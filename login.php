<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="logo image.png" type="image/x-icon">
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
            <br><span id="loginFail">Incorrect username or password</span>
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
        //Establishing database connection
        include("connexion.php");
        //Sign up button code
        if(isset($_POST['sign'])){
            if(isset($_POST['fname']) && !empty($_POST['fname']) and
                isset($_POST['lname']) && !empty($_POST['lname']) and
                isset($_POST['email']) && !empty($_POST['email']) and
                isset($_POST['pwd']) && !empty($_POST['pwd'])){  

                //Assigning clean input values to variables
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
                    //Saving the inputs values in database to complete the sign up process
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
        //Login button code
        if(isset($_POST['log'])){
            if(isset($_POST['email']) && !empty($_POST['email']) and
               isset($_POST['pwd']) && !empty($_POST['pwd'])){
                //Assigning clean input values to variables
                $email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $email=filter_var($email, FILTER_VALIDATE_EMAIL);
                $pwd=mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['pwd'])));
                //Checking if the inputed email exists in the database
                $sql="SELECT * FROM client WHERE email='$email'";
                $query=mysqli_query($conn, $sql);
                $tab=mysqli_fetch_assoc($query);
                    //Checking if the inputed password is correct
                    if(password_verify($pwd, $tab['password_client'])){
                        //Checking if the remember me checkbox is checked 
                        if(isset($_POST['check'])){
                            //Generating a token
                            $token=bin2hex(random_bytes(32));
                            //Setting the creation date of the token
                            $creation_date=date('Y-m-d');
                            //Setting the expiration date of the token
                            $expiration_date=date('Y-m-d', time()+7*24*3600);
                            //Inserting the token informations inside of the token table in the database
                            //The id_client column in the token table is a foreign key of the id_client column in the client table
                            $sql2="INSERT INTO token VALUES('$token', '$creation_date', '$expiration_date', '{$tab['id_client']}')";

                            //Updating the token row in the token table instead of Inserting a new row if a client's token already exists
                            $sql3="SELECT * FROM token WHERE id_client='{$tab['id_client']}'";
                            $query3=mysqli_query($conn, $sql3);
                            $tab3=mysqli_fetch_assoc($query3);
                            if(!empty($tab3)){
                                $sql2="UPDATE token SET token='$token', creation_date='$creation_date', expiration_date='$expiration_date' WHERE id_client='{$tab['id_client']}'";
                            }
                            //Creating a cookie name token where id client's token is stored
                            if(mysqli_query($conn, $sql2)){
                                setcookie('token', $token, time()+3*24*3600);
                            }
                        }
                        $_SESSION['name_client']=$tab['Fname'];
                        $_SESSION['id_client']=$tab['id_client'];
                        $_SESSION['email_client']=$tab['email'];
                        //redirecting the client to the home page
                        header('Location: http://localhost/Login/Nirvana/home.php');
                    }else{
                        echo "<script>
                              document.getElementById('loginFail').style.display='block';
                              </script>";
                    }
        }
        }
        //Cheking if the client has a token cookie in order to redirect him to the home page without him loging manually
        
        ?>

</body>
</html>