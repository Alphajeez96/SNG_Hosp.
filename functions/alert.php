
<?php 
// include('/lib/test.php');

function print_alert(){
    //for printing message or error;
    $types = ['message','info','error'];
    $colors = ['success','info','danger'];
      
    for($i = 0; $i < count($types); $i++){
        
        if( isset($_SESSION[$types[$i]]) && !empty($_SESSION[$types[$i]]) ) {
            echo "<div class='alert alert-".$colors[$i]."' role='alert'>" . $_SESSION[$types[$i]] .
                    "</div>";
          
            session_destroy();
        }

    }

}


function print_alerts(){
    //for printing message or error;
    $types = ['message','info','error'];
    $colors = ['green','blue',' #f8d7da'];
      
    for($i = 0; $i < count($types); $i++){
        
        if( isset($_SESSION[$types[$i]]) && !empty($_SESSION[$types[$i]]) ) {
            echo "<div class='alert-danger style= '
            color: #721c24;
            width: 20vw;
            height: 12vh;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            ' alert-".$colors[$i]."' role='alert'>" . $_SESSION[$types[$i]] .
                    "</div>";
          
            session_destroy();
        }

    }

}

function set_alert($type = "message", $content = ""){
    //printing various alert type
    switch($type){
        case "message":
            $_SESSION['message']= $content;
        break;
        case "error":
            $_SESSION['error'] = $content;
        break;
        case "info":
            $_SESSION['info'] = $content;
        break;
        default:
        $_SESSION['message'] = $content;
    break;
    }
}