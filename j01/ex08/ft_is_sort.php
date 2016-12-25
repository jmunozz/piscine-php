#!/usr/bin/php
<?PHP
function ft_is_sort($array)
{
	$mode = 0;
	for ($i=0; $i < count($array) - 1; $i++)
	{
		if (strcmp($array[$i], $array[$i + 1]) < 0)
		{
			$mode = 1;
			break;
		}
		if (strcmp($array[$i], $array[$i + 1]) > 0)
		{
			$mode = 2;
			break;
		}
	}
	if ($mode == 1)
		for ($i = 0; $i < count($array) - 1; $i++)
			if (strcmp($array[$i], $array[$i + 1]) > 0)
				return (0);
	if ($mode == 2)
		for ($i = 0; $i < count($array) - 1; $i++)
			if (strcmp($array[$i], $array[$i + 1]) < 0)
				return (0);
	return (1);
}
?>
