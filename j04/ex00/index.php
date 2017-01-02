<?PHP
session_name('PRIVATE');
session_start();
if (isset($_COOKIE['PRIVATE']))
{
	if (!strcmp($_GET['submit'], "OK"))
	{
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
}
?>
<html>
<body>
<form ...>
Identifiant: <input type="text" name="login" value="<?PHP 
if (isset($_SESSION['login']))
	echo $_SESSION['login']; 
?>
" />
<br />
Mot de passe: <input type="password" name="passwd" value="<?PHP 
if (isset($_SESSION['passwd']))
	echo $_SESSION['passwd']; 
?>
"/>
<br />
<a href='index.php'><input type="submit" name="submit" value="OK" /></a>
</form>
</body></html>
