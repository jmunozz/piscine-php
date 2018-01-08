<?php
if (isset($_GET['id']) && isset($_GET['value'])) {
	$str = $_GET['id'].";".$_GET['value']."\n";
	file_put_contents('list.csv', $str, FILE_APPEND);
}
?>
