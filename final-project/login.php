<?php
require_once 'db_connect.php';
session_start();
$message = '';
$username = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    if ($username && $password) {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            header('Location: homepage.php');
            exit;
        } else {
            $message = 'Invalid username or password.';
        }
    } else {
        $message = 'Please fill in all fields.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="nav_bar">
        <a href="homepage.php">Home</a>
        <a href="register.php">Register</a>
    </div>
    <div class="container">
        <h1>Login</h1>
        <?php if ($message): ?>
            <p><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <form method="post">
            <label>Username:<br>
                <input type="text" name="username" required value="<?= htmlspecialchars($username) ?>">
            </label><br>
            <label>Password:<br>
                <input type="password" name="password" required autocomplete="current-password">
            </label><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>