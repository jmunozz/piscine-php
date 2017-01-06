<?php
include 'get.php';
include 'sql_user_create.php';
session_name('ECOM');
session_start();
?>
<html>
	<head>
	<meta charset 'UTF-8'>
	<title><?php echo get_title(); ?></title>
	<link rel='stylesheet' href='ecom.css'>
	</head>
	<body>
	<h6>INSCRIVEZ-VOUS</h6>
	<hr width='80%' />
	</br>
	<div><?php 
		if (isset($_POST['login']) && isset($_POST['pwd'])) {
			if (!create_new_user($_POST['login'], $_POST['pwd'])){?>
		<img width='400px' src='img/sad_face.png' alt='OH!Oh!'/>
		<?php } else {?>
		<img width='400px' src='img/happy_face.png' alt='OH!Oh!'/>
		<?php }} ?>	
	</div>
	</br>
	<form method='post'>
		<label for='signin_login'>LOGIN</label>
		<input type='text' name='login' value='login' id='signin_login'/>
		</br>
		<label for='signin_pwd'>PASSWORD</label>
		<input type='text' name='pwd' value='pwd' id='signin_pwd'/>
		</br>
		<input type='submit' value='OK'/>
	</form>
</html>

