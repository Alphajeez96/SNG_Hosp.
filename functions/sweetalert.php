<?php  

include_once('lib/header.php'); 
  
  function sweet(){
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
// console.log("i was clicked")
 
 
   ?>