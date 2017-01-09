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
	<link rel='stylesheet' href='signin.css'>
	</head>
	<body>
	<div>
		<h1>INSCRIVEZ-VOUS</h1>
		<hr width='26%' />
	</div>
	</br>
	<div id ='answer'><?php 
		if (isset($_POST['login']) && isset($_POST['pwd'])) {
			if (!create_new_user($_POST['login'], $_POST['pwd'])){?>
		<img src='img/sad_face.png' alt='OH!Oh!'/>
		<p> Ce login n'est pas valide </p>
		<?php } else {?>
		<img src='img/happy_face.png' alt='OH!Oh!'/>
		<p> Votre inscription a bien été enregistrée </p>
		<?php }} ?>	
	</div>
	</br>
	<div>
	<form method='post'>
		<label for='signin_login'>login</label>
		<input type='text' name='login' value='login' id='signin_login'/>
		</br>
		<label for='signin_pwd'>password</label>
		<input type='text' name='pwd' value='pwd' id='signin_pwd'/>
		</br>
		<input type='submit' value='OK'/>
	</form>
	</div>
</html>

