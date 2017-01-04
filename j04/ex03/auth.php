<?php

function	auth($login, $passwd)
{
	if (file_exists("../ex01/save"))
		$tab_users = unserialize(file_get_contents("../ex01/save"));
	else
	{
		echo "No users file found\n";
		return FALSE;
	}
	foreach ($tab_users as $user)
	{
		if (!strcmp($user['login'], $login) && !strcmp($user['passwd'], hash("Whirlpool", $passwd)))
			return TRUE;
	}
	return FALSE;
}
?>
