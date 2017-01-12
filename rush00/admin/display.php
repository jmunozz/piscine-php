<?php
function	display_id_product($bdd, $display_id) {

	if (($return = get_elem_infos($bdd, $display_id['table'], $display_id['id'])) == FALSE)
		return (FALSE);
	$r = mysqli_fetch_assoc($return); ?>
		<p>Nom du produit : <?php echo $r['name']; ?></p>
		<p>Prix : <?php echo $r['price']; ?></p>
		<p>Categorie : <?php echo $r['categories']; ?></p>
		<p>Description : <?php echo $r['des']; ?></p>
		<p>Image : <?php echo $r['img']; ?></p>
		<?php 
		return (TRUE);
}
?>

<?php
function	display_id_categorie($bdd, $display_id) {

	if (($return = get_elem_infos($bdd, $display_id['table'], $display_id['id'])) == FALSE)
		return (FALSE);
	$r = mysqli_fetch_assoc($return); 
	?>
		<p>Nom de la catégorie : <?php echo $r['name']; ?></p>
		<p>Description : <?php echo $r['des']; ?></p>
		<?php 
		return (TRUE);
}
?>

<?php		
function	display_id_user($bdd, $display_id) {

	if(($return = get_elem_infos($bdd, $display_id['table'], $display_id['id'])) == FALSE)
		return (FALSE);
	$r = mysqli_fetch_assoc($return); 
	?>
		<p>Nom du user : <?php echo $r['login']; ?></p>
		<p>Mot de passe : <?php echo $r['passwd']; ?></p>
		<p>Status : <?php echo $r['status']; ?></p>
		<?php  
		return (TRUE);
}
?>

<?php
function	display_id_product_mod($bdd, $display_id) {

	if (($return = get_elem_infos($bdd, $display_id['table'], $display_id['id'])) == FALSE)
		return (FALSE);
	$r = mysqli_fetch_assoc($return); ?>
		<form method='post' action='?action=mod'>
		<p>Nom du produit :</p>
		<input type='text' name='name' value='<?php echo $r['name']; ?>' />
		<p>Prix :</p>
		<input type='text' name='price' value='<?php echo $r['price']; ?>' />
		<p>Categorie :</p>
		<input type='text' name='categories' value='<?php echo $r['categories']; ?>' />
		<p>Description :</p>
		<input type='text' name='description' value='<?php echo $r['description']; ?>' />
		<p>Image :</p>
		<input type='text' name='image' value='<?php echo $r['image']; ?>' />
		<p>Modifier cet élément</p>
		<input type='submit' name='submit' value='ok' />
		<input type='hidden' name='id' value='<?php echo $display_id['id']; ?>' />
		<input type='hidden' name='table' value='<?php echo $display_id['table']; ?>' />
		</form>
		<?php 
		return (TRUE);
}
?>

<?php
function	display_id_categorie_mod($bdd, $display_id) {

	if (($return = get_elem_infos($bdd, $display_id['table'], $display_id['id'])) == FALSE)
		return (FALSE);
	$r = mysqli_fetch_assoc($return); ?>
		<form method='post' action='?action=mod'>
		<p>Nom de la catégorie :</p>
		<input type='text' name='name' value='<?php echo $r['name']; ?>' />
		<p>Description</p>
		<input type='text' name='price' value='<?php echo $r['description']; ?>' />
		<p>Modifier cet élément</p>
		<input type='submit' name='submit' value='ok' />
		<input type='hidden' name='id' value='<?php echo $display_id['id']; ?>' />
		<input type='hidden' name='table' value='<?php echo $display_id['table']; ?>' />
		</form>
		<?php 
		return (TRUE);
}
?>

<?php
function	display_id_user_mod($bdd, $display_id) {

	if (($return = get_elem_infos($bdd, $display_id['table'], $display_id['id'])) == FALSE)
		return (FALSE);
	$r = mysqli_fetch_assoc($return); ?>
		<form method='post' action='?action=mod'>
		<p>Nom de l'utilisateur :</p>
		<input type='text' name='login' value='<?php echo $r['login']; ?>' />
		<p>Mot de passe</p>
		<input type='password' name='passwd' value='' />
		<p>statut</p>
		<input type='text' name='status' value='<?php echo $r['status']; ?>' />
		<p>Modifier cet élément</p>
		<input type='submit' name='submit' value='ok' />
		<input type='hidden' name='id' value='<?php echo $display_id['id']; ?>' />
		<input type='hidden' name='table' value='<?php echo $display_id['table']; ?>' />
		</form>
		<?php 
		return (TRUE);
}
?>

<?php
function	display_id($bdd, $display_id) {
	if (isset($display_id))
	{
		if ($display_id['table'] == 'products')
		{
			if (display_id_product($bdd, $display_id) == FALSE)
			{
				echo "Ce produit n'existe pas.";
				return (FALSE);
			}
		}
		if ($display_id['table'] == 'categories')
		{
			if (display_id_categorie($bdd, $display_id) == FALSE)
			{
				echo "Cette catégorie n'existe pas";
				return (FALSE);
			}
		}
		if ($display_id['table'] == 'users')
		{
			if (display_id_user($bdd, $display_id) == FALSE)
			{
				echo "Cet utilisateur n'existe pas";
				return (FALSE);
			}
		}
	}
}

function	display_id_mod($bdd, $display_id) {
	if (isset($display_id))
	{
		if ($display_id['table'] == 'products')
		{
			if (display_id_product_mod($bdd, $display_id) == FALSE)
			{
				echo "Ce produit n'existe pas.";
				return (FALSE);
			}
		}
		if ($display_id['table'] == 'categories')
		{
			if (display_id_categorie_mod($bdd, $display_id) == FALSE)
			{
				echo "Cette catégorie n'existe pas";
				return (FALSE);
			}
		}
		if ($display_id['table'] == 'users')
		{
			if (display_id_user_mod($bdd, $display_id) == FALSE)
			{
				echo "Cet utilisateur n'existe pas";
				return (FALSE);
			}
		}
	}
}
?>

