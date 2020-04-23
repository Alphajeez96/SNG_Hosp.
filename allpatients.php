<?php 

include_once('lib/header.php'); 
require_once('functions/alert.php');
include_once('lib/dbcss.php');
require_once('functions/redirect.php');
require_once('functions/appointments.php');
require_once('functions/user.php');


    $all_patients = scandir("db/appointments/");
    $count_patients = count($all_patients);

    for($counter =2; $counter <  $count_patients; $counter++ ){
        $current_patient= $all_patients[$counter];
        // print_r($current_patient);
        

    }
?>