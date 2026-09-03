<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) 
{
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a Blog Entry</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Quantico:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/addEntry.js" defer></script>
</head>

<body>
    <header>
        <h1>Add a Blog Entry</h1>
    </header>

    <div class="container">
        <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
            <aside>
                <p>Welcome, <?php echo htmlspecialchars($_SESSION["email"]); ?></p>
            </aside>
        <?php endif; ?>

        <nav>
            <ul>
                <li><a href="index.php">Home Page</a></li>
                <li><a href="skills.php">Skills</a></li>
                <li><a href="education.php">Education</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="viewBlog.php">Blog</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <main>
            <section>
                <?php if (isset($_GET["error"]) && $_GET["error"] === "empty"): ?>
                    <p class="error-message">Fill in both fields before previewing</p>
                <?php endif; ?>

                <form action="preview.php" method="post" id="blogForm">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" 
                        value="<?php echo isset($_GET['title']) ? htmlspecialchars($_GET['title']) : ''; ?>">

                    <label for="body">Post</label>
                    <textarea id="body" name="body" rows="8"><?php echo isset($_GET['body']) ? htmlspecialchars($_GET['body']) : ''; ?></textarea>

                    <button type="submit" id="previewBtn">Preview</button>
                    <button type="button" id="clearBtn">Clear All</button>
                </form>
            </section>
        </main>

        <footer>
            <p>© 2026 Faizaan Akhtar</p>
        </footer>
    </div>
</body>
</html>