<?php  session_start();
    $errorCount = 0;    

    //Data collection / Validation4

    $email = $_POST['email'] != '' ?  $_POST['email'] : $errorCount++;
    $password = $_POST['password'] != '' ?  $_POST['password'] : $errorCount++;

    $_SESSION ['email'] = $email;

    //check for error before submission
if ($errorCount > 0) {
    //display accurate message
    $_SESSION['error'] = 'you have' . ' '. $errorCount . ' '.  ' errors in your form submission';
    header("location: login.php");
} else {
   //count all Users
   $allUsers = scandir("db/users/");
  
   $countAllUsers = count($allUsers);
  


     //check if user already exists
     for($counter = 0; $counter < $countAllUsers; $counter++ ){
        $currentUser = $allUsers[$counter];

        //getting and comparing email input
        if($currentUser == $email . ".json"){
           $userString= file_get_contents("db/users/". $currentUser);
           $userObject = json_decode($userString);

           //validating user password
           $passwordFromDB = $userObject->password;

           $passwordFromUser = password_verify($password, $passwordFromDB);

           if($passwordFromDB == $passwordFromUser){
               //check if user is logged in

               $_SESSION['loggedin'] = $userObject->id;
               $_SESSION['fullname'] = $userObject->first_name . " " .  $userObject->last_name;
               $_SESSION['role'] = $userObject->designation;

               //check user role and send to respective db
               
            //    if( $userObject->designation == 'Patient'){
            //     header("location: patient.php");
            //    }

                header("location: dashboard.php");
                die();
           }
          
            
        }
    }
    $_SESSION['error'] = "Invalid Email or Password" ;
            header("location: login.php");  
}
?>

<?php include_once('lib/footer.php') ?>