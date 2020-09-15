<?php
  require_once '../lib/vendor/autoload.php';

  $token = $_REQUEST["token"];
  $payment_method_id = $_REQUEST["payment_method_id"];
  $installments = $_REQUEST["installments"];
  $issuer_id = $_REQUEST["issuer_id"];

  MercadoPago\SDK::setAccessToken("TEST-3687333283239850-091103-a0803d61bcd40af88c0a2aa3523a59e7-280181400");
  
    //...
    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = 118;
    $payment->token = $token;
    $payment->description = "Incredible Rubber Computer";
    $payment->installments = $installments;
    $payment->payment_method_id = $payment_method_id;
    $payment->issuer_id = $issuer_id;
    $payment->payer = array(
    "email" => "benjamin@live.com"
    );
    // Armazena e envia o pagamento
    $payment->save();
    //...
    // Imprime o status do pagamento
    echo $payment->status;