<?php
$sub = "TEST";
$msg = "Sent";
$rec = "elmahi.achraf9@gmail.com";
 if(mail($rec,$sub,$msg)){
    echo "email sent";
 }else{
    echo "Error";
 }
?>