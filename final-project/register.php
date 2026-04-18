<?php
require_once 'db_connect.php';
session_start();
$message = '';
$username = '';
$email = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';
    if ($username && $email && $password && $confirm) {
        if ($password !== $confirm) {
            $message = 'Passwords do not match.';
        } else {
            $stmt = $pdo->prepare('SELECT user_id, username FROM users WHERE username = ? OR email = ?');
            $stmt->execute([$username, $email]);
            if ($stmt->fetch()) {
                $message = 'Username or email already exists.';
            } else {
                $hash = password_hash($password, PASSWORD_BCRYPT);
                $stmt = $pdo->prepare('INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)');
                $stmt->execute([$username, $email, $hash]);
                $user_id = $pdo->lastInsertId();
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                header('Location: homepage.php');
                exit;
            }
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
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="nav_bar">
        <a href="homepage.php">Home</a>
        <a href="login.php">Login</a>
    </div>
    <div class="container">
        <h1>Register</h1>
        <?php if ($message): ?>
            <p><?= $message ?></p>
        <?php endif; ?>
        <form method="post">
            <label>Username:<br>
                <input type="text" name="username" required maxlength="50" value="<?= htmlspecialchars($username) ?>">
            </label><br>
            <label>Email:<br>
                <input type="email" name="email" required maxlength="100" value="<?= htmlspecialchars($email) ?>">
            </label><br>
            <label>Password:<br>
                <input type="password" name="password" required autocomplete="new-password">
            </label><br>
            <label>Confirm Password:<br>
                <input type="password" name="confirm" required autocomplete="new-password">
            </label><br>
            <button type="submit">Register</button>
        </form>
    </div>
</body>

</html>