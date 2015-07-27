<?php
    session_start();
    require_once '../Auth.php';

    if (Auth::check()) {
        $username = Auth::user();
    } else {
        header("Location: login.php");
        exit();
    }   
?>
<!DOCTYPE html>
<html>
<head>
    <title>Authorization Page</title>
</head>
<body>
    <h2>Authorization Status:</h2>
    <p>WELCOME, <?= $username ?>! You are authorized to view this content!</p>
    <a href="logout.php">Log Out</a>
</body>
</html>