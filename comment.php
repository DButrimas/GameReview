<?php
session_start();
if(!empty($_POST['text'])){
include_once 'db.php';
$text  = mysqli_real_escape_string($conn, $_POST['text']);

if(empty($text)){
  $status = 'empty';
}else{
  $gameId = $_POST['game_id'];
  $usrId = $_SESSION['id'];
  $dt1=date("Y-m-d");
  $sql = "INSERT INTO `comments`(`game_id`, `user_id`, `date`, `text`) VALUES ('$gameId', '$usrId','$dt1','$text')";

  if(!mysqli_query($conn, $sql)){

  }else {
          $status = 'ok';
  }
echo $status;die;
//  $status = 'ok';
}

echo $status;die;




}
echo 'Cant be empty';die;
 ?>
