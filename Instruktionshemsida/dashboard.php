<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: indec.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Välkommen, <?php echo htmlspecialchars($_SESSION["username"]);?></h1>
    <a href="logout.php"></a>
</body>
</html>