<?php?>
   <p>
   <a href='index.php'>Home</a> |
   <?php if(!isset($_SESSION['loggedin'])){  ?>
    
   <a href='login.php'>Login</a> |
   <a href='register.php'>Register</a> |
   <a href='forgot.php'>Forgot Password</a> 

   <?php }else{?>
    <a href='logout.php'>Logout</a> |
    <a href='forgot.php'>Reset Password</a> 
   <?php } ?>
  
   </p>
</body>