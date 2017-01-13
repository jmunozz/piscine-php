<?php

include 'functions/sql_functions.php';
include 'functions/display_functions.php';

$bdd = sql_connexion();
display_all($bdd, 'products', 'categories', 'pouet');

?>
