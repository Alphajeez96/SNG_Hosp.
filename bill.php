<?php 
include_once('lib/header.php'); 
include_once('lib/billcss.php');
// include_once('lib/test.php');
require_once('functions/alert.php');

if(!isset($_SESSION['loggedIn'])){
    // redirect to login
    header("Location: login.php"); 
}
?>

        <!-- <div class="container-fluid">


<div class="text-center">
  <div class="error mx-auto" data-text="404">404</div>
  <p class="lead text-gray-800 mb-5">Page Not Found</p>
 
  <a href="dashboard.php">&larr; Back to Dashboard</a>
</div>

</div>  -->
 <div class='body'>


<div class="signup-wrapper">
      <div class="img">
      <a href='index.php'>  <img class="imgs" src="./img/logo.png"> </a>
      </div>
      
     

      <form method="POST" id="registration_form">
      <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>

      <p>
            <?php print_alerts(); ?>
        </p>

        <div class="login-containe" id="del">
        <div class="for-group">
           <p> <label for="email">Email Adress</label></p>
          <input
          <?php              
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];                                                             
                    }                
                ?>
            type="email"
            name="email"
            placeholder="Email"
            title=""
            id="email"     
          />  
          <span class="error_form" id="email_error_message"></span>     
        </div>

        <p> <label for='currency'> Currency </label></p> 
           <input
            id='currency'
             type="text"
             name="currency"
             readonly
             Value="NGN"   
           />
           <span class="error_form" id="password_error_message"></span>
           <p>  

           <p> <label for='amount'> Amount </label></p> 
           <input
            id='amount'
             type="number"
             name="amount"
             readonly
             Value="5000"   
           />
           <span class="error_form" id="password_error_message"></span>
           <p>      

            <button class='buttons' onClick="payWithRave()" type="button">Pay Now</button>
        
            </div>
        </div>

      
       
    </div>
    </form>       

</div>
</div> 


<script>
    const API_publicKey = "FLWPUBK-81b601672f21272ae0411bd92693b361-X";
    let email = document.getElementById('email').value;
    let amount = document.getElementById('amount').value;
    let new_txref =

    function payWithRave() {
        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: email,
            amount: amount,
            payment_options: "card,account",
            customer_phone: "234099940409",
            currency: "NGN",
            txref: "rave-123456",
            meta: [{
                metaname: "flightID",
                metavalue: "AP1234"
            }],
            onclose: function() {},
            callback: function(response) {
                var txref = response.tx.txRef; // collect txRef returned and pass to a                  server page to complete status check.
                console.log("This is the response returned after a charge", response);
                if (
                    response.tx.chargeResponseCode == "00" ||
                    response.tx.chargeResponseCode == "0"
                ) {
                    // redirect to a success page
                    swal()
                } else {
                    // redirect to a failure page.
                }

                x.close(); // use this to close the modal immediately after payment.
            }
        });
    }
</script>
<?php include_once('lib/footer.php'); ?>
