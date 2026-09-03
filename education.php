<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Education</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Quantico:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Education</h1>
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
                <article class="education-item">
                    <img src="images/qmul-image.jpg" alt="QMUL Logo">
                    <div>
                        <h3>Queen Mary University of London</h3>
                        <p><strong>BSc Computer Science</strong></p>
                        <p>2026 - Present</p>
                    </div>
                </article>

                <article class="education-item">
                    <img src="images/ark-ina.jpg" alt="Ark Isaac Newton Academy Logo">
                    <div>
                        <h3>Ark Isaac Newton Academy</h3>
                        <p><strong>A Level</strong></p>
                        <p>2023 - 2025</p>
                        <p>Computer Science - (A)</p>
                        <p>Economics - (A)</p>
                        <p>Maths - (B)</p>
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