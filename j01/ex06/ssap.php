#!/usr/bin/php
<?PHP
function ft_split($str)
{
	$str = trim($str);
	while (strpos($str, "  ") != FALSE)
		$str = str_replace("  ", " ", $str);
	$tab = explode(" ", $str);
	return $tab;
}

if ($argc > 1) 
{
	unset($argv[0]);
	$str = trim(implode($argv, " "));
	while (strpos($str, "  ") != FALSE)
		$str = str_replace("  ", " ", $str);
	$tab = explode(" ", $str);
	sort($tab, SORT_STRING);
	foreach($tab as $elem)
		echo "$elem\n";
}
?>
