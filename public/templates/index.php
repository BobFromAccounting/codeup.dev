<?php
    $navbar = "Tarek S Hafez";

    $heading = "Hello World!";

    $footing = "Goodbye, Sally!"
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Template</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
    <? include 'navbar.php'; ?>
    <? include 'header.php'; ?>
    <div class="container">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    

        <? include 'footer.php'; ?>
    </div>
</body>
</html>