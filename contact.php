<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
    <h2>Contact Us</h2>
    <nav>
        <a href="index.php">Home</a>
        <a href="about.php">About us</a>
        <a href="servicesandquote.php">Services</a>
        <a href="gallery.php">Gallery</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>

<section class="contact">

<form method="POST">
    <input type="text" name="name" placeholder="Your Name" required><br><br>
    <input type="email" name="email" placeholder="Your Email" required><br><br>
    <textarea name="message" placeholder="Your Message" required></textarea><br><br>
    <button type="submit">Send Message</button>
</form>

</section>

</body>
</html>

<?php
include 'config.php';

// Safe request method check
$requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($requestMethod === 'POST') {

    // Get and sanitize inputs
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS));

    // Validation
    if (empty($name) || empty($message)) {
        echo "<script>alert('Please fill in all fields');</script>";
    } elseif (!$email) {
        echo "<script>alert('Invalid email address');</script>";
    } else {

        // Insert into database
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        $stmt->execute();

        echo "<script>alert('Message sent successfully!');</script>";
    }
}


