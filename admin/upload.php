<?php
include '../config.php';

$requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($requestMethod === 'POST') {

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../images/" . $image);

    $conn->query("INSERT INTO gallery (image) VALUES ('$image')");

    echo "Uploaded!";
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="image" required>
    <button type="submit">Upload</button>
</form>
