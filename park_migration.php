<?php
    define('DB_HOST', '127.0.0.1');
    define('DB_NAME', 'parks_db');
    define('DB_USER', 'parks_user');
    define('DB_PASS', 'password');

    require_once 'db_connect.php';

    $dropSql = "DROP TABLE IF EXISTS national_parks";
    
    $dbc->exec($createSql);

    $createSql = "CREATE TABLE national_parks (
        id INT UNSIGNED AUTO_INCREMENT,
        name CHAR(255) NOT NULL,
        location CHAR(100) NOT NULL,
        date_established DATE NOT NULL,
        area_in_acres DOUBLE,
        PRIMARY KEY (id)
        )";

    $dbc->exec($dropSql);
?>