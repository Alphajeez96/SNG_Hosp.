<?php 
include_once('alert.php');

function save_appointment($appointmentObject){
    file_put_contents("db/appointments/". $appointmentObject['appointment_email']  .  ".json", json_encode($appointmentObject));
}


function find_appointment($appointment_email = ""){
    $allAppointments = scandir("db/appointments/"); 
    $countAllAppointments = count($allAppointments);

    for ($counter = 2; $counter < $countAllAppointments ; $counter++) {
       
        $currentAppointment = $allAppointments[$counter];

            $appointmentString = file_get_contents("db/appointments/".$currentAppointment);
            $appointmentObject = json_decode($appointmentString);
                       
            return $appointmentObject;        
    }


}

function generate_txref(){
    $new_txref = '';

    $values ='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    for($i = 0 ; $i < 15 ; $i++){

        $index = mt_rand(0,count($values)-1);
        $new_txref .= 'SNH' . $values[$index];
      }
      return $new_txref;
}