<?php

function	create_database($db_name, $sql) {

$query = "CREATE DATABASE ".$db_name;
$r = mysqli_query($sql, $query);
}

function	create_table_users($bdd) {

$query = "CREATE TABLE users (
		id	int NOT NULL AUTO_INCREMENT,
		login varchar(15) NOT NULL,
		passwd varchar(255) NOT NULL,
		status enum('admin','seller','client') NOT NULL,
	    logs varchar(1000) DEFAULT NULL,
		PRIMARY KEY (id)
		)";

$r = mysqli_query($bdd, $query);
echo "users table created\n";
}

function	create_table_products($bdd) {

$query = "CREATE TABLE products (
		id int NOT NULL AUTO_INCREMENT,
		name varchar(255) NOT NULL,
	    description varchar(1000) DEFAULT NULL,
		price int NOT NULL,
		image varchar(255) DEFAULT NULL,
		categories varchar(1000) NOT NULL,
		PRIMARY KEY (id)
		)";

$r = mysqli_query($bdd, $query);
echo "products table created\n";
}

function	create_table_categories($bdd) {

$query = "CREATE TABLE categories (
		id int NOT NULL AUTO_INCREMENT,
		name varchar(20) NOT NULL,
	    description varchar(1000) NOT NULL DEFAULT 'pas de description',
		PRIMARY KEY (id)
		)";

$r = mysqli_query($bdd, $query);
echo "categories table created\n";
}

function	create_admin($login, $passwd, $bdd) {

$passwd = hash('whirlpool', $passwd);
$query = "INSERT INTO users (login, passwd, status) VALUES ('".$login."', '".$passwd."', 'admin')";
if (mysqli_query($bdd, $query) == FALSE)
	echo "admin creation failed";
echo "admin created\n";
}

function generate_db() {

echo "A new db is being created...\n";
$sql = serversql_connexion();
create_database('db_ecom', $sql);
$bdd = sql_connexion();
if (table_exists('users', $bdd) == TRUE)
	echo "Table users already exists\n";
else 	
	create_table_users($bdd);
if (table_exists('categories', $bdd) == TRUE)
	echo "Table categories already exists\n";
else 	
	create_table_categories($bdd);
if (table_exists('products', $bdd) == TRUE)
	echo "Table products already exists\n";
else 	
	create_table_products($bdd);
create_admin('jordan', 'coucou', $bdd);
}
?>


