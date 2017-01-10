#!/usr/bin/php 
<?php
if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	return;
}
$ops = str_split("+-*%/");
$pos = 0;
for ($i = 0; $i <= 4; $i++)
{	
	if (($pos_op = strpos($argv[1], $ops[$i])))
	{
		if (!$pos || $pos_op < $pos)
			$pos = $pos_op;
	}
}
if (!$pos)
{
	echo "Syntax error\n";
	return;
}
$op = $argv[1][$pos];
$num1 = trim(substr($argv[1], 0, $pos));
$num2 = trim(substr($argv[1], $pos + 1));
if (!is_numeric($num1) || !is_numeric($num2))
{
	echo "Syntax error\n";
	return;
}
if (($op == "/" || $op == "%") && !intval($num2))
{
	echo "Beware divsion or modulo by zero !\n";
	return;
}
switch ($op)
{
	case "+":
		echo (intval($num1) + intval($num2))."\n";
		break;
	case "-":
		echo (intval($num1) - intval($num2))."\n";
		break;
	case "*":
		echo (intval($num1) * intval($num2))."\n";
		break;
	case "/":
		echo (intval($num1) / intval($num2))."\n";
		break;
	case "%":
		echo (intval($num1) % intval($num2))."\n";
		break;
}
?>
