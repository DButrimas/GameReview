<!DOCTYPE html>
<?php

session_start();

include_once 'db.php';

 ?>

<html lang="en">

<head>

      <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

       <link rel="stylesheet" href="css/style.css">

<title>IndieDB</title>

</head>

<body>

  <!--Navigation bar-->

  <nav class="navbar custom navbar-inverse">

  <div class="container-fluid">

    <div class="navbar-header">

      <a class="navbar-brand" href="index.php"> <img src="img/indiedb.png" class="navbarLogo" alt=""></a>

    </div>

    <ul class="nav navbar-nav">

      <li class="active"><a href="index.php">Home</a></li>

      <li><a href="contact.php">Contact Us</a></li>



    </ul>

    <ul class="nav navbar-nav navbar-right">

      <?php

     if(!isset($_SESSION['id'])){

     ?>

      <li><a href="#" data-toggle="modal" data-target="#loginModal" data-backdrop="static"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>

      <li><a href="#"  data-toggle="modal" data-target="#modalRegister" data-backdrop="static"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>

      <?php

    }else {

      $usr = $_SESSION['email'];

      echo "<li><a href=\"logout.php\"><span class=\"glyphicon glyphicon-log-out\"></span> log-out</a></li>";

      echo "<li><a href=\"user.php\"><span class=\"glyphicon glyphicon-user\"></span>$usr</a></li>";

    }

     ?>



    </ul>

  </div>

</nav>









<div class="modal fade" id="loginModal" role="dialog">

  <div class="modal-dialog" style="max-width:450px">

    <!-- Modal content-->

    <div class="modal-content" style="height:280px">

      <div class="modal-header">

        <button type="button"  onclick="closeModal()" class="close" data-dismiss="modal">&times;</button>

        <div style="text-align: -webkit-center;">

        <h4 class="modal-title">LOG IN</h4>

      </div>

      </div>

      <div class="modal-body">

        <p class="statusMsg"></p>

        <form role="form">

                    <p class="statusMsgemail" style="margin:1px"></p>

            <div class="input-group logininpt" style="margin:auto;width:300px">

                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

                <input id="email" type="email" class="form-control" name="email" placeholder="Email">

            </div>

                      <p class="statusMsgpassword"></p>

            <div class="input-group logininpt" style="margin:auto;width:300px">

                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

                <input id="password" type="password" class="form-control" name="password" placeholder="Password">

            </div>

            <div class="modal-footer" style="text-align: -webkit-center;border-top: 0;">

                <button type="submit" class="btn btn-primary submitBtn" style="background-color:#4ad02f;border-color: #ffffff;" onclick="submitContactForm()">SUBMIT</button>

            </div>

        </form>

        <div style="text-align: -webkit-center;">

                <a href="#" onclick="closeModal2()">Forgot password ?</a>

              </div>

      </div>

    </div>

  </div>

</div>



<div class="modal fade" id="forgotPasswordModal" role="dialog">

  <div class="modal-dialog" style="max-width: 450px;">



    <!-- Modal content-->

    <div class="modal-content" style="height:280px">

      <div class="modal-header">

        <button type="button"  onclick="closeModal()" class="close" data-dismiss="modal">&times;</button>

        <div style="text-align: -webkit-center">

        <h4 class="modal-title">Retrieve Login Credentials</h4>

      </div>

      </div>

      <div class="modal-body">

        <p id="forgotTxt">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

        <div id="forgotTxtSucces" class="alert alert-success hidden">
          <strong>Success!</strong> A message has been sent to your email with link to reset your password.
        </div>

          <button type="submit" id="lgnbtn2" class="btn btn-primary submitBtnP" style="background-color:#4ad02f;border-color: #ffffff; display:none" onclick="login3()">Sign In</button>

        <form role="form">

            <div class="input-group logininpt" style="margin:auto">

                <p class="statusMsgP"></p>

                <input id="emailSend" style="width:300px" type="email" class="form-control" name="email" placeholder="Email Address">

            </div>

            <div class="modal-footer" style="text-align: -webkit-center;border-top: 0;">

                <button type="submit" id="resetBtn" class="btn btn-primary submitBtnP" style="background-color:#4ad02f;border-color: #ffffff;" onclick="submitReset()">Reset Password</button>

            </div>

        </form>

      </div>

    </div>

  </div>

</div>





