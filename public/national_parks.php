<?php
    require_once '../include/parks_config.php';

    require_once '../include/db_connect.php';

    $limit = 4;
    $offset = 0;

    function getParks ($dbc, $limit, $offset)
    {
        return $dbc->query('SELECT * FROM national_parks LIMIT ' . $limit . ' OFFSET ' . $offset)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    $parks = getParks ($dbc, $limit, $offset);

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
            <h1> <?= $park['name'] ?> </h1>
            <p> 
                <strong> <?= $park['location']; ?> </strong> <br>
                <em> <?= $park['date_established']; ?> </em> <br>
                <u> <?= $park['area_in_acres']; ?></u> <br> 
            </p>
        <? endforeach; ?>
    <a href="?"></a>
    </div>
</body>
</html>