#!/usr/bin/php 
<?php
if ($argc < 2)
	return;
date_default_timezone_set("Europe/Paris");
$elem = explode(" ", $argv[1]);
if (count($elem) != 5 || !preg_match("/^([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche)$/", $elem[0]) ||
	!preg_match("/^[0-9]{1,2}$/", $elem[1]) ||
	!preg_match("/^([Jj]anvier|[Ff][eé]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]o[uû]t|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd][eé]cembre)$/", $elem[2]) ||
	!preg_match("/^[0-9]{4}$/", $elem[3]) ||
	!preg_match("/^([0-9]{2}:){2}[0-9]{2}$/", $elem[4]))
{
	echo "Wrong Format\n";
	return;
}
$tab_hour = explode(":", $elem[4]);
$hour = intval($tab_hour[0]);
$min = intval($tab_hour[1]);
$sec = intval($tab_hour[2]);
$day = intval($elem[1]);
$month_name = array("/janvier/i", "/f[eé]vrier/i", "/mars/i", "/avril/i", "/mai/i", "/juin/i", "/juillet/i", "/ao[uû]t/i", "/septembre/i", "/octobre/i", "/novembre/i", "/d[eé]cembre/i");
$month_nb = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");
$month = preg_replace($month_name, $month_nb, $elem[2]);
$month = intval($month);
$year = intval($elem[3]);
$time = mktime($hour, $min, $sec, $month, $day, $year);
echo $time."\n";
?>
