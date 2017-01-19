<?PHP
function ft_split($str)
{
	$str = trim($str);
	while (strpos($str, "  ") != FALSE)
		$str = str_replace("  ", " ", $str);
	$tab = explode(" ", $str);
	sort ($tab, SORT_STRING);
	return $tab;
}
?>
