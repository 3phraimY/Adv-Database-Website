<?php
require_once 'db_connect.php';
$post_id = isset($_GET['post_id']) ? (int)$_GET['post_id'] : 0;
if (!$post_id) {
    echo 'Invalid post.';
    exit;
}
$stmt = $pdo->prepare('SELECT p.*, u.username, g.title as game_title, c.name as category_name FROM posts p LEFT JOIN users u ON p.user_id = u.user_id LEFT JOIN games g ON p.game_id = g.game_id LEFT JOIN categories c ON p.category_id = c.category_id WHERE p.post_id = ?');
$stmt->execute([$post_id]);
$post = $stmt->fetch();
if (!$post) {
    echo 'Post not found.';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post['title']) ?> - View Post</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="nav_bar">
        <a href="homepage.php">Home</a>
        <a href="game.php?game_id=<?= $post['game_id'] ?>">Back to Game</a>
    </div>
    <div class="container">
        <h1><?= htmlspecialchars($post['title']) ?></h1>
        <p><strong>Game:</strong> <?= htmlspecialchars($post['game_title']) ?></p>
        <p><strong>Category:</strong> <?= htmlspecialchars($post['category_name']) ?></p>
        <p><strong>By:</strong> <?= htmlspecialchars($post['username'] ?? 'Unknown') ?> | <small><?= $post['created_at'] ?></small></p>
        <div class="post-content">
            <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
        </div>
    </div>
</body>

</html>