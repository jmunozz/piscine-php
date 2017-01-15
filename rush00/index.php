<?php
session_name('ECOM');
session_start();
require_once('get.php');
require_once('functions/auth.php');
require_once('functions/sql_functions.php');
require_once('functions/display_functions.php');
require_once('functions/user_functions.php');
$bdd = sql_connexion();

if (!$_SESSION['cart']) {
	$_SESSION['cart'] = array();
}

if (!$_SESSION['user_loggued_on'] && isset($_POST['auth']) 
&& isset($_POST['login']) && isset($_POST['passwd']))
{
	if (!strcmp($_POST['auth'],'connexion') 
	&& auth($_POST['login'], $_POST['passwd'], $bdd))
	{
		$_SESSION['user_loggued_on'] = $_POST['login'];
		echo $_SESSION['user_loggued_on'].' est connecte';
	}
	else 
		$_SESSION['user_loggued_on'] = "";
}

if (isset($_SESSION) && isset($_POST['auth'])
&& !strcmp($_POST['auth'], 'deconnexion'))
	{
		echo 'on se deconnecte';
		$_SESSION['user_loggued_on'] = "";
	}

if ($_POST['cart_id'] && $_POST['cart_quantity'] && $_POST['cart_price']) {
	echo "bibou";
	if ($_POST['cart_buy'])
		add_to_cart($_POST['cart_id'], $_POST['cart_quantity'], $_POST['cart_price']);
}

if (isset($_SESSION))
{
	include ("functions/init.php");
	include ("homepage.php");
}

?>
