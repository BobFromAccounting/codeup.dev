<?php
    session_start();
    require '../functions.php';

    $username = inputHas('username') && escape($_REQUEST['username'] == 'guest');
    $password = inputHas('password') && escape($_REQUEST['password'] == 'password');

    $LOGGED_IN_USER = false;

    if ($username && $password) {
        $_SESSION['LOGGED_IN_USER'] = $_POST['username'];
        header("Location: authorized.php");
        exit();
    } else {
        echo "Please enter valid credentials.";
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