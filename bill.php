<?php 
include_once('lib/header.php'); 
include_once('lib/billcss.php');
require_once('functions/alert.php');

if(!isset($_SESSION['loggedIn'])){
    // redirect to login
    header("Location: login.php"); 
}
?>

        <!-- <div class="container-fluid">


<div class="text-center">
  <div class="error mx-auto" data-text="404">404</div>
  <p class="lead text-gray-800 mb-5">Page Not Found</p>
 
  <a href="dashboard.php">&larr; Back to Dashboard</a>
</div>

</div> -->
<div class='body'>


<div class="signup-wrapper">
      <div class="img">
      <a href='index.php'>  <img class="imgs" src="./img/logo.png"> </a>
      </div>
      
     

      <form method="POST" id="registration_form" action="processlogin.php">

      <p>
            <?php print_alerts(); ?>
        </p>

        <div class="login-containe" id="del">
            <h2>Login to your account</h2>

        <div class="for-group">
           <p> <label for="email">Email Adress</label></p>
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
          />  
          <span class="error_form" id="email_error_message"></span>     
        </div>

           <p> <label for='password'> Password </label></p> 
           <input
            id='password'
             type="password"
             name="password"
             placeholder="Password"   
           />
           <span class="error_form" id="password_error_message"></span>
           <p>      

            <button class='buttons' type="submit">LOG IN</button>
        
            </div>
        </div>
        <!-- <div> -->
        <p class="p"><a href="register.php"> Dont have an account? Register</a></p> 
         <p class="p"> <a href="forgot.php"> Forgot Password? </a> </p>
         <!-- </div> -->
       
    </div>
    </form>       

</div>
</div> 
<?php include_once('lib/footer.php'); ?>
