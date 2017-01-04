<?php
session_name('AUTH');
session_start();
if ($_SESSION['loggued_on_user'])
{
	$_SESSION['loggued_on_user'] = "";
	echo "Disconnected\n";
}
?>
