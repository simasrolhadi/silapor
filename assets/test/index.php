<?php
// Include komponen
require_once 'glassmorphism_component.php';

// Ambil data user (dari session, database, dll)
session_start();
$user_name = $_SESSION['username'] ?? 'Guest';
$user_progress = 85; // Dari database atau kalkulasi

// Inisialisasi komponen
$glassmorphism = new GlassmorphismComponent();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP App with Glassmorphism</title>
</head>
<body>
    <!-- Header PHP -->
    <header>
        <h1>Welcome to My App</h1>
        <p>Current user: <?= htmlspecialchars($user_name) ?></p>
    </header>

    <!-- Glassmorphism Component -->
    <?= $glassmorphism->render($user_name, $user_progress) ?>

    <!-- Footer PHP -->
    <footer>
        <p>&copy; 2024 My PHP Application</p>
    </footer>
</body>
</html>
