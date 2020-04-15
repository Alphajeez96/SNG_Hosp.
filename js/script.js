// JavaScript Code

document.onload = console.log('loadded!');


//Registration Validation and error display
$(function() {

    $("#fname_error_message").hide();
    $("#sname_error_message").hide();
    $("#email_error_message").hide();
    $("#password_error_message").hide();
    $("#gender_error_message").hide();
    $("#designation_error_message").hide();
    $("#department_error_message").hide();

    //store error message
    let error_fname = false;
    let error_sname = false;
    let error_email = false;
    let error_password = false;
    // let error_gender = false;
    // let designation = false;
    let error_department = false;

    $("#first name").focusout(function(){
       check_fname();
    });
    $("#last name").focusout(function() {
       check_sname();
    });
    $("#email").focusout(function() {
       check_email();
    });
    $("#password").focusout(function() {
       check_password();
    });
    $("#gender").focusout(function() {
       check_retype_password();
    });
    $("#designation").focusout(function() {
        check_retype_password();
     });
     $("#department").focusout(function() {
        check_retype_password();
     });
     

    function check_fname() {
       let pattern = /^[a-zA-Z]*$/;
       let fname = $("#first name").val();
       if (pattern.test(fname) && fname !== '') {
          $("#fname_error_message").hide();
          $("#first name").css("border","2px solid #34F458");
       } else {
          $("#fname_error_message").html("Should contain only Characters");
          $("#fname_error_message").show();
          $("#form_fname").css("border","2px solid #F90A0A");
          error_fname = true;
       }
    }

    function check_sname() {
       let pattern = /^[a-zA-Z]*$/;
       let sname = $("#last name").val()
       if (pattern.test(sname) && sname !== '') {
          $("#sname_error_message").hide();
          $("#last name").css("border","2px solid #34F458");
       } else {
          $("#sname_error_message").html("Should contain only Characters");
          $("#sname_error_message").show();
          $("#last name").css("border","2px solid #F90A0A");
          error_fname = true;
       }
    }

    function check_password() {
       let password_length = $("#password").val().length;
       if (password_length < 6) {
          $("#password_error_message").html("Atleast 6 Characters");
          $("#password_error_message").show();
          $("#password").css("border","2px solid #F90A0A");
          error_password = true;
       } else {
          $("#password_error_message").hide();
          $("#password").css("border","2px solid #34F458");
       }
    }


    function check_email() {
       let pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
       let email = $("email").val();
       if (pattern.test(email) && email !== '') {
          $("#email_error_message").hide();
          $("#email").css("border","2px solid #34F458");
       } else {
          $("#email_error_message").html("Invalid Email");
          $("#email_error_message").show();
          $("#email").css("border","2px solid #F90A0A");
          error_email = true;
       }
    }

    function check_department() {
        let pattern = /^[a-zA-Z]*$/;
        let department = $("#department").val();
        if (pattern.test(department) && department !== '') {
           $("#department_error_message").hide();
           $("#department").css("border","2px solid #34F458");
        } else {
           $("#department_error_message").html("Should contain only Characters");
           $("#department_error_message").show();
           $("#department").css("border","2px solid #F90A0A");
           error_department = true;
        }
     }
 

    $("#registration_form").submit(function() {
       error_fname = false;
       error_sname = false;
       error_email = false;
       error_password = false;
       error_department = false;

       check_fname();
       check_sname();
       check_email();
       check_password();
       check_department();

       if (error_fname === false && error_sname === false && error_email === false && error_password === false && error_department=== false) {
          alert("Registration Successfull");
          return true;
       } else {
          alert("Please Fill the form Correctly");
          return false;
       }


    });
 });