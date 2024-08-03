<?php session_start() ?>
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
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="../CSS/checkout.css">
    <script src="../JS/checkout.js" defer></script>
    <title>Checkout</title>
</head>

<body onclick="hideSearchResults()">
    <?php
    include('NavBar.php');
    if (isset($_GET['id_article']) && isset($_GET['quantity'])) {
        $sql = "SELECT price FROM articles WHERE id_article={$_GET['id_article']}";
        $query = mysqli_query($conn, $sql);
        $tab = mysqli_fetch_row($query);
        $amount = $tab[0] * $_GET['quantity'];
    }
    ?>
    <div id="main">
        <img id="purchase-image" src="../Static/checkout image.jpg" alt="purchase image">
        <div id="purchase-div">
            <label for="cardNum">Card number</label>
            <div class="StripeElements" id="cardNum"></div>
            <label for="cardExp">Expiration date</label>
            <div class="StripeElements" id="cardExp"></div>
            <label for="cardCvc">Security code</label>
            <div class="StripeElements" id="cardCvc"></div>
            <button id="pay-button" onclick="Pay()" disabled>Pay $<?php if (isset($amount)) echo $amount ?>&ensp;<i id="loading" class="fa-solid fa-spinner fa-spin"></i></button>
        </div>
    </div>
    <script>
        function Pay() {
            document.getElementById('loading').style.display = 'inline-block';

            let xhr = new XMLHttpRequest();
            xhr.onload = function() {
                if (xhr.status == 200) {
                    let client_secret = JSON.parse(xhr.responseText);
                    let transStatus = stripe.confirmCardPayment(client_secret.client_secret, {
                        payment_method: {
                            card: cardNumElem
                        }
                    }).then(function(transaction) {
                        if (transStatus.error) {
                            notify(`
                                Error: ${transaction.error.message}`);
                        } else {
                            let xhr2 = new XMLHttpRequest();
                            let order_token = 'order_token=';
                            xhr2.onload = function() {
                                if (xhr2.status == 200) {
                                    order_token += xhr2.responseText;
                                }
                            }
                            xhr2.open('POST', "DaddToOrders.php", false);
                            xhr2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr2.send("id_article=<?php echo $_GET['id_article'] ?>&color=<?php echo $_GET['color'] ?>&quantity=<?php echo $_GET['quantity'] ?>&id_color=<?php echo $_GET['id_color'] ?>&transaction_id=" + transaction.paymentIntent.id);

                            let xhr3 = new XMLHttpRequest();
                            xhr3.open('GET', "paymentEmail.php?" + order_token, true);
                            xhr3.send();

                            document.getElementById('loading').style.display = 'none';

                            document.getElementById('notification-div').style.width = '34%';
                            document.getElementById('message').style.textAlign = 'left';
                            let description = transaction.paymentIntent.description.replace(/\(...\),/g, "(...)<br>");
                            notify(`
                                Status: ${transaction.paymentIntent.status}<br>
                                Order ID: ${xhr2.responseText}<br>
                                Description: ${description}<br>
                                Amount: ${transaction.paymentIntent.amount/100} ${transaction.paymentIntent.currency}
                            `);
                        }
                    });
                }

            }
            xhr.open('POST', "payment.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("amount=" + <?php if ($amount) echo $amount ?> + "&description=" + "<?php if (isset($_GET['description'])) echo $_GET['description'] ?>");
        }
        document.getElementById('ok').addEventListener('click', function() {
            window.open('http://localhost/Login/Nirvana/PHP/home.php', '_self');
        });
    </script>
</body>

</html>