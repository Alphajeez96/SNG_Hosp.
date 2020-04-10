<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: login.php");
}
?>
<h3> Admin Dashboard</h3>

Welcome, <?php echo $_SESSION['fullname'] ?>, You are logged in as (<?php echo $_SESSION['role'] ?>),


<div>
    <p>Last Login : <?php echo $_SESSION['loggedin_at'] ?> (GMT) </p>
</div>

<?php include_once('lib/footer.php'); ?>

<?php include_once('lib/header.php'); 





