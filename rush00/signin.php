<?php
include 'get.php';
include 'functions/sql_functions.php';
session_name('ECOM');
session_start();
$bdd = sql_connexion();
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
			if (!create_user($_POST['login'], $_POST['pwd'], $bdd)){?>
		<img src='img/sad_face.png' alt='OH!Oh!'/>
		<p> Ce login n'est pas valide </p>
		<?php } else {?>
		<img src='img/happy_face.png' alt='OH!Oh!'/>
		<p> Votre inscription a bien été enregistrée </p>
		<?php }} ?>	
	</div>
	</br>
	<div id='signin'>
	<form method='post'>
		<p>identifiant</p>
		<input type='text' name='login' value='login' id='signin_login'/>
		<p>mot de passe</p>
		<input type='password' name='pwd' value='pwd' id='signin_pwd'/>
		<input type='submit' value="s'inscrire"'/>
	</form>
	</div>
</html>

