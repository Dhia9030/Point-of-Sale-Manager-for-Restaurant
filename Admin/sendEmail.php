<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

// Retrieve form data
$to = $_POST['recipient'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Initialize PHPMailer
$mail = new PHPMailer(true);

try {
    // Set mailer to use SMTP
    $mail->isSMTP();

    // gmail SMTP server settings
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username =  'the gmail of the company'; 
    $mail->Password = 'the password of the gmail'; 
    $mail->Port = 587; // TCP port to connect to

    // Sender and recipient
    $mail->setFrom('the gmail of the company', 'the name of the company');
    $mail->addAddress($to);

    // Email content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send email
    $mail->send();
    echo 'Email sent successfully ce lien expire automatiquement après 5 secondes.';
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}" ;
}
echo "<script>
setTimeout(function(){
    window.location.href = 'admin.php';
}, 5000);
</script>";
