<?php

function generate_token(){
    $token = ""; 

    $alphabets = ['a','b','c','d','e','f','g','h','A','B','C','D','E','F','G','H'];

    for($i = 0 ; $i < 26 ; $i++){

      $index = mt_rand(0,count($alphabets)-1);
      $token .= $alphabets[$index];
    }

    return $token;
}

?>