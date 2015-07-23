<?php
    session_start();
    require 'functions.php';

    if (!empty($_SESSION['LOGGED_IN_USER'])) {
        $welcome = escape($_SESSION['LOGGED_IN_USER']);
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
    <p>WELCOME, <?= $welcome ?>! You are authorized to view this content!</p>
    <a href="logout.php">Log Out</a>
</body>
</html>