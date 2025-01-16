<?php
session_start();
$loggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORIENT - Chatbot</title>
    <link rel="stylesheet" href="css/chat.css">
   
</head>
<body>
    <header>
        <h1>ORIENT</h1>
        <p>Le chatbot qui guide les bacheliers vers leur avenir !</p>
    </header>

    <main>
        <div id="chat-interface">
            <div id="messages"></div>
            <form id="chat-form" action="./chat.php" method="POST">
                <input type="text" id="user-message" name="user_message" placeholder="Posez votre question..." required>
                <button type="submit" id="send-btn">Envoyer</button>
            </form>
        </div>

        <div id="auth-links">
            <?php if ($loggedIn): ?>
                <a href="logout.php" class="btn">Déconnexion</a>
            <?php else: ?>
                <a href="login.php" class="btn">Connexion</a>
                <a href="register.php" class="btn">Inscription</a>
            <?php endif; ?>
        </div>
    </main>
    <script src="js/animation.js" defer></script>
</body>
</html>
