<?PHP
if (isset($_GET['action']))
{
	if (!strcmp($_GET['action'], "set"))
		if (isset($_GET['name']) && isset($_GET['value']))
			setcookie($_GET['name'], $_GET['value']);
	if (!strcmp($_GET['action'], "get"))
		if (isset($_COOKIE[$_GET['name']]))
			echo $_COOKIE[$_GET['name']]."\n";
	if (!strcmp($_GET['action'], "del"))
		if (isset($_GET['name']))
			setcookie($_GET['name'], "", time());
}
?>
