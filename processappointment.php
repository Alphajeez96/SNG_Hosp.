
<?php

require_once('lib/header.php'); 
require_once('functions/user.php');
require_once('functions/appointments.php');
require_once('functions/redirect.php');

//Data collection / validation
$errorCount = 0;

$full_name = $_POST['full_name'] != ''   ?  $_POST['full_name']  : $errorCount++  ;
$appointment_email = $_POST['appointment_email'] = !''  ? $_POST['appointment_email'] :  $errorCount++ ;
$appointment_date = $_POST['appointment_date'] != '' ?  $_POST['appointment_date'] : $errorCount++;
$appointment_time = $_POST['appointment_time'] != '' ?  $_POST['appointment_time'] : $errorCount++;
$appointment_nature = $_POST['appointment_nature'] != '' ?  $_POST['appointment_nature'] : $errorCount++;
$apppointment_department = $_POST['apppointment_department'] != '' ?  $_POST['apppointment_department'] : $errorCount++;
$initial_complaint = $_POST['initial_complaint'] != '' ?  $_POST['initial_complaint'] : $errorCount++;

//store session for input
$_SESSION ['full_name'] = $full_name; 
$_SESSION ['appointment_email'] = $appointment_email;
$_SESSION ['appointment_date'] = $appointment_date;
$_SESSION ['appointment_time'] = $appointment_time;
$_SESSION ['appointment_nature'] = $appointment_nature;
$_SESSION['apppointment_department'] =$apppointment_department;
$_SESSION['initial_complaint'] =$initial_complaint;

// $errorArray = [];

//check for error before submission

$full_name =($_POST["full_name"]);
if (!preg_match("/^[a-zA-Z ]*$/",$full_name)) {
    header("Location: dashboard.php");              
    exit();
}

$appointment_email = ($_POST["appointment_email"]);
if (!filter_var($appointment_email, FILTER_VALIDATE_EMAIL)) {
    header("Location: dashboard.php");              
    exit();
}

if ($errorCount > 0) {
    //display accurate message
    $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";
    $_SESSION["error"] = $session_error ;

   
    redirect_to('dashboard.php');
}

else{
    // count all Users
    $allAppointments = scandir("db/appointments/");
    $countAllAppointments = count($allAppointments);

    $newAppointmentId = $countAllAppointments ++;
    
    $appointmentObject = [
        'id'=>$newAppointmentId,
        'full_name' => $full_name,
        'appointment_email' => $appointment_email,
        'appointment_date' => $appointment_date,
        // 'gender' => $gender, 
        'appointment_time' => $appointment_time,
        'appointment_nature' => $appointment_nature,
        'apppointment_department' => $apppointment_department,
        'initial_complaint' => $initial_complaint
    ];

    save_appointment($appointmentObject);
    redirect_to("dashboard.php");  
    }

 
?>        