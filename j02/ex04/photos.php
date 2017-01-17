#!/usr/bin/php
<?PHP

function p($array){
	return ($array[1]);
}

if ($argc > 1)
{
	$c = curl_init($argv[1]);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER, FALSE);
	$f = curl_exec($c);
	if ($f === FALSE);
		echo "error".curl_error($c);
	preg_match_all("/<img.*?src=\"(.*?)\"/si", $f, $ma);
	print_r($ma[1]);
	$res = preg_replace('/https?:\/\//', '', $argv[1]);
	mkdir($res, 0777, true);
	foreach($ma[1] as $elem)
	{
		if ($elem[0] == '/' && $elem[1] == '/')
			$elem = "https:".$elem;
		else if (!strstr($elem, "http") && strstr($elem, $argv[1]) === FALSE)
			$elem = $argv[1]."/".$elem;
		$result = preg_replace_callback("/.*\/(.*)/si", 'p', $elem);
		$c = curl_init($elem);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER, FALSE);
		$src = curl_exec($c);
		if (file_exists($res."/".$result) == FALSE)
		{
			$fd = fopen($res."/".$result, "x");
			fwrite($fd, $src);
			fclose($fd);
		}
		else
			echo "Le fichier ".$result." existe deja.\n";
	}
}
?>
