<?php include('lib/header.php');

//check if token is set

if(!isset($_GET['token'])){
    $_SESSION['error'] = "You are not authorized to view that page";
    header("location: login.php");
}
        

?>



<h3>Reset Password</h3>
<p>Reset password associated with your account : [email]</p>

<form action ='processreset.php' method ='POST'>
<p>
    <?php
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<span style ='color: red'>" . $_SESSION['error'] . "</span> ";

        session_destroy();

    }
    ?>
    </p>
    <input type='hidden' name='token' value="<?php echo $_GET['token'] ?>" />
<p>
<p><label for = 'email'> Email </label></p>
<input type ='email' name = 'email' id = 'email'  placeholder = 'Email'>
</p>

<p>
       <p><label for='password'>Enter New Passowrd </label></p>
       <input type='password' name='password' id='passwprd'  placeholder='Password'>
        </p>

<p>
<button type = 'submit'> Reset Password</button>
</p>
</form>
<?php include( 'lib/footer.php' ) ?>
