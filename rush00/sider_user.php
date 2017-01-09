<!DOCTYPE html>
<?php
session_name('ECOM');
session_start(); 
echo $_SESSION['is_loggued_on'];?>
<html>
	<div class="user_info">
		<br/>
		<div class='circle elem_side'>
			<a href='user_home.php'>
			<img id='user' class='resize_side elem_side' src='img/persona.png' alt='user' >
			</a>
		</div>
		<br/>
		<?php if (!$_SESSION['user_loggued_on']) {?>
		<p class='elem_side'>Se connecter</p>
		<form method='post'>
			<input class='elem_side' type='text' name='login' value='login'/>
			<input class='elem_side' type='password' name='passwd' value='passwd'/>
			<input class='elem_side' type='submit' name='auth' value='connexion' />
		</form>
		<a href='signin.php'><p class='elem_side'>Je ne suis pas encore inscrit</p></a>
		<?php } else { ?>
		<p class='elem_side'>Connecte</p>
		<form method='post'>
		<input class='elem_side' type='submit' name='auth' value='deconnexion'/>
		</form>
		<?php } ?>
	</div>
	<br /><hr class='elem_side' width='80%' /><br />
	<div class="user_cart">
		<p class='elem_side'>MON PANIER </p>
		<div class='circle elem_side'>
			<a href='user_cart.php'>
			<img id='cart' class='resize_side elem_side' src='img/cart.png' alt='user' >
			</a>
		</div>
		<br/>
		<p class='elem_side'><?php echo get_cart_amount($_SESSION['cart_content']); ?> EUROS</p>
		<br />
		<form action='end_shopping.php'>
			<input class='elem_side' type='submit'
			value='FINIR SHOPPING' >
		</form>
	</div>
</html>
