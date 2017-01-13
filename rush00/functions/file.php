<?php
define('IMG_MAX_SIZE', 1500000);

function		img_check_errors($file)
{
	$error = NULL;
	preg_match('/\.(.*)/', $file['name'], $ext);
	$valid_extensions = array('jpeg', 'jpg', 'gif', 'png');
	if (!$file)
		$error = "file does not exist";
	else if ($file['error'])
		$error = "transfer error";
	else if (!isset($file['tmp_name']))
		$error = "invalid tmp_name";
	else if ($file['size'] > IMG_MAX_SIZE)
		$error = "file oversize";
	else if (!in_array($ext[1], $valid_extensions))
		$error = "extension is not valid";
	echo $error;
	return($error);
}	


function		img_upload($file, $img_name) 
{
	if (!file_exists('img_products'))
		mkdir('img_products');
	$res = move_uploaded_file($file['tmp_name'], 'img_products/'.$img_name);
	if (!$res)
		return (FALSE);
	return (TRUE);
}


function		img_rename($file)
{
	preg_match('/\.(.*)/', $file['name'], $ext);
	$img_name = "prod_".uniqid(rand(), false).".".$ext[1];
	return ($img_name);
}

function		img_delete($img)
{
	echo 'img_products/'.$img;
	return (unlink('img_products/'.$img));
}
?>
