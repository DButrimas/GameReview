<?php

require "header.php";

?>



<?php

$selector = $_GET["selector"];

$validator = $_GET["validator"];



if(empty($selector) || empty($validator)){

  echo "error";
  echo $selector;
  echo $validator;

}else {

  if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){

    ?>









    <form action="reset-password.php" method="post" style="text-align:center">
      <input  type="hidden" name="selector" value ="<?php echo $selector ?>">

      <input  type="hidden" name="validator" value ="<?php echo $validator ?>">

      <div class="col-lg-4 col-lg-offset-4">
          <h2>Reset your password</h2>
          <h5>Hello, Please enter your password 2x below to reset</h5>
          <div class="form-group">
                      <input  type="password" name="pwd" placeholder="Password">
          </div>
          <div class="form-group">
                      <input  type="password"  name="pwd_repeat" placeholder="Confirm Password">
          </div>

                     <button type="submit" style="font-size: 12px;width:150px;margin:auto" name="reset-password-sbmt" class="btn btn-success btn-lg contactBtnS" name="reset-password-sbmt">RESET PASSWORD</button>
      </div>


    </form>





    <?php

  }

}



 ?>





</body>

</html>
