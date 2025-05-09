<?php
session_start();
include "db.php";

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

if (empty($username) || empty($password)){
    echo "Snälla sluta va en idiot och fyll i bägge fälten.";
    exit;
}

$stmt = $conn->prepare("SELECT password From users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1){
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();

if (password_verify($password, $hashedPassword)) {
    echo "bra gjort du är inte invalid $username";
} 
else {
    echo "grattis du är invalid precis som ditt lösenord";
}
}
else {
    echo "u don't exist / user not found";
}

$stmt->close();
$conn->close();
?>