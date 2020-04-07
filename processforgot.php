<?php   session_start();
 
    //Data collection / validation
    $errorCount = 0;

    $email = $_POST['email'] != '' ?  $_POST['email'] : $errorCount++;

    $_SESSION ['email'] = $email;

    //check for error before submission
if ($errorCount > 0) {
    //display accurate message
    $_SESSION['error'] = 'you have' . ' '. $errorCount . ' '.  ' errors in your form submission';
    header("location: forgot.php");
} else {

    //count all Users
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);


    for($counter = 0; $counter < $countAllUsers; $counter++ ){
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){
            // send  email

            /**
             * Generating token starts Here
            
             */
            $token= '';
            $alphabets = ['a','b','d','e','f','g','h' ,'i','j','k','l','m',"n",
             'A','B','C', 'D','E','E', 'F','G','H', 'I','J', 'K','L','M', 'N','O',
             'P','Q','R', 'S','T','U','V','W', 'o','p','.', 'q','r','s', 't'];

            for($i=0; $i < 22 ; $i++ ){
                $index = mt_rand(0, count($alphabets));
                $token .= $alphabets[$index];
            }

            
            /**
             * code Ends here
             */
           
            $subject = "Password Reset";
            $message = "A password reset hsas been initiated from your account. If you did not initiate this reset, 
            please ignore this message, otherwise, visit: localhost/SNH_P/reset.php?token=" . $token;
            $headers = "From: alphajeez@snh.org" . "\r\n" .
            "CC: prince@snh.org";

            //save token in folder
            file_put_contents("db/tokens/". $email . ".json", json_encode(['token'=>$token]));
   
    
            
           $try = mail($email,$subject,$message,$headers);
           

           if($try){
               //display a success message
               $_SESSION['message'] = "Password Reset has been Sent to:" . " " . $email;
               header("location: login.php");
           } else {
               //display error message
               $_SESSION['error'] = "Something went wrong! password reset not sent to:" . " " . $email;
               header("location: forgot.php");
           }

            die();
        }

    }
    $_SESSION['error'] = "Email not Found ERR:" . " " . $email;
    header("location: forgot.php");
}
?>