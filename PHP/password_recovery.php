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
    <link rel="shortcut icon" href="logo image.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/password_recovery.css">
    <title>Password recovery</title>
</head>

<body>
    <div id="container">
        <img src="../Static/login image.jpg" id="login-image" alt="login image">
        <br>
        <p id="title">Reset your password</p>
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

    if (isset($_GET['sub'])) {
        if (isset($_GET['email']) && !empty($_GET['email'])) {

            $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
            $sql = "SELECT * FROM client WHERE email='$email'";
            $query = mysqli_query($conn, $sql);
            $tab = mysqli_fetch_assoc($query);

            if (!empty($tab)) {
                $token = bin2hex(random_bytes(16));
                $token_creation_time = date("Y-m-d H:i:s");
                $id_client = $tab['id_client'];
                $fname = $tab['Fname'];

                $sql2 = "SELECT * FROM precovery WHERE id_client='{$tab['id_client']}'";
                $query2 = mysqli_query($conn, $sql2);
                $tab2 = mysqli_fetch_assoc($query2);
                if (empty($tab2)) {
                    $sql3 = "INSERT INTO precovery VALUES('$token', '$token_creation_time', $id_client)";
                } else {
                    $sql3 = "UPDATE precovery SET token='$token',token_creation_time='$token_creation_time' WHERE id_client='{$tab['id_client']}'";
                }
                mysqli_query($conn, $sql3);

                $fileContent = file_get_contents("../Static/PR_email_body.txt");
                $fileContent = str_replace("[User]", $fname, $fileContent);
                $fileContent = str_replace("[Password Reset Link]", "PHP/http://localhost/Login/Nirvana/PHP/password_reset.php?token=$token", $fileContent);

                $to = $email;
                $subject = "Password reset";
                $body = $fileContent;
                $header = "Content-Type: text/html; charset=UTF-8";
                if (mail($to, $subject, $body, $header)) {
                    echo "<script>notify('Email sent successfully to $email')</script>";
                } else {
                    echo "<script>notify('We\'re sorry, but the email could not be sent at this time. Please try again later.')</script>";
                }
            } else {
                echo "<script>document.getElementById('recovFail').style.display='block'</script>";
            }
        }
    }
    ?>
</body>

</html>