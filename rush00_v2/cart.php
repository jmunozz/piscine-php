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
** We modify qty for a given id product in the cart.
*/
if(isset($_POST['modify'])) {
	$product_id = $_POST['id'];
	$quantity = $_POST['quantity'];
	foreach($_SESSION['content'] as &$product) {
		if ($product['id'] === $product_id) {
			$product['quantity'] = $quantity;
			break;
		}
	}
}

/*
** We delete given id product from the cart.
*/
if(isset($_POST['delete'])) {
	$product_id = $_POST['id'];
	$cart_tmp = $_SESSION['content'];
	$cart_length = count($cart_tmp);
	for($i = 0; $i < $cart_length; $i++) {
		if ($cart_tmp[$i]['id'] === $product_id ) {
			$index_to_remove = $i;
			break;
		}
	}
	array_splice($_SESSION['content'], $index_to_remove, 1);
}

/*
** We archive the content of the cart
*/
if(isset($_POST['archive'])) {

	if (!isset($_SESSION['id'])) {
		$alert = "You must be logged in to purchase these articles";
	}

	else {
		$success = addCart(array(
			'owner_id' => $_SESSION['id'],
			'content' => $_POST['content']
		));
		if($success) $_SESSION['content'] = array();
		$alert = ($success) ? "Congrats, all items are purchased!" : "Items could not be purchased...";
	}
}


$string_cart_content = encodeCartContent($_SESSION['content']);
$cart_content = decodeCartContent($string_cart_content);
$is_empty = count($cart_content) === 0;

include('./templates/head.html');
include('./templates/header.php');
include('./templates/alert.php');
include('./templates/cart.php');

?>