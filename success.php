<?php
session_start();
require "./init.php";
require_once 'config.php';
// Once the transaction has been approved, we need to complete it.
if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
    
    $transaction = $gateway->completePurchase(array(
        'payer_id'             => $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
    ));

    $response = $transaction->send();

    if ($response->isSuccessful()) {

        $arr_body = $response->getData();
        // echo "<pre>"; print_r($arr_body);
        // echo $arr_body['payer']['payer_info']['payer_id'];
        $dataintre = [];
        $dataintre[] = NULL;
        $dataintre[] = $arr_body['id']; // PAYID
        $dataintre[] = 500; // User ID 
        $dataintre[] = $arr_body['payer']['payer_info']['payer_id']; //payer_id
        $dataintre[] = $arr_body['payer']['payer_info']['email']; //    payer_email
        $dataintre[] = $arr_body['payer']['payer_info']['first_name']; // payer_first_name
        $dataintre[] = $arr_body['payer']['payer_info']['last_name']; //  payer_last_name
        $dataintre[] = serialize($arr_body['payer']['payer_info']['shipping_address']); // payer_shipping_address
        $dataintre[] = $arr_body['transactions'][0]['payee']['email']; // payee_email 
        $dataintre[] = $arr_body['transactions'][0]['amount']['total']; // amount
        $dataintre[] = PAYPAL_CURRENCY; //currency
        $dataintre[] = $arr_body['state']; // payment_status


        echo "the Payment number is :- " . $arr_body['id']  . "<br>";
        echo "the Payment state is :- " . $arr_body['state'] . "<br>";
        echo "the user id is :- " . $arr_body['payer']['payer_info']['payer_id'] . "<br>";
        echo "the user name is :- " . $arr_body['payer']['payer_info']['first_name'] . "<br>";
        echo "the user id is :- " . $arr_body['payer']['payer_info']['payer_id'] . "<br>";
        echo "the amount is :- " .  $arr_body['transactions'][0]['amount']['total'] . "<br>";
        echo "the amount is :- " . serialize($arr_body['payer']['payer_info']['shipping_address']) . "<br>";

        global $con;
        $stmt = $con->prepare("INSERT INTO payments(payment_id,payment_state,Payment_User_Id,payer_id,payer_email,payer_shipping_address,amount)
        Value(:payment_id,:payment_state,:Payment_User_Id,:payer_id,:payer_email,:payer_shipping_address,:amount)");
        $stmt->execute(
        array(
            ":payment_id"     => $arr_body['id'],
            ":payment_state"     => $arr_body['state'],
            ":Payment_User_Id"    => $arr_body['payer']['payer_info']['payer_id'],
            ":payer_id" =>  $arr_body['payer']['payer_info']['first_name'],
            ":payer_email" => $arr_body['transactions'][0]['payee']['email'],
            ":payer_shipping_address" => serialize($arr_body['payer']['payer_info']['shipping_address']),
            ":amount" => $arr_body['transactions'][0]['amount']['total'],
        ));
        echo "
        <script>
            toastr.success('Great ,item has added successfully  .')
        </script>";
        // header("Refresh:3;url=dash.php");
        if($arr_body['state'] == "approved"){
            update_order($_SESSION["user_id"]);
        }
        
    } else {
        echo $response->getMessage();

    }
} else {

    echo 'Transaction is declined';
}