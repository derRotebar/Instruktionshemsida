<?php
include "db.php";

$username = "testuser";
$password = password_hash("testpassword", PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

echo "test user was created";
?>