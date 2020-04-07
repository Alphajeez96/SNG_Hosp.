<?php  session_start();

    require_once('functions/user.php');
    require_once('functions/alert.php');
    require_once('functions/redirect.php');

//Data collection / validation
$errorCount = 0;

$token = $_POST['ti=oken'] != '' ?  $_POST['token'] : $errorCount++;
$email = $_POST['email'] != '' ?  $_POST['email'] : $errorCount++;
$password = $_POST['password'] != '' ?  $_POST['password'] : $errorCount++;


$_SESSION ['email'] = $email;
$_SESSION ['token'] = $token;

if ($errorCount > 0) {
    //display accurate message
    $_SESSION['error'] = 'you have' . ' '. $errorCount . ' '.  ' errors in your form submission';
    header("location: reset.php");
} else {
    //count all Users
    $allUserTokens = scandir("db/tokens/");
    $countAllUserTokens = count($allUserTokens);

    for($counter = 0; $counter < $countAllUserTokens; $counter++ ){
        $currentTokenFile = $allUserTokens[$counter];

        if($currentTokenFile == $email . ".json"){
            

            $tokenContent = file_get_contents("db/tokens" . $currentTokenFile);


        }

    }
    $_SESSION['error'] = "Password Reset Failed token/email invalid" . '' . $first_name;
    header("location: login.php");

}
?>