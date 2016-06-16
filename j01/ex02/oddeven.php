#!/usr/bin/php
<?PHP
while (1)
{
	echo "Entrez un nombre: ";
	$my_str = trim(fgets(STDIN));
	if ($my_str == NULL)
	{
		echo "\n";
		exit(0);
	}
	if (is_numeric($my_str) == TRUE)
	{
		if ($my_str % 2 == 0)
			echo "Le chiffre $my_str est Pair\n";
		else if ($my_str % 2 == 1)
			echo "Le chiffre $my_str est Impair\n";
	}
	else
		echo "'$my_str' n'est pas un chiffre\n";
}
?>
