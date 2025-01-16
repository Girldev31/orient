<?php
require_once 'bd/userquries.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = login_user($email, $password);
    if ($user) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header('Location: chat.php');
        exit;
    } else {
        $error = "Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Document</title>
</head>
<body>
   <div class="form-container">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="login-password" name="password" placeholder="Password" required>
                    <i class="fas fa-eye toggle-password" data-target="login-password"></i>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    <script src="js/style.js"></script>
</body>
</html>