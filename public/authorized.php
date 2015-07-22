<?php

    function pageController () {
        $username = isset($_POST['username']) ? $_POST['username'] == 'guest': '';
        $password = isset($_POST['password']) ? $_POST['password'] == 'password' : '';
        $data = [];

        if ($username && $password) {
            $success = "You are authorized to view this material.";
        } else {
            $success = "You are not authorized to view this material.";
        }

        $data['authorized'] = $success;
        return $data;
    }

    extract(pageController());

?>
<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>
    <h2>Authorization Status:</h2>
    <p><?= $authorized; ?></p>

    <a href="login.php">Re-enter Login data.</a>
</body>
</html>