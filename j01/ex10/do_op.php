#!/usr/bin/php 
<?php
if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	return;
}
for ($i = 1; $i <= 3; $i++)
	$argv[$i] = trim($argv[$i]);
if (!is_numeric($argv[1]) || !is_numeric($argv[3]) || strlen($argv[2]) != 1 || !strstr("*/%+-", $argv[2])
	|| ($argv[2] == "/" && !intval($argv[3])) || ($argv[2] == '%' && !intval($argv[3])))
	return;
switch($argv[2]) {
	case "*":
		echo (intval($argv[1]) * intval($argv[3]))."\n";
		break;
	case "+":
		echo (intval($argv[1]) + intval($argv[3]))."\n";
		break;
	case "-":
		echo (intval($argv[1]) - intval($argv[3]))."\n";
		break;
	case "/":
		echo (intval($argv[1]) / intval($argv[3]))."\n";
		break;
	case "%":
		echo (intval($argv[1]) % intval($argv[3]))."\n";
		break;
}
?>
