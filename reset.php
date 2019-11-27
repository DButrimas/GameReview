<?php


// Import PHPMailer classes into the global namespace

// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;



//Load Composer's autoloader

require 'vendor/autoload.php';


$selector = bin2hex(random_bytes(8));

$token = random_bytes(32);





$url = "http://indiedb.rf.gd/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);



require 'db.php';



$usrEmail = $_POST["email"];

$sql = "DELETE FROM password_reset WHERE email=?";

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql)){

  echo "error";

}else {

mysqli_stmt_bind_param($stmt, "s",$usrEmail);

mysqli_stmt_execute($stmt);



}





$sql = "INSERT INTO password_reset(email, selector, token) VALUES (?,?,?);";

if(!mysqli_stmt_prepare($stmt,$sql)){

  echo "error";

}else {

  $hashedToken = password_hash($token,PASSWORD_DEFAULT);



mysqli_stmt_bind_param($stmt, "sss",$usrEmail,$selector,$hashedToken);

mysqli_stmt_execute($stmt);

}



mysqli_stmt_close($stmt);








$mail = new PHPMailer;                              // Passing `true` enables exceptions



    //Server settings

                             // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP

    $mail->Host = 'tls://smtp.gmail.com';  // Specify main and backup SMTP servers

    $mail->SMTPAuth = true;                               // Enable SMTP authentication

    $mail->Username = 'indiedb.contactus@gmail.com';                 // SMTP username

    $mail->Password = 'asdzxcqwe123';                           // SMTP password

    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted

    $mail->Port = 587;                                    // TCP port to connect to



    //Recipients

    $mail->setFrom('indiedb.contactus@gmail.com', 'indie db');

    $mail->addAddress($usrEmail, 'indie db');     // Add a recipient

    $mail->addAddress($usrEmail);               // Name is optional

    $mail->addReplyTo('indiedb.contactus@gmail.com', 'Information');



    //Content

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Here is the subject';

        $mail->Body    = '
<h3>Account Password Reset</h3></br>
<p>To reset your password, please click this link:</p></br>
    </p><a href="'. $url . '">' .$url . '</a></p></br>
    <p>Kind regards,</p></br>
    <p>IndieDb support.</p>';






          $mail->send();

   echo "success";

?>

