<?php

include 'header.php';



?>





<?php

$gameId = $_GET['id'];

$sql ="SELECT * FROM `games` WHERE id = $gameId";

$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_assoc($result);

$title = $data["title"];

$sql2 = "SELECT `tn_img_dir` FROM `thumbnails` WHERE game_id = $gameId";

$result2 = mysqli_query($conn, $sql2);

$data2 = mysqli_fetch_assoc($result2);



$sql3 = "SELECT `sc_img_dir` FROM `screenshots` WHERE game_id = $gameId";
$result3 = mysqli_query($conn, $sql3);



$img = $data2['tn_img_dir'];
echo "<div class=\"container\">";
?>
<div>
  <?php
  $sql2 = "SELECT * FROM ratings WHERE game_id = $gameId";
  $result2 = mysqli_query($conn, $sql2);
  $resultCheck2 = mysqli_num_rows($result2);

if(isset($_SESSION['id'])){
  $usrtemp = $_SESSION['id'];
  $sql = "SELECT * FROM ratings WHERE game_id = $gameId AND user_id = $usrtemp";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);


  if($resultCheck > 0){
echo "<a id=\"hearta\" href=\"#\" style=\"font-size:20px\" onclick=\"likeGame($gameId)\"><span id=\"heart\" class=\"glyphicon glyphicon-heart\" style=\"color:red\"></span>($resultCheck2)</a>";
}else {
  echo "<a id=\"hearta\" href=\"#\" style=\"font-size:20px\" onclick=\"likeGame($gameId)\"><span id=\"heart\" class=\"glyphicon glyphicon-heart\" style=\"\"></span>($resultCheck2)</a>";
}
}else {
  echo "<div>";
echo "<a id=\"hearta\" href=\"#\" style=\"font-size:20px\"  data-toggle=\"modal\" data-target=\"#loginModal\" data-backdrop=\"static\"><span id=\"heart\" class=\"glyphicon glyphicon-heart\" style=\"\"></span>($resultCheck2) Login to like this game</a>";
  echo "</div>";
}
   ?>
<div>

<?php

echo "<div class=\"row\">";
echo "<div class=\"col-sm-8\">";
echo "<h2><b style=\"border-bottom-style: solid;border-bottom-color: lightgray;border-bottom-width:1px; \">ABOUT THIS GAME</b></h2>";
echo nl2br($data['full_description']);

$dev = $data['developer'];
$pub = $data['publisher'];
$reDate = $data['release_date'];
$price = $data['price'];
$gnr = '';

$sql4 = "SELECT `name` FROM `genres`,`games_genres` WHERE games_genres.game_id = $gameId AND games_genres.genre_id = genres.id";
$result4 = mysqli_query($conn, $sql4);

while($data4 = mysqli_fetch_assoc($result4)){
$tmpG = $data4["name"];
$gnr .= ", $tmpG";
}
$gnr = substr($gnr, 1);
//$gnr = substr($gnr, 1);
$sql5 = "SELECT `name` FROM `os`,`games_os`,`games` WHERE games_os.game_id = $gameId AND os.id = games_os.os_id GROUP BY os.id LIMIT 0, 30 ";
$result5 = mysqli_query($conn, $sql5);

echo "<div>";
echo "<h2><b style=\"border-bottom-style: solid;border-bottom-color: lightgray;border-bottom-width:1px; \">GAME DETAILS</b></h2>";
echo "<div class=\"container\" style=\"padding-left:0;\">";
echo "  <table class=\"table table-hover\" style=\"width:250px\">";
echo "    <tbody>";
echo "      <tr>";
echo "        <td>Publisher: </td>";
echo "        <td>$pub</td>";
echo "      </tr>";
echo "      <tr>";
echo "        <td>Developer: </td>";
echo "        <td>$dev</td>";
echo "      </tr>";
echo "            <tr>";
echo "        <td>Release Date: </td>";
  echo "      <td>$reDate</td>";
echo "      </tr>";
echo "            <tr>";
echo "        <td>Genre: </td>";
  echo "      <td>$gnr</td>";
echo "      </tr>";
echo "            <tr>";
echo "        <td>Price: </td>";
  echo "      <td>$price</td>";
echo "      </tr>";
echo "            <tr>";
echo "        <td>Operating system: </td>";
  echo "      <td>";
  while($data5 = mysqli_fetch_assoc($result5)){
  $osName = $data5["name"];
  if($osName == "windows"){
    echo "<img src=\"os_img/windows.png\" class=\"img os\">";
  }else if($osName == "linux"){
  echo "<img src=\"os_img/linux.png\" class=\"img os\">";
}else if($osName == "mac"){
  echo "<img src=\"os_img/apple.png\" class=\"img os\">";
}else {
    echo "<img src=\"os_img/android.png\" class=\"img os\">";
}
  }
  echo "</td>";
echo "      </tr>";
echo "    </tbody>";
echo "  </table>";
echo "</div>";


