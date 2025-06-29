<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Load Composer's auto loader
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/SMTP.php';

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'localhost';
        $mail->SMTPAuth = false;
        $mail->SMTPAutoTLS = false; 
        $mail->Port = 25; 
        $mail->Username   = 'ribisoncustomercare@gmail.com';              // SMTP username
        $mail->Password   = 'pgwboncsmheesjnp';                 // SMTP password

        // Recipients
        $mail->setFrom('info@ribison.com', $name);
        $mail->addAddress('info@ribison.com');               // Add a recipient

        // Content
        $mail->isHTML(true);                                 // Set email format to HTML
        $mail->Subject = $email;                              // Set the subject of the email
        $mail->Body    = $message;                           // Set the body of the email

        $mail->send();
        header('Location: thank-you.html');

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
