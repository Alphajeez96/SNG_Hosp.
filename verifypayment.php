<?php
session_start();
// echo 'i got here'


    if (isset($_GET['txref'])) {
        $ref = $_GET['txref'];
        $amount = $_SESSION['amount']; //Correct Amount from Server
        $currency = $_SESSION['currency']; //Correct Currency from Server
        $email = $_SESSION['email'];

        $query = array(
            "SECKEY" => "FLWSECK_TEST-43abf01461c294b0b671ca9afee26a7c-X",
            "txref" => $ref
        );

        $data_string = json_encode($query);
                
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
         
        //  echo 'this should be right';
        file_put_contents("db/transactions/". $_SESSION['email'] . ".json", json_encode($ref));
         header('Location: dashboard.php');
            // transaction was successful...
             // please check other things like whether you already gave value for this ref
          // if the email matches the customer who owns the product etc
          //Give Value and return to Success page
        } else {
            // echo 'this is wrong';
            swal("Oops", "Payment not Successful", "error");
            header('Location: payment.php');
            //Dont Give Value and return to Failure page
        }
    }
        else {
      die('No reference supplied');
    }


?>