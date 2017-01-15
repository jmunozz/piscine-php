<!DOCTYPE html>
<html>
	<div class="cart">
		<p>Bonjour <?php echo 
		($_SESSION['user_loggued_on']) ? $_SESSION['user_loggued_on'] : "Inconnu"; 
		?>, voici ton panier !
		</p>
		<div class="mini">
<?php
		for ($i = 0; $_SESSION['cart'][$i] ; $i++) {
			$infos = mysqli_fetch_assoc(get_elem_infos($bdd, 'products', $_SESSION['cart'][$i]['id']));
?>
		<p><?php echo $infos['name']; ?></p>
		<p>Quantité: </p>
		<input type="number" value="<?php echo $_SESSION['cart'][$i]['quantity']; ?>" />
		<p> prix: <?php echo ($_SESSION['cart'][$i]['quantity'] * $infos['price']); ?> </p>
<?php
		}
?>
	</div>
</html
