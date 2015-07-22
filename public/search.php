<?php

    $search = isset($_POST['searchBar']) ? $_POST['searchBar'] : '';
    $encodedSearch = urlencode($search);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Test</title>
</head>
<body>
    <h1>Search for: <?= $search ?></h1>
    <form method="POST">
        <label>Search</label>
        <input type="text" name="searchBar">
        <input type="submit">
    </form>
    <a href="https://duckduckgo.com/?q=<?= $encodedSearch ?>">View Results</a>
</body>
</html>