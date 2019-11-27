<?php
require 'db.php';
$commentNewCount = $_POST['commentNewCount'];
$gameId = $_POST['gameid'];

$sql ="SELECT `text`,`date`,`email` FROM `comments`,`users` WHERE game_id = $gameId AND users.id = comments.user_id ORDER BY `date` DESC LIMIT $commentNewCount";

$result = mysqli_query($conn, $sql);

 $row_cnt = mysqli_num_rows($result);


while($data = mysqli_fetch_assoc($result)){

  $txt = $data['text'];

  $date = $data['date'];

  $eml = $data['email'];

  echo "<div id=\"comments\" class=\"media\">

    <div class=\"media-body\">

      <h4 class=\"media-heading\">$eml</h4>

      <h5>$date</h5>

      <p>$txt</p>

    </div>

  </div>";

}




?>
