<?php
include 'display.php';
if (isset($_POST['submit']) && $_POST['submit'] == 'find')
{
	$fd = retreive_find();
	$display_id = array('table' => $fd['table'], 'id' => get_id($bdd, $fd['table'],
	$fd['field'],	$fd['value']));
	display_id_mod($bdd, $display_id);
?>

<?php
}
else if (isset($_POST['submit']) && $_POST['submit'] == 'ok')
{
	print_r($_POST);
	if ($_POST['table'] == 'products')
	{
		if (!set_product($bdd, $_POST['name'], $_POST['price'], $_POST['categories'], 
		$_POST['description'], $_POST['image'], $_POST['id'])) 
		{
?>
		<p>La modification du produit a échoué</p>
<?php
		}
		else 
		{
?>
		<p>Le produit a bien été modifé</p>
<?php 
		}
	}
	if ($_POST['table'] == 'categories')
	{
		if (!set_categorie($bdd, $_POST['name'], $_POST['description'], $_POST['id'])) 
		{
?>
		<p>La modification de la categorie a échoué</p>
<?php
		}
		else 
		{
?>
		<p>La categorie a bien été modifé</p>
<?php 
		}
	}
	if ($_POST['table'] == 'users')
	{
		echo "coucou";
		if (!set_user($_POST['login'],  $_POST['passwd'], $bdd, $_POST['status'],  $_POST['id']))
		{
?>
		<p>La modification de la categorie a échoué</p>
<?php
		}
		else 
		{
?>
		<p>La categorie a bien été modifé</p>
<?php 
		}
	}
}

else
{
?>
<form method='post' action='?action=mod' >
<p>Quel type d'élément voulez-vous modifier ?</p>
<select name='type'>
<option>user</option>
<option>categorie</option>
<option>produit</option>
</select>
<p> Entrez son nom/login</p>
<input type='text' name='value'/>
</br>
<input type='submit' name='submit' value='find' />
</form>
<?php
}
?>







