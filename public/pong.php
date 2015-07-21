<?php  
    var_dump($_GET);

    if (isset($_GET['hit'])){
        $hitCounter = $_GET['hit'];
        if (!empty($_GET)) {
            if ($_GET['miss'] == 'no') {
                $hitCounter += 1;
            } else if ($_GET['miss'] == 'yes') {
                $hitCounter = 0;
            }
        }
    } else {
        $hitCounter = 0;
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pong</title>
</head>
<body>
    <h2>Score: <?= $hitCounter ?></h2>
    <a href="/ping.php?hit=<?= $hitCounter ?>&miss=no">Hit</a>
    <a href="?miss=yes">Miss</a>
</body>
</html>