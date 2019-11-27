<?php
//https://www.youtube.com/watch?v=wUkKCMEYj9M kodas parasytas remiantis sia vaizdo pamuoka.
if(isset($_POST["reset-password-sbmt"])){
$selector = $_POST["selector"];
$validator = $_POST["validator"];
$password = $_POST["pwd"];
$password2 = $_POST["pwd_repeat"];

if (empty($password) || empty($password2)) {
echo "No fields can be empty";die;
}else if($password != $password2){
echo "Passwords doesnt match";die;
}

require 'db.php';

$sql = "SELECT * FROM password_reset WHERE selector=?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){

  echo "error1";
  echo mysqli_stmt_error($stmt);
}else {
mysqli_stmt_bind_param($stmt, "s",$selector);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
if(!$row = mysqli_fetch_assoc($result)){
  echo "error2";
}else {
  $tokenBin = hex2bin($validator);
  $tokenCheck = password_verify($tokenBin, $row["token"]);

  if($tokenCheck === false){
    echo "error3";
  }elseif($tokenCheck === true){
    $tokenEmail = $row['email'];

    $sql = "SELECT * FROM users WHERE email=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      echo "error4";
    }else {
      mysqli_stmt_bind_param($stmt, "s",$tokenEmail);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if(!$row = mysqli_fetch_assoc($result)){
        echo "error5";
      }else {
        $sql = "UPDATE users SET password=? WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          echo "error6";
        }else {
          $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "ss",$newPwdHash,$tokenEmail);
          mysqli_stmt_execute($stmt);

      }

  }

}


}

}

}

}


 ?>


