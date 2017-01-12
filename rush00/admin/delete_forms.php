<?php
if ($_GET['type'] == 'product') {
?>
	
	<form method='post' action='?action=del&type=product' >
		<p>Quel produit voulez-vous supprimer ?</p>
		<input type='text' name='name'/>
		<br/>
		<input type='submit' name='submit' value='ok' />
	</form>

<?php 
}
if ($_GET['type'] == 'categorie') {
?>

<form method='post' action='?action=del&type=categorie' >
		<p>Quelle catégorie vouslez-vous supprimer ?</p>
		<input type='text' name='name' />
		</br>
		<input type='submit' name='submit' value='ok' />
	</form>

<?php 
}
if ($_GET['type'] == 'user') {
?>

<form method='post' action='?action=del&type=user' >
		<p>Quel user voulez-vous supprimer ?</p>
		<input type='text' name='login' />
		</br>
		<input type='submit' name='submit' value='ok' />
	</form>

<?php } ?>

