<?php
session_name('ECOM');
session_start();

require_once('get.php');
require_once('auth.php');

if (isset($_SESSION) && isset($_POST) && 
isset($_POST['login']) && isset($_POST['passwd']))
{
	if (auth($_POST['login'], $_POST['passwd']))
		$_SESSION['user_logged_on'] = $_POST['login'];
	else 
		$_SESSION['user_logged_on'] = "";
}
if (isset($_SESSION))
{
	$_SESSION['cart_content'] = array();
	$_SESSION['cart_amount'] = get_cart_amount($_SESSION['cart_content']);
	include 'homepage.php';
}

?>
