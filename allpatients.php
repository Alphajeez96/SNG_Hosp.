<?php 

include_once('lib/header.php'); 
require_once('functions/alert.php');
include_once('lib/dbcss.php');
require_once('functions/redirect.php');
require_once('functions/appointments.php');
require_once('functions/user.php');


    $all_patients = scandir("db/users/");
    $count_patients = count($all_patients ) ;
    // print_r($count_patients);
    // die();
       
    for($counter = 2; $counter < $count_patients; $counter++ ){
        $current_patient= $all_patients[$counter];
    //        print_r($current_patient);
    // die();
      
        $patient_string = file_get_contents("db/users/".$current_patient);
        $patient_object = json_decode($patient_string);
            // print_r($patient_object);
        //  die(); 
        // $designation = $patient_object->designation;
 
            $patient_name = $patient_object->first_name. " " . $patient_object->last_name;
            $patient_email = $patient_object->email;
            $patient_gender = $patient_object->gender;
            $patient_designation= $patient_object->designation;
            $patient_department = $patient_object->department;
            $date_joined = $patient_object->register_at;   

if ($patient_designation == 'Patient') {


?>

<thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Designation</th>
                      <th>Department</th>
                      <th>Date Joined</th>
                      <th>Last Login</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $patient_name;?></td>
                      <td><?php echo $patient_email;?></td>
                      <td><?php echo $patient_gender;?></td>
                      <td><?php echo $patient_designation;?></td>
                      <td><?php echo $patient_department;?></td>
                      <td><?php echo $date_joined;?></td>
                    </tr>

             <?php   } }
?>