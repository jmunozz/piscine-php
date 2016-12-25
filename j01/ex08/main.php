#!/usr/bin/php
<?php
include 'ft_is_sort.php';
unset($argv[0]);
print_r($argv);

if (ft_is_sort($argv) == 1)
	echo "Le tableau est trié\n";
else
	echo "le tableau n'est pas trié\n";
?>
