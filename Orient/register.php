<?php
require_once 'bd/userquries.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (register_user($name, $email, $password)) {
        header('Location: login.php');
        exit;
    } else {
        $error = "Erreur lors de l'inscription.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
       <div class="form-container">
            <h2>Register</h2>
            <form action="register.php" method="POST">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" placeholder="Your Name" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="register-password" name="password" placeholder="Password" required>
                    <i class="fas fa-eye toggle-password" data-target="register-password"></i>
                </div>
                <button type="submit">Register</button>
            </form>
        </div>
    <script src="js/style.js"></script>
</body>
</html>