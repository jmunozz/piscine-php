<!DOCTYPE html>
<html>
	<head>
	<meta charset 'UTF-8'>
	<title><?php echo HEADER_TITLE; ?></title>
	<link rel='stylesheet' href='frames/ecom.css'>
	<link rel='stylesheet' href='frames/product.css'>
	<link rel='stylesheet' href='frames/cart.css'>
	</head>
	<body>
	<h1 class='header'> <?php echo HEADER_TITLE; ?> 
	<img src="http://be-connected.fr/media/catalog/product/cache/1/image/1200x/9df78eab33525d08d6e5fb8d27136e95/f/i/file_333_6.jpg"></h1>
	<div class=bottom>
		<div class='sider_cat'>
		</div><!--
		--><div class='center'>
			<?php	include ("center.php"); ?>
			</div>
		<div class='sider_user'>
			<?php require 'sider_user.php'; ?>
		</div>
	</div>
	</body>
</html>
