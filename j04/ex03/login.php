<?php
include './auth.php';
session_name('AUTH');
session_start();
if (!$_GET['login'] || !$_GET['passwd'])
{
	echo "ERROR...entrez login et passwd!\n";
	return;
}
if (auth($_GET['login'], $_GET['passwd']))
{
	echo "yo\n";
	$_SESSION['loggued_on_user'] = $_GET['login'];
	echo "OK\n";
}
else
{
	$_SESSION['loggued_on_user'] = "";
	echo "ERROR\n";
}
?>