<div class="modal fade" id="modalRegister" role="dialog">

  <div class="modal-dialog"  style="max-width:450px">

    <!-- Modal content-->

    <div class="modal-content" style="height:280px">

      <div class="modal-header">

        <button type="button"  onclick="closeModal()" class="close" data-dismiss="modal">&times;</button>

          <div style="text-align: -webkit-center;">

        <h4 class="modal-title">SIGN-UP</h4>

      </div>

      </div>

      <div class="modal-body mbR">

        <p class="statusMsgR" style="margin:0"></p>

        <form role="form1">

                    <p class="statusMsgemailR"></p>
                    <img src="imgreg.png" style="display: none;" id="myImage"/>
                    <p class="hidden" id="sucesstxt"><b>REGISTRATION SUCCESSFUL !</b></p>

                      <button type="submit" id="lgnbtn" class="btn btn-primary submitBtnP" style="background-color:#4ad02f;border-color: #ffffff; display:none" onclick="login2()">Sign In</button>


            <div class="input-group registerinpt" style="margin:auto;width:300px">

                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

                <input id="emailR" type="email" class="form-control" name="email" placeholder="Email">

            </div>

                      <p class="statusMsgpasswordR"></p>

            <div class="input-group registerinpt" style="margin:auto;width:300px;margin-bottom: 10px;">

                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

                <input id="password1" type="password" class="form-control" name="password" placeholder="Password">

            </div>

  <div class="input-group registerinpt" style="margin:auto;width:300px">

      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

      <input id="password2" type="password" class="form-control" name="password" placeholder="Verify Password">

  </div>

            <div class="modal-footer" style="border-top: 0;text-align: -webkit-center">

                <button type="submit" class="btn btn-primary submitBtnR" style="background-color:#4ad02f;border-color: #ffffff;" onclick="submitRegisterForm()">SUBMIT</button>

            </div>

        </form>

      </div>

    </div>

  </div>

</div>



<script>



$( "form" ).submit(function( event ) {

event.preventDefault();

});

$( "form1" ).submit(function( event ) {

event.preventDefault();

});

function closeModal2(){

$('#loginModal').modal('hide');

$('#forgotPasswordModal').modal('show');

}

function login3(){

$('#forgotPasswordModal').modal('hide');

$('#loginModal').modal('show');

}
function login2(){

$('#modalRegister').modal('hide');

$('#loginModal').modal('show');

}

function closeModal(){

$('.statusMsgemail').html("");

   $('.statusMsgpassword').html("");

      $('.statusMsg').html("");

        $('.statusMsgemailR').html("");

           $('.statusMsgpasswordR').html("");

               $('.statusMsgR').html("");

                   document.getElementById('emailR').style.borderColor='#ccc';

                       document.getElementById('password1').style.borderColor='#ccc';

                       document.getElementById('password2').style.borderColor='#ccc';



                       $('.registerinpt').show();

                       $('.submitBtnR').show();


         document.getElementById("myImage").style = "display:none";
         document.getElementById("sucesstxt").style = "display:none";
         document.getElementById("lgnbtn").style = "display:none";


         document.getElementById('emailSend').style='display:block';
         document.getElementById('resetBtn').style='display:block';
             document.getElementById('forgotTxt').style='display:block';
             document.getElementById('forgotTxtSucces').style="display:none";
              document.getElementById('lgnbtn2').style="display:none";


}











function submitReset(){

 var email = $('#emailSend').val();

var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

                   document.getElementById('emailSend').style.borderColor='#ccc';



 if(email.trim() == '' ){

     document.getElementById('emailSend').style.borderColor='red';

$('.statusMsgP').html('<span style="color:red;font-size: 12px">Email field can\'t be empty.</p>');

     return false;

 }else if(email.trim() != '' && !reg.test(email)){

     document.getElementById('emailSend').style.borderColor='red';

$('.statusMsgP').html('<span style="color:red;font-size: 12px">Please enter valid email address.</p>');

     return false;

 }else {

   $.ajax({

       type:'POST',

       url:'reset.php',

       data:'email='+email,

       beforeSend: function () {

           $('.submitBtnP').attr("disabled","disabled");

           $('.modal-body').css('opacity', '.5');

       },

       success:function(msg){

           if(msg == 'ok'){

               $('#email').val('');

               $('#password').val('');

                              document.getElementById('emailSend').style.borderColor='#ccc';
  document.getElementById('emailSend').style='display:none';
    document.getElementById('resetBtn').style='display:none';

    document.getElementById('forgotTxt').style='display:none';

           }else if(msg =='notexist'){

                                document.getElementById('emailSend').style.borderColor='red';

               $('.statusMsgP').html('<span style="color:red;font-size: 12px">User not found</p>');

           }else{

             document.getElementById('emailSend').style.borderColor='#ccc';
document.getElementById('emailSend').style='display:none';
document.getElementById('resetBtn').style='display:none';
    document.getElementById('forgotTxt').style='display:none';
    document.getElementById('forgotTxtSucces').style="display:block!important";
    document.getElementById("lgnbtn2").style = "width:auto;margin:auto;display:block;background-color:#4ad02f;border-color: #ffffff;";
}

           $('.submitBtnP').removeAttr("disabled");

           $('.modal-body').css('opacity', '');

       }

   });

 }





}



