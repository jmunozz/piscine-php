<?php

$valid_passwords = array ("zaz" => "jaimelespetitsponeys");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) 
{
	header('WWW-Authenticate: Basic realm="Espace membres"');
	header('HTTP/1.0 401 Unauthorized');
	echo "<html><body>Cette zone est accessible uniquement aux membres du site<br /></body></html>";
	exit;
}

header('Content-type:text/html');
echo "<html><body>Bonjour Zaz<br />\n";
$img = "../img/42.png";
$i = base64_encode(file_get_contents($img));
echo "<img src='data:image/png;base64,".$i."'>\n";
echo "</body></html>\n";
?>
