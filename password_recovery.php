<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo image.png" type="image/x-icon">
    <link rel="stylesheet" href="password_recovery.css">
    <title>Password recovery</title>
</head>
<body>
    <div id="container">
        <img src="login image.jpg" id="login-image" alt="login image">
            <br><p id="title">Reset your password</p>
            <p id="par">Please enter your email address so we can <br> send you a password reset link.</p>
                <form action="" method="GET">
                    <input type="email" name="email" id="email" placeholder="Enter your email">
                    <br><span id="recovFail">Email address not found in our records</span>
                    <br><input type="submit" name="sub" id="submit" value="Submit">
                </form>
    </div>
    <?php
        include("connexion.php");
        include("notification code.php");

        if(isset($_GET['sub'])){
            if(isset($_GET['email']) && !empty($_GET['email'])){

                $email=filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
                $sql="SELECT * FROM client WHERE email='$email'";
                $query=mysqli_query($conn, $sql);
                $tab=mysqli_fetch_assoc($query);

                if(!empty($tab)){
                    $token=bin2hex(random_bytes(16));
                    $token_creation_time=date("Y-m-d H:i:s");
                    $id_client=$tab['id_client'];
                    $fname=$tab['Fname'];

                    $sql2="SELECT * FROM precovery WHERE id_client='{$tab['id_client']}'";
                    $query2=mysqli_query($conn, $sql2);
                    $tab2=mysqli_fetch_assoc($query2);
                    if(empty($tab2)){
                        $sql3="INSERT INTO precovery VALUES('$token', '$email', '$token_creation_time', '$id_client')";
                    }else{
                        $sql3="UPDATE precovery SET token='$token',token_creation_time='$token_creation_time' WHERE id_client='{$tab['id_client']}'";
                    }
                    mysqli_query($conn, $sql3);

                    $fileContent=file_get_contents("PR_email_body.txt");
                    $fileContent=str_replace("[User]", $fname, $fileContent);
                    $fileContent=str_replace("[Password Reset Link]", "http://localhost/Login/Nirvana/password_reset.php?token=$token", $fileContent);

                    $to = $email;
                    $subject = "Password reset";
                    $body = $fileContent;
                    $header="From: nirv4n4.supp0rt@gmail.com";
                    if(mail($to, $subject, $body, $header)){
                        echo "<script>notify('Email sent successfully to $email')</script>";
                    }else{
                        echo "<script>notify('We\'re sorry, but the email could not be sent at this time. Please try again later.')</script>";
                    }
                }else{
                    echo "<script>document.getElementById('recovFail').style.display='block'</script>";
                }

                
            }
        }
    ?>
</body>
</html>