<?php
require_once('generate_db.php');

function	serversql_connexion() {

$host = 'localhost';
$user = 'root';
$passwd = 'root';

	if (($sql = mysqli_connect($host, $user, $passwd)) == FALSE)
	{
		echo "La connexion au serveur SQL a echoue";
		return (NULL);
	}
	return ($sql);	
}

function sql_connexion() {
	
	try {
		$bdd = new mysqli('localhost', 'root', 'root', 'db_ecom');
	}
	catch (Exception $e)  {
		echo "'Error: ".$e->get_message();
	}
	if ($bdd->connect_error)
	{
		echo "try to connect again";
		generate_db();
		echo "PLEASE REFRESH THE PAGE\n";
	}
	return ($bdd);	
}

function get_user_infos($login, $bdd) {

	$query = "SELECT * FROM users WHERE login='".$login."'";
	$result = $bdd->query($query);
	$ar = $result->fetch_assoc();
	return ($ar);
}	


function	create_user($login, $passwd, $bdd) {

if (get_user_infos($login, $bdd))
	return FALSE;
$passwd = hash('whirlpool', $passwd);
$query = "INSERT INTO users (login, passwd, status) 
		VALUES ('".$login."', '".$passwd."', 'client')";
if (mysqli_query($bdd, $query) == FALSE)
	return (FALSE);
return (TRUE);
}

function table_exists($table_name, $bdd) {

$query = "SHOW TABLES LIKE '".$table_name."'";
$r = mysqli_query($bdd, $query);
$nb = mysqli_num_rows($r);
if ($nb > 0)
	return TRUE;
else 
	return FALSE;
}