function submitContactForm(){

 $('.statusMsgemail').html("");

    $('.statusMsgpassword').html("");

      $('.statusMsg').html("");

var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

 var email = $('#email').val();

 var password = $('#password').val();

 document.getElementById('email').style.borderColor='#ccc';

     document.getElementById('password').style.borderColor='#ccc';



 if(email.trim() == '' ){

$('.statusMsgemail').html('<span style="color:red;font-size: 12px">Email field can\'t be empty.</p>');

 document.getElementById('email').style.borderColor='red';

     return false;

 }else if(email.trim() != '' && !reg.test(email)){

$('.statusMsgemail').html('<span style="color:red;font-size: 12px">Please enter valid email address.</p>');

 document.getElementById('email').style.borderColor='red';

     return false;

 }else if(password.trim() == '' ){

$('.statusMsgpassword').html('<span style="color:red;font-size: 12px">Password required</p>');

     document.getElementById('password').style.borderColor='red';

     return false;

 }else{

     $.ajax({

         type:'POST',

         url:'login.php',

         data:'email='+email+'&password='+password,

         beforeSend: function () {



             $('.submitBtn').attr("disabled","disabled");

             $('.modal-body').css('opacity', '.5');

         },

         success:function(msg){

             if(msg == 'ok'){

                 $('#email').val('');

                 $('#password').val('');

                   location.reload();



             }else if(msg =='notexist'){

                 $('.statusMsg').html('<span style="color:red;font-size: 12px">User not found</p>');

                 document.getElementById('email').style.borderColor='red';



             }

             else if(msg =='invalidPassword'){

                $('.statusMsg').html('<span style="color:red;font-size: 12px">Wrong email/password combination</p>');

                document.getElementById('email').style.borderColor='red';

                    document.getElementById('password').style.borderColor='red';

             }

             $('.submitBtn').removeAttr("disabled");

             $('.modal-body').css('opacity', '');

         }

     });

 }

}





function submitRegisterForm(){

 $('.statusMsgemailR').html("");

    $('.statusMsgpasswordR').html("");

            $('.statusMsgR').html("");

 var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

 var email = $('#emailR').val();

 var password1 = $('#password1').val();

 var password2 = $('#password2').val();

var n = password1.length;

document.getElementById('emailR').style.borderColor='#ccc';

    document.getElementById('password1').style.borderColor='#ccc';

    document.getElementById('password2').style.borderColor='#ccc';





 if(email.trim() == '' ){

$('.statusMsgemailR').html('<span style="color:red;font-size: 12px">Email field can\'t be empty.</p>');

document.getElementById('emailR').style.borderColor='red';

     return false;

 }else if(email.trim() != '' && !reg.test(email)){

$('.statusMsgemailR').html('<span style="color:red;font-size: 12px">Please enter valid email address.</p>');

document.getElementById('emailR').style.borderColor='red';

     return false;

 }else if(password1.trim() == '' ){

$('.statusMsgpasswordR').html('<span style="color:red;font-size: 12px">Password field can\'t be empty.</p>');

document.getElementById('password1').style.borderColor='red';

     return false;

   }else if(n < 5){

     $('.statusMsgpasswordR').html('<span style="color:red;font-size: 12px">Password must be at least 5 characters long</p>');

     document.getElementById('password1').style.borderColor='red';

      return false;

    }else if(password2.trim() == '' ){

    $('.statusMsgpasswordR').html('<span style="color:red;font-size: 12px">Please confirm password.</p>');

    document.getElementById('password2').style.borderColor='red';

    }else if(password1.trim() !== password2.trim()){

       $('.statusMsgpasswordR').html('<span style="color:red;font-size: 12px">Passwords doesnt match</p>');

       document.getElementById('password1').style.borderColor='red';

       return false;

}else{

$.ajax({

    type:'POST',

    url:'register.php',

    data:'email='+email+'&password1='+password1 +'&password2='+password2,

    beforeSend: function () {



        $('.submitBtnR').attr("disabled","disabled");

        $('.mdR').css('opacity', '.5');

    },

    success:function(msg){

        if(msg == 'ok'){

            $('#emailR').val('');

            $('#password1').val('');

            $('#password2').val('');

              $('.registerinpt').hide();

              $('.submitBtnR').hide();

              document.getElementById('emailR').style.borderColor='#ccc';
document.getElementById("myImage").style = "width:50px;margin:auto;display:block";
document.getElementById("sucesstxt").style = "display:block!important;margin-top:10px;text-align: center";

document.getElementById("lgnbtn").style = "width:auto;margin:auto;display:block;background-color:#4ad02f;border-color: #ffffff;";

                  document.getElementById('password1').style.borderColor='#ccc';

                  document.getElementById('password2').style.borderColor='#ccc';



        }else if(msg =='emptyField'){

            $('.statusMsgR').html('<span style="color:red;font-size: 12px">Incorrect password</p>');

            document.getElementById('password1').style.borderColor='red';

        }

        else if(msg =='doesntMatch'){

           $('.statusMsgR').html('<span style="color:red;font-size: 12px">Passwords doesnt match</p>');

           document.getElementById('password1').style.borderColor='red';

        }

        else if(msg == 'alreadyExists') {

             $('.statusMsgR').html('<span style="color:red;font-size: 12px;">Email address already used</p>');

             document.getElementById('emailR').style.borderColor='red';

        }

        else if(msg == 'invalidPassword'){

          $('.statusMsgR').html('<span style="color:red;">Incorrect password</p>');

          document.getElementById('password1').style.borderColor='red';

        }

        $('.submitBtnR').removeAttr("disabled");

        $('.mdR').css('opacity', '');

    }

});

}

}



</script>
