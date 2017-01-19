#!/usr/bin/php
<?PHP

if ($argc > 1) 
{
	array_shift($argv);
	$str = trim(implode($argv, " "));
	while (strpos($str, "  ") != FALSE)
		$str = str_replace("  ", " ", $str);
	$tab = explode(" ", $str);
	sort($tab, SORT_STRING);
	foreach($tab as $elem)
		if ($elem)
			echo "$elem\n";
}
?>
