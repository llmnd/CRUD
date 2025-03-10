<?php
session_start();

// Identifiants admin prédéfinis
$admin_username = "admin";
$admin_password = "123"; 

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username === $admin_username && $password === $admin_password) {
    $_SESSION['admin_connecte'] = true;
    header("Location: liste.php");
    exit();
} else {
    $_SESSION['error'] = "Identifiants incorrects.";
    header("Location: accueil.php");
    exit();
}
?>