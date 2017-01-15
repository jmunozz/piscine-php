<!DOCTYPE html>
<html>
	<head>
	<meta charset 'UTF-8'>
	<title><?php echo HEADER_TITLE; ?></title>
	<link rel='stylesheet' href='../frames/ecom.css'>
	<link rel='stylesheet' href='../frames/product.css'>
	<link rel='stylesheet' href='../frames/cart.css'>
	</head>
	<body>
	<h1> <?php echo HEADER_TITLE; ?> </h1>
	<div class=bottom>
		<div class='sider_cat'>
			<?php include("menu.php"); ?>
		</div><!--
		--><div class='center'>
			<?php	include("backend.php"); ?>
			</div>
		<div class='sider_user'>
			<?php include("sider_adm.php"); ?>
		</div>
	</div>
	</body>
</html>
