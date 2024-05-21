<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['send'])) {
    $name = ($_POST['name']);
    $email = ($_POST['email']);
    $message = ($_POST['message']);
    $subject = ($_POST['subject']);

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 2;                      // Enable verbose debug output (set to 2 for detailed debug output)
        $mail->isSMTP();                           // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';      // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                  // Enable SMTP authentication
        $mail->Username   = 'piratepath2024@gmail.com'; // SMTP username
        $mail->Password   = 'eaqwslugoqqnqxec';    // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;                   // TCP port to connect to

        //Recipients
        $mail->setFrom('piratepath2024@gmail.com', 'PiratePath');
        $mail->addAddress('luismayrinaa@gmail.com', 'Luis Mayrina'); // Add a recipient

        // Content
        $mail->isHTML(true);                       // Set email format to HTML
        $mail->Subject = 'PiratePath Contact Form: ' . $subject;
        $mail->Body    = "<h2>Contact Us Form Submission</h2>";
        $mail->AltBody = "Name: {$name}\nEmail: {$email}\nMessage: {$message}";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'Invalid request method';
}
?>