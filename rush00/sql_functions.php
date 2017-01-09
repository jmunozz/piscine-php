<?php

function sql_connexion() {
	
	try {
		$bdd = new mysqli('localhost', 'root', 'root', 'db_ecom');
	}
	catch (Exception $e)  {
		die ('Error: '.$e->get_message());
	}
	echo 'correction reussie: '.$bdd->connect_error;
	return ($bdd);	
}

function get_user_infos($login, $bdd) {

	$query = "SELECT * FROM users WHERE login='".$login."'";
	echo $query;
	$result = $bdd->query($query);
	echo "requete reussie";
	$ar = $result->fetch_assoc();
	return ($ar);
}	

