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
** A tag has just been modified.
*/
if (isset($_POST['modify'])) {

	$new_tag = array(
		'name' => $_POST['name'],
		'description' => $_POST['description'],
		'id' => $_POST['id']
	);
	$success = editTag($new_tag);

	// Choose what alert to display.
	if ($success)
		$alert = 'The category has been modified!';
	else
		$alert = 'Impossible to modify the category!';
}

/*
** A tag has just been deleted.
*/
if(isset($_POST['delete'])) {

	$success = deleteTag($_POST['id']);

	// Choose what alert to display.
	if ($success)
		$alert = 'The category has been deleted!';
	else
		$alert = 'Impossible to delete the category!';

}


$has_tag_selected = isset($_GET['tag_id']);

// We display details about selected tag.
if ($has_tag_selected) {
	$tag_id = $_GET['tag_id'];
	$tag_infos = getOne('tags', $tag_id );
}

// We display all tags and search bar.
if (!$has_tag_selected) {
	$tag_list = getAll('tags');
}


include('../templates/head.html');
include('../templates/header.php');
include('../templates/alert.php');
include('../templates/admin/menu.php');
include('../templates/admin/modify_category.php');

?>