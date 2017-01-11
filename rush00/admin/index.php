<?php
session_name('ECOM');
session_start();
require_once 'admin.php';
require_once '../sql_functions.php';

$bdd = sql_connexion();

if ($_SESSION['user_loggued_on'] && is_admin($_SESSION['user_loggued_on'], $bdd))
	require_once 'backend.php';
else
	echo 'vous ne pouvez pas acceder a cet espace';
?>
