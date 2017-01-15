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


function	set_user($login, $passwd, $bdd, $status = NULL, $id = NULL) {
if ($passwd)
	$passwd = hash('whirlpool', $passwd);
if (!$id)
{
	if (get_user_infos($login, $bdd))
		return FALSE;
	$query = "INSERT INTO users (login, passwd, status) 
	VALUES ('".$login."', '".$passwd."', 'client')";
}
else
{
	$p = ($passwd) ? ", passwd='" : NULL;
	$passwd = ($passwd) ? $passwd."'" : NULL;
	if (!$status && strcmp($status, 'admin') && strcmp($status, 'client') &&
	strcmp($status, 'seller'))
		$status = 'client';
	$query = "UPDATE users SET login='".$login."', status='".$status."'".$p.$passwd." WHERE id =".$id;
}
echo $query;
if (mysqli_query($bdd, $query) == FALSE)
	return (FALSE);
return (TRUE);
}

function	set_product($bdd, $name, $price, $cat, $des = NULL, $img = NULL, $id = NULL) {
	
	if (!$id)
	{
		if ($des)
		{
			$des = ", '".$des."'";
			$description = ', description';
		}
		if ($img)
		{
			$image = ', image';
			$img = ", '".$img."'";
		}
		$query = "INSERT INTO products (name, price, categories".$description.$image.")
			VALUES ('".$name."', '".$price."', '".$cat."'".$des.$img.")";
	}
	else
	{
		if ($des)
		{
			$description = ", description='";
			$des = $des."'";
		}
		if ($img)
		{
			$image = ", image='";
			$img = $img."'";
		}
		$query ="UPDATE products SET name='".$name."', price='".$price."', categories='".
		$cat."'".$description.$des.$image.$img." WHERE id=".$id;
	}
	echo $query;
	if (mysqli_query($bdd, $query) === FALSE)
		return (FALSE);
	return (TRUE);
}

function		set_categorie($bdd, $name, $des = NULL, $id = NULL) {
if ($id)
{
	$des = ($des) ? ", '".$des."'" : NULL;
	$description = ($des) ? ", description" : NULL;
	$query = "INSERT INTO categories (name".$description.")
	VALUES ('".$name."'".$des.")";
}
else
{
	$des = ($des) ? $des."'" : NULL;
	$description = ($des) ? ", description='" : NULL;
	$query ="UPDATE categories SET name='".$name."'".$description.$des."WHERE id =".$id;
	}
echo $query;
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

function is_admin($login, $bdd) {

	$user_infos = get_user_infos($login, $bdd);
	if ($user_infos['status'] == 'admin')
		return (1);
	else 
		return (0);
}
function get_table_field($bdd, $table, ...$fields) {

	$field_nb = count($fields);
	$field_str = "(";
	for ($i = 0; $i < $field_nb - 1; $i++)
		$field_str = $field_str.$fields[$i].", ";
	$field_str = $field_str.$fields[$i].")";

	$query = "SELECT ".$field_str." FROM ".$table;
	$result = mysqli_query($bdd, $query);
	if (!$result)
		echo "there is no result";
	return $result;
}

function	delete_elem($bdd, $table, $elem) {

	if ($table == 'users')
		$elem_type = 'login';
	else
		$elem_type = 'name';

	$query = "DELETE FROM ".$table." WHERE ".$elem_type." ='".$elem."'";
	if (mysqli_query($bdd, $query) == FALSE)
		return FALSE;
	return TRUE;
}

function	get_id($bdd, $table, $field, $value) {

	$query = "SELECT id FROM ".$table." WHERE ".$field."='".$value."'";
	$result = mysqli_query($bdd, $query);
	$r = mysqli_fetch_assoc($result);
	return ($r['id']);
}

function	get_ids_constraint($bdd, $table, $field, $value) {

	$query = "SELECT id FROM ".$table." WHERE ".$field."='".$value."'";
	$result = mysqli_query($bdd, $query);
	return ($result);
}

function		get_elem_infos($bdd, $table, $id) {

	$query = "SELECT * FROM ".$table." WHERE id=".$id;
	$return = mysqli_query($bdd, $query);
	return ($return);
}

function		set_img_product($bdd, $id, $img_name) {
	
	$query = "UPLOAD products SET image='".$img."'";
}
?>

