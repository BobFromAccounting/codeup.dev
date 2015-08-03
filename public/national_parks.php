<?php
require_once 'national_parks_procedural.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>National Parks</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <? foreach ($parks as $key => $park): ?>
            <h1> <?= $park['name'] ?> <small><strong> <?= $park['location']; ?> </strong></small></h1>
            <p> 
                <em> <?= $park['date_established']; ?> </em> <br>
                <u> <?= $park['area_in_acres']; ?></u> <br> 
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        <? endforeach; ?>
        <? if ($page != 1): ?>
            <a class='btn btn-primary' href="?page=<?= $page - 1; ?>">BACK</a>
        <? endif; ?>
        <a class='btn btn-primary' href="?page=1">1</a>
        <a class='btn btn-primary' href="?page=2">2</a>
        <a class='btn btn-primary' href="?page=3">3</a>
        <? if ($page < $totalPages): ?>
            <a class='btn btn-primary' href="?page=<?= $page + 1; ?>">NEXT</a>
        <? endif; ?>
    </div>
</body>
</html>