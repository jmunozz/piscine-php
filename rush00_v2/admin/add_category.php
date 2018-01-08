<?php

// Display all error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Includes functions and constants.
require_once('../config/constants.php');
require_once('../config/functions.php');



/*
** Get sessions infos.
*/
session_start();
$is_admin = isset($_SESSION['is_admin']) && ($_SESSION['is_admin'] == 1);
$is_logged = isset($_SESSION['login']) && $_SESSION['login'] !== '';


if(!$is_admin) {
	include('./templates/access_denied.html');
	exit();
}


/*
** A new category has just been submited.
*/
if(isset($_POST['add'])) {

	// Add tag to DB.
	$success = addTag(array(
		'name' => $_POST['name'],
		'description' => $_POST['description']
	));

	// Choose what alert to display.
	if ($success)
		$alert = 'A new category has been added!';
	else
		$alert = 'Impossible to add new category!';
}

include('../templates/head.html');
include('../templates/header.php');
include('../templates/alert.php');
include('../templates/admin/menu.php');
include('../templates/admin/add_category.php');

?>