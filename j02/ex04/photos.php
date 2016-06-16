#!/usr/bin/php
<?PHP

function p($array){
	return ($array[1]);
}

if ($argc > 1)
{
	if (strstr($argv[1], "http://") === FALSE)
		$adress = "http://".$argv[1];
	$c = curl_init($argv[1]);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
	$f = curl_exec($c);
	preg_match_all("/<img.*?src=\"(.*?)\"/si", $f, $ma);
	shell_exec("mkdir ".$argv[1]);
	foreach($ma[1] as $elem)
	{
		//echo "elem: ".$elem."\n";
		//echo "adress: ".$adress."\n";
		if (($fol = strstr($elem, $adress)) !== FALSE)
		{
		//	echo "Attention, ne pas ecrire l'adresse deux fois.\n";
		//	echo "fol: ".$fol."\n";
			$elem = substr($elem, strlen($adress));
		//	echo "elem :".$elem."\n";

		}
		if ($elem[0] == '/' && $elem[1] == '/')
		{
			echo "Attention double slash.\n";
		}
		$result = preg_replace_callback("/.*\/(.*)/si", p, $elem);
		$src = curl_init($adress."/".$elem);
		echo $src;
	//	copy(curl_exec($src), $adress."/".$result);
	}
}
?>
