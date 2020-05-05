<?php
$file1= ("db/appointments/princess@gmail.com" .'.json');
$file2= ("db/appointments/chinemeremchukwudire@gmail.com" .'.json');

$current = file_get_contents($file1);
$current1=json_decode($current);
echo '<br>';
echo '<br>';
echo '<br>'; 1111111;
print_r ($current1);

$another=file_get_contents($file2);
$another1=json_decode($another);
echo '<br>';
echo '<br>';
echo '<br>'; 222222;
print_r ($another1);

echo '<br>';
echo '<br>';
echo '<br>'; 

// $array1 = (array) $current1;
// $array2 = (array) $another1;


// $array1 = array("color", "red", 2, 4);
// $array2 = array("a", "b", "colour" , "green", "shape", "trapezoid", 8);
// $result = array_merge($array1, $array2);
// print_r($result);
// die();
// print_r($array2);
// die();
// $merge = array_merge_recursive($array1, $array2);
// print_r($merge);
// die();

$merged = (object) array_merge_recursive((array) $current1, (array) $another1);
$mergedd =json_encode($merged);
print_r ($mergedd);
die();


$new = ($current1.$another1);
print_r ($new);




// $current .= "John Doe\n";

// file_put_contents($file, $current,FILE_APPEND );

// print_r ($current);

// $person = "John Smith\n";

// $test= file_put_contents($file, $person, FILE_APPEND );

// echo $test







?>