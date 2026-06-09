<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Services - NelsTech</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
    <h2>NelsTech Solutions</h2>
    <nav>
        <a href="index.php">Home</a>
                <a href="about.php">About us</a>
        <a href="servicesandquote.php">Services</a>
        <a href="gallery.php">Gallery</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>

<section class="services">
    <h2>Our Services</h2>

    <div class="cards">

        <div class="card">❄️ Air Conditioning</div>
        <div class="card">☀️ Solar Installation</div>
        <div class="card">📹 CCTV Systems</div>
        <div class="card">🚪 Gate Motors</div>
        <div class="card">⚡ Electric Fencing</div>

    </div>
</section>

<!-- QUOTE FORM -->
<section class="contact">
    <h2>Request a Quote</h2>

    <form method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="tel" name="phone" placeholder="Phone Number" required>

        <select name="service" required>
            <option value="">Select Service</option>
            <option>Air Conditioning</option>
            <option>Solar Installation</option>
            <option>CCTV</option>
            <option>Gate Motor</option>
            <option>Electric Fence</option>
        </select>

        <textarea name="details" placeholder="Describe your request..." required></textarea>

        <button type="submit">Submit Request</button>
    </form>
</section>

<a href="https://wa.me/27714437946" class="whatsapp" target="_blank">
    <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png">
</a>

</body>
</html>

<?php
include 'config.php';

$requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($requestMethod === 'POST') {

    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));

    $service = trim(filter_input(INPUT_POST, 'service', FILTER_SANITIZE_SPECIAL_CHARS));

    $details = trim(filter_input(INPUT_POST, 'details', FILTER_SANITIZE_SPECIAL_CHARS));

    if (!$email) {

        echo "<script>alert('Invalid email address');</script>";

    } else {

        $stmt = $conn->prepare("
            INSERT INTO quotes (name, email, phone, service, details)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "sssss",
            $name,
            $email,
            $phone,
            $service,
            $details
        );

        $stmt->execute();

        echo "<script>alert('Quote request submitted successfully!');</script>";
    }
}
?>