#!/usr/bin/php 
<?php

function get_key_value($str)
{
	if (!($pos = strpos($str, ":")))
		return (NULL);
	else
	{
		$key = substr($str, 0, $pos);
		$value = substr($str, $pos + 1);
		return (array($key, $value));
	}
}

if ($argc < 2)
	return;
for ($i = 2; $i < $argc; $i++)
{
	if ($argv[$i])
	{
		if (($tab = get_key_value($argv[$i])))
			$fin[$tab[0]] = $tab[1];
	}
}
if (isset($fin[$argv[1]]))
	echo $fin[$argv[1]]."\n";
?>
