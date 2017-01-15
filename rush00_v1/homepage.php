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
	<h1> <?php echo HEADER_TITLE; ?> </h1>
	<div class=bottom>
		<div class='sider_cat'>
		</div><!--
		--><div class='center'>
			<?php	include ("center.php"); ?>
			</div>
		</div><!--
		--><div class='sider_user'>
			<?php require 'sider_user.php'; ?>
		</div>
	</div>
	</body>
</html>
