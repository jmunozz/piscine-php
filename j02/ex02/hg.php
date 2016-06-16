#!/usr/bin/php
<?PHP

function ft_second($arr)
{
	return $arr[1].strtoupper($arr[2]).$arr[3];
}
function ft_recur($array)
{
	$result = preg_replace_callback("/(title=\")(.*?)(\")/si", ft_second, $array[0]);
	$result = preg_replace_callback("/(<a.*?>)(.*?)(<)/i", ft_second, $result);
	$result = preg_replace_callback("/(.+>)(.*?)(<\/a>)/i", ft_second, $result);
	return $result;
}
if ($argc > 1 && !is_dir($argv[1]))
{
	$file = $argv[1];
	$file = file_get_contents($file);
	$file = preg_replace_callback("/<a.+>.+<\/a>/si", ft_recur, $file);
	if ($file)
		echo $file;
}
?>
