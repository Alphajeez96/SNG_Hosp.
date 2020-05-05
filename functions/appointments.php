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
    $new_txref = 'SNH-';

    $values =['0','1','2', '3','4','5','6','7','8','9','a','b','d','e','f','g','h' ,'i','j','k','l','m',"n",
            'A','B','C', 'D','E','E', 'F','G','H', 'I','J', 'K','L','M', 'N','O',
            'P','Q','R', 'S','T','U','V','W', 'o','p','.', 'q','r','s', 't',];

    for($i = 0 ; $i < 12 ; $i++){

        $index = mt_rand(0,count($values)-1);
        $new_txref .=  $values[$index];
      }
      return $new_txref;
}