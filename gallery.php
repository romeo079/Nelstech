<!DOCTYPE html>
<html>
<head>
    <title>Gallery - NelsTech Solutions</title>
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

<section class="gallery">
    <h2>Our Work</h2>
    <p>Take a look at some of our recent installations and projects.</p>

    <div class="gallery-grid">

        <img src="images/aircon1.jpg">
        <img src="images/solar1.jpg">
        <img src="images/cctv1.jpg">
        <img src="images/gate1.jpg">
        <img src="images/fence1.jpg">
        <img src="images/solar2.jpg">

    </div>
</section>

</body>
</html>

<?php
include 'config.php';
$result = $conn->query("SELECT * FROM gallery ORDER BY created_at DESC");

while ($row = $result->fetch_assoc()) {
    echo "<img src='images/{$row['image']}' onclick='openLightbox(this.src)'>";
}
?>
