<?php

function pageController () {
    var_dump($_GET);

    $data = [];

    if (isset($_GET['counter'])) {    
        $counter = $_GET['counter'];
        if ($_GET['direction'] == 'up') {
            $counter += 1;
        } else if ($_GET['direction'] == 'down') {
            $counter -= 1;
        }
    } else {
        $counter = 0;
    }

    $data['counter'] = $counter;

    return $data;
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
    <title>Counter Exercise</title>
</head>
<body>
    <h2>The current number is <?= $counter; ?></h2>
    <a href="?counter=<?= $counter; ?>&direction=up">Up</a>
    <a href="?counter=<?= $counter; ?>&direction=down">Down</a>
</body>
</html>