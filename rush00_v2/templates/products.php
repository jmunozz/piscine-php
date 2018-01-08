<div id="products">

	<?php
		if ($show_details) {
			if (!$product_infos['is_active']) {
				echo "<h1>This product is no longer at sale !!</h1>";
			}
			else {
	?>
		<div class="single_product">
			<div class='img_side'>
				<?php echo "<img src=\"/pictures/" . $product_infos['picture'] . "\" alt=\"Product Picture\"/>"; ?>
			</div>
			<div class="description_side">
				<?php echo "<h1>" . $product_infos['name'] . "</h1>"; ?>
				<?php echo "<p>" . $product_infos['description'] . "</p>"; ?>
				<?php echo "<h3>" . $product_infos['price'] . " $</h3>"; ?>
				<form method="POST" action="/">
					<label>Quantity</label>
					<input type="number" value="1" name="quantity">
					<input type="hidden" name="id" value=<?php echo "\"" . $product_infos['id'] ."\""; ?> />
					<button class="add_product_button" name="added" value="true">Add to Cart!</button>
				</form>
			</div>
		</div>
	<?php
			}
		}
		else {
			foreach ($product_list as $p) {
				if ($p['is_active']) {
		?>
				<a href=<?php echo '"/?product_id=' . $p['id'] . '"' ?>><div class="product">
					<div class="product_title">
						<?php echo $p['name'] ?>
					</div>
					<div class="product_picture">
						<?php echo "<img src=\"/pictures/" . $p['picture'] . "\" alt=\"Product Picture\"";?>
					</div>
					<div class="product_description">
						<?php echo $p['description'] ?>
					</div>
				</div></a>
	<?php 
				}
			}
		}
	?>
</div>