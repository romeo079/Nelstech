<?php
include '../config.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    die("Invalid ID");
}

$conn->query("UPDATE quotes SET status='Completed' WHERE id=$id");

header("Location: dashboard.php");
?>
