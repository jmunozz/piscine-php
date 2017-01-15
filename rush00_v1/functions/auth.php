<?php
function	auth($login, $passwd, $bdd)
{
	if (!($user_infos = get_user_infos($login, $bdd)))
	{
		echo "User does not exist\n";
		return FALSE;
	}
	if (!strcmp($user_infos['passwd'], hash("Whirlpool", $passwd)))
			return TRUE;
	echo 'wrong password';
	return FALSE;
}
?>
