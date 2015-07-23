<?php
    session_start();

    var_dump($_POST);

    $gamesArray = [];
    

    if (!empty($_SESSION['gamesArray'])) {
        $gamesArray = $_SESSION['gamesArray'];
    }
        
    if (!empty($_POST)) {
        $gamesArray[] = $_POST;
    }

    $_SESSION['gamesArray'] = $gamesArray;

    var_dump($_SESSION);
    var_dump($gamesArray);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Video Game Library</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
</head>
<body>
    <form method="POST">
        <label>Game Title</label>
        <input type="text" name="title"><br>
        <label>Game Studio</label>
        <input type="text" name="studio"><br>
        <label class="sr-only">Game Description</label>
        <textarea rows="10" col="90" type="text" name="description" placeholder="Game Description"></textarea><br>
        <input class="btn btn-primary" type="submit">
    </form>
    <a href="reset.php">Reset Array</a>
    <div class="container">
        <h1>Video Games</h1>
        <ol>
            <? foreach ($gamesArray as $key => $videoGame): ?>
            <li>
                <a href="/videogames/show.php?index=<?= $key ?>"><?= $videoGame['title'] ?></a>
            </li>
            <? endforeach; ?>
        </ol>
    </div>
</body>
</html>