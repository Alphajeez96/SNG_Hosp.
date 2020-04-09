<?php

function generate_token(){
    $token = ""; 

    $alphabets = ['a','b','d','e','f','g','h' ,'i','j','k','l','m',"n",
    'A','B','C', 'D','E','E', 'F','G','H', 'I','J', 'K','L','M', 'N','O',
    'P','Q','R', 'S','T','U','V','W', 'o','p','.', 'q','r','s', 't'];

    for($i = 0 ; $i < 30 ; $i++){

      $index = mt_rand(0,count($alphabets)-1);
      $token .= $alphabets[$index];
    }

    return $token;
}

function find_token($email = ''){
    
    $allUserTokens = scandir("db/tokens/"); 
    $countAllUserTokens = count($allUserTokens);

    for ($counter = 0; $counter < $countAllUserTokens ; $counter++) {
        
        $currentTokenFile = $allUserTokens[$counter];

        if($currentTokenFile == $email . ".json"){
           
             //save token in folder
           $tokenContent = file_get_contents("db/tokens/".$currentTokenFile);

           $tokenObject = json_decode($tokenContent);
       
        return $tokenObject;

        }
    }

    return false;
}


?>