<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$errorMSG = "";
// NAME
if (empty($_POST["name"])) {
    $errorMSG .= "noname";
    echo $errorMSG;die;
} else {
    $name = $_POST["name"];
}
// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "noemail";
        echo $errorMSG;die;
} else {
    $email = $_POST["email"];
}
// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "nomessage";
        echo $errorMSG;die;
} else {
    $message = $_POST["message"];
}


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
    $mail->addAddress('indiedb.contactus@gmail.com', 'indie db');     // Add a recipient
    $mail->addAddress('indiedb.contactus@gmail.com');               // Name is optional
    $mail->addReplyTo('indiedb.contactus@gmail.com', 'Information');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $_POST["message"];


    if ($errorMSG == ""){
          $mail->send();
   echo "success";
}else{
    echo $errorMSG;
}
?>
