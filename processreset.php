<?php session_start();
    require_once('functions/user.php');
    require_once('functions/alert.php');
    require_once('functions/redirect.php');
    require_once('functions/token.php');

$errorCount = 0;
if(!$_SESSION['loggedIn']){
    $token = $_POST['token'] != "" ? $_POST['token'] :  $errorCount++;
    $_SESSION['token'] = '$token';
}


// if(!is_user_loggedIn()){

//     $token = $_POST['token'] != "" ? $_POST['token'] :  $errorCount++;
//     $_SESSION['token'] = $token;
// }

$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] :  $errorCount++;


$_SESSION['email'] = '$email';

if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error";
   
   if($errorCount > 1) {        
       $session_error .= "s";
   }

   $session_error .=   " in your form submission";
   
   set_alert('error',$session_error);

   redirect_to("reset.php");

}else{
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
   }
      
        $checkToken = is_user_loggedIn() ? find_token($email) : true ;
       $tokenFromDB = $tokenObject->token;

            if($_SESSION['loggedIn']){
                $checkToken = true;
            }
            else {
                $checkToken = $tokenFromDB == $token;
            }

           if($checkToken){
           
                $currentUser = find_user($email);

                if($currentUser){

                        // $userString = file_get_contents("db/users/".$currentUser->email . ".json");
                        // $userObject = json_decode($userString);         
                        // $userObject = find_user($email);
                        $userObject->password = password_hash($password, PASSWORD_DEFAULT);
                       
            
                        unlink("db/users/".$currentUser); //file delete, user data delete

                        unlink("db/token/".$currentUser); //file delete, token data delete

                        // save_user($userObject);
                        file_put_contents("db/users/". $email . ".json", json_encode($userObject));

                        set_alert('message',"Password Reset Successful, you can now login ");

                        $subject = "Password Reset Successful";
                        $message = "Your account on snh has just been updated, your password has changed. if you did not initiate the password change, please visit snh.org and reset your password immediatly";
                        send_mail($subject,$message,$email);
                       
                        redirect_to("login.php");
                        return;
                    
                    }    
    }
    set_alert('error',"Password Reset Failed, token/email invalid or expired");
    redirect_to("login.php");
}

