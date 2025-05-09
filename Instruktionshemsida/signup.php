<?php

include "db.php";

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

if (empty($username) || empty($password)) {
    echo "fyll i allt din invalida rullstoll";
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("SELECT password From users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "username aldrady tsaken";
}
else {
    $stmt->close();
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?,?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        echo "grattis du kan lyckas med något";
    }
    else {
        echo "ehhh, försök igen";
    }
}

$stmt->close();
$conn->close();
?>