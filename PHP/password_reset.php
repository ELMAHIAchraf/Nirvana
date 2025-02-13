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
    <link rel="shortcut icon" href="../Static/logo image.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/password_reset.css">
    <script src="../JS/password_reset.js" defer></script>
    <title>Password reset</title>
</head>

<body>
    <div id="container">
        <img src="../Static/login image.jpg" id="login-image" alt="login image">
        <p id="title">Reset your password</p>
        <form action="" method="POST">
            <input type="password" oninput="passwordCheck()" name="pwd" id="pwd" placeholder="Enter your new password">
            <br><input type="password" oninput="passwordCheck()" name="Cpwd" id="Cpwd" placeholder="Confirm your new password">
            <br><input type="submit" name="save" id="save" value="Save" disabled>
        </form>
    </div>
    <?php
    include("connexion.php");
    include("notification code.php");

    if (isset($_GET['token'])) {

        $token = $_GET['token'];
        $current_time = time();
        $sql = "SELECT * FROM precovery WHERE token='$token' and UNIX_TIMESTAMP(token_creation_time)-$current_time < 24*3600";
        $query = mysqli_query($conn, $sql);
        $tab = mysqli_fetch_assoc($query);

        if (!empty($tab)) {
            if (isset($_POST['save'])) {
                if (isset($_POST['pwd']) && !empty($_POST['pwd'])) {

                    $password = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['pwd'])));
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $sql2 = "UPDATE client SET password_client='$password' WHERE id_client={$tab['id_client']}";
                    if (mysqli_query($conn, $sql2)) {
                        echo "<script>
                                document.getElementById('ok').addEventListener('click', function(){
                                    window.open('http://localhost/Login/Nirvana/PHP/login.php','_self');
                                });
                                notify('Your password has been successfully reset. You may now log in with your new password.');
                            </script>";
                    } else {
                        echo "<script>notify('Sorry, we were unable to reset your password. Please try again later.')</script>";
                    }
                }
            }
        } else {
            echo "<script>notify('The password reset link has expired. Please request a new password reset to proceed.')</script>";
        }
    }

    ?>
</body>

</html>