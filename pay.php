<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://js.stripe.com/v3/"></script>
    <title>Document</title>
</head>
<body>
    <button id="btn">Pay</button>
    <script>
        let stripe = Stripe("pk_test_51N1GKxK4PQO9ioldtxlrwuwblBhEOmyGpWH6EJLavHnFYgsdPs744pTBUQ8k45UaIWa1Fne6mu0w5qtpjKR25AmL00I6FIDzeg");
        let button=document.getElementById("btn");
        button.addEventListener('click', function(){
            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    let response=JSON.parse(xhr.responseText);
                    console.log(response);
                }
            }
            xhr.open('POST', "checkout.php");
            xhr.send();
        });
    </script>
</body>
</html>