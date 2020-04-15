
<?php 
include_once('lib/header.php');
require_once('functions/alert.php');
   
    if(isset($_POST)){
       
    
    echo '
<script type="text/javascript">

$(document).ready(function(){

  swal({
    position: "top-end",
    icon: "success",
    title: "Appointment Booked",
    Button: false,
    timer: 4500,
  }) 
 
});

</script>
';
    }
 Print_r($_POST);
?>
