<?php
    define('DB_HOST', '127.0.0.1');
    define('DB_NAME', 'parks_db');
    define('DB_USER', 'parks_user');
    define('DB_PASS', 'password');

    require_once 'db_connect.php';

    $truncateSql = "TRUNCATE national_parks";

    $dbc->exec($truncateSql);

    $parks = [
    ['name' => 'Acadia', 'location' => 'Maine', 'date_established' => '1919/02/26', 'area_in_acres' => 47389.67],
    ['name' => 'Arches', 'location' => 'Utah', 'date_established' => '1929/04/12', 'area_in_acres' => 76518.98],
    ['name' => 'Badlands', 'location' => 'South Dakota', 'date_established' => '1978/11/10', 'area_in_acres' => 242755.94 ],
    ['name' => 'Big Bend', 'location' => 'Texas', 'date_established' => '1944/06/12', 'area_in_acres' => 801163.21],
    ['name' => 'Biscayne', 'location' => 'Florida', 'date_established' => '1980/06/28', 'area_in_acres' => 172924.07],
    ['name' => 'Black Canyon of the Gunnison', 'location' => 'Colorado', 'date_established' => '1999/10/21', 'area_in_acres' => 32950.03],
    ['name' => 'Canyonlands', 'location' => 'Utah', 'date_established' => '1964/08/12', 'area_in_acres' => 337597.83],
    ['name' => 'Capitol Reef', 'location' => 'Utah', 'date_established' => '1971/12/18', 'area_in_acres' => 241904.26],
    ['name' => 'Carlsbad Caverns', 'location' => 'New Mexico', 'date_established' => '1930/05/14', 'area_in_acres' => 46766.45],
    ['name' => 'Glacier', 'location' => 'Montana', 'date_established' => '1910/05/11', 'area_in_acres' => 1013572.41]
    ];

    foreach ($parks as $details => $park) {
        $insertSql = "INSERT INTO national_parks (name, location, date_established, area_in_acres) VALUES ('{$park['name']}', '{$park['location']}', '{$park['date_established']}', '{$park['area_in_acres']}')";
        $dbc->exec($insertSql);
        echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
    }