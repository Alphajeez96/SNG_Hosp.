<?php
session_start();

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

       $new_email = $_SESSION['email'] ;    
        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
            
            $file1= ("db/appointments/$new_email" .'.json');
            $current = file_get_contents($file1);
            $current_decode=json_decode($current);

            $merged = (object) array_merge_recursive((array) $current_decode, (array) $resp); //cast the objects to arrays, merge the arrays, then case resulting array back to a stdClass object.
            $merged_encode =json_encode($merged);

            // print_r($merged_encode);
            // die();


            // file_get_contents("db/appointments/$new_email" .'.json');
            file_put_contents($file1,$merged_encode);

         header('Location: dashboard.php');
        } else {
            header('Location: payment.php');
            
        }
    }
        else {
      die('No reference supplied');
    }


?>