<?php include_once('alert.php');

function save_appointment($appointmentObject){
    file_put_contents("db/appointments/". $appointmentObject['email'] . $appointmentObject['id'] . " " . ".json", json_encode($appointmentObject));
}

