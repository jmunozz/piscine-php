#!/usr/bin/php
<?PHP
function ft_is_sort($array)
{
	$mode = 0;
	for ($i=0; $i < count($array) - 1; $i++)
	{
		if ($array[$i] < $array[$i + 1])
			$mode = 1;
		if ($array[$i] < $array[$i + 1])
			$mode = 2;
	}
	if ($mode == 1)
		for ($i=0; $i < count($array) - 1; $i++)
			if ($array[$i] < $array[$i + 1])
				return (0);
	if ($mode == 2)
		for ($i=0; $i < count($array) - 1; $i++)
			if ($array[$i] > $array[$i + 1])
				return (0);
	return (1);
}

//unset($argv[0]);
print_r($argv);

if (ft_is_sort($argv) == 1)
	echo "Le tableau est trie\n";
else 
	echo "Le tableau n'est pas trie\n";
?>
