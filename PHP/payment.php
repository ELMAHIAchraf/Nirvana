 <?php
    if (
        isset($_POST['amount']) && !empty($_POST['amount']) and
        isset($_POST['description']) && !empty($_POST['description'])
    ) {
        include('../vendor/autoload.php');
        $stripe = new \Stripe\stripeClient("sk_test_51N1GKxK4PQO9ioldzVmCEQzQTX9OeMRuNOqfhfg4bdh9XDatDJYddSzawd6291y0REhmdCRoQzxheJUVWfUdZoNU00s5GV2JxI");
        $payment = $stripe->paymentIntents->create([
            'amount' => $_POST['amount'] * 100,
            'currency' => 'usd',
            'payment_method_types' => ['card'],
            'description' => $_POST['description']
        ]);
        echo json_encode(['client_secret' => $payment->client_secret]);
    }
    ?>