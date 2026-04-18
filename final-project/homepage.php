<?php
require_once 'db_connect.php';
session_start();
$stmt = $pdo->query('SELECT * FROM games ORDER BY title');
$games = $stmt->fetchAll();
$logged_in = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Videogame Forum - Home</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="nav_bar">
        <a href="homepage.php">Home</a>
        <a href="create-post.php">Create Post</a>
        <?php if ($logged_in): ?>
            <span style="color:#fff; margin-left:20px;">Welcome, <?= htmlspecialchars($_SESSION['username']) ?></span>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </div>
    <div class="container">
        <h1>Videogame Forum</h1>
        <h2>Games</h2>
        <ul class="list-group">
            <?php foreach ($games as $game): ?>
                <li>
                    <a class="list-item-link" href="game.php?game_id=<?= $game['game_id'] ?>">
                        <?= htmlspecialchars($game['title']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a class="button" href="create-post.php">Create a Post</a>
    </div>
</body>

</html>