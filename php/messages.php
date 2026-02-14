<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

include_once "db.php";

$result = $conn->query("SELECT id, name, email, message, created_at FROM messages ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messages</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<section class="container">
    
<div style="text-align:right; margin-bottom:1rem;">
    <a href="logout.php">Logout</a>
</div>

    <h3>Messages</h3>

    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div style="margin-bottom:1.5rem; padding:1rem; background:#f5f9ff; border-radius:10px;">
                <strong>Name:</strong> <?= htmlspecialchars($row["name"]) ?><br>
                <strong>Email:</strong> <?= htmlspecialchars($row["email"]) ?><br>
                <strong>Message:</strong><br>
                <?= nl2br(htmlspecialchars($row["message"])) ?><br>
                <small>Sent at: <?= $row["created_at"] ?></small>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No messages found.</p>
    <?php endif; ?>

    <a href="../index.php">← Back to Portfolio</a>
</section>

</body>
</html>

<?php
$conn->close();
?>
