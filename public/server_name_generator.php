<?php
	$adjectives = ['Furious', 'Tempestuous', 'Righteous', 'Virtuous', 'Subtle', 'Brobdingnagian', 'Heretical', 'Cosmic', 'Torturous', 'Treacherous'];
	$nouns = ['Penguin', 'Sandwich', 'Duck', 'Yogurt', 'Stick', 'Toilet', 'Turtle', 'Dinosaur', 'Spoon', 'Sock'];

	function randomNumber ($array) {
		$random = mt_rand(0, 9);
		return $array[$random];
	}

	$randomAdjectives = randomNumber($adjectives);
	$randomNouns = randomNumber($nouns);

?>



<!DOCTYPE html>
<html>
<head>
	<title>Server Name Generator</title>
</head>
<body>
	<h1>Server Name Generator</h1>
	<h2><?= "{$randomAdjectives} {$randomNouns}" ?></h2>
</body>
</html>