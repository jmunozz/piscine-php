#!/usr/bin/php
<?PHP

function p($array){
	return ($array[1]);
}

if ($argc > 1)
{
	$c = curl_init($argv[1]);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
	$f = curl_exec($c);
	preg_match_all("/<img.*?src=\"(.*?)\"/si", $f, $ma);
	$res = (strstr($argv[1], "http://")) ?  substr($argv[1], strlen("http://")) : substr($argv[1], strlen("https://"));
	shell_exec("mkdir ".$res);
	foreach($ma[1] as $elem)
	{
		if ($elem[0] == '/' && $elem[1] == '/')
			$elem = "https:".$elem;
		else if (strstr($elem, $argv[1]) === FALSE)
			$elem = $argv[1]."/".$elem;
		$result = preg_replace_callback("/.*\/(.*)/si", p, $elem);
		$c = curl_init($elem);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
		$src = curl_exec($c);
		if (($fd = fopen($res."/".$result, "x")) === FALSE)
			echo "Le fichier ".$result." existe deja.\n";
		fwrite($fd, $src);
		fclose($fd);
	}
}
?>
