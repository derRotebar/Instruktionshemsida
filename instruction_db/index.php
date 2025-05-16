<?php

session_start();
 include "db.php";
 include "login_register.php";

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];

function showError($error) {
return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

?>

<!DOCTYPE html>
<html lang="en">
    <style>
 *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
    }

body{
    background:rgb(0, 0, 0);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
}
.container{
    margin: 0 15px;
}
.form-box{
    width: 100%;
    max-width: 400px;
    padding: 40px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 15px 25px rgba(0,0,0,0.5);
    display: none;
}
.form-box.active{
    display: block;
}
h2{
    margin: 0 0 20px;
   text-align: center;
   margin-bottom: 20px;
}

input, 
select{
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: none;
    border-bottom: 1px solid #333;
    background: transparent;
}

button{
    width: 100%;
    background: #333;
    border: none;
    padding: 10px;
    cursor: pointer;
    color: #fff;
    font-size: 18px;
    border-radius: 5px;
    transition: background 0.3s ease;
}
button:hover{
    background: #555;
}
p{
    font-size: 14.5px;
    text-align: center;
    margin-bottom: 10px;
}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="form-box active" id="main-form">
        <button onclick="showForm('login-form')">Login</button>
    </div>
    <div class="form-box"  id="login-form">
        <form action="login_register.php" method="post">
            <h2>Login</h2>
            <?= showError($errors['login']) ?>
            <div class="textbox">
                <input type="email" placeholder="email" name="Email" required>
                <input type="password" placeholder="password" name="Password" required>
                <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
            </div>
        </form>
     </div>

    <div class="form-box" id="register-form">
        <form action="login_register.php" method="post">
            <h2>Login</h2>
            <?= showError( $errors['register']) ?>
            <div class="textbox">
                <input type="text" placeholder="name" name="Name" required>
                <input type="email" placeholder="email" name="Email" required>
                <input type="password" placeholder="password" name="Password" required>
                <select name="role" required>
                    <option value="">Select Role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="register">signup</button>
                <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<script>
function showForm(formId) {
document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"));

const targetForm = document.getElementById(formId);
if (targetForm) {
    targetForm.classList.add("active");
} else {
    console.error(`Form with ID ${formId} not found.`); 
}}
</script>