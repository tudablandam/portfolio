<?php

include_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request.");
}

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");

if (in_array('', [$name, $email, $message], true)) {
   die("Please fill in all fields.");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

$stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "<h2> Message saved successfully!</h2>";
    echo "<a href='../index.php'>Go back</a>";
} else {
    echo "Failed to save message.";
}

$stmt->close();
$conn->close();

?>