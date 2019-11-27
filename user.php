<?php

include 'header.php';

  include_once 'db.php';

 ?>



 <div class="container">

   <h2>Liked games: </h2>

   <?php

   $usrtemp = $_SESSION['id'];

   $sql = "SELECT * FROM `games`,`ratings`,`thumbnails` WHERE ratings.game_id = games.id AND ratings.user_id = $usrtemp AND thumbnails.game_id = games.id";

   $result = mysqli_query($conn, $sql);

  while($data = mysqli_fetch_assoc($result)){

    $gid = $data['id'];

    $gid = $gid + 1;

    echo "<a href=\"http://indiedb.rf.gd/test.php?id=$gid\">";

    echo "<div style=\"margin-bottom:10px; width:300px\" class=\"main\">";

    $image = $data['tn_img_dir'];

echo "<img src=\"$image\" style=\"width:150px;height:70px\">";



echo $data['title'];



    echo "</div>";

    echo "</a>";

  }

    ?>

 </div>



 </body>

 </html>

