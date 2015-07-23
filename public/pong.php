<?php  
require '../functions.php';

function pageController () {
    var_dump($_GET);

    $data = [];

    if (inputHas('hit')) {
        $hitCounter = $_GET['hit'];
        if (inputGet('miss') === 'no') {
            $hitCounter += 1;
        } else if (inputGet('miss') === 'yes') {
            $hitCounter = 0;
        }
    } else {
        $hitCounter = 0;
    }

    $data['hit'] = $hitCounter;

    return $data;
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pong</title>
</head>
<body>
    <h2>Score: <?= $hit ?></h2>
    <a href="/ping.php?hit=<?= $hit ?>&miss=no">Hit</a>
    <a href="?miss=yes">Miss</a>
</body>
</html>