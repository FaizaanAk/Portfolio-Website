<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skills</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Quantico:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>My Skills</h1>
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
            <section class="skills">
                <div class="skill_section">
                    <h3>Java</h3>
                    <p>Procedural Programming and Object Oriented Programming</p>
                </div>

                <div class="skill_section">
                    <h3>Python</h3>
                    <p>Software Development</p>
                </div>

                <div class="skill_section">
                    <h3>Web Development</h3>
                    <p>HTML, CSS and JavaScript</p>
                </div>
            </section>
        </main>

        <footer>
            <p>© 2026 Faizaan Akhtar</p>
        </footer>
    </div>
</body>
</html>