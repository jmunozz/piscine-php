#!/usr/bin/php
<?PHP
function my_sort($a, $b)
{
	return strcmp($a[line], $b[line]);
}

$resource = fopen("/var/run/utmpx", "r");
while ($str = fread($resource, 628))
	$tab[] = unpack("a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad", $str);
usort($tab, my_sort);
unset($tab[0]);
unset($tab[1]);
date_default_timezone_set("Europe/Paris");
foreach($tab as $elem)
	if ($elem[type] == 7)
		echo $elem[user]."  " . $elem[line] . "  " . date("M d h:i", $elem[time1]) . "\n";

?>
