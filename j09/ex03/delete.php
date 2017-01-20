<?php
if (isset($_GET['id'])) {
	$data = file_get_contents('list.csv');
	$match = '/'.$_GET['id'].';.*'.'\n/';
	echo $match;
	$data = preg_replace($match, '', $data);
	file_put_contents('list.csv', $data);
}
