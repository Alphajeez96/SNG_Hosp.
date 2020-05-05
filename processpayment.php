<?php session_start();

require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/appointments.php');
require_once('functions/user.php');




$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$amount = $_POST['amount'] != "" ? $_POST['amount'] :  $errorCount++;
$currency = $_POST['currency'] != "" ? $_POST['currency'] :  $errorCount++;
// print_r($_POST);

$_SESSION['email'] = $email;
$_SESSION['amount'] = $amount;
$_SESSION['currency'] = $currency;

$new_txref = generate_txref(); // write function to generate random transaction reference
// print_r($new_txref);



$curl = curl_init();
$transaction_email = $email;
$transaction_amount = $amount;  
$transaction_currency=$currency;
$txref = $new_txref; // ensure you generate unique references per transaction.
$PBFPubKey = "FLWPUBK_TEST-19e70c02ed55da731bc7f01a518544b1-X"; // get your public key from the dashboard.
$redirect_url = "http://localhost/SNH_P/verifypayment.php";
$payment_options = 'card,account';

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
      'amount'=>$amount,
      'customer_email'=>$email,
      'currency'=>$currency,
      'txref'=>$txref,
      'PBFPubKey'=>$PBFPubKey,
      'redirect_url'=>$redirect_url,
      'payment_options'=> $payment_options
      // 'payment_plan'=>$payment_plan
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
print_r($transaction->data->message);


// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $transaction->data->link);








