<?php
// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master/src/Exception.php';

// Check request method safely
$requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($requestMethod !== 'POST') {
    die("Invalid request");
}

// Get and sanitize inputs
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$reply = trim(filter_input(INPUT_POST, 'reply', FILTER_SANITIZE_SPECIAL_CHARS));

// Validate inputs
if (!$email) {
    die("Invalid email address");
}

if (empty($reply) || strlen($reply) < 5) {
    die("Reply message must be at least 5 characters");
}

// Send email
$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;

    // 🔴 CHANGE THESE
    $mail->Username = 'chaukeromeo01@gmail.com';
    $mail->Password = 'zzfklctztwsqaybv';

    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Email details
    $mail->setFrom('your-email@gmail.com', 'NelsTech Solutions');
    $mail->addAddress($email);

    $mail->Subject = "Response from NelsTech";
    $mail->Body = $reply;

    $mail->send();

    echo "<script>
        alert('Reply sent successfully!');
        window.location.href='dashboard.php';
    </script>";

} catch (Exception $e) {
    echo "Email failed: {$mail->ErrorInfo}";
}

