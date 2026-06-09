<?php
session_start();

// Admin credentials (you can later move this to DB)
$admin_user = "admin";
$admin_pass = "1234";

// Safe request method check
$requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($requestMethod === 'POST') {

    // Get inputs safely
    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));

    // Validate inputs
    if (empty($username) || empty($password)) {
        $error = "Please fill in all fields";
    } else {

        // Check credentials
        if ($username === $admin_user && $password === $admin_pass) {
            $_SESSION['admin'] = true;

            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid login details";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - NelsTech</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<section class="contact">
    <h2>Admin Login</h2>

    <?php if (isset($error)) { ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php } ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</section>

</body>
</html>
