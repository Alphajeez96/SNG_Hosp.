<?php session_start();
require_once('functions/user.php');
require_once('functions/redirect.php');

//Data collection / validation
$errorCount = 0;

$first_name = $_POST['first_name'] != ''   ?  $_POST['first_name']  : $errorCount++  ;
$last_name = $_POST['last_name'] != ''   ? $_POST['last_name']  :   $errorCount++;
$email = $_POST['email'] = !''  ? $_POST['email'] :  $errorCount++ ;
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
$_SESSION['registere_at'] =

// $errorArray = [];

//check for error before submission

$first_name =($_POST["first_name"]);
if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
    header("Location: register.php");              
    exit();
}
$last_name =($_POST["last_name"]);
if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
    header("Location: register.php");              
    exit();
}

$email = ($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: register.php");              
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

   
    redirect_to('register.php');
} else {

    $current_time = time(); // get  user current time

    // count all Users
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);

    $newUserId = $countAllUsers ++;
    
    $userObject = [
        'id'=>$newUserId,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'gender' => $gender,
        'designation' => $designation,
        'department' => $department,
        'register_at' => date("F d, Y h:i:s A", $current_time),
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
    $_SESSION['message'] = "Registration Succesful, you can now login" . " " . $first_name;
    header("location: login.php");
}

?>