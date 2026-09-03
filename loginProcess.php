<?php
session_start();
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    $email = $_POST["email"];
    $password = MD5($_POST["password"]);

    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) 
    {
        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $email;
        header("Location: addEntry.php");
        exit();
    } 
    
    else 
    {
        $_SESSION["error"] = "Invalid email or password";
        header("Location: login.php");
        exit();
    }
}
?>