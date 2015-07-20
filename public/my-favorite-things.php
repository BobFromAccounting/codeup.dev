<?php

$favoriteThings = ['Physics', 'Programming', 'Music', 'Games', 'People Watching'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Codeup!</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
    <h1>These are a few of <small>my favorite things!</small></h1>
    <table class="table table-striped">
        <? foreach ($favoriteThings as $favoriteThing): ?>
            <tr><td> <?= $favoriteThing; ?> </td></tr>
        <? endforeach; ?>
    </table>
</body>
</html>