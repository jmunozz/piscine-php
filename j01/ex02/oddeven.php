#!/usr/bin/php
<?PHP
while (1)
{
	echo "Entrez un nombre: ";
	if (($my_str = fgets(STDIN)) === FALSE)
		break;
	$my_str = trim($my_str);
	if (is_numeric($my_str) == TRUE)
	{
		if ($my_str % 2 == 0)
			echo "Le chiffre $my_str est Pair\n";
		else if ($my_str % 2 == 1 || $my_str % 2 == -1)
			echo "Le chiffre $my_str est Impair\n";
	}
	else
		echo "'$my_str' n'est pas un chiffre\n";
}
?>
