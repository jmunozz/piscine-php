<?php
session_name('ECOM');
session_start();

require_once('get.php');
require_once('auth.php');
require_once('sql_functions.php');
$bdd = sql_connexion();

if (isset($_SESSION) && isset($_POST) && isset($_POST['auth']) &&
isset($_POST['login']) && isset($_POST['passwd']))
{
	if (!strcmp($_POST['auth'],'connexion') && auth($_POST['login'], $_POST['passwd'], $bdd))
	{
		$_SESSION['user_loggued_on'] = $_POST['login'];
		echo $_SESSION['user_loggued_on'].' est connecte';
	}
	else 
		$_SESSION['user_loggued_on'] = "";
}
if (isset($_SESSION) && isset($_POST['auth']) && !strcmp($_POST['auth'], 'deconnexion'))
	{
		echo 'on se deconnecte';
		$_SESSION['user_loggued_on'] = "";
	}
if (isset($_SESSION))
{
	$_SESSION['cart_content'] = array();
	$_SESSION['cart_amount'] = get_cart_amount($_SESSION['cart_content']);
	include 'homepage.php';
}

?>
