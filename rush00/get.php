<?php

function get_title() {
	return 'ECOM';
}
function get_header() {
	return 'ECOM';
}
function get_cat() {
	$ar = array('Palace', 'Chateau-fort', 'Cabane');
	return $ar;
}
function get_cart_amount(Array $ar) {
	if (!$ar)
		return 0;
	else
		return 10;
}
	
?>