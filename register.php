<?php 
include('lib/header.php');
if(isset($_SESSION['loggedin']) && !empty ($_SESSION['loggedin'])){
    header("location: dashboard.php");  
};


?>
    <h3>Register</h3> 
    <p>Welcome, Please Register Here</p>
    <p>All fields are required</p>

    <form method='POST' action='processregister.php'>

    <p>
    <?php
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<span style ='color: red'>" . $_SESSION['error'] . "</span> ";

        session_destroy();

    }
    ?>
    </p>
      <p>  
       <label for='fn'>First Name </label>
       
       <input 
       <?php
    if(isset($_SESSION['first_name'])){
        echo "Value =" . $_SESSION['first_name'];
        // $_SESSION['first_name']= '';
    }
    ?>
        type='text' name='first_name'  id='fn' placeholder='First Name'>
       </p>

        <p>
       <label for='ln'>Last Name </label>
       <input
       <?php
    if(isset($_SESSION['last_name'])){
        echo "Value =" . $_SESSION['last_name'];
        
    }
    ?>
        type='text' name='last_name' id='ln'  placeholder='Last Name'>
       </p>

        <p>
       <label for='email'> Email </label>
       <input 
       <?php
    if(isset($_SESSION['email'])){
        echo "Value =" . $_SESSION['email'];
        // $_SESSION['first_name']= '';
    }
    ?>
       type='email' name='email' id='email'  placeholder='Email'>
       </p>

       <p>
       <label for='password'> Passowrd </label>
       <input type='password' name='password' id='passwprd'  placeholder='Password'>
        </p>

        <p>
       <label> Gender </label>
        <select name='gender' >
        <option value=''>Select One</option>
        <option
        <?php
    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
        echo "selected" ;
        
    }
    ?>
      >Female</option>

        <option
        <?php
    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
        echo "selected" ;
        // $_SESSION['first_name']= '';
    }
    ?>
        >Male</option>
        </select>
        </p>

        <p>
        <label> Designation </label>
        <select name='designation'>
        <option value=''>Select One</option>
        <option
        <?php
    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Doctor'){
        echo "selected" ;
        
    }
    ?>
        >Doctor</option>

        <option
        
        <?php
    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Auxillary Nurse'){
        echo "selected" ;
        
    }
    ?>
        >Auxillary Nurse</option>

        <option
        <?php
    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient'){
        echo "selected" ;
     
    }
    ?>
        >Patient</option>
        </select>
        </p>

    <p>
        <label for='department'> Department </label>
        <input
        <?php
    if(isset($_SESSION['department'])){
        echo "Value =" . $_SESSION['department'];
    }
    ?>
         type='text' name='department' id='department'  placeholder='Department'>
    </p>

        <p>
        <button type='submit'>Register</button>
        </p>
    </form>

<?php include('lib/footer.php') ?>
