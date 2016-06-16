#!/usr/bin/php
<?PHP
function h($array) {
	$title = preg_replace_callback("/(title=\")(.*?)(\")/si", j,  $array[0]);
	$title = preg_replace_callback("/(>)(.*?)(<)/si", j, $title);
	return $title;
}
function j($array) {
	return $array[1].strtoupper($array[2]).$array[3];
}
$page = file_get_contents($argv[1]);
$page = preg_replace_callback("/<a\s.+?>.+?<\/a>/is", h,  $page);
echo "$page";
?>
