
<?php
 include_once('lib/test.php');
 require_once('functions/user.php');
 require_once('functions/alert.php');

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: dashboard.php");
    //write logic for admin to be logged in and access this page 
    //user object, role and if logged in and role is admin add patient 
}

?>
<div class='body'>


<div class="signup-wrapper">
      <div class="img">
      <a href='index.php'>  <img class="imgs" src="./img/logo.png"> </a>
      </div>
      
     

      <form method="POST" id="registration_form" action="processforgot.php">

      <p>
            <?php print_alerts(); ?>
        </p>

        <div class="login-containe" id="del">
            <h2>Forgot Password <br><span>Enter your email to reset your password</span></h2>

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

              

            <button class='buttons' type="submit">RESET PASSWORD</button>
        
            </div>
        </div>
        <!-- <div> -->
        <p class="p"><a href="login.php"> Back to login</a></p> 
        
         <!-- </div> -->
       
    </div>
    </form>       

</div>
</div> 

<script type='text/javascript'>
    
</script>
<?php include_once('lib/footer.php'); ?>
