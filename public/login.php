<?php
    session_start();
    require '../functions.php';
    require_once '../Auth.php';
    require_once '../Input.php';

    if ($_POST)
    {
        if (Auth::attempt(escape(Input::get("username")), escape(Input::get('password'))))
        {
            header("Location: authorized.php");
            exit();
        } else
        {
            echo "Please enter valid credentials.";
        }
    }
        
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="username"><br>
        <label>Password</label>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>
</body>
</html>