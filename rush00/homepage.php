<!DOCTYPE html>
<html>
	<head>
	<meta charset 'UTF-8'>
	<title><?php echo get_title(); ?></title>
	<link rel='stylesheet' href='ecom.css'>
	</head>
	<body>
	<h1> <?php echo get_header(); ?> </h1>
	<div class=bottom>
		<div class='sider_cat'>
		<?php foreach(get_cat() as $cat_name){ ?>
			<p class='cat_name'><?php echo $cat_name; ?></p>
		<?php } ?>
		</div><!--
		--><div class='center'>les cats.
		</div><!--
		--><div class='sider_user'>
			<?php require 'sider_user.php'; ?>
		</div>
	</div>
	</body>
</html>
