<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolio</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Quantico:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Portfolio</h1>
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
                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                    <li><a href="addEntry.php">Add Blog</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <main>
            <section>
                <article class="project-card">
                    <img src="images/revisionwebsite.png" alt="Revision Website Screenshot" class="project-image">
                    <div>
                        <h3>Revision Website</h3>
                        <p><strong>A Level Revision Website</strong></p>
                        <p>This project was created using Python and HTML as a tool to help A-Level students revise. It features interactive resources, revision notes, and practice questions tailored for A-Level subjects.</p>
                        <p><a href="https://github.com/FaizaanAk/NEA-Project" target="_blank">Revision Website on GitHub</a></p>
                    </div>
                </article>
            </section>
        </main>

        <footer>
            <p>© 2026 Faizaan Akhtar</p>
        </footer>
    </div>
</body>
</html>