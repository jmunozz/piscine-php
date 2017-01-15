<?php
function		add_to_cart($id, $quantity, $price) {
	if (!$_SESSION) {
		echo "La session n'existe pas\n";
		return (FALSE); 
	}
	if (FALSE !== ($i = is_in_cart($id))) {
		$_SESSION['cart'][$i]['quantity'] += $quantity;
	}
	else
		$_SESSION['cart'][] = array('id' => $id, 'quantity' => $quantity, 'price' => $price);
	return (TRUE);
}

function		is_in_cart($id) {
	if (!$_SESSION) {
		echo "La session n'existe pas\n";
		return (FALSE); 
	}
	$cart = $_SESSION['cart'];
	for ($i = 0; $cart[$i]; $i++) {
		if ($cart[$i]['id'] === $id){
			return ($i);}
	}
	return (FALSE);
}

function		drop_from_cart($id) {
	if (($i = is_in_cart($id))) {
		unset($_SESSION['cart'][$i]);
		array_values($_SESSION['cart']);
		}
}

function		get_cart_amount($cart) {
	$total = 0;
	foreach($cart as $product) {
		$total += $product['price'] * $product['quantity'];
	}
	return ($total);
}
?>
