<?PHP
header('Content-Type:text/html');
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PWD']) || !isset($_SERVER['PHP_AUTH_TYPE']))
{	
	header('WWW-Authenticate: Basic realm="Espace membres"');
	header('HTTP/1.0 401 Unauthorized');
}
if (strcmp($_SERVER['PHP_AUTH_USER'], "zaz") || strcmp($_SERVER['PHP_AUTH_PWD'], "jaimelespetitsponeys"))
	exit;
else
{
	echo "USER :".$_SERVER['PHP_AUTH_USER']."\n";
	echo "PWD :".$_SERVER['PHP_AUTH_PWD']."\n";
}
?>
<html><body>Cette zone est accessible uniquement aux membres du site</body></html>
