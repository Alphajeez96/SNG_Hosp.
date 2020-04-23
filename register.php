<?php
 include_once('lib/test.php');
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
      
     

      <form method="POST" id="registration_form" action="processregister.php">

      <p>
            <?php print_alerts(); ?>
        </p>

        <div class="login-containe" id="del">
            <h2>Create an Account <br><span>Welcome to the future of Knowledge & Acquaintance </span></h2>
            <div class="for-group">
              <p> <label for="first name">First Name</label></p>
                <input
                <?php              
                    if(isset($_SESSION['first_name'])){
                        echo "value=" . $_SESSION['first_name'];                                                             
                    }                
                ?>
            type="text"
            id="first name"
            name="first_name" 
            pattern="[a-zA-Z][a-zA-Z ]{2,}"
            placeholder="First Name"
            
          />  
          <span class="error_form" id="fname_error_message"></span> 
        </div>

        <div class="for-group">
              <p> <label for="last name">Last Name</label></p>
                <input
                <?php              
                    if(isset($_SESSION['last_name'])){
                        echo "value=" . $_SESSION['last_name'];                                                             
                    }                
                ?>
            type="text"
            id="last name"
            pattern="[a-zA-Z][a-zA-Z ]{2,}"
            name="last_name" 
            placeholder="Last Name"
           
          />
          <span class="error_form" id="sname_error_message"></span>
        </div>

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

                <label for='gender'>Gender</label><br />
                <select id='gender'  name="gender" >
                <?php              
                    if(isset($_SESSION['gender'])){
                        echo "value=" . $_SESSION['gender'];                                                             
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
                <span class="error_form" id="gender_error_message"></span>
            </p>

            <p>
                <label for='designation'>Designation</label><br />
                <select id='designation'  name="designation" >
                <?php              
                    if(isset($_SESSION['designation'])){
                        echo "value=" . $_SESSION['designation'];                                                             
                    }                
                ?>
                    <option value="">Click To Select</option>
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
                <span class="error_form" id="designation_error_message"></span>
            </p>

            <p> <label for="department"> Department</label></p>
            <select id='department' required class="form-control input-lg" name="department" >
                <?php              
                    if(isset($_SESSION['department'])){
                        echo "value=" . $_SESSION['department'];                                                             
                    }                
                ?>
                    <option value="">Click To Select</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['department']) && $_SESSION['department'] == 'Laboratory'){
                            echo "selected";                                                           
                        }                
                    ?>
                    > Laboratory </option>
                    <option 
                    <?php              
                        if(isset($_SESSION['department']) && $_SESSION['department'] == 'Radiology Unit'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Radiology Unit</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['department']) && $_SESSION['department'] == 'General Surgery'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >General Surgery</option>
                </select>
          <span class="error_form" id="department_error_message"></span>
          
          
       <button class='buttons' type="submit">CREATE ACCOUNT</button>
        
            </div>
        </div>
        <p class="p"><a href="login.php"> Already have an account? Log In</a></p>
    </div>
        </form>
    </div>

</div>
</div> 

<script type='text/javascript'>
    
</script>
<?php include_once('lib/footer.php'); ?>