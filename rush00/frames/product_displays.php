<!DOCTYPE html>
<html>
<div class="product">
		<p class="name"><?php echo $r['name']; ?></p>
		<p>Prix : <?php echo $r['price']; ?></p>
		<p>Categorie : <?php echo $r['categories']; ?></p>
		<p>Description :  <?php echo $r['description']; ?></p>
		<form method="post" >
			<input id="bouton" type="submit" value="Acheter"  name="cart_buy" />
			<input type="number"  value="1" min="1" max="10" name="cart_quantity"/>
			<input type="hidden" value="<?php echo $display_id['id'] ?>" name="cart_id" />
			<input type="hidden" value="<?php echo $r['price'] ?>" name="cart_price" />
		</form>

		<img src="<?php echo "/admin/img_products/". $r['image']; ?>" height="200px" >
</div>
</html>
