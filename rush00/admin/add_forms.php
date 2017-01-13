<?php
if ($_GET['type'] == 'product') {
?>
	
	<form method='post' action='?action=add&type=product' enctype='multipart/form-data'>
		<p>NOM du produit</p>
		<input type='text' name='name'/>
		<p>Catégorie associée</p>
		<select name='categorie'>
		<?php 
			$result = get_table_field($bdd, 'categories', 'name');
			while (($r = mysqli_fetch_assoc($result)))
			{
		?>
			<option><?php echo $r['name']; ?></option>
		<?php } ?>
		</select>
		<p>Prix<p/>
		<input type ='text' name='prix'/>
		<p>Image<p/>
		<input type ='file' name='img' />
		<p>Description<p/>
		<input type ='text' name='des'/>
		<br/>
		<input type='submit' name='submit' value='ok' />
	</form>

<?php 
}
if ($_GET['type'] == 'categorie') {
?>

<form method='post' action='?action=add&type=categorie' >
		<p>NOM de la catégorie</p>
		<input type='text' name='name' />
		<p>Description<p/>
		<input type ='text' name='des'/>
		</br>
		<input type='submit' name='submit' value='ok' />
	</form>

<?php 
}
if ($_GET['type'] == 'user') {
?>

<form method='post' action='?action=add&type=user' >
		<p>login</p>
		<input type='text' name='login' />
		<p>password<p/>
		<input type ='text' name='pwd' />
		<p>type<p/>
		<select name='status'>
			<option selected>client</option>
			<option>seller</option>
			<option>admin</option>
		</select>
		</br>
		<input type='submit' name='submit' value='ok' />
	</form>

<?php } ?>

