<?php
    session_start();
    $order_token="order_token={$_GET['order_token']}";
    $invoice="http://localhost/Login/Nirvana/invoice.php?$order_token";
    $orderCancellationLink="http://localhost/Login/Nirvana/order%20cancellation.php";
    $fileContent=file_get_contents("PC_email_body.txt");
    $fileContent=str_replace("[Customer Name]", $_SESSION['name_client'], $fileContent);
    $fileContent=str_replace("[Invoice]", $invoice, $fileContent);
    $fileContent=str_replace("[insert URL]", $orderCancellationLink, $fileContent);

    $to = $_SESSION['email_client'];
    $subject = "Purchase confirmation";
    $body = $fileContent;
    $header = "Content-Type: text/html; charset=UTF-8";
    mail($to, $subject, $body, $header);
?>