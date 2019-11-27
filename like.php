<?php
session_start();

  include_once 'db.php';
  if(isset($_SESSION['id'])){
    $usr = $_SESSION['id'];
    $gid = $_POST['game_id'];
    $sql = "SELECT * FROM ratings WHERE game_id = $gid AND user_id = $usr";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
      $sql = "DELETE FROM `ratings` WHERE user_id = $usr AND game_id = $gid";
      mysqli_query($conn, $sql);
      $status = "dislike";
    }else {
      $sql = "INSERT INTO ratings (rating, game_id, user_id) VALUES (1, '$gid','$usr');";
      mysqli_query($conn, $sql);
      $status = 'ok';
    }
  }else {
    $status = "login";
  }





   echo $status;die;



?>
