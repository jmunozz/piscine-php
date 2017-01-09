<?php
if (isset($_POST['auth']) && isset($_POST['login']) && isset($_POST['passwd']))
{
	echo 'La procedure d authentification a ete lance';
	if (auth($_POST['login'] && $_POST['passwd']))
		$_SESSION['is_loggued_on'] = $_POST['login'];
