<?php 
    include_once('lib/test.php');
    // include_once('lib/header.php'); 
        require_once('functions/alert.php');
        require_once('functions/user.php');

    //check if token is set

    if(!is_user_loggedIn() && !is_token_set()){
        $_SESSION["error"] = "You are not authorized to view that page";
        header("Location: login.php");
    }

    ?>

    <div class='body'>

 
    <div class="signup-wrapper">
        <div class="img">
        <a
            <?php  
             if(is_user_loggedIn() &&  $_SESSION['role'] == 'admin'){
                echo " href='admindashboard.php'";
             }

                if(is_user_loggedIn() &&  $_SESSION['role'] == 'patient'){
                    echo " href='dashboard.php'";
                }

                if(is_user_loggedIn() &&  $_SESSION['role'] == 'Medical Team (MT)' && $_SESSION['department'] == 'Laboratory'){
                    echo "href='mtdashboard.php'";
                }
                if(is_user_loggedIn() &&  $_SESSION['role'] == 'Medical Team (MT)' && $_SESSION['department'] == 'General Surgery'){
                    echo "href='surgerydashboard.php'";
                }
                if(is_user_loggedIn() &&  $_SESSION['role'] == 'Medical Team (MT)' && $_SESSION['department'] == 'Radiology Unit'){
                    echo "href='radiologydashboard.php'";
                }
     
    ?>
      href ='dashboard.php'  > <img class="imgs" src="./img/logo.png"> </a>
        </div>
        
        

        <form method="POST" id="registration_form" action="processreset.php">

        <p>
                <?php print_alerts(); ?>
            </p>

            <div class="login-containe" id="del">
                <h2>Reset Password <br><span>Enter your email to reset your password</span></h2>

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

            <p> <label for='password'> New Password </label></p> 
            <input
                id='password'
                type="password"
                name="password"
                placeholder="Password"   
            />
            <span class="error_form" id="password_error_message"></span>
            <p>      
            </div>

                

                <button class='buttons' type="submit">RESET PASSWORD</button>
            
                </div>
            </div>
           
        
        </div>
        </form>       

    </div>
    </div> 

    <script type='text/javascript'>
        
    </script>
    <?php include_once('lib/footer.php'); ?>