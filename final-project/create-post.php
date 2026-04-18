<?php
require_once 'db_connect.php';
session_start();
$games = $pdo->query('SELECT * FROM games ORDER BY title')->fetchAll();
$categories = $pdo->query('SELECT * FROM categories ORDER BY name')->fetchAll();
$message = '';
$logged_in = isset($_SESSION['user_id']);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$logged_in) {
        $message = 'You must be logged in to create a post.';
    } else {
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');
        $game_id = (int)($_POST['game_id'] ?? 0);
        $category_id = (int)($_POST['category_id'] ?? 0);
        $user_id = $_SESSION['user_id'];
        if ($title && $content && $game_id && $category_id) {
            $stmt = $pdo->prepare('INSERT INTO posts (title, content, user_id, game_id, category_id) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$title, $content, $user_id, $game_id, $category_id]);
            $message = 'Post created successfully!';
        } else {
            $message = 'Please fill in all fields.';
        }
    }
}
$selected_game = isset($_GET['game_id']) ? (int)$_GET['game_id'] : 0;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Create Post</title>
    <link rel="stylesheet" href="styles.css" />
    <script src="script.js"></script>
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
    <div class="two-column-container">
        <div class="column">
            <h1 class="title">Create a New Post</h1>
            <?php if ($message): ?>
                <p><?= htmlspecialchars($message) ?></p>
            <?php endif; ?>
            <?php if ($logged_in): ?>
                <form method="post" action="">
                    <label for="game_id">Game</label>
                    <select id="game_id" name="game_id" required>
                        <option value="">Select a game</option>
                        <?php foreach ($games as $game): ?>
                            <option value="<?= $game['game_id'] ?>" <?= ($selected_game == $game['game_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($game['title']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <br />
                    <label for="category_id">Post Type</label>
                    <select id="category_id" name="category_id" required>
                        <option value="">Select a type</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['category_id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br />
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" maxlength="100" required placeholder="Enter post title">
                    <br />
                    <label for="content">Content</label>
                    <textarea id="content" name="content" maxlength="2000" required placeholder="Write your post here..."></textarea>
                    <br />
                    <button type="submit">Submit Post</button>
                </form>
            <?php else: ?>
                <p><a href="login.php">Log in</a> or <a href="register.php">register</a> to create a post.</p>
            <?php endif; ?>
        </div>
        <div class="column">
            <h2>Instructions</h2>
            <ul>
                <li>Select the game your post is about.</li>
                <li>Choose the type of post.</li>
                <li>Enter a descriptive title and your post content.</li>
                <li>Click "Submit Post" to share your discussion.</li>
            </ul>
        </div>
    </div>
</body>

</html>