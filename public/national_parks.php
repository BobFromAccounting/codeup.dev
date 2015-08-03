<?php
    require_once '../include/parks_config.php';

    require_once '../include/db_connect.php';

    $limit = 4; 
    $offset = 0;
    $stmt = $dbc->query('SELECT count(*) FROM national_parks');
    $totalPages = ceil(($stmt->fetchColumn())/$limit);

    if (!isset($_GET['page']) || !is_numeric($_GET['page']) || $_GET['page'] < 1) 
    {
        $_GET['page'] = 1;
        $page = 1;
    } else
    {
        $offset = ($_GET['page'] - 1) * $limit;
        $page = $_GET['page']; 
    }

    if ($_GET['page'] > $totalPages)
    {
        header("Location: ?page=$totalPages");

    }
    
    $parks = $dbc->query('SELECT * FROM national_parks LIMIT ' . $limit . ' OFFSET ' . $offset)->fetchAll(PDO::FETCH_ASSOC);
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