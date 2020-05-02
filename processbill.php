<?php session_start();

require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/user.php');



$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$amount = $_POST['amount'] != "" ? $_POST['amount'] :  $errorCount++;
$currency = $_POST['currency'] != "" ? $_POST['currency'] :  $errorCount++;

$_SESSION['email'] = $email;

$new_txref = generate_token();

$curl = curl_init();
$transaction_email = $email;
$transaction_amount = $amount;  
$transaction_currency=$currency;
$txref = $new_txref; // ensure you generate unique references per transaction.
$PBFPubKey = "<YOUR PUBLIC KEY>"; // get your public key from the dashboard.
$redirect_url = "https://your-website.com/urltoredirectto";

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
      'amount'=>$amount,
      'customer_email'=>$customer_email,
      'currency'=>$currency,
      'txref'=>$txref,
      'PBFPubKey'=>$PBFPubKey,
      'redirect_url'=>$redirect_url,
      'payment_plan'=>$payment_plan
    ]),
    CURLOPT_HTTPHEADER => [
      "content-type: application/json",
      "cache-control: no-cache"
    ],
  ));

  $response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the rave API
  die('Curl returned error: ' . $err);
}

$transaction = json_decode($response);

if(!$transaction->data && !$transaction->data->link){
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}

// uncomment out this line if you want to redirect the user to the payment page
//print_r($transaction->data->message);


// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $transaction->data->link);



