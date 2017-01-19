#!/usr/bin/php 
<?php
if ($argc > 1)
{
	$str = preg_replace("/[\t\s]{2,}/", " ", $argv[1]);
	echo trim($str)."\n";
}
?>
