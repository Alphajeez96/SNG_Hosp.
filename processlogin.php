<?php  session_start();

require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/user.php');

    $errorCount = 0;    

    //Data collection / Validation4

    $email = $_POST['email'] != '' ?  $_POST['email'] : $errorCount++;
    $password = $_POST['password'] != '' ?  $_POST['password'] : $errorCount++;

    $_SESSION ['email'] = $email;

    //check for error before submission
if ($errorCount > 0) {
    //display accurate message
    $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";
    
    set_alert('error',$session_error);
      
    redirect_to("login.php");
} else {
   
     //check if user already exists
     $currentUser = find_user($email);

        //getting and comparing email input & validating user password
        if($currentUser){
              $userString = file_get_contents("db/users/".$currentUser->email . ".json");
              $userObject = json_decode($userString);
              $passwordFromDB = $userObject->password;
  
              $passwrodFromUser = password_verify($password, $passwordFromDB);
              

           if($passwordFromDB == $passwordFromUser){
               //check if user is logged in

               $_SESSION['loggedIn'] = $userObject->id; 
                $_SESSION['email'] = $userObject->email;
                $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
                $_SESSION['role'] = $userObject->designation;
                
               //check user role and send to respective db
               
            //    if( $userObject->designation == 'Patient'){
            //     header("location: patient.php");
            //    }

            redirect_to("dashboard.php");
            die();
           }
          
            
        }
    }
    set_alert('error',"Invalid Email or Password");
    redirect_to("login.php");
    die();
?>

<?php include_once('lib/footer.php') ?>