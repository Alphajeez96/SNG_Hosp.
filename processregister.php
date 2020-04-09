<?php session_start();
require_once('functions/user.php');

//Data collection / validation
$errorCount = 0;

$first_name = $_POST['first_name'] != '' ?  $_POST['first_name'] : $errorCount++;
$last_name = $_POST['last_name'] != '' ?  $_POST['last_name'] : $errorCount++;
$email = $_POST['email'] != '' ?  $_POST['email'] : $errorCount++;
$password = $_POST['password'] != '' ?  $_POST['password'] : $errorCount++;
$gender = $_POST['gender'] != '' ?  $_POST['gender'] : $errorCount++;
$designation = $_POST['designation'] != '' ?  $_POST['designation'] : $errorCount++;
$department = $_POST['department'] != '' ?  $_POST['department'] : $errorCount++;

//store session for input
$_SESSION ['first_name'] = $first_name; 
$_SESSION ['last_name'] = $last_name;
$_SESSION ['email'] = $email;
$_SESSION ['gender'] = $gender;
$_SESSION ['designation'] = $designation;
$_SESSION ['department'] = $department;

// $errorArray = [];

//check for error before submission
if ($errorCount > 0) {
    //display accurate message
    $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";
    $_SESSION["error"] = $session_error ;

    header("Location: register.php");
} else {

    //count all Users
    // $allUsers = scandir("db/users/");
    // $countAllUsers = count($allUsers);

    $newUserId = ($countAllUsers -1);
    
    $userObject = [
        'id'=>$newUserId,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'gender' => $gender,
        'designation' => $designation,
        'department' => $department,
    ];
 
    //check if user already exists
    $userExists = find_user($email);

       
    if($userExists){
        $_SESSION["error"] = "Registration Failed, User already exits ";
        header("Location: register.php");
        die();
    }

    //Save in the database(file system)

    save_user($userObject);
    $_SESSION['message'] = "Registration Succesful, you can now login" . '' . $first_name;
    header("location: login.php");
}

?>