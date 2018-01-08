<div id="current_cart">
	<?php
		if($is_empty) {
			echo "<span>You don't have any item in your cart!</span>";
		}
		else {
			foreach($cart_content as $cart_product) {
	?>
			<div class="cart_product">
				<form method="POST" action="/cart.php">
					<span><?php echo $cart_product['name']; ?></span>
					<img class="miniature" <?php echo "src=\"/pictures/" . $cart_product['picture'] . "\""; ?>></img>
					<span><?php echo $cart_product['price']; ?></span>
					<input name="quantity" type="number" value=<?php echo "\"" . $cart_product['quantity'] . "\""; ?> />
					<input name="id" type="hidden" value=<?php echo "\"" . $cart_product['id'] . "\""; ?> />
					<input name="modify" type="submit" value="Modify" />
					<input name="delete" type="submit" value="Delete" />
				</form>
			</div>
	<?php 
			}
	?>
		<div class="cart_total">
			<span>
				<?php 
					echo "TOTAL: " . calculateTotalPrice($cart_content) . "$"; 
				?>
			</span>
		</div>
		<div class="cart_confirm">
			<form method="POST" action="/cart.php">
				<input name="content" type="hidden" value=<?php echo "\"" . $string_cart_content . "\""; ?> />
				<input name="archive" type="submit" value="Purchase these articles" />
			</form>
		</div>
	<?php
		}
	?>
</div>