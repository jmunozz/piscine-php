<?php
	if (array_key_exists('home', $_GET))
	{
		include ("frames/user_cart.php");
	}
	else if (array_key_exists('categories', $_GET))
	{
		display_all($bdd, 'products', 'categories', $_GET['categories']);
	}
	else if (array_key_exists('product', $_GET))
	{
		display_by_id($bdd, array('products', $_GET['product']));
	}
	else 
	{
		display_all($bdd, 'categories');
	}
?>
