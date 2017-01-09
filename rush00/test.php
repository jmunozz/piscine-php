<?php
require_once('sql_functions.php');
$bdd = sql_connexion();
$infos = get_user_infos('junoz', $bdd);
print_r($infos);
?>
