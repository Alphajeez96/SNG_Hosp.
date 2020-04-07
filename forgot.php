<?php include( 'lib/header.php' ) ?>

<h3>Forgot Password</h3>
<p>Provide the email associated with your account</p>

<form action ='processforgot.php' method ='POST'>
<p>
    <?php
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<span style ='color: red'>" . $_SESSION['error'] . "</span> ";

        session_destroy();

    }
    ?>
    </p>
<p>
<p><label for = 'email'> Email </label></p>
<input
<?php
if ( isset( $_SESSION['email'] ) ) {
    echo 'Value = ' . $_SESSION['email'];
    // $_SESSION['first_name'] = '';
}
?>
 type ='email' name = 'email' id = 'email'  placeholder = 'Email'>
</p>

<p>
<button type = 'submit'>Send Reset Code</button>
</p>
</form>
<?php include( 'lib/footer.php' ) ?>
