<?php

function logMessage ($logLevel, $message)
{
	$today = date("Y-m-d");
	$logSpecificTime =  date("Y-m-d H:i:s");
	$filename = "log/log-{$today}.log";
	$stringToWrite =  "{$logSpecificTime} [{$logLevel}] {$message}";
	$handle = fopen($filename, 'a');
	fwrite($handle, PHP_EOL . $stringToWrite);
	fclose($handle);
}

function logInfo ($message)
{
	return logMessage('INFO', $message);
}

function logError ($message)
{
	return logMessage('ERROR', $message);
}

function logWarning ($message)
{
	return logMessage('WARNING', $message);
}

$messageExample = "WARNING! It's a TRAaaP!";
$messageExampleTwo = "Red squadron, Luke didn't make it past the trenches...He probably Should have used the targetter.";

logInfo('It looks like that Luke kid is at it again');
logError($messageExampleTwo);
logWarning($messageExample)

?>