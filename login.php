<?php
session_start();
$error = "";
if (isset($_SESSION["error"])) {
    $error = $_SESSION["error"];
    unset($_SESSION["error"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Quantico:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Blog Login</h1>
    </header>

    <div class="container">
        <nav>
            <ul>
                <li><a href="index.php">Home Page</a></li>
                <li><a href="skills.html">Skills</a></li>
                <li><a href="education.html">Education</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="viewBlog.php">Blog</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>

        <main>
            <section>
                <?php if ($error): ?>
                    <p class="error-message"><?php echo $error; ?></p>
                <?php endif; ?>

                <form action="loginProcess.php" method="post">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required minlength="6">
                    <p>Must be at least 6 characters.</p>

                    <button type="submit">Login</button>
                </form>
            </section>
        </main>

        <footer>
            <p>© 2026 Faizaan Akhtar</p>
        </footer>
    </div>
</body>
</html>