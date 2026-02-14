<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    // Hardcoded admin login (for now)
    if ($username === "admin" && $password === "1234") {
        $_SESSION["admin"] = true;
        header("Location: messages.php");
        exit;
    } else {
        $error = "Invalid login.";
    }
}
?>

<form method="post">
    <h2>Admin Login</h2>

    <?php if (!empty($error)) echo "<p style='color:red'>$error</p>"; ?>

    <label>Username</label>
    <input type="text" name="username" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>
