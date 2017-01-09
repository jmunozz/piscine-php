<?php
require_once 'admin.php';
require_once '../sql_functions.php';

$bdd = sql_connexion();

if ($_SESSION['is_loggued_on'] && is_admin($login, $bdd))
	echo 'BONJOUR '.$_SESSION['login'].'vous avez acces a cet espace';
else
	echo 'vous ne pouvez pas acceder a cet espace';
?>
