<?php
session_start();
if(!empty($_POST['password1']) && !empty($_POST['password2']) && !empty($_POST['email']) && (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)){
  include_once 'db.php';
   $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
   $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
   $email  = mysqli_real_escape_string($conn, $_POST['email']);
if(empty($password1) || empty($password2)){
  $status = 'emptyField';
}else {
  if(!preg_match("/^[a-zA-Z]*$/", $password1) || !preg_match("/^[a-zA-Z]*$/", $password2)){
    echo $password1;
    $status = 'invalidPassword';
  }else {
    if($password1 != $password2){
      $status = 'doesntMatch';
    }else {
      $sql = "SELECT * FROM users WHERE email ='$email'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck > 0){
        $status = 'alreadyExists';
      }else {
        $hashedPwd = password_hash($password1, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPwd');";
        mysqli_query($conn, $sql);
        $status = 'ok';
      }
    }

    }
  }
   echo $status;die;
 }


?>
