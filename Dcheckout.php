<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo image.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="checkout.css">
    <script src="checkout.js" defer></script>
    <title>Checkout</title>
</head>
<body>
<?php 
    include('NavBar.php');
    if(isset($_GET['id_article']) && isset($_GET['quantity'])){
        $sql="SELECT price FROM articles WHERE id_article={$_GET['id_article']}";
        $query=mysqli_query($conn, $sql);
        $tab=mysqli_fetch_row($query);
        $amount=$tab[0]*$_GET['quantity'];
    }
?>
    <div id="main">
        <img id="purchase-image" src="checkout image.jpg" alt="purchase image">
        <div id="purchase-div">
            <label for="cardNum">Card number</label>
            <div class="StripeElements" id="cardNum"></div>
            <label for="cardExp">Expiration date</label>
            <div class="StripeElements" id="cardExp"></div>
            <label for="cardCvc">Security code</label>
            <div class="StripeElements" id="cardCvc"></div>
            <button id="pay-button" onclick="Pay()" disabled>Pay $<?php if(isset($amount)) echo $amount?>&ensp;<i id="loading" class="fa-solid fa-spinner fa-spin"></i></button>
        </div>
    </div>
    <script>
        function Pay(){
            document.getElementById('loading').style.display='inline-block';

            let xhr = new XMLHttpRequest();
            xhr.onload=function(){
                if(xhr.status==200){
                    let client_secret=JSON.parse(xhr.responseText);
                    let transStatus=stripe.confirmCardPayment(client_secret.client_secret, {
                        payment_method: {card:cardNumElem}
                    }); 
                    if(transStatus.error){
                        notify(`
                            Error: ${transStatus.error.message}`
                        );
                    }else{
                        let xhr2 = new XMLHttpRequest();
                        let order_token='order_token=';
                        xhr2.onload=function(){
                            if(xhr2.status==200){
                                order_token+=xhr2.responseText;
                            }
                        }
                        xhr2.open('GET', "DaddToOrders.php?id_article=<?php echo $_GET['id_article']?>&color=<?php echo $_GET['color']?>&quantity=<?php echo $_GET['quantity']?>&id_color=<?php echo $_GET['id_color']?>", false);
                        xhr2.send();
                       
                        let xhr3 = new XMLHttpRequest();
                        xhr3.open('GET', "paymentEmail.php?"+order_token, true);
                        xhr3.send();
                         
                        document.getElementById('loading').style.display='none';
   
                        
                        notify(`
                            Status: ${transStatus.status}<br>
                            Transaction ID:${transStatus.id}<br>
                            Description:${transStatus.description}<br>
                            Amount:${transStatus.amount/100} ${transStatus.currency}
                        `);
                    }
                }
            }
            xhr.open('POST', "payment.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("amount="+<?php if($amount) echo $amount?>+"&description="+"<?php if(isset($_GET['description'])) echo $_GET['description']?>");
        }
        document.getElementById('ok').addEventListener('click', function(){
            window.open('http://localhost/Login/Nirvana/home.php','_self');
        });
    </script>
</body>
</html>