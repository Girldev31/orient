<?php
require_once 'conBD.php';

function register_user($name, $email, $password) {
    $pdo = connect_db();
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    return $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);
}

function login_user($email, $password) {
    $pdo = connect_db();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return false;
}
?>
