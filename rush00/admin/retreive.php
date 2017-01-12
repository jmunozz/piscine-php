<?php

function	retreive_add($bdd, $type)
{
	if ($type == 'product')
	{
		if (!isset($_POST['name']) || !isset($_POST['categorie'])
			|| !isset($_POST['prix']))
				return (FALSE);
		else
		{
			
			if (!set_product($bdd, $_POST['name'], $_POST['prix'],
			$_POST['categorie'], $_POST['des'], $_POST['img']))
				return (FALSE);
			return (TRUE);
		}
	}
	if ($type == 'categorie')
	{
		if (!isset($_POST['name']))
				return (FALSE);
		else
		{
			if (!set_categorie($bdd, $_POST['name'], $_POST['des']))
				return (FALSE);
			return (TRUE);
		}
	}
	if ($type == 'user')
	{
		if (!isset($_POST['login']) || !isset($_POST['pwd']))
				return (FALSE);
		else
		{
			if (!set_user($_POST['login'], $_POST['pwd'], $bdd))
				return (FALSE);
			return (TRUE);
		}
	}
}

function	retreive_del($bdd, $type) {

	if ($type == 'product')
	{
		if (!isset($_POST['name']))
				return (FALSE);
		else
		{
			
			if (!delete_elem($bdd, 'products', $_POST['name']))
				return (FALSE);
			return (TRUE);
		}
	}
	if ($type == 'categorie')
	{
		if (!isset($_POST['name']))
				return (FALSE);
		else
		{
			if (!delete_elem($bdd, 'categories', $_POST['name']))
				return (FALSE);
			return (TRUE);
		}
	}
	if ($type == 'user')
	{
		if (!isset($_POST['login']))
				return (FALSE);
		else
		{
			if (!delete_elem($bdd, 'users', $_POST['login']))
				return (FALSE);
			return (TRUE);
		}
	}
}

function		retreive_find() {

	$find_id = array();
	switch ($_POST['type']) {
		case 'user':
			$find_id['table'] = 'users';
			$find_id['field'] = 'login';
			$find_id['value'] = $_POST['value'];
			break;
		case 'categorie':
			$find_id['table'] = 'categories';
			$find_id['field'] = 'name';
			$find_id['value'] = $_POST['value'];
			break;
		case 'produit':
			$find_id['table'] = 'products';
			$find_id['field'] = 'name';
			$find_id['value'] = $_POST['value'];
			break;
	}
	return ($find_id);
}
?>
