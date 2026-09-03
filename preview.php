<?php
session_start();
require_once 'database.php';

date_default_timezone_set('Europe/London');

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) 
{
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $title = $_POST["title"];
    $body = $_POST["body"];

    if (empty($title) || empty($body)) 
    {
        header("Location: addEntry.php?error=empty");
        exit();
    }
}

else 
{
    header("Location: addEntry.php");
    exit();
}

$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);

$posts = [];
while ($row = mysqli_fetch_assoc($result)) 
{
    $posts[] = $row;
}

function bubbleSort($posts) {
    $n = count($posts);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($posts[$j]["created_at"] < $posts[$j + 1]["created_at"]) {
                $temp = $posts[$j];
                $posts[$j] = $posts[$j + 1];
                $posts[$j + 1] = $temp;
            }
        }
    }
    return $posts;
}

$posts = bubbleSort($posts);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Preview Blog Entry</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Quantico:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Preview Blog Entry</h1>
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
                <li><a href="addEntry.php">Add Blog</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <main>
            <section>
                <h2>Preview Your Post</h2>
                <p class="preview-notice">Currently viewing a preview of your post. You can choose whether to publish it or go back to edit your post</p>

                <article class="blog-post preview-post">
                    <p class="blog-date">
                        <?php echo date("jS F Y, g:i A"); ?>
                    </p>
                    <h2 class="blog-title">
                        <?php echo htmlspecialchars($title); ?>
                    </h2>
                    <p class="blog-body">
                        <?php echo htmlspecialchars($body); ?>
                    </p>
                </article>

                <form action="addPost.php" method="POST">
                    <input type="hidden" name="title" value="<?php echo htmlspecialchars($title); ?>">
                    <input type="hidden" name="body" value="<?php echo htmlspecialchars($body); ?>">
                    <button type="submit">Publish Post</button>
                </form>

                <form action="addEntry.php" method="GET">
                    <input type="hidden" name="title" value="<?php echo htmlspecialchars($title); ?>">
                    <input type="hidden" name="body" value="<?php echo htmlspecialchars($body); ?>">
                    <button type="submit">Edit Post</button>
                </form>

                <hr>

                <?php if (count($posts) === 0): ?>
                    <p>No existing posts yet</p>
                <?php else: ?>
                    <?php foreach ($posts as $post): ?>
                        <article class="blog-post">
                            <p class="blog-date">
                                <?php echo date("jS F Y, g:i A", strtotime($post["created_at"])); ?>
                            </p>
                            <h2 class="blog-title">
                                <?php echo htmlspecialchars($post["title"]); ?>
                            </h2>
                            <p class="blog-body">
                                <?php echo htmlspecialchars($post["body"]); ?>
                            </p>
                        </article>
                        <hr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>
        </main>

        <footer>
            <p>© 2026 Faizaan Akhtar</p>
        </footer>
    </div>
</body>
</html>