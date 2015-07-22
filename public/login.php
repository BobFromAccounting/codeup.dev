<?php
// start the session (or resume an existing one)
// this function must be called before trying to set of get any session data!
session_start();

$username = isset($_POST['username']) && htmlspecialchars(strip_tags($_POST['username'] == 'guest'));
$password = isset($_POST['password']) && htmlspecialchars(strip_tags($_POST['password'] == 'password'));

$LOGGED_IN_USER = false;

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($username && $password) {
        $_SESSION['LOGGED_IN_USER'] = $_POST['username'];
        header("Location: authorized.php");
        exit();
    } else {
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