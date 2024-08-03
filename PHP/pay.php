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
    <script src="https://js.stripe.com/v3/"></script>
    <title>Document</title>
</head>

<body>
    <button id="btn">Pay</button>
    <script>
        let stripe = Stripe("pk_test_51N1GKxK4PQO9ioldtxlrwuwblBhEOmyGpWH6EJLavHnFYgsdPs744pTBUQ8k45UaIWa1Fne6mu0w5qtpjKR25AmL00I6FIDzeg");
        let button = document.getElementById("btn");
        button.addEventListener('click', function() {
            let xhr = new XMLHttpRequest();
            xhr.onload = function() {
                if (xhr.status == 200) {
                    let response = JSON.parse(xhr.responseText);
                    console.log(response);
                }
            }
            xhr.open('POST', "checkout.php");
            xhr.send();
        });
    </script>
</body>

</html>