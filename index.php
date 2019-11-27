<?php
include 'header.php';
 ?>


 <div class="container">
<?php

$sql1 = "SELECT `game_id`,`title`,`short_description`,`tn_img_dir` FROM `games`,`thumbnails` WHERE games.id = thumbnails.game_id LIMIT 0, 30 ";
$result = mysqli_query($conn, $sql1);
$rowCnt = 0;
echo '<div class="row">';
while($data = mysqli_fetch_assoc($result)){
$image = $data["tn_img_dir"];
$id = $data["game_id"];
  echo "<a href=\"test.php?id=$id\">";
echo '<div class="col-sm-4 col-grid" >';

echo "<div class=\"main\">";
$title = $data["title"];
$desc = $data["short_description"];

echo "<input type=\"hidden\" id=\"custId\" name=\"custId\" value=\"$id\">";
echo "<h3 class=\"h3\">$title</h3>";

echo "<img src=\"$image\" class=\"img imgHome\">";
echo "<p class=\"p\" style=\"margin:auto;max-width:260px\">$desc</p>";

  $id = $data["game_id"];
  $sql = "SELECT `name` FROM `os`,`games_os`,`games` WHERE games_os.game_id = $id AND os.id = games_os.os_id GROUP BY os.id LIMIT 0, 30 ";
  $result1 = mysqli_query($conn, $sql);
  while($data1 = mysqli_fetch_assoc($result1)){
  $osName = $data1["name"];
  if($osName == "windows"){
    echo "<img src=\"os_img/windows.png\" class=\"img os\">";
  }else if($osName == "linux"){
echo "<img src=\"os_img/linux.png\" class=\"img os\">";
}else if($osName == "android"){
echo "<img src=\"os_img/android.png\" class=\"img os\">";
}else if($osName == "mac"){
  echo "<img src=\"os_img/apple.png\" class=\"img os\">";
}
  }
  echo "<a href=\"test.php?id=$id\"></a>";
  $rowCnt = $rowCnt + 1;
  if($rowCnt == 3){
    $rowCnt = 0;
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo '<div class="row">';
    continue;
  }
  echo "</div>";
  echo "</div>";
  echo "</a>";

}
 ?>
</div>






</body>

</html>
