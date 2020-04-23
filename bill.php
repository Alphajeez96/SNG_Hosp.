<?php 
include_once('lib/header.php'); 
include_once('lib/dbcss.php');

if(!isset($_SESSION['loggedIn'])){
    // redirect to login
    header("Location: login.php"); 
}
?>

        <div class="container-fluid">

<!-- 404 Error Text -->
<div class="text-center">
  <div class="error mx-auto" data-text="404">404</div>
  <p class="lead text-gray-800 mb-5">Page Not Found</p>
 
  <a href="dashboard.php">&larr; Back to Dashboard</a>
</div>

</div>
<?php include_once('lib/footer.php'); ?>