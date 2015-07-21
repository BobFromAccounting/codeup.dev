<?php
	$adjectives = ['Furious', 'Tempestuous', 'Righteous', 'Virtuous', 'Subtle', 'Brobdingnagian', 'Heretical', 'Cosmic', 'Torturous', 'Treacherous'];
	$nouns = ['Penguin', 'Sandwich', 'Duck', 'Yogurt', 'Stick', 'Toilet', 'Turtle', 'Dinosaur', 'Spoon', 'Sock'];
    
    function randomNumber ($array)
    {
        $random = mt_rand(0, 9);
        return $array[$random];
    }
    
    function pageController ($adjectives, $nouns)
    {
    	$randomAdjectives = randomNumber($adjectives);
    	$randomNouns = randomNumber($nouns);
        // Initialize an empty data array.
        $data = [];

        // Add data to be used in the html view.
        $data['serverName'] = "{$randomAdjectives} {$randomNouns}";


        // Return the completed data array.
        return $data;    
    }

    extract(pageController($adjectives, $nouns));

?>



<!DOCTYPE html>
<html>
<head>
	<title>Server Name Generator</title>
</head>
<body>
	<h1>Server Name Generator</h1>
	<h2><?= "{$serverName}" ?></h2>
</body>
</html>