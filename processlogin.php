<?php session_start();

require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/user.php');

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] :  $errorCount++;

$_SESSION['email'] = $email;

if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";
    
    set_alert('error',$session_error);
      
    redirect_to("login.php");

}else{

    $current_time = time(); // get  user current time

    $currentUser = find_user($email);

        if($currentUser){
          //check the user password.
            $userString = file_get_contents("db/users/".$currentUser->email . ".json");
            $userObject = json_decode($userString);
            $passwordFromDB = $userObject->password;
            

            $passwordFromUser = password_verify($password, $passwordFromDB);

            $user_role = $userObject->designation;
            $user_department = $userObject->department;

            
            if($passwordFromDB == $passwordFromUser) 

            {
                if($user_role == 'Patient') {
                    
                $_SESSION['loggedIn'] = $userObject->id; 
                $_SESSION['email'] = $userObject->email;
                $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
                $_SESSION['role'] = $userObject->designation;
                $_SESSION ['department'] = $userObject ->department;
                $_SESSION['register_at'] = $userObject->register_at;
                $_SESSION['loggedin_at']= date("F d, Y h:i:s A", $current_time);
                redirect_to("dashboard.php");
                die();
                }

                if($user_role == 'admin' && $passwordFromDB == $passwordFromUser) {
                   
                $_SESSION['loggedIn'] = $userObject->id; 
                $_SESSION['email'] = $userObject->email;
                $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
                $_SESSION['role'] = $userObject->designation;
                $_SESSION['register_at'] = $userObject->register_at;
                $_SESSION['loggedin_at']= date("F d, Y h:i:s A", $current_time);
                redirect_to("admindashboard.php");
                die();
                

                }

                if($user_role == 'Medical Team (MT)' && $user_department == 'Laboratory' ) { 
                    
                    $_SESSION['loggedIn'] = $userObject->id; 
                $_SESSION['email'] = $userObject->email;
                $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
                $_SESSION['role'] = $userObject->designation;
                $_SESSION ['department'] = $userObject ->department;
                $_SESSION['register_at'] = $userObject->register_at;
                $_SESSION['loggedin_at']= date("F d, Y h:i:s A", $current_time);
                redirect_to("mtdashboard.php");
                die();

                }

                if($user_role == 'Medical Team (MT)' && $user_department == 'Radiology Unit' ) { 
                    
                    $_SESSION['loggedIn'] = $userObject->id; 
                $_SESSION['email'] = $userObject->email;
                $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
                $_SESSION['role'] = $userObject->designation;
                $_SESSION ['department'] = $userObject ->department;
                $_SESSION['register_at'] = $userObject->register_at;
                $_SESSION['loggedin_at']= date("F d, Y h:i:s A", $current_time);
                redirect_to("radiologydashboard.php");
                die();

                }

                if($user_role == 'Medical Team (MT)' && $user_department == 'General Surgery' ) { 
                    
                    $_SESSION['loggedIn'] = $userObject->id; 
                $_SESSION['email'] = $userObject->email;
                $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
                $_SESSION['role'] = $userObject->designation;
                $_SESSION ['department'] = $userObject ->department;
                $_SESSION['register_at'] = $userObject->register_at;
                $_SESSION['loggedin_at']= date("F d, Y h:i:s A", $current_time);
                redirect_to("surgerydashboard.php");
                die();

                }
              
            }
            
          
        }   
        
        
        

    set_alert('error',"Invalid Email or Password");
    redirect_to("login.php");
    die();

}

