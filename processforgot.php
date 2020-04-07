<?php   session_start();
require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/user.php');
 
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

            //save token in folder
            file_put_contents("db/tokens/". $email . ".json", json_encode(['token'=>$token]));
   
            //function to send mail
         send_mail($subject, $message, $email); 

            die();
        }

    }
    set_alert("error", "Email not Found ERR:" . " " . $email);
    redirect_to("forgot.php");
}
?>