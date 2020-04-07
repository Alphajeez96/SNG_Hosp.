<?php include('lib/header.php');

if(isset($_SESSION['loggedin']) && !empty ($_SESSION['loggedin'])){
    header("location: dashboard.php");  
};


 ?>

  <h3>Login</h3> 
  <p>
    <?php
    if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
        echo "<span style ='color: green'>" . $_SESSION['message'] . "</span> ";

        session_destroy();

    }
    ?>
    </p>

<form method='POST' action='processlogin.php'>

<p>
    <?php
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<span style ='color: red'>" . $_SESSION['error'] . "</span> ";

        session_destroy();

    }
    ?>
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
        <button type='submit'>Login</button>
        </p>

        </form>
  <?php include('lib/footer.php') ?> 