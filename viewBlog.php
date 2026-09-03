<?php
session_start();
require_once 'database.php';

date_default_timezone_set('Europe/London');

$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);

$posts = [];
while ($row = mysqli_fetch_assoc($result)) 
{
    $posts[] = $row;
}

function bubbleSort($posts) 
{
    $n = count($posts);
    for ($i = 0; $i < $n - 1; $i++) 
    {
        for ($j = 0; $j < $n - $i - 1; $j++) 
        {
            if ($posts[$j]["created_at"] < $posts[$j + 1]["created_at"]) 
            {
                $temp = $posts[$j];
                $posts[$j] = $posts[$j + 1];
                $posts[$j + 1] = $temp;
            }
        }
    }
    return $posts;
}

$posts = bubbleSort($posts);

$months = [];
foreach ($posts as $post) {
    $monthKey = date("Y-m", strtotime($post["created_at"]));
    $monthLabel = date("F Y", strtotime($post["created_at"]));
    if (!isset($months[$monthKey])) {
        $months[$monthKey] = $monthLabel;
    }
}

$selectedMonth = isset($_GET["month"]) ? $_GET["month"] : "all";

$filteredPosts = [];
if ($selectedMonth === "all") {
    $filteredPosts = $posts;
} else {
    foreach ($posts as $post) {
        $postMonth = date("Y-m", strtotime($post["created_at"]));
        if ($postMonth === $selectedMonth) {
            $filteredPosts[] = $post;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Quantico:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Blog</h1>
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
                    <li><a href="addEntry.php">Add Post</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <main>
            <section>

                <form action="viewBlog.php" method="GET">
                    <label for="month">Filter by Month:</label>
                    <select name="month" id="month" onchange="this.form.submit()">
                        <option value="all" <?php if ($selectedMonth === "all") echo "selected"; ?>>
                            All Posts
                        </option>
                        <?php foreach ($months as $key => $label): ?>
                            <option value="<?php echo $key; ?>"
                                <?php if ($selectedMonth === $key) echo "selected"; ?>>
                                <?php echo $label; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>

                <?php if (count($filteredPosts) === 0): ?>
                    <p>No posts found</p>
                <?php else: ?>
                    <?php foreach ($filteredPosts as $post): ?>
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