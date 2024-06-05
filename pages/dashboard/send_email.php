<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php'; // Adjust based on your installation method

$phpmailer = new PHPMailer(true); // Enable exceptions

// SMTP Configuration
$phpmailer->isSMTP();
$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = 'c02e208ad00fe6'; // Your Mailtrap username
$phpmailer->Password = 'f9681fe23d6fbc'; // Your Mailtrap password


// Sender and recipient settings
$phpmailer->setFrom('from@example.com', 'From Name');
$phpmailer->addAddress('recipient@example.com', 'Recipient Name');

// Sending plain text email
$phpmailer->isHTML(false); // Set email format to plain text
$phpmailer->Subject = 'Your Subject Here';
$phpmailer->Body    = 'This is the plain text message body';

// Send the email
if(!$phpmailer->send()){
    echo 'Message could not be sent. Mailer Error: ' . $phpmailer->ErrorInfo;
} else {
    echo 'Message has been sent';
}