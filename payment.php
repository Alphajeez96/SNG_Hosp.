<?php 
include_once('lib/test.php');
require_once('functions/alert.php');
require_once('functions/user.php');
require_once('functions/appointments.php');

if(!isset($_SESSION['loggedIn'])){
    header("Location: login.php"); 
}

?>

<div class='body'>
<div class="signup-wrapper">
      <div class="img">
      <a href='dashboard.php'>  <img class="imgs" src="./img/logo.png"> </a>
      </div>   

      <form action = 'processpayment.php' method='POST'>

      <p>
            <?php print_alerts(); ?>
        </p>

        <div class="login-containe" id="del">
        <div class="for-group">
           <p><label for ='email'>Email</label></p>
          <input
          <?php              
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];                                                             
                    }                
                ?>
            type="email"
            name="email"
            placeholder="Email"
            title=""
            id="email"   
            required  
          />   
        </div>

    <p>
    <label for='amount'>Amount</label>
    <input id='amount' required type ='number' name='amount'>
    </p>  

    <p>
    <label for='currency'>Currency</label>
    <input id='currency' type ='text' readonly value='NGN' name='currency'>
    </p>  

    <button class='buttons' type='submit'>Pay</button>

            </div>
        </div>  
    </div>
    </form>       
</div>
</div>