<?php
// Display all error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Includes functions and constants.
require_once('./config/constants.php');
require_once('./config/functions.php');


/*
** Get sessions infos.
*/
session_start();
$is_admin = isset($_SESSION['is_admin']) && ($_SESSION['is_admin'] == 1);
$is_logged = isset($_SESSION['login']) && $_SESSION['login'] !== '';


/*
** User is already logged in.
*/
if(!$is_logged) {
	exit();
}
else {
	$_SESSION['login'] = '';
	$_SESSION['is_admin'] = '';
	$_SESSION['id'] = '';
	header('Location: /');	
}