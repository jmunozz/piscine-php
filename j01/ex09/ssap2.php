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
	echo "COUCOU";
	//sort($tab, SORT_NUMERIC);
	//sort($tab, SORT_STRING | SORT_FLAG_CASE);
	usort($tab, "strcmp");
	foreach($tab as $elem)
		echo "$elem\n";
}

function ($str1, $str2)
{
	$i = -1;
	while ($str[++$i] && $str[$i])
	{
		if (strpos(
?>
