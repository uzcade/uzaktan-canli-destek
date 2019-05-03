<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    
    $name    = $name . " " . $surname;
    $password= $temp_password;
    $subject = "Uzaktan Canlı Destek | Optus";
    $message = "Merhaba ". $name . ", Uzaktan Canlı Destek sistemi için geçici şifren: " .$password. " ile sisteme erişebilirsin! İyi günler." ;
    $from = 'ucanlidestek@gmail.com';

    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com;';                      // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $from;                              // SMTP username
    $mail->Password = 'Ege74014001?';                     // SMTP password
    $mail->SMTPSecure = '';                               // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->CharSet = 'UTF-8';                             // Convert to UTF-8

    //Recipients
    $mail->setFrom($from, $name);
    $mail->addAddress($email, $email);                   // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message."\n";
    $mail_send     = $mail->send();

    if ($mail_send) {
        //header("Location:".base_url('login?info'));  
    }

} catch (Exception $e) {
    //header("Location:".base_url('login'));
}