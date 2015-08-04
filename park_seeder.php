<?php
    require_once 'include/parks_config.php';

    require_once 'include/db_connect.php';

    $truncateSql = "TRUNCATE national_parks";

    $dbc->exec($truncateSql);

    $parks = [
    ['name' => 'Glacier', 'location' => 'Montana', 'date_established' => '1910/05/11', 'area_in_acres' => 1013572.41, 'description' => 'Glacier national park is the best national park because it also is the name of my class cohort. It is pretty, and mostly white, and melting.'],
    ['name' => 'Acadia', 'location' => 'Maine', 'date_established' => '1919/02/26', 'area_in_acres' => 47389.67, 'description' => 'Arcadia is another cool sounding park name, because of fairies and stuffs. Also i am pretty sure that they have great hotdogs here.'],
    ['name' => 'Arches', 'location' => 'Utah', 'date_established' => '1929/04/12', 'area_in_acres' => 76518.98, 'description' => 'Arches...MMmmmmmmm.....Golden.'],
    ['name' => 'Badlands', 'location' => 'South Dakota', 'date_established' => '1978/11/10', 'area_in_acres' => 242755.94, 'description' => 'Badlands with bad mans and each of us in bad hands. This be the Badlands!'],
    ['name' => 'Big Bend', 'location' => 'Texas', 'date_established' => '1944/06/12', 'area_in_acres' => 801163.21, 'description' => 'Big Bend! It\'s BIG! It\'s Bendy! You should totally go there. Be warned though, it\'s also in Texas.'],
    ['name' => 'Biscayne', 'location' => 'Florida', 'date_established' => '1980/06/28', 'area_in_acres' => 172924.07, 'description' => 'Biscayne, biscayne, twirlly whirlly, biscayne. Biscayne biscayne, dudeydudeydu.'],
    ['name' => 'Black Canyon of the Gunnison', 'location' => 'Colorado', 'date_established' => '1999/10/21', 'area_in_acres' => 32950.03, 'description' => 'Black Canyon of the Gunnison. .Nosinnug eht fo Noynac Kcalb habbapabbanoosenoose.'],
    ['name' => 'Canyonlands', 'location' => 'Utah', 'date_established' => '1964/08/12', 'area_in_acres' => 337597.83, 'description' => 'These are lands....in CANYONS!!!! Canyonlands!!!  CAYONLANDS!!!! CANYONLANNNDNDDDSSSSSDSS!'],
    ['name' => 'Capitol Reef', 'location' => 'Utah', 'date_established' => '1971/12/18', 'area_in_acres' => 241904.26, 'description' => 'Used to be a reefs. Science-y and shii-.'],
    ['name' => 'Carlsbad Caverns', 'location' => 'New Mexico', 'date_established' => '1930/05/14', 'area_in_acres' => 46766.45, 'description' => 'Carlsbad Caverns. Home to bats...and secrets...I am batman!']
    ];

    $insertQuery = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)";

    $stmt = $dbc->prepare($insertQuery);

    foreach ($parks as $park) {
        $stmt->bindValue(':name', $park['name'], PDO::PARAM_STR);
        $stmt->bindValue(':location',  $park['location'],  PDO::PARAM_STR);
        $stmt->bindValue(':date_established',  $park['date_established'],  PDO::PARAM_STR);
        $stmt->bindValue(':area_in_acres',  $park['area_in_acres'],  PDO::PARAM_INT);
        $stmt->bindValue(':description',  $park['description'],  PDO::PARAM_STR);
        
        $stmt->execute();

        echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
    }