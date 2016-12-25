#!/usr/bin/php 
<?php

function get_key_value($str)
{
	if (!($pos = strpos($str, ":")))
		return (array($str, ""));
	else
	{
		$key = substr($str, 0, $pos);
		$value = substr($str, $pos + 1);
		return (array($key, $value));
	}
}

for ($i = 2; $i < $argc; $i++)
{
	if ($argv[$i])
	{
		$tab = get_key_value($argv[$i]);
		$fin[$tab[0]] = $tab[1];
	}
}
echo $fin[$argv[1]]."\n";
?>
