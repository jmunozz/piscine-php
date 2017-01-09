<?php

function is_admin($login, $bdd) {

	$user_infos = get_user_infos($login, $bdd);
	if ($user_infos['status'] == 'admin')
		return (1);
	else 
		return (0);
}
