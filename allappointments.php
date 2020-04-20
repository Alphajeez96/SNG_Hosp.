<?php 

session_start();
require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/user.php');

// $currentUser = find_user($email);


  //check the user password.
    $appointmentString = file_get_contents("db/appointments/"); 
    $appointmentObject = json_decode($appointmentString);
    $apppointment_role = $appointmentObject->apppointment_department;

    $userString = file_get_contents("db/users/".$currentUser->email . ".json");
    $userObject = json_decode($userString);
    $user_department = $userObject->department;
    $user_role= $userObject->designation;
   
        if($apppointment_role == 'Laboratory' &&  $user_role == 'Laboratory' && $user_role == 'Medical Team (MT)'){
            
        $_SESSION['full_name'] = $appointmentObject->full_name; 
        $_SESSION['appointment_email'] = $appointmentObject->appointment_email;
        $_SESSION['appointment_date'] = $appointmentObject->appointment_date;
        $_SESSION['appointment_time'] = $appointmentObject->appointment_time;
        $_SESSION ['appointment_nature'] = $appointmentObject ->appointment_nature;
        $_SESSION['apppointment_department'] = $appointmentObject->apppointment_department;
        $_SESSION['initial_complaint']=  $appointmentObject->initial_complaint;
        // redirect_to("mtdashboard.php");
        die();
        }

        // if($user_role == 'admin' && $passwordFromDB == $passwordFromUser) {
           
        // $_SESSION['loggedIn'] = $userObject->id; 
        // $_SESSION['email'] = $userObject->email;
        // $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
        // $_SESSION['role'] = $userObject->designation;
        // $_SESSION['register_at'] = $userObject->register_at;
        // $_SESSION['loggedin_at']= date("F d, Y h:i:s A", $current_time);
        // redirect_to("admindashboard.php");
        // die();
        

        // }

        // if($user_role == 'Medical Team (MT)') {
            
        //     $_SESSION['loggedIn'] = $userObject->id; 
        // $_SESSION['email'] = $userObject->email;
        // $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
        // $_SESSION['role'] = $userObject->designation;
        // $_SESSION ['department'] = $userObject ->department;
        // $_SESSION['register_at'] = $userObject->register_at;
        // $_SESSION['loggedin_at']= date("F d, Y h:i:s A", $current_time);
        // redirect_to("mtdashboard.php");
        // die();

        // }
      
    
    
  
     


// set_alert('error',"Invalid Email or Password");
// redirect_to("login.php");
// die();


?>