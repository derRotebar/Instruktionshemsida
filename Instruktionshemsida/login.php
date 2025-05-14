<?php
session_start();
include "db.php";

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";
$remember = isset($_POST["rememver"]);

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
        $_SESSION["user_id"] = $userId;
        $_SESSION["username"] = $username;
        
        if ($remember) {
            $token = bin2hex(random_bytes(32));

            $update = $conn->prepare("UPDATE users SET remember_token = ? WHERE id = ?");
            $update->bind_param("si", $token, $userId);
            $update->execute();
            $update->close();

            setcookie("remember_token", $token, time() + (86400 * 30), "/");
        }
        echo "welcome";
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