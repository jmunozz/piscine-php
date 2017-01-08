<?php

function is_already_user($login) {

	if (file_exists("users.txt"))
		$pwd = unserialize(file_get_contents("users.txt"));
	else 
		$pwd = NULL;
	if ($pwd && is_array($pwd) == TRUE)
	{
		foreach($pwd as $user)
		{
			if (!strcmp($login, $user['login']))
				return (1);
		}
	}
	return (0);
}

function create_new_user($login, $pwd) {
	if (is_already_user($login))
		return (0);
	if (file_exists('users.txt'))
		$users = unserialize(file_get_contents("users.txt"));
	$users[] = array('login' => $login, 'passwd' => hash("whirlpool", $pwd));
	file_put_contents('users.txt', serialize($users));
	return (1);
}

?>
