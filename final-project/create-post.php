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
        <a href="../index.php">main page</a>
    </div>

    <div class="two-column-container">
        <div class="column">
            <h1 class="title">Create a New Post</h1>
            <form method="post" action="#">
                <label for="game">Game</label>
                <select id="game" name="game" required>
                    <option value="">Select a game</option>
                    <option value="elden_ring">Elden Ring</option>
                    <option value="minecraft">Minecraft</option>
                    <option value="fortnite">Fortnite</option>
                    <option value="zelda">The Legend of Zelda</option>
                    <option value="other">Other</option>
                </select>
                <br />

                <label for="category">Post Type</label>
                <select id="category" name="category" required>
                    <option value="">Select a type</option>
                    <option value="discussion">Discussion</option>
                    <option value="help">Help</option>
                    <option value="news">News</option>
                    <option value="guide">Guide</option>
                    <option value="fanart">Fan Art</option>
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
        </div>
        <div class="column">
            <h2>Instructions</h2>
            <ul>
                <li>Select the game your post is about.</li>
                <li>Choose the type of post (e.g., Help, News, Guide).</li>
                <li>Enter a descriptive title and your post content.</li>
                <li>Click "Submit Post" to share your discussion.</li>
            </ul>
        </div>
    </div>
</body>

</html>