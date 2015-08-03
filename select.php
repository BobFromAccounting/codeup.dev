<?php
    require_once 'parks_config.php';

    require_once 'db_connect.php';

    $stmt = $dbc->query('SELECT * FROM users');

    echo "Columns: " . $stmt->columnCount() . PHP_EOL;
    echo "Rows: " . $stmt->rowCount() . PHP_EOL;