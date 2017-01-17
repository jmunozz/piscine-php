#!/usr/bin/php
<?PHP

function echo_tab($tab)
{
	foreach($tab as $elem)
		echo "$elem\n";
}

function is_different_type($c1, $c2)
{
	if (ctype_alpha($c1))
		return ((ctype_alpha($c2) ? 0 : -1));
	if (ctype_digit($c1))
	{
		if (ctype_alpha($c2))
			return (1);
		else if (ctype_digit($c2))
			return (0);
		else 
			return (-1);
	}
	else
		return ((ctype_alpha($c2) || ctype_digit($c2)) ? 1 : 0);
}

function	my_sort($s1, $s2)
{
	$s1 = strtolower($s1);
	$s2 = strtolower($s2);
	$i = 0;
	while (isset($s1[$i]) && isset($s2[$i]))
	{
		if (($diff =  is_different_type($s1[$i], $s2[$i])))
			return ($diff);
		if (($diff = ord($s1[$i]) - ord($s2[$i])))
			return ($diff);
		$i++;
	}
	if (!isset($s1[$i]) && !isset($s2[$i]))
		return (0);
	if (!isset($s1[$i]))
		return (-1);
	else
		return (1);
}

if ($argc > 1) 
{
	unset($argv[0]);
	$str = trim(implode($argv, " "));
	while (strpos($str, "  ") != FALSE)
		$str = str_replace("  ", " ", $str);
	$tab = explode(" ", $str);
	usort($tab, 'my_sort');
	echo_tab($tab);
}

?>