echo "</div>";
echo "<h2><b style=\"border-bottom-style: solid;border-bottom-color: lightgray;border-bottom-width:1px; \">LINKS</b></h2>";
$sql5 = "SELECT * FROM games_links WHERE game_id = $gameId";
$result5 = mysqli_query($conn, $sql5);
  while($data5 = mysqli_fetch_assoc($result5)){
    $lnk = $data5["link"];
    $lnktxt = $data5["link_text"];
echo "<a href=\"$lnk\">$lnktxt</a><br />";
  }


  $sql ="SELECT * FROM `games` WHERE id = $gameId";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);
  $trailer = $data['trailer'];

echo "</div>";
echo "<div class=\"col-sm-4\">";
echo "<iframe width=\"100%\" style=\"max-width:300px;margin-bottom:5px\" height=\"200px\" src=\"$trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";
  while($data3 = mysqli_fetch_assoc($result3)){
    $sc = $data3['sc_img_dir'];
     echo "<div>";
    echo "<img src=\"$sc\" class=\"img\" style=\"width:100%;max-width:300px;margin-bottom:10px\">";
    echo "</div>";

  }
echo "</div>";
echo "</div>";


echo "<h2><b style=\"border-bottom-style: solid;border-bottom-color: lightgray;border-bottom-width:1px; \">COMMENTS</b></h2>";






?>

<?php
if(isset($_SESSION['id'])){
?>






<h4>Leave a Comment:</h4>
<form role="form">
 <p class="statusMsgpasswordR"></p>
   <div class="input-group">
     <textarea style="max-width:300px;max-height:200px" rows="4" id="comment" cols="50" name="comment" form="form"></textarea>
   </div>
     <button type="submit" class="btn btn-primary submitBtn" style="margin-bottom:17px;color:white;background:#21d459" onclick="submitComment(<?php echo $gameId ?>)">SUBMIT</button>
 </form>

<?php
}else {
 echo "<p style=\"margin-bottom:25px\"><a href=\"#\" data-toggle=\"modal\" data-target=\"#loginModal\" data-backdrop=\"static\">Log in</a> to leave comment</p>";
}
 ?>




<?php

?>
<div id="comments">
<?php


$sql ="SELECT `text`,`date`,`email` FROM `comments`,`users` WHERE game_id = $gameId AND users.id = comments.user_id ORDER BY `date` DESC LIMIT 6";

$result = mysqli_query($conn, $sql);

while($data = mysqli_fetch_assoc($result)){

  $txt = $data['text'];

  $date = $data['date'];

  $eml = $data['email'];

  echo "<div class=\"media\">

    <div class=\"media-body\">

      <h4 class=\"media-heading\">$eml</h4>

      <h5>$date</h5>

      <p>$txt</p>

    </div>

  </div>";
}
echo "</div>";

echo "<p><a href=\"#\" id=\"lox\" >Show more</p></a>";


 ?>






<script>





$(document).ready(function(){
  var gid=<?php echo $gameId?>;
  var commentCount = 6;
  $("#lox").click(function(){
      event.preventDefault();

    commentCount = commentCount + 6;
    $("#comments").load("moreComments.php", {
commentNewCount: commentCount,
gameid: gid
    });
  });
});




$( "form" ).submit(function( event ) {

event.preventDefault();

});





function submitComment($gameId){

 var txt = $('#comment').val();



     $.ajax({

         type:'POST',

         url:'comment.php',

         data:'text='+txt +'&game_id='+ $gameId,

         beforeSend: function () {

             $('.submitBtn').attr("disabled","disabled");

         },

         success:function(msg){

             if(msg == 'ok'){

                 $('#comment').val('');

                   location.reload();

          }else {



$('.statusMsgpasswordR').html('<span style="color:red;">SOMETHING WENT WRONG</p>');



          }

             $('.submitBtn').removeAttr("disabled");

         }

     });

}
function likeGame($gameId){
      event.preventDefault();

     $.ajax({

         type:'POST',

         url:'like.php',

          data:'game_id='+ $gameId,

         beforeSend: function () {

          //   $('.submitBtn').attr("disabled","disabled");

         },

         success:function(msg){

             if(msg == "ok"){

document.getElementById('heart').style.color='red';

                //   location.reload();

          }else if(msg == 'dislike') {
document.getElementById('heart').style.color='gray';
document.getElementById('heart').class='gray';





}else {


}

          //   $('.submitBtn').removeAttr("disabled");

         }

     });

}





</script>

<div class="modal fade" id="loginModal" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header">

        <button type="button"  onclick="closeModal()" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">LOG IN</h4>

      </div>

      <div class="modal-body">

        <p class="statusMsg"></p>

        <form role="form">

                    <p class="statusMsgemail"></p>

            <div class="input-group logininpt">

                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

                <input id="email" type="email" class="form-control" name="email" placeholder="Email">

            </div>

                      <p class="statusMsgpassword"></p>

            <div class="input-group logininpt">

                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

                <input id="password" type="password" class="form-control" name="password" placeholder="Password">

            </div>

            <div class="modal-footer">

                <button type="submit" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>

            </div>

        </form>

      </div>

    </div>

  </div>

</div>





</body>

</html>
