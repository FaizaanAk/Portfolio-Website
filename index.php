<?php session_start(); ?>
<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Portfolio</title>
    
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Quantico:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Faizaan Akhtar</h1>
        <p>Computer Science Student at QMUL</p>
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
            <div class="top-row">
                <section class="info-box about-me">
                    <h2>About Me</h2>
                    <p>I am a Computer Science student at Queen Mary University of London. I have a passion for software development and problem-solving.
                        I chose to study Computer Science because I enjoy the creativity involved in programming and creating solutions to real-world problems.
                    </p>
                </section>

                <section class="image-section">
                    <figure>
                        <img src="images/faizaan.jpg" alt="Profile picture">
                        <figcaption>My Profile Image</figcaption>
                    </figure>
                </section>
            </div>

            <div class="bottom-row">
                <section class="info-box hobbies">
                    <h2>Hobbies</h2>
                    <p>In my spare time I enjoy coding, going to the gym, learning new technologies,
                    playing games, and exploring different areas of computer science.</p>
                </section>

                <section class="info-box contact">
                    <h2>Contact Information</h2>
                    <p>Email: faizaanakhtarw@email.com</p>
                    <p>GitHub: https://github.com/FaizaanAk</p>
                </section>
            </div>
        </main>

        <footer>
            <p>© 2026 Faizaan Akhtar</p>
        </footer>

    </div>
</body>
</html>