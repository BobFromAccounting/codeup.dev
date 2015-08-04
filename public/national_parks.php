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
        <h1>National Parks Data</h1>
    
        <? foreach ($parks as $key => $park): ?>
            <h2> <?= $park['name'] ?> <small><strong> <?= $park['location']; ?> </strong></small></h2>
            <p> 
                <em>Date of establishment: <?= $park['date_established']; ?> </em> <br>
                <u>Area in acres: <?= $park['area_in_acres']; ?></u> <br> 
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>

        <? endforeach; ?>
        <? if ($page != 1): ?>
            <a style="float: left" class='btn btn-primary' href="?page=<?= $page - 1; ?>">Previous</a>
        <? endif; ?>
        
        <? if ($page < $totalPages): ?>
            <a style="float: right" class='btn btn-primary' href="?page=<?= $page + 1; ?>">NEXT</a>
        <? endif; ?>

        <div class="container text-center">
            <a class='btn btn-primary' href="?page=1">1</a>
            <a class='btn btn-primary' href="?page=2">2</a>
            <a class='btn btn-primary' href="?page=3">3</a>
        </div>
    </div>
</body>
</html>