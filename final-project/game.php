<?php
require_once 'db_connect.php';
$game_id = isset($_GET['game_id']) ? (int)$_GET['game_id'] : 0;
if (!$game_id) {
    echo 'Invalid game.';
    exit;
}
$stmt = $pdo->prepare('SELECT * FROM games WHERE game_id = ?');
$stmt->execute([$game_id]);
$game = $stmt->fetch();
if (!$game) {
    echo 'Game not found.';
    exit;
}
$categories = $pdo->query('SELECT * FROM categories')->fetchAll();
$category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 0;
if ($category_id) {
    $stmt = $pdo->prepare('SELECT p.*, u.username, c.name as category_name FROM posts p LEFT JOIN users u ON p.user_id = u.user_id LEFT JOIN categories c ON p.category_id = c.category_id WHERE p.game_id = ? AND p.category_id = ? ORDER BY p.created_at DESC');
    $stmt->execute([$game_id, $category_id]);
} else {
    $stmt = $pdo->prepare('SELECT p.*, u.username, c.name as category_name FROM posts p LEFT JOIN users u ON p.user_id = u.user_id LEFT JOIN categories c ON p.category_id = c.category_id WHERE p.game_id = ? ORDER BY p.created_at DESC');
    $stmt->execute([$game_id]);
}
$posts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($game['title']) ?> - Posts</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="nav_bar">
        <a href="homepage.php">Home</a>
        <a href="create-post.php?game_id=<?= $game_id ?>">Create Post</a>
    </div>
    <div class="container">
        <h1><?= htmlspecialchars($game['title']) ?> (<?= htmlspecialchars($game['genre']) ?>)</h1>
        <a href="homepage.php">&larr; Back to Games</a>
        <h2>Categories</h2>
        <ul class="list-group">
            <li><a class="list-item-link<?= !$category_id ? ' active' : '' ?>" href="game.php?game_id=<?= $game_id ?>">All</a></li>
            <?php foreach ($categories as $cat): ?>
                <li><a class="list-item-link<?= ($category_id == $cat['category_id']) ? ' active' : '' ?>" href="game.php?game_id=<?= $game_id ?>&category_id=<?= $cat['category_id'] ?>"><?= htmlspecialchars($cat['name']) ?></a></li>
            <?php endforeach; ?>
        </ul>
        <h2>Posts</h2>
        <a class="button" href="create-post.php?game_id=<?= $game_id ?>">Create a Post</a>
        <ul class="post-list">
            <?php if (count($posts) === 0): ?>
                <li>No posts yet.</li>
            <?php else: ?>
                <?php foreach ($posts as $post): ?>
                    <li class="post-card">
                        <div class="post-card-title">
                            <a href="view-post.php?post_id=<?= $post['post_id'] ?>">
                                <?= htmlspecialchars($post['title']) ?>
                            </a>
                        </div>
                        <div class="post-card-meta">
                            <span>by <?= htmlspecialchars($post['username'] ?? 'Unknown') ?></span>
                            <span class="post-card-category">[<?= htmlspecialchars($post['category_name'] ?? 'Uncategorized') ?>]</span>
                            <span class="post-card-date"><small><?= $post['created_at'] ?></small></span>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</body>

</html>