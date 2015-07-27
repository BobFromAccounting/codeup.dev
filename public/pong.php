<?php  
require '../Input.php';

function pageController () {

    $data = [];

    if (Input::has('hit')) {
        $hitCounter = $_GET['hit'];
        if (Input::get('miss') === 'no') {
            $hitCounter += 1;
        } else if (Input::get('miss') === 'yes') {
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