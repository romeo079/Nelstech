<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - NelsTech</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

<header>
    <h2>NelsTech Admin Panel</h2>

    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<section class="services">

    <!-- =========================
         QUOTES SECTION
    ========================== -->

    <h2>📩 Quotes</h2>

    <?php
    $quotes = $conn->query("SELECT * FROM quotes ORDER BY created_at DESC");

    while ($row = $quotes->fetch_assoc()) {
    ?>

        <div class="card">

            <h3><?= htmlspecialchars($row['name']) ?></h3>

            <p>
                <strong>Email:</strong>
                <?= htmlspecialchars($row['email']) ?>
            </p>

            <p>
                <strong>Phone:</strong>
                <a href="tel:<?= htmlspecialchars($row['phone']) ?>">
                    <?= htmlspecialchars($row['phone']) ?>
                </a>
            </p>

            <p>
                <strong>Service:</strong>
                <?= htmlspecialchars($row['service']) ?>
            </p>

            <p>
                <?= htmlspecialchars($row['details']) ?>
            </p>

            <small>
                <?= htmlspecialchars($row['created_at']) ?>
            </small>

            <br><br>

            <!-- DOWNLOAD PDF -->
            <a href="../generate_pdf.php?id=<?= $row['id'] ?>" target="_blank">
                <button type="button">Download PDF</button>
            </a>

            <!-- DELETE -->
            <a href="delete_quote.php?id=<?= $row['id'] ?>">
                <button type="button">Delete</button>
            </a>

        </div>

    <?php
    }
    ?>

    <hr><br>

    <!-- =========================
         CUSTOMER MESSAGES
    ========================== -->

    <h2>💬 Customer Messages</h2>

    <?php
    $msgs = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");

    while ($row = $msgs->fetch_assoc()) {
    ?>

        <div class="card">

            <h3><?= htmlspecialchars($row['name']) ?></h3>

            <p>
                <strong>Email:</strong>
                <?= htmlspecialchars($row['email']) ?>
            </p>

            <p>
                <strong>Phone:</strong>
                <a href="tel:<?= htmlspecialchars($row['phone']) ?>">
                    <?= htmlspecialchars($row['phone']) ?>
                </a>
            </p>

            <p>
                <?= htmlspecialchars($row['message']) ?>
            </p>

            <small>
                <?= htmlspecialchars($row['created_at']) ?>
            </small>

            <br><br>

            <!-- DELETE MESSAGE -->
            <a href="delete_message.php?id=<?= $row['id'] ?>">
                <button type="button">Delete</button>
            </a>

            <br><br>

            <!-- REPLY FORM -->
            <form method="POST" action="reply.php">

                <input
                    type="hidden"
                    name="email"
                    value="<?= htmlspecialchars($row['email']) ?>"
                >

                <textarea
                    name="reply"
                    placeholder="Type your reply here..."
                    required
                ></textarea>

                <button type="submit">
                    Reply
                </button>

            </form>

        </div>

    <?php
    }
    ?>

</section>

</body>
</html>


