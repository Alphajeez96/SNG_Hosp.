<?php 
include_once('lib/header.php'); 
include_once('lib/billcss.php');
// include_once('lib/test.php');
require_once('functions/alert.php');

if(!isset($_SESSION['loggedIn'])){
    // redirect to login
    // header("Location: login.php"); 
}
?>

<form action = 'processbill.php' method='POST'>
    <p>
    <label for ='email'>Email</label>  
      <input id='email' type='email' name='email'>
    </p>

    <p>
    <label for='amount'>Amount</label>
    <input id='amount' type ='number' name='amount'>
    </p>

    <p>
    <label for='currency'>Currency</label>
    <input id='currency' type ='text' readonly value='NGN' name='currency'>
    </p>

    <button type='submit'>Pay</button>
</form>