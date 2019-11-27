<?php
session_start();
//if(isset($_POST['loginFrmSubmit']) && !empty($_POST['password'] && !empty($_POST['email']) && (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)){
if(!empty($_POST['password']) && !empty($_POST['email']) && (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)){
  include_once 'db.php';
   $password = mysqli_real_escape_string($conn, $_POST['password']);
   $email  = mysqli_real_escape_string($conn, $_POST['email']);

   $sql = "SELECT * FROM users WHERE email ='$email'";
   $result = mysqli_query($conn, $sql);
   $resultCheck = mysqli_num_rows($result);
   if($resultCheck < 1){
     $status = 'notexist';
   }else {
     if($row = mysqli_fetch_assoc($result)){
       $hashedPwdCheck = password_verify($password, $row['password']);
       if($hashedPwdCheck == true){
         $_SESSION['id'] = $row['id'];
         $_SESSION['email'] = $row['email'];
         $_SESSION['role'] = $row['role'];
         $status = 'ok';
       }else {
          $status = 'invalidPassword';
       }
     }
   }

 echo $status;die;
    }
?>
