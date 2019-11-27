<?php
include 'header.php';
 ?>

<div class="col-sm-6 col-sm-offset-3">
  <div style="text-align: -webkit-center;"><h3>Send us a message !</h3></div>
    <p class="statusMsg"></p>
<form role="form" id="contactForm">
             <div class="form-group col-sm-12">
                 <label for="name" class="h4">Name</label>
                 <input type="text" class="form-control contactName" id="name" placeholder="Enter name" >
             </div>
             <div class="form-group col-sm-12">
                 <label for="email" class="h4">Email</label>
                 <input type="email" class="form-control contactEmail" id="emailc" placeholder="Enter email" >
             </div>
         <div class="form-group col-sm-12">
             <label for="message" class="h4 ">Message</label>
             <textarea id="message" class="form-control contactMessage" rows="5" placeholder="Enter your message" ></textarea>
         </div>
         <div style="text-align: -webkit-center;">
         <button type="submit" id="form-submit" class="btn btn-success btn-lg contactBtnS ">Submit</button>
       </div>
 <div id="msgSubmit" style="color:#009200" class="h3 text-center hidden">Message Submitted!</div>
</form>
</div>


 </body>
 </html>

 <script>
 $("#contactForm").submit(function(event){
     // cancels the form submission
     event.preventDefault();
     submitForm();
 });

 function submitForm(){
    // Initiate Variables With Form Content
    var name = $("#name").val();
    var email = $("#emailc").val();
    var message = $("#message").val();
    document.getElementById('name').style.borderColor='#ccc';
    document.getElementById('emailc').style.borderColor='#ccc';
        document.getElementById('message').style.borderColor='#ccc';
    $.ajax({
        type: "POST",
        url: "form-process.php",
        data: "name=" + name + "&email=" + email + "&message=" + message,
        success : function(text){
            if (text == "success"){
                    $( "#msgSubmit" ).removeClass( "hidden" );
                       $("#message").val("");
                        $("#emailc").val("");
                         $("#name").val("");
                         document.getElementById('name').style.borderColor='#ccc';
                         document.getElementById('emailc').style.borderColor='#ccc';
                             document.getElementById('message').style.borderColor='#ccc';
            }else if(text == "noname"){
document.getElementById('name').style.borderColor='red';
            }else if(text == "noemail"){
document.getElementById('emailc').style.borderColor='red';
            }else {
document.getElementById('message').style.borderColor='red';
            }
        }
    });
}

 </script>
