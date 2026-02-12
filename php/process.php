<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");

if (in_array('', [$name, $email, $message], true)) {
    echo "Please fill all fields.";
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email Address.";
    exit;
}
echo "Thank you, $name! Your message has been received.";
}
?>