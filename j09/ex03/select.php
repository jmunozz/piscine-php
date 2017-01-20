<?php
if (!file_exists('list.csv'))
	echo "KO";
else 
{
	$data = file_get_contents('list.csv');
	echo $data;
}
?>
