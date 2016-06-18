<?PHP
if (file_exists("../private/passwd"))
	$pwd = unserialize(file_get_contents("../private/passwd"));
else 
	$pwd = NULL;
if (is_array($pwd) == TRUE)
{
	foreach($pwd as $key => $user)
	{
		if (!strcmp($_POST['login'], $user['login']))
		{
			if (!strcmp(hash("whirlpool", $_POST['oldpw']), $user['passwd']))
			{
				$pwd[$key]['passwd'] = hash("whirlpool", $_POST['newpw']);
				$mod = 1;
			}
			else
			{
				echo "ERROR!\nVotre ancien mot de passe est incorrect!\n";
				exit;
			}
		}
	}

}
if ($mod == 1)
{
	file_put_contents("../private/passwd", serialize($pwd));
	echo "SUCCESS\n";
}
else 
	echo "ERROR\nVotre login n existe pas!\n";
?>
