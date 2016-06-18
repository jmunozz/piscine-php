<?PHP
if (file_exists("../private/passwd"))
	$pwd = unserialize(file_get_contents("../private/passwd"));
else 
	$pwd = NULL;
if (is_array($pwd) == TRUE)
{
	foreach($pwd as $user)
	{
		if (!strcmp($_POST['login'], $user['login']))
		{
			echo "ERROR\n";
			exit;
		}
	}
}
$pwd[] = array("login" => "{$_POST['login']}", "passwd" => hash("whirlpool", "{$_POST['passwd']}"));
file_put_contents("../private/passwd", serialize($pwd));
?>
