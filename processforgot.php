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
    $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";

    set_alert('error', $session_error);

    header("Location: forgot.php");
} else {

    //count all Users
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);


    for($counter = 0; $counter < $countAllUsers; $counter++ ){
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){
            //Generating token starts Here
            $token= generate_token();
            
           //Email sending starts here
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