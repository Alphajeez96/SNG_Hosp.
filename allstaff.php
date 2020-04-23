

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

<?php 

include_once('lib/header.php'); 
require_once('functions/alert.php');
include_once('lib/dbcss.php');
require_once('functions/redirect.php');
require_once('functions/appointments.php');
require_once('functions/user.php');


    $all_staff = scandir("db/users/");
    $count_staff= count($all_staff ) ;
    // print_r($count_patients);
    // die();
       
    for($counter = 2; $counter < $count_staff; $counter++ ){
        $current_staff= $all_staff[$counter];
    //        print_r($current_patient);
    // die();
      
        $staff_string = file_get_contents("db/users/".$current_staff);
        $staff_object = json_decode($staff_string);
        //     print_r($staff_object);
        //  die(); 
        // $designation = $patient_object->designation;
 
            $staff_name = $staff_object->first_name. " " . $staff_object->last_name;
            $staff_email = $staff_object->email;
            $staff_gender = $staff_object->gender;
            $staff_designation= $staff_object->designation;
            $staff_department = $staff_object->department;
            $date_joined = $staff_object->register_at;   

if ($staff_designation == 'Medical Team (MT)') {


?>


                  <tbody>
                    <tr>
                      <td><?php echo $staff_name;?></td>
                      <td><?php echo $staff_email;?></td>
                      <td><?php echo $staff_gender;?></td>
                      <td><?php echo $staff_designation;?></td>
                      <td><?php echo $staff_department;?></td>
                      <td><?php echo $date_joined;?></td>
                    </tr>

             <?php   } }
?>