#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	$str = trim($argv[1]);
	while (strpos($str, "  ") != FALSE)
		$str = str_replace("  ", " ", $str);
	$array = explode(" ", $str);
	if (($nb = count($array)) == 1)
	{
		if ($array[0])
			echo "$array[0]\n";
	}
	else 
	{
		for ($i = 1; $i < $nb; ++$i) 
			echo "$array[$i] ";
		echo "$array[0]\n";
	}
}
?>
