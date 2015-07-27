<?php
    session_start();

    // var_dump($_POST);

    $gamesArray = [];
    

    if (!empty($_SESSION['gamesArray'])) {
        $gamesArray = $_SESSION['gamesArray'];
    }
        
    if (!empty($_POST)) {
        $gamesArray[] = $_POST;
    }

    $_SESSION['gamesArray'] = $gamesArray;

        // var_dump($_SESSION);
        // var_dump($gamesArray);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Video Game Library</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h1>Video Games</h1>
        <ol>
            <? foreach ($_SESSION['gamesArray'] as $key => $videoGame): ?>
            <li>
                <a href="/videogames/show.php?index=<?= $key ?>"><?= $videoGame['title'] ?></a>
            </li>
            <? endforeach; ?>
        </ol>
    </div>
    <div class="container">
        <form method="POST">
            <label for="title">Game Title</label>
            <input type="text" name="title" id="title" autofocus><br>
            <label for"studio">Game Studio</label>
            <input type="text" name="studio" id="studio"><br>
            <label for="description" class="sr-only">Game Description</label>
            <textarea rows="10" col="90" type="text" name="description" id="description" placeholder="Game Description"></textarea><br>
            <input class="btn btn-primary" type="submit">
        </form>
        <a href="reset.php">Reset Array</a>
    </div>
</body>
</html>