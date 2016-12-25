#!/usr/bin/php
<?PHP

function echo_tab($tab)
{
	foreach($tab as $elem)
		echo "$elem\n";
}

function is_else($str)
{
	if (ctype_alpha($str) | is_numeric($str))
		return FALSE;
	else
		return TRUE;
}

if ($argc > 1) 
{
	unset($argv[0]);
	$str = trim(implode($argv, " "));
	while (strpos($str, "  ") != FALSE)
		$str = str_replace("  ", " ", $str);
	$tab = explode(" ", $str);
	$alpha = array_filter($tab, "ctype_alpha");
	$num = array_filter($tab, "is_numeric");
	$else = array_filter($tab, "is_else");
	sort($alpha, SORT_STRING | SORT_FLAG_CASE);
	sort($num);
	sort($else);
	echo_tab($alpha);
	echo_tab($num);
	echo_tab($else);
}
?>
