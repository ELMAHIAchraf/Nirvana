<?php
// ob_start();
session_start();
setcookie("token", "", time() - 3600, "/");
unset($_COOKIE['token']);
session_destroy();
header('Location: http://localhost/Login/Nirvana/PHP/home.php');
//     exit();
// ob_end_flush();
