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
			if (get_id($bdd, 'products', 'name', $_POST['name']))
				return( FALSE);
			$img_name = !img_check_errors($_FILES['img']) ? img_rename($_FILES['img']) : NULL;
			if (!set_product($bdd, $_POST['name'], $_POST['prix'], $_POST['categorie'], 
				$_POST['des'], $img_name))
				return (FALSE);
			img_upload($_FILES['img'], $img_name);
			return (TRUE);
		}
	}
	if ($type == 'categorie')
	{
		if (!isset($_POST['name']))
				return (FALSE);
		else
		{
			if (get_id($bdd, 'categories', 'name', $_POST['name']))
				return (FALSE);
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
echo "sdsdf";
	if ($type == 'product')
	{
		if (!isset($_POST['name']))
				return (FALSE);
		else
		{
			$id = get_id($bdd, 'products', 'name', $_POST['name']);
			$res = get_elem_infos($bdd, 'products', $id);
			$infos = mysqli_fetch_assoc($res);
			print_r($infos);
			if (!delete_elem($bdd, 'products', $_POST['name']))
				return (FALSE);
			echo "infos image === ".$infos['image'];
			img_delete($infos['image']);
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
