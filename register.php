<?php
 include_once('lib/test.php');
 require_once('functions/alert.php');
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: dashboard.php");
}
// include_once('lib/header.php');

?>
<div class='body'>


<div class="signup-wrapper">
      <div class="img">
      <a href='index.php'>  <img class="imgs" src="./img/logo.png"> </a>
      </div>
      <form method="POST" action="processregister.php">

      <p>
            <?php  print_alert(); ?>
        </p>

        <div class="login-containe" id="del">
            <h2>Create an Account <br><span>Welcome to the future of Knowledge & Acquaintance </span></h2>
            <div class="for-group">
              <p> <label for="first name">Full Name</label></p>
                <input
            type="text"
            id="first name"
            name="Full name"
            placeholder="Full name"
            title=""
            required
          />
          
        </div>

        <div class="for-group">
           <p> <label for="email">Email Adress</label></p>
          <input
            type="text"
            name="email"
            placeholder="Email"
            title=""
            id="email"
            required
          />
         
        </div>

        <div class="for3-group">
            <p> <label>Phone Number</label></p>
           <input
             type="text"
             name="phonenumber"
             placeholder="Phone Number"
             title=""
             required
           />

           <p> <label> Password </label></p>
           <i class="fa fa-facebook icon"></i> 
           <input
             type="password"
             name="email"
             placeholder="Password"
             title=""
             required
           />

           <p> <label> Referrer Phone or Promo Code (Optional)</label></p>
           <input
             type="text"
             name="email"
             placeholder=" Referrer Phone or Code"
             title=""
             required
           />
          
           <p> <label>How Did You Hear About Us? (Optional) </label></p>
           <div class="custom-select">
            <i class="fa fa-user icon"></i>
            <img class="imgi" src="./img/icon.png">
            <i class="fa fa-user icon"></i> 
           <select>
           
               <option> Click To Select </option>
               <option>Facebook </option>
               <option>Twitter </option>
               <option>Instagram </option>
               <option>Friend/Family/Coworker Referal </option>
               <option>Google Search </option>
               <option>Google Playstore </option>
               <option>Online Blog </option>
               <option>Local Newspaper </option>
               <option>At an event </option>
               <option> Other </option>
           </select>
        </div>         
       <button class='buttons' type="submit">CREATE ACCOUNT</button>
        
            </div>
        </div>
        <p class="p"><a href="#"> Already have an account? Log In</a></p>
    </div>



<!-- <div class="container">
    <div class="row col-6">
        <h3>Register</h3>
    </div>
    <div class="row col-6">
        <p><strong>Welcome, Please Register</strong></p>
    </div>
    <div class="row col-6">
        <p>All Fields are required</p>
    </div>
    <div class="row col-6">

        <form method="POST" action="processregister.php">
        <p>
            <?php  print_alert(); ?>
        </p>
            <p>
                <label>First Name</label><br />
                <input  
                <?php              
                    if(isset($_SESSION['first_name'])){
                        echo "value=" . $_SESSION['first_name'];                                                             
                    }                
                ?>
                type="text" class="form-control" name="first_name" placeholder="First Name" />
            </p>
            <p>
                <label>Last Name</label><br />
                <input
                <?php              
                    if(isset($_SESSION['last_name'])){
                        echo "value=" . $_SESSION['last_name'];                                                             
                    }                
                ?>
                type="text" class="form-control" name="last_name" placeholder="Last Name"  />
            </p>
            <p>
                <label>Email</label><br />
                <input
                
                <?php              
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];                                                             
                    }                
                ?>

                type="text" class="form-control" name="email" placeholder="Email"  />
            </p>

            <p>
                <label>Password</label><br />
                <input type="password" class="form-control" name="password" placeholder="Password"  />
            </p>
            <p>
                <label>Gender</label><br />
                <select class="form-control" name="gender" >
                <?php              
                    if(isset($_SESSION['department'])){
                        echo "value=" . $_SESSION['department'];                                                             
                    }                
                ?>
                    <option value="">Select One</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Female</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Male</option>
                </select>
            </p>
        
            <p>
                <label>Designation</label><br />
                <select class="form-control" name="designation" >
                
                    <option value="">Select One</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team (MT)'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Medical Team (MT)</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Patient</option>
                </select>
            </p>
            <p>
                <label class="label" for="department">Department</label><br />
                <input
                <?php              
                    if(isset($_SESSION['department'])){
                        echo "value=" . $_SESSION['department'];                                                             
                    }                
                ?>
                type="text" id="department" class="form-control" name="department" placeholder="Department"  />
            
            </p>
            <p>
                <button class="btn btn-sm btn-success" type="submit">Register</button>
            </p>
            <p>
                    <a href="forgot.php">Forgot Password</a><br />
                    <a href="login.php">Already have an account? Login</a>
            </p>
        </form>

    </div>

</div>
</div> -->
<?php include_once('lib/footer.php'); ?>