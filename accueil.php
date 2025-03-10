<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Connexion</title>
    <link rel="stylesheet" href="accueil.css">
</head>
<body>
    <header class="admin-header">
        <h2 class="admin-title">Panneau d'Administration</h2>
    </header>
    <div class="admin-container">
        <h2>Bienvenue, Administrateur</h2>
        <p>Veuillez vous connecter pour gérer les utilisateurs.</p>
        <?php 
        if (isset($_SESSION['error'])) { 
            echo "<p class='error-message'>" . $_SESSION['error'] . "</p>"; 
            unset($_SESSION['error']); 
        } 
        ?>
        <form class="login-form" action="traitement.php" method="POST">
            <label for="username">Nom d'utilisateur</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password" required><br>
            <button type="submit" class="login-button">Se connecter</button>
        </form>
    </div>
</body>
</html>