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
