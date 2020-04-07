<?php session_start();

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


$errorArray = [];

//check for error before submission
if ($errorCount > 0) {
    //display accurate message
    $_SESSION['error'] = 'you have' . ' '. $errorCount . ' '.  ' errors in your form submission';
    header("location: register.php");
} else {

    //count all Users
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);

    $newUserId = $countAllUsers -1;
    
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
    for($counter = 0; $counter < $countAllUsers; $counter++ ){
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){
            $_SESSION['error'] = "Registration failed, User already exists" ;
            header("location: register.php");  
             die();
        }
    }


    //Save in the database(file system)

    file_put_contents("db/users/". $email . ".json", json_encode($userObject)  );
    $_SESSION['message'] = "Registration Succesful, you can now login" . '' . $first_name;
    header("location: login.php");
}

// print_r($errorArray);

// if (last_name == '') {
//     $errorArray = 'last name cannot be blank';
// } 

// print_r($errorArray);

// if (email == '') {
//     $errorArray = 'please provide an email';
// } 

// print_r($errorArray);

// if (password == '') {
//     $errorArray = 'please pick a password';
// } 

// print_r($errorArray);

// if (gender == '') {
//     $errorArray = 'please pick a gender';
// } 

// print_r($errorArray);

// if (designation == '') {
//     $errorArray = 'designation cannot be blank';
// } 

// print_r($errorArray);

// if (department == '') {
//     $errorArray = 'department cannot be blank';
// } 

// print_r($errorArray);



?>