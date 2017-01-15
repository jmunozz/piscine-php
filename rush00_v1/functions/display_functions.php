<?php

/*
** Affiche le produit/catégorie/user en fonction de l'id et de la table.
** Prend la cle de connexion à la BDD et un array( 'table' => X, 'id' => X).
*/

function	display_by_id($bdd, $display_id) {

	if  (!$display_id)
		return FALSE;
	$return = get_elem_infos($bdd, $display_id['table'], $display_id['id']);
	if ($return === FALSE)
		return (FALSE);
	$r = mysqli_fetch_assoc($return);
	if ($r  === FALSE)
	{
		if ($display_id['table'] === "products")
				echo "Ce produits n'existe pas";
		if ($display_id['table'] === "categories")
				echo "Cette catégorie n'exsite pas";
		if ($display_id['table'] === "users")
				echo "Cet utilisateur n'existe pas";
		return (FALSE); 
	}
	if ($display_id['table'] == 'products')
		include ("frames/product_displays.php");
	if ($display_id['table'] == 'categories')
	{
?>
		<p>Nom de la catégorie : <?php echo $r['name']; ?></p>
		<p>Description : <?php echo $r['des']; ?></p>
<?php
}
	if ($display_id['table'] == 'users')
	{
?>
		<p>Nom du user : <?php echo $r['login']; ?></p>
		<p>Mot de passe : <?php echo $r['passwd']; ?></p>
		<p>Status : <?php echo $r['status']; ?></p>
<?php 
}
	return (TRUE);
}
?>

<?php
function	display_all($bdd, $table, $field = NULL, $value = NULL)
{
	if (!$field || !$value)
		$result = get_table_field($bdd, $table, 'id');
	else
		$result = get_ids_constraint($bdd, $table, $field, $value);
	while (($id = mysqli_fetch_array($result)))
		display_by_id($bdd, array( 'table' => $table , 'id' => $id['id']));
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

