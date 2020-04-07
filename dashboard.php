<?php include('lib/header.php');

if(!isset($_SESSION['loggedin'])){
    header("location: login.php");  
};


?>
<h3>Dashboard</h3>

<p>
    

Welcome, <?php echo $_SESSION['fullname'] ?> You are logged in as <?php echo  $_SESSION['role'] ?> 
and your ID is <?php echo $_SESSION['loggedin']?>
</p>




<?php include_once('lib/footer.php') ?>
