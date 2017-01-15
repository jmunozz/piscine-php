<!DOCTYPE html>
<html>
<div class="product">
		<p class="name"><?php echo $r['name']; ?></p>
		<p>Prix : <?php echo $r['price']; ?></p>
		<p>Categorie : <?php echo $r['categories']; ?></p>
		<p>Description :  <?php echo $r['description']; ?></p>
		<img src="<?php echo "/admin/img_products/". $r['image']; ?>" height="200px" >
</div>
</html>
