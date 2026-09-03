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
    $created_at = date("Y-m-d H:i:s");

    $sql = "INSERT INTO posts (title, body, created_at) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $title, $body, $created_at);
    mysqli_stmt_execute($stmt);

    header("Location: viewBlog.php");
    exit();
}
?>